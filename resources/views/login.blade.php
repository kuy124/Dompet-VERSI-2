<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts (Optional - for a more professional look) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0d6efd; /* Bootstrap Primary */
            --gradient-start: #e0f7fa;
            --gradient-end: #b2ebf2;
            --card-bg: #ffffff;
            --text-color: #212529;
            --muted-color: #6c757d;
            --input-border-color: #ced4da;
            --input-focus-border-color: #86b7fe;
            --input-focus-box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            --invalid-color: #dc3545; /* Bootstrap Danger */
        }

        body {
            font-family: 'Poppins', sans-serif; /* Using Google Font */
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1rem;
        }

        .login-container {
            max-width: 480px;
            width: 100%;
        }

        .login-card {
            background-color: var(--card-bg);
            border-radius: 1rem; /* Slightly larger radius */
            border: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); /* Softer shadow */
            overflow: hidden; /* Ensures inner elements conform to border-radius */
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .login-card:hover {
            transform: translateY(-5px); /* Subtle lift effect */
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .login-card .card-body {
            padding: 3rem; /* Increased padding */
        }

        .login-icon {
            font-size: 3.5rem; /* Slightly larger icon */
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            display: inline-block; /* Needed for transforms/animations if added later */
        }

        .form-control-lg {
            min-height: calc(1.5em + 1rem + 2px);
            padding: 0.85rem 1.1rem; /* Adjusted padding */
            font-size: 1rem;
            border-radius: 0.5rem; /* Consistent radius */
             transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        /* Input Group Styling */
        .input-group {
            border: 1px solid var(--input-border-color); /* Add border to the whole group */
            border-radius: 0.5rem; /* Match input radius */
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            overflow: hidden; /* Clip inner elements */
        }

        .input-group .input-group-text {
            background-color: #e9ecef;
            border: none; /* Remove default border */
            padding: 0.85rem 1.1rem;
             display: flex; /* Ensure vertical centering */
            align-items: center; /* Ensure vertical centering */
        }

        .input-group .form-control {
            border: none; /* Remove default border */
            box-shadow: none !important; /* Remove internal Bootstrap shadow on focus */
        }

        /* Focus state for the whole group */
        .input-group:focus-within {
            border-color: var(--input-focus-border-color);
            box-shadow: var(--input-focus-box-shadow);
        }

        /* Invalid state for the group */
         .input-group.is-invalid {
            border-color: var(--invalid-color);
        }
        .input-group.is-invalid .input-group-text {
             color: var(--invalid-color); /* Optional: color the icon red */
         }

         /* Remove invalid styling from controls within an invalid group (handled by group border) */
        .input-group.is-invalid .form-control {
            border-color: transparent !important; /* Let group border show */
             box-shadow: none !important;
         }

        .invalid-feedback {
            font-size: 0.875em;
            /* Optional: Add a subtle transition */
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: opacity 0.3s ease-out, max-height 0.3s ease-out;
        }

         /* Show feedback when sibling input is invalid */
         .form-control.is-invalid ~ .invalid-feedback,
         .input-group.is-invalid ~ .invalid-feedback {
            opacity: 1;
            max-height: 5em; /* Adjust as needed */
         }

         /* Password Toggle Specific */
        .password-toggle-btn {
             cursor: pointer;
             border: none;
             background: transparent;
             padding: 0.85rem 1.1rem;
             color: var(--muted-color);
             transition: color 0.2s ease;
         }
        .password-toggle-btn:hover {
             color: var(--primary-color);
         }


        .btn-primary {
            padding: 0.85rem 1rem;
            font-size: 1.1rem;
            font-weight: 500; /* Slightly bolder text */
            border-radius: 0.5rem; /* Consistent radius */
            transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out, transform 0.1s ease-in-out, box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px); /* Lift effect */
            box-shadow: 0 4px 10px rgba(13, 110, 253, 0.3);
        }
         .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 2px 5px rgba(13, 110, 253, 0.2);
        }

        .forgot-password {
            font-size: 0.9rem;
            transition: color 0.2s ease-in-out;
        }
        .forgot-password:hover {
            color: var(--bs-link-hover-color) !important; /* Ensure hover color takes precedence */
        }

        /* Fade in animation for the card */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-card {
            animation: fadeIn 0.5s ease-out forwards;
        }

    </style>
</head>
<body>

<div class="login-container">
    <div class="login-card card p-4">
        <div class="card-body">

            <div class="text-center mb-5">
                <i class="bi bi-shield-lock-fill login-icon"></i> 
                <h1 class="card-title h2 fw-bold mb-2">Selamat Datang!</h1>
                <p class="text-muted">Silakan login ke akun Anda.</p>
            </div>

            {{-- Display general errors --}}
            @if ($errors->any() && !$errors->has('email') && !$errors->has('password'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Login gagal. Silakan periksa kredensial Anda.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                {{-- Email Input --}}
                <div class="mb-3">
                    <label for="email" class="form-label visually-hidden">Alamat Email</label>
                    <div class="input-group @error('email') is-invalid @enderror">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            autofocus
                            placeholder="Alamat Email"
                            class="form-control form-control-lg"
                            aria-label="Alamat Email"
                            aria-describedby="emailErrorFeedback"
                        >
                    </div>
                     {{-- Display Email Specific Error --}}
                     @error('email')
                        <div class="invalid-feedback d-block" id="emailErrorFeedback"> {{-- Use d-block to force display with custom transition --}}
                             {{ $message }}
                         </div>
                     @enderror
                </div>


                {{-- Password Input --}}
                <div class="mb-4">
                     <label for="password" class="form-label visually-hidden">Password</label>
                    <div class="input-group @error('password') is-invalid @enderror">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Password"
                            class="form-control form-control-lg"
                            aria-label="Password"
                             aria-describedby="password-toggle passwordErrorFeedback"
                        >
                        <button class="password-toggle-btn" type="button" id="password-toggle" aria-label="Tampilkan password" aria-pressed="false">
                            <i class="bi bi-eye-fill"></i>
                        </button>
                    </div>
                     {{-- Display Password Specific Error --}}
                     @error('password')
                        <div class="invalid-feedback d-block" id="passwordErrorFeedback"> {{-- Use d-block --}}
                            {{ $message }}
                         </div>
                     @enderror
                </div>


                {{-- Submit Button --}}
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                    </button>
                </div>

                {{-- Forgot Password Link --}}
                {{-- <div class="text-center">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-decoration-none forgot-password" href="{{ route('password.request') }}">
                            Lupa Password Anda?
                        </a>
                    @endif
                </div> --}}

            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    const passwordInput = document.getElementById('password');
    const passwordToggleBtn = document.getElementById('password-toggle');
    const toggleIcon = passwordToggleBtn.querySelector('i');

    passwordToggleBtn.addEventListener('click', function () {
        // Toggle the type attribute
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle the icon
        if (type === 'password') {
            toggleIcon.classList.remove('bi-eye-slash-fill');
            toggleIcon.classList.add('bi-eye-fill');
            this.setAttribute('aria-label', 'Tampilkan password');
            this.setAttribute('aria-pressed', 'false');
        } else {
            toggleIcon.classList.remove('bi-eye-fill');
            toggleIcon.classList.add('bi-eye-slash-fill');
            this.setAttribute('aria-label', 'Sembunyikan password');
             this.setAttribute('aria-pressed', 'true');
        }
    });
</script>

</body>
</html>