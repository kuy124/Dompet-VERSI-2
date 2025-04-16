<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Exceptions\Exception;

class WalletController extends Controller
{
    public function topup(Request $request)
    {
        $request->validate([
            'credit' => 'required|numeric|min:5000',
        ]);

        Wallet::create([
            'user_id' => Auth::id(),
            'debit' => 0,
            'credit' => $request->credit,
            'description' => 'Top up saldo',
            'status' => 'process',
        ]);
        return redirect()->back()->with('status', 'Permintaan sudah dibuat');
    }

    public function withdraw(Request $request)
    {
        $request->validate([
            'debit' => 'required|numeric|min:5000',
        ]);

        $user = Auth::user();
        $totalSaldo = Wallet::where('user_id', $user->id)->where('status', 'done')->sum(DB::raw('credit-debit'));
        if ($totalSaldo < $request->debit) {
            return redirect()->back()->with('status', 'Saldo tidak mencukupi');
        } else {
            Wallet::create([
                'user_id' => $user->id,
                'debit' => $request->debit,
                'credit' => 0,
                'description' => 'Tarik tunai',
                'status' => 'process',
            ]);
            return redirect()->back()->with('status', 'Permintaan sudah dibuat');
        }
    }

    public function transfer(Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:5000'
        ]);
        $user = Auth::user();
        $recipient = User::findOrFail($request->recipient_id);
        $totalSaldo = Wallet::where('user_id', $user->id)->where('status', 'done')->sum(DB::raw('credit-debit'));
        if ($totalSaldo < $request->amount) {
            return redirect()->back()->with('status', 'Saldo tidak mencukupi');
        } else {
            DB::beginTransaction();
            try {
                Wallet::create([
                    'user_id' => $user->id,
                    'credit' => 0,
                    'debit' => $request->amount,
                    'status' => 'done',
                    'description' => 'Transfer ke ' . $recipient->name
                ]);
                
                Wallet::create([
                    'user_id' => $recipient->id,
                    'credit' => $request->amount,
                    'debit' => 0,
                    'status' => 'done',
                    'description' => 'Transfer dari ' . $user->name
                ]);                

                DB::commit();
                return redirect()->back()->with('status', 'Transfer berhasil');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->with('status', 'Terjadi kesalahan, transfer gagal');
            }
        }
    }

    public function topupForSiswa(Request $request)
    {
        if (Auth::user()->role !== 'bank') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'siswa_id' => 'required|exists:users,id',
            'credit' => 'required|numeric|min:5000',
        ]);

        Wallet::create([
            'user_id' => $request->siswa_id,
            'credit' => $request->credit,
            'debit' => 0,
            'description' => 'Top up oleh bank',
            'status' => 'done',
        ]);

        return redirect()->back()->with('status', 'Top up berhasil untuk siswa');
    }

    public function withdrawForSiswa(Request $request)
    {
        if (Auth::user()->role !== 'bank') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'siswa_id' => 'required|exists:users,id',
            'debit' => 'required|numeric|min:5000',
        ]);

        $totalSaldo = Wallet::where('user_id', $request->siswa_id)
            ->where('status', 'done')
            ->sum(DB::raw('credit - debit'));

        if ($totalSaldo < $request->debit) {
            return redirect()->back()->with('status', 'Saldo siswa tidak mencukupi');
        }

        Wallet::create([
            'user_id' => $request->siswa_id,
            'credit' => 0,
            'debit' => $request->debit,
            'description' => 'Penarikan oleh bank',
            'status' => 'done',
        ]);

        return redirect()->back()->with('status', 'Penarikan berhasil untuk siswa');
    }


    public function acceptRequest(Request $request)
    {
        $wallet = Wallet::findOrFail($request->wallet_id);
        $wallet->update(['status' => 'done']);

        return redirect()->back()->with('status', 'Permintaan berhasil disetujui');
    }
}
