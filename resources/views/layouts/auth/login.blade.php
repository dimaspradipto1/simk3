<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login - SIM K3</title>
    <meta content="Sistem Informasi Manajemen K3 - Health, Safety & Environment" name="description">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <style>
        :root {
            --hse-green: #0b5c3d;
            --hse-green-dark: #073c28;
            --hse-orange: #f7941d;
            --hse-yellow: #ffc72c;
            --hse-red: #d7263d;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        html,
        body {
            height: 100%;
            overflow: hidden;
            margin: 0;
        }

        body {
            background: #eef2f5;
        }

        .hazard-stripe {
            height: 8px;
            width: 100%;
            flex: 0 0 8px;
            background: repeating-linear-gradient(45deg,
                    var(--hse-yellow),
                    var(--hse-yellow) 16px,
                    #1a1a1a 16px,
                    #1a1a1a 32px);
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .auth-wrapper {
            flex: 1 1 auto;
            min-height: 0;
        }

        .auth-wrapper .container-fluid,
        .auth-wrapper .row {
            height: 100%;
        }

        .auth-brand {
            background: linear-gradient(160deg, var(--hse-green) 0%, var(--hse-green-dark) 100%);
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .auth-brand::before {
            content: "";
            position: absolute;
            width: 480px;
            height: 480px;
            border-radius: 50%;
            background: rgba(247, 148, 29, 0.12);
            top: -160px;
            right: -160px;
        }

        .auth-brand::after {
            content: "";
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: rgba(255, 199, 44, 0.12);
            bottom: -120px;
            left: -100px;
        }

        .auth-brand-content {
            position: relative;
            z-index: 1;
        }

        .brand-logo-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            background: var(--hse-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.7rem;
        }

        .brand-feature {
            display: flex;
            align-items: flex-start;
            gap: .8rem;
            margin-bottom: .9rem;
        }

        .brand-feature-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: var(--hse-orange);
        }

        .auth-form-panel {
            background: #fff;
        }

        .form-control-lg-custom {
            padding: .75rem 1rem .75rem 2.75rem;
            border-radius: 10px;
            border: 1px solid #dfe4ea;
            font-size: .95rem;
        }

        .form-control-lg-custom:focus {
            border-color: var(--hse-green);
            box-shadow: 0 0 0 .2rem rgba(11, 61, 92, 0.12);
        }

        .input-icon-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon-wrap > i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9aa5b1;
            pointer-events: none;
        }

        .password-toggle-btn {
            position: absolute;
            right: .25rem;
            top: 0;
            bottom: 0;
            width: 2.25rem;
            border: none;
            background: transparent;
            color: #9aa5b1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            line-height: 1;
            cursor: pointer;
        }

        .password-toggle-btn:hover,
        .password-toggle-btn:focus {
            color: var(--hse-green);
            outline: none;
        }

        /* Hide native browser password reveal/clear icons so only our custom toggle shows */
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none;
        }

        #yourPassword {
            padding-right: 2.5rem;
        }

        .btn-hse {
            background: var(--hse-green);
            border: none;
            color: #fff;
            border-radius: 10px;
            padding: .75rem 1rem;
            font-weight: 600;
            letter-spacing: .3px;
            transition: background .2s ease;
        }

        .btn-hse:hover {
            background: var(--hse-green-dark);
            color: #fff;
        }

        .badge-role {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .4rem .8rem;
            border-radius: 999px;
            background: #f1f5f8;
            font-size: .78rem;
            color: var(--hse-green);
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="hazard-stripe"></div>

    <main class="auth-wrapper d-flex">
        <div class="container-fluid px-0">
            <div class="row g-0 min-vh-100">

                <!-- Brand / Info Panel -->
                <div class="col-lg-6 d-none d-lg-flex auth-brand p-4 flex-column justify-content-between overflow-hidden">
                    <div class="auth-brand-content">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="brand-logo-icon">
                                <i class="bi bi-shield-check text-white"></i>
                            </div>
                            <div>
                                <div class="fw-bold fs-4 lh-1">SIM K3</div>
                                <div class="small text-white-50">Sistem Informasi Manajemen K3</div>
                            </div>
                        </div>

                        <h1 class="fw-bold mb-2" style="font-size: 1.9rem;">Keselamatan, Kesehatan &amp; Lingkungan
                            Kerja</h1>
                        <p class="text-white-50 mb-4">
                            Platform terintegrasi untuk mengelola pelaporan, monitoring, dan mitigasi risiko
                            Health, Safety &amp; Environment di seluruh area operasional perusahaan.
                        </p>

                        <div class="brand-feature">
                            <div class="brand-feature-icon"><i class="bi bi-clipboard2-check"></i></div>
                            <div>
                                <div class="fw-semibold">Pelaporan Insiden Real-time</div>
                                <div class="small text-white-50">Catat dan pantau insiden K3 secara langsung</div>
                            </div>
                        </div>
                        <div class="brand-feature">
                            <div class="brand-feature-icon"><i class="bi bi-graph-up-arrow"></i></div>
                            <div>
                                <div class="fw-semibold">Analisis &amp; Statistik Risiko</div>
                                <div class="small text-white-50">Dashboard indikator kinerja keselamatan kerja</div>
                            </div>
                        </div>
                        <div class="brand-feature">
                            <div class="brand-feature-icon"><i class="bi bi-people"></i></div>
                            <div>
                                <div class="fw-semibold">Multi Peran Pengguna</div>
                                <div class="small text-white-50">Admin, Supervisor, Karyawan, Kontraktor, dan lainnya
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="small text-white-50">&copy; {{ date('Y') }} SIM K3. All rights reserved.</div>
                </div>

                <!-- Login Form Panel -->
                <div
                    class="col-lg-6 col-12 auth-form-panel d-flex align-items-center justify-content-center p-3 p-md-4 overflow-hidden">
                    <div style="max-width: 400px; width: 100%;">

                        <div class="d-flex d-lg-none align-items-center gap-2 mb-3">
                            <div class="brand-logo-icon" style="background: var(--hse-green);">
                                <i class="bi bi-shield-check text-white"></i>
                            </div>
                            <div class="fw-bold fs-5" style="color: var(--hse-green);">SIM K3</div>
                        </div>

                        <h3 class="fw-bold mb-1" style="color: var(--hse-green);">Selamat Datang</h3>
                        <p class="text-muted mb-3">Masuk untuk mengakses Sistem Informasi Manajemen K3</p>

                        @if (session('status'))
                            <div class="alert alert-success py-2">{{ session('status') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger py-2">
                                @foreach ($errors->all() as $error)
                                    <div class="small">{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('loginproses') }}" novalidate>
                            @csrf

                            <div class="mb-2">
                                <label for="yourEmail" class="form-label small fw-semibold">Email</label>
                                <div class="input-icon-wrap">
                                    <i class="bi bi-envelope"></i>
                                    <input type="email" name="email"
                                        class="form-control form-control-lg-custom @error('email') is-invalid @enderror"
                                        id="yourEmail" placeholder="nama@perusahaan.com" value="{{ old('email') }}"
                                        required autofocus>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="yourPassword" class="form-label small fw-semibold">Password</label>
                                <div class="input-icon-wrap">
                                    <i class="bi bi-lock"></i>
                                    <input type="password" name="password"
                                        class="form-control form-control-lg-custom @error('password') is-invalid @enderror"
                                        id="yourPassword" placeholder="Masukkan password" required>
                                    <button type="button" class="password-toggle-btn" id="togglePassword"
                                        aria-label="Tampilkan password" tabindex="-1">
                                        <i class="bi bi-eye-slash" id="togglePasswordIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" value="1"
                                        id="rememberMe">
                                    <label class="form-check-label small" for="rememberMe">Ingat saya</label>
                                </div>
                            </div>

                            <button class="btn btn-hse w-100" type="submit">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                            </button>
                        </form>

                        <div class="text-center mt-3">
                            <span class="badge-role"><i class="bi bi-shield-lock"></i> Akses berbasis peran
                                pengguna</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const input = document.getElementById('yourPassword');
            const icon = document.getElementById('togglePasswordIcon');
            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';
            icon.classList.toggle('bi-eye-slash', !isHidden);
            icon.classList.toggle('bi-eye', isHidden);
            this.setAttribute('aria-label', isHidden ? 'Sembunyikan password' : 'Tampilkan password');
        });
    </script>

</body>

</html>
