<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        /* ... (styles remain the same) ... */
         :root {
            --primary-color: #3498db;
            --primary-hover: #2980b9;
            --danger-color: #e74c3c;
            --danger-hover: #c0392b;
            --success-bg: #dff0d8;
            --success-text: #3c763d;
            --light-gray: #f5f7fa;
            --medium-gray: #eaeaea;
            --dark-gray: #bdc3c7;
            --text-color: #2c3e50;
            --white: #ffffff;
            --border-radius: 6px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --input-border: #ccc;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: var(--light-gray);
            color: var(--text-color);
            line-height: 1.6;
            padding: 30px;
        }

        h1, h2, h3, h4 {
            color: var(--text-color);
            margin-bottom: 1rem;
            font-weight: 500;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 700;
            color: #34495e;
        }

        h2 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: var(--white);
            padding: 30px 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .section {
            background: var(--white);
            padding: 30px;
            border-radius: var(--border-radius);
            margin-bottom: 30px;
            /* Removed redundant background/padding/radius as it's now on .container */
            /* box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.08); */ /* Moved shadow to container */
        }

        .section-alt { /* Alternate background for nested sections */
             background-color: #fdfdfd;
             border: 1px solid #f0f0f0;
             padding: 20px;
             margin-top: 20px;
             border-radius: var(--border-radius);
        }

        ul {
            list-style: none;
            padding-left: 0;
            margin-top: 15px;
        }

        li {
            padding: 12px 15px;
            border-bottom: 1px solid var(--medium-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px; /* Spacing between items in the li */
        }

        li:last-child {
            border-bottom: none;
        }

        li .user-info {
            flex-grow: 1;
            margin-right: 15px;
        }

        input,
        select,
        button {
            padding: 10px 12px;
            margin: 5px 5px 10px 0;
            border: 1px solid var(--input-border);
            border-radius: var(--border-radius);
            font-size: 14px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus, select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
             min-width: 180px; /* Ensure decent width */
        }

        input[type="number"] {
            width: 130px;
        }

        button {
            background-color: var(--primary-color);
            color: var(--white);
            cursor: pointer;
            border: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: var(--primary-hover);
        }

        .btn-danger {
            background-color: var(--danger-color);
        }

        .btn-danger:hover {
            background-color: var(--danger-hover);
        }

        .btn-small {
            padding: 6px 10px;
            font-size: 13px;
        }

        .alert {
            background-color: var(--success-bg);
            color: var(--success-text);
            padding: 15px 20px;
            border-radius: var(--border-radius);
            margin-bottom: 25px;
            border: 1px solid #c3e6cb;
            font-weight: 500;
        }

        form {
            margin-bottom: 20px; /* Add spacing below forms */
        }

        form.inline {
            display: inline-block;
            margin-left: 5px;
            margin-bottom: 0; /* Reset margin for inline forms */
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column; /* Stack label and input */
        }
         .form-group label {
            margin-bottom: 5px;
            font-weight: 500;
            font-size: 14px;
         }

        select {
            min-width: 180px;
        }

        .form-title {
            margin-top: 25px;
            margin-bottom: 15px;
            font-weight: 500;
            font-size: 1.1em;
            color: var(--primary-color);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        .stat-item {
            background-color: var(--light-gray);
            padding: 15px;
            border-radius: var(--border-radius);
            text-align: center;
            border: 1px solid var(--medium-gray);
        }
         .stat-item strong {
             display: block;
             font-size: 1.4em;
             margin-bottom: 5px;
             color: var(--primary-color);
         }
         .stat-item span {
             font-size: 0.9em;
             color: #555;
         }

         /* Table Styles */
        .table-container {
            overflow-x: auto; /* Handle potential overflow on small screens */
            margin-top: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            border-radius: var(--border-radius);
            overflow: hidden; /* Ensures border-radius applies to table */
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--medium-gray);
        }

        thead tr {
            background-color: #eef5f9; /* Lighter blue shade */
            color: #34495e;
            font-weight: 500;
        }

        tbody tr:nth-of-type(even) {
            background-color: #fbfcfd;
        }

        tbody tr:hover {
            background-color: #f1f8fd;
        }

        tbody tr td:last-child,
        tbody tr td:nth-last-child(2) { /* Right align currency */
             text-align: right;
        }

         .actions-group { /* Group buttons in lists/tables */
             display: flex;
             gap: 5px;
             align-items: center;
         }
         .actions-group form {
            margin-bottom: 0; /* Reset form margin within the group */
         }

         .logout-button {
             position: absolute;
             top: 25px;
             right: 30px;
         }

        @media print {
            body * {
                visibility: hidden;
            }

            #print-area,
            #print-area *,
            #print-area-bank,
            #print-area-bank *,
            #print-area-siswa,
            #print-area-siswa * {
                visibility: visible;
            }

            #print-area,
            #print-area-bank,
            #print-area-siswa {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 20px;
                background: var(--white);
                box-shadow: none;
                border: none;
            }
            .container {
                 box-shadow: none;
                 padding: 0;
                 max-width: 100%;
            }

            h1, h2, h3, h4, .logout-button, button, form, input, select, .alert, .no-print, .form-title:not(#print-area h3, #print-area-bank h3, #print-area-siswa h3) {
                display: none !important;
                visibility: hidden !important;
            }
            table {
                 box-shadow: none;
                 border: 1px solid #ccc;
                 font-size: 12pt;
            }
             th, td {
                 padding: 8px;
                 border: 1px solid #ccc;
             }
             thead tr {
                 background-color: #eee;
             }
             #print-area h3, #print-area-bank h3, #print-area-siswa h3 {
                 display: block !important;
                 visibility: visible !important;
                 text-align: center;
                 margin-bottom: 1.5rem;
                 font-size: 16pt;
             }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Dashboard</h1>

        @if (session('status'))
            <div class="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (Auth::user())
            <form action="{{ route('logout') }}" method="POST" class="logout-button">
                @csrf
                <button type="submit" class="btn-danger btn-small">LOGOUT</button>
            </form>

            @if(Auth::user()->role === 'admin')
                <div class="section">
                    <h2>Admin Dashboard</h2>

                    <div class="stats-grid">
                         <div class="stat-item">
                             <strong>{{ $user }}</strong>
                             <span>Total Users</span>
                         </div>
                    </div>

                    <div class="form-title">Tambah Pengguna Baru</div>
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Nama" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <select name="role" required>
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="siswa">Siswa</option>
                            <option value="bank">Bank</option>
                            <option value="admin">Admin</option>
                        </select>
                        <button type="submit">Tambah Pengguna</button>
                    </form>

                    <div class="form-title">Daftar Semua Pengguna</div>
                    <ul>
                        @foreach($userAll as $u)
                            <li>
                                <div class="user-info">
                                    {{ $u->name }} ({{ $u->email }}) - <strong>Role:</strong> {{ ucfirst($u->role) }}
                                </div>
                                <div class="actions-group">
                                    <form action="{{ route('users.update', $u->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="name" value="{{ $u->name }}" required title="Nama">
                                        <input type="email" name="email" value="{{ $u->email }}" required title="Email">
                                        <select name="role" title="Role">
                                            <option value="siswa" {{ $u->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                            <option value="bank" {{ $u->role == 'bank' ? 'selected' : '' }}>Bank</option>
                                            <option value="admin" {{ $u->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        <button type="submit" class="btn-small">Update</button>
                                    </form>

                                    <form action="{{ route('users.destroy', $u->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger btn-small"
                                            onclick="return confirm('Yakin ingin menghapus pengguna {{ $u->name }}?')">Hapus</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="form-title">Riwayat Transaksi Sistem (Mutasi)</div>
                    <button onclick="printContent('print-area')" class="no-print">Cetak Riwayat</button>

                    <div id="print-area">
                        <h3>Riwayat Transaksi Sistem</h3>
                         <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                        <th>Status</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($mutasi as $m)
                                        <tr>
                                            <td>{{ $m->created_at->format('d M Y H:i') }}</td>
                                            <td>Rp{{ number_format($m->credit ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp{{ number_format($m->debit ?? 0, 0, ',', '.') }}</td>
                                            <td>{{ ucfirst($m->status ?? 'Selesai') }}</td>
                                            <td>{{ $m->user->name ?? 'N/A' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" style="text-align: center;">Tidak ada riwayat transaksi.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            @elseif(Auth::user()->role === 'bank')
                <div class="section">
                    <h2>Bank Dashboard</h2>

                    <div class="stats-grid">
                        <div class="stat-item">
                            <strong>Rp{{ number_format($saldo ?? 0, 0, ',', '.') }}</strong>
                            <span>Saldo Bank</span>
                        </div>
                        <div class="stat-item">
                            <strong>Rp{{ number_format($credit ?? 0, 0, ',', '.') }}</strong>
                            <span>Total Kredit</span>
                        </div>
                         <div class="stat-item">
                            <strong>Rp{{ number_format($debit ?? 0, 0, ',', '.') }}</strong>
                            <span>Total Debit</span>
                        </div>
                        <div class="stat-item">
                            <strong>{{ $nasabah ?? 0 }}</strong>
                            <span>Jumlah Nasabah</span>
                        </div>
                        <div class="stat-item">
                            <strong>{{ $allmutasi ?? 0 }}</strong>
                            <span>Transaksi Selesai</span>
                        </div>
                    </div>
                    <div class="form-title">Tambah Siswa Baru</div>
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Nama Siswa" required>
                        <input type="email" name="email" placeholder="Email Siswa" required>
                        <input type="password" name="password" placeholder="Password Awal" required>
                        <input type="hidden" name="role" value="siswa">
                        <p style="margin-top: 5px; margin-bottom: 10px; font-size: 0.9em; color: #555;"><em>Pengguna baru akan didaftarkan sebagai Siswa.</em></p>
                        <button type="submit">Tambah Siswa</button>
                    </form>
                    <div class="form-title">Top Up Saldo Siswa</div>
                    <form action="{{ route('wallet.topupForSiswa') }}" method="POST">
                        @csrf
                        <select name="siswa_id" required>
                            <option value="" disabled selected>Pilih Siswa</option>
                            @foreach ($users as $u)
                                <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option>
                            @endforeach
                        </select>
                        <input type="number" name="credit" min="5000" placeholder="Jumlah (min 5000)" required>
                        <button type="submit">Top Up Siswa</button>
                    </form>

                    <div class="form-title">Tarik Saldo Siswa</div>
                    <form action="{{ route('wallet.withdrawForSiswa') }}" method="POST">
                        @csrf
                        <select name="siswa_id" required>
                             <option value="" disabled selected>Pilih Siswa</option>
                            @foreach ($users as $u)
                                <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option>
                            @endforeach
                        </select>
                        <input type="number" name="debit" min="5000" placeholder="Jumlah (min 5000)" required>
                        <button type="submit">Tarik dari Siswa</button>
                    </form>

                    <div class="form-title">Transaksi Menunggu Persetujuan</div>
                    <ul>
                        @forelse($recent_payment as $rp)
                            <li>
                                <div>
                                    {{ $rp->created_at->format('d M Y H:i') }} - {{ $rp->user->name ?? 'Unknown User' }} <br>
                                    @if($rp->credit > 0)
                                        Request Top Up: <strong>Rp{{ number_format($rp->credit, 0, ',', '.') }}</strong>
                                    @elseif($rp->debit > 0)
                                        Request Penarikan: <strong>Rp{{ number_format($rp->debit, 0, ',', '.') }}</strong>
                                    @endif
                                     - Status: <span style="font-weight: bold; color: orange;">{{ ucfirst($rp->status) }}</span>
                                </div>
                                <form action="{{ route('wallet.accept') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="wallet_id" value="{{ $rp->id }}">
                                    <button type="submit" class="btn-small">Setujui</button>
                                </form>
                            </li>
                        @empty
                             <li>Tidak ada transaksi yang menunggu persetujuan.</li>
                        @endforelse
                    </ul>

                    <div class="form-title">Riwayat Transaksi Bank</div>
                    <button onclick="printContent('print-area-bank')" class="no-print">Cetak Riwayat Bank</button>

                    <div id="print-area-bank">
                        <h3>Riwayat Transaksi Bank</h3>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                        <th>Status</th>
                                        <th>User Terkait</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($mutasi as $m)
                                        <tr>
                                            <td>{{ $m->created_at->format('d M Y H:i') }}</td>
                                            <td>Rp{{ number_format($m->credit ?? 0, 0, ',', '.') }}</td>
                                            <td>Rp{{ number_format($m->debit ?? 0, 0, ',', '.') }}</td>
                                            <td>{{ ucfirst($m->status ?? 'Selesai') }}</td>
                                            <td>{{ $m->user->name ?? 'N/A' }}</td>
                                        </tr>
                                     @empty
                                        <tr>
                                            <td colspan="5" style="text-align: center;">Tidak ada riwayat transaksi.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                         </div>
                    </div>
                </div>

            @elseif(Auth::user()->role === 'siswa')
                 <div class="section">
                    <h2>Selamat datang, {{ Auth::user()->name }}</h2>
                     <div class="stats-grid">
                         <div class="stat-item">
                            <strong>Rp{{ number_format($saldo ?? 0, 0, ',', '.') }}</strong>
                            <span>Saldo Saat Ini</span>
                         </div>
                     </div>

                    <div class="section-alt">
                        <div class="form-title">Riwayat Transaksi Anda</div>
                        <button onclick="printContent('print-area-siswa')" class="no-print">Cetak Riwayat</button>

                        <div id="print-area-siswa">
                             <h3>Riwayat Transaksi Anda</h3>
                             <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Status</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($mutasi as $m)
                                            <tr>
                                                <td>{{ $m->created_at->format('d M Y H:i') }}</td>
                                                <td>Rp{{ number_format($m->credit ?? 0, 0, ',', '.') }}</td>
                                                <td>Rp{{ number_format($m->debit ?? 0, 0, ',', '.') }}</td>
                                                <td>{{ ucfirst($m->status ?? 'Selesai') }}</td>
                                                <td>{{ $m->description ?? '-' }}</td>
                                            </tr>
                                         @empty
                                            <tr>
                                                <td colspan="5" style="text-align: center;">Tidak ada riwayat transaksi.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="section">
                    <div class="form-title">Transfer ke Teman</div>
                    <form action="{{ route('wallet.transfer') }}" method="POST">
                        @csrf
                        <select name="recipient_id" required>
                            <option value="" disabled selected>Pilih Penerima</option>
                            @foreach($users as $u)
                                @if($u->id !== Auth::id()) 
                                <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="number" name="amount" min="5000" placeholder="Jumlah (min 5000)" required>
                        <button type="submit">Kirim Transfer</button>
                    </form>
                </div>

                <div class="section">
                     <div class="form-title">Top Up Saldo</div>
                    <form action="{{ route('wallet.topup') }}" method="POST">
                        @csrf
                        <input type="number" name="credit" min="5000" placeholder="Jumlah Top Up (min 5000)" required>
                        <button type="submit">Request Top Up</button>
                         <small style="display: block; margin-top: -5px; color: #777;">Top up memerlukan persetujuan Bank.</small>
                    </form>
                </div>

                <div class="section">
                    <div class="form-title">Tarik Saldo</div>
                    <form action="{{ route('wallet.withdraw') }}" method="POST">
                        @csrf
                        <input type="number" name="debit" min="5000" placeholder="Jumlah Penarikan (min 5000)" required>
                        <button type="submit">Request Penarikan</button>
                        <small style="display: block; margin-top: -5px; color: #777;">Penarikan memerlukan persetujuan Bank.</small>
                    </form>
                </div>
            @endif
        @endif
    </div>

    <script>
        function printContent(elementId) {
            const printArea = document.getElementById(elementId);
            if (printArea) {
                document.body.classList.add('printing');
                window.print();
                document.body.classList.remove('printing');
            } else {
                console.error('Print area not found:', elementId);
            }
        }

        const deleteForms = document.querySelectorAll('form[method="POST"] button.btn-danger');
        deleteForms.forEach(button => {
            if (!button.getAttribute('onclick')) {
                 const form = button.closest('form');
                 if (form && form.querySelector('input[name="_method"][value="DELETE"]')) {
                    button.addEventListener('click', function(event) {
                        if (!confirm('Apakah Anda yakin ingin menghapus item ini?')) {
                            event.preventDefault();
                        }
                    });
                 }
            }
        });
    </script>

</body>
</html>