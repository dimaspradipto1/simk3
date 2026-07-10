<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login - SIM K3</title>
    <meta content="Sistem Informasi Manajemen K3 - Health, Safety & Environment" name="description">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/hse.png') }}" rel="icon" type="image/png">
    <link href="{{ asset('assets/img/hse.png') }}" rel="apple-touch-icon">

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
            --hse-green-light: #1a7a52;
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
            display: flex;
            flex-direction: column;
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

        .auth-wrapper {
            flex: 1 1 auto;
            min-height: 0;
        }

        .auth-wrapper .container-fluid,
        .auth-wrapper .row {
            height: 100%;
        }

        /* ===== Brand panel ===== */
        .auth-brand {
            background: linear-gradient(160deg, var(--hse-green-light) 0%, var(--hse-green) 45%, var(--hse-green-dark) 100%);
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .auth-brand::before {
            content: "";
            position: absolute;
            inset: 0;
            opacity: .12;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='84' height='96' viewBox='0 0 84 96'%3E%3Cpath fill='none' stroke='%23ffffff' stroke-width='1.4' d='M42 0L84 24V72L42 96L0 72V24Z'/%3E%3C/svg%3E");
            background-size: 84px 96px;
            animation: hexDrift 40s linear infinite;
        }

        @keyframes hexDrift {
            from { background-position: 0 0; }
            to { background-position: -168px -192px; }
        }

        .auth-brand::after {
            content: "";
            position: absolute;
            width: 480px;
            height: 480px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(247, 148, 29, 0.18) 0%, rgba(247, 148, 29, 0) 70%);
            top: -160px;
            right: -160px;
        }

        .auth-blob-bottom {
            position: absolute;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 199, 44, 0.16) 0%, rgba(255, 199, 44, 0) 70%);
            bottom: -140px;
            left: -110px;
            pointer-events: none;
        }

        .auth-brand-content {
            position: relative;
            z-index: 1;
        }

        .logo-badge-wrap {
            position: relative;
            width: 56px;
            height: 56px;
            flex: 0 0 56px;
        }

        .logo-badge-wrap::before {
            content: "";
            position: absolute;
            inset: -6px;
            border-radius: 16px;
            border: 2px solid rgba(255, 199, 44, .55);
            animation: pulseRing 2.6s ease-out infinite;
        }

        @keyframes pulseRing {
            0% { transform: scale(.92); opacity: .9; }
            70% { transform: scale(1.18); opacity: 0; }
            100% { transform: scale(1.18); opacity: 0; }
        }

        .logo-badge-wrap img {
            position: relative;
            z-index: 1;
            border-radius: 12px;
            background: #fff;
            padding: 4px;
        }

        .fade-up {
            opacity: 0;
            transform: translateY(14px);
            animation: fadeUp .6s ease forwards;
        }

        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        .brand-feature {
            display: flex;
            align-items: flex-start;
            gap: .8rem;
            margin-bottom: .9rem;
            transition: transform .25s ease;
        }

        .brand-feature:hover {
            transform: translateX(4px);
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
            transition: background .25s ease, color .25s ease;
        }

        .brand-feature:hover .brand-feature-icon {
            background: var(--hse-orange);
            color: #fff;
        }

        /* ===== Form panel ===== */
        .auth-form-panel {
            background:
                radial-gradient(circle at 100% 0%, rgba(11, 92, 61, 0.04) 0%, rgba(11, 92, 61, 0) 45%),
                #fff;
        }

        .auth-form-card {
            position: relative;
        }

        .welcome-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: rgba(11, 92, 61, .08);
            color: var(--hse-green);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: .9rem;
        }

        /* Floating-label inputs with a leading icon */
        .form-floating-icon {
            position: relative;
        }

        .form-floating-icon > i.field-icon {
            position: absolute;
            left: 1rem;
            top: 1.05rem;
            color: #9aa5b1;
            pointer-events: none;
            transition: color .2s ease;
            z-index: 3;
        }

        .form-floating-icon input {
            height: 3.4rem;
            padding: 1.15rem 1rem .35rem 2.75rem;
            border-radius: 12px;
            border: 1.5px solid #e1e6ea;
            font-size: .95rem;
            width: 100%;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .form-floating-icon label {
            position: absolute;
            left: 2.75rem;
            top: 1.05rem;
            font-size: .95rem;
            color: #9aa5b1;
            pointer-events: none;
            transition: all .18s ease;
            background: transparent;
        }

        .form-floating-icon input:focus,
        .form-floating-icon input:not(:placeholder-shown) {
            padding-top: 1.5rem;
            padding-bottom: 0;
        }

        .form-floating-icon input:focus ~ label,
        .form-floating-icon input:not(:placeholder-shown) ~ label {
            top: .4rem;
            font-size: .72rem;
            font-weight: 600;
            color: var(--hse-green);
        }

        .form-floating-icon input:focus {
            border-color: var(--hse-green);
            box-shadow: 0 0 0 .2rem rgba(11, 92, 61, 0.12);
            outline: none;
        }

        .form-floating-icon input:focus ~ i.field-icon {
            color: var(--hse-green);
        }

        .form-floating-icon input.is-invalid {
            border-color: var(--hse-red);
        }

        .password-toggle-btn {
            position: absolute;
            right: .4rem;
            top: 0;
            bottom: 0;
            width: 2.5rem;
            border: none;
            background: transparent;
            color: #9aa5b1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            line-height: 1;
            cursor: pointer;
            z-index: 3;
        }

        .password-toggle-btn:hover,
        .password-toggle-btn:focus {
            color: var(--hse-green);
            outline: none;
        }

        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none;
        }

        #yourPassword {
            padding-right: 2.75rem !important;
        }

        .capslock-warning {
            display: none;
            align-items: center;
            gap: .35rem;
            color: #a3670a;
            background: #fff6e5;
            border: 1px solid #ffe4ad;
            border-radius: 8px;
            padding: .35rem .6rem;
            font-size: .78rem;
            margin-top: .4rem;
        }

        .capslock-warning.show {
            display: flex;
        }

        .btn-hse {
            background: linear-gradient(135deg, var(--hse-green-light), var(--hse-green));
            border: none;
            color: #fff;
            border-radius: 12px;
            padding: .85rem 1rem;
            font-weight: 600;
            letter-spacing: .3px;
            box-shadow: 0 6px 16px rgba(11, 92, 61, 0.28);
            transition: transform .15s ease, box-shadow .15s ease, background .2s ease;
        }

        .btn-hse:hover {
            background: linear-gradient(135deg, var(--hse-green), var(--hse-green-dark));
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(11, 92, 61, 0.32);
        }

        .btn-hse:active {
            transform: translateY(0);
            box-shadow: 0 4px 10px rgba(11, 92, 61, 0.28);
        }

        .btn-hse:disabled {
            opacity: .85;
            transform: none;
        }

        .spinner-border-sm-custom {
            width: 1rem;
            height: 1rem;
            border-width: .15em;
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

        .form-check-input:checked {
            background-color: var(--hse-green);
            border-color: var(--hse-green);
        }
    </style>
</head>

<body>

    <div class="hazard-stripe"></div>

    <main class="auth-wrapper d-flex">
        <div class="container-fluid px-0">
            <div class="row g-0 min-vh-100">

                <!-- Brand / Info Panel -->
                <div class="col-lg-6 d-none d-lg-flex auth-brand p-4 flex-column overflow-hidden">
                    <div class="auth-blob-bottom"></div>
                    <div class="flex-grow-1 d-flex flex-column justify-content-center">
                    <div class="auth-brand-content">
                        <div class="d-flex align-items-center gap-3 mb-4 fade-up" style="animation-delay:.05s">
                            <div class="logo-badge-wrap">
                                <img src="{{ asset('assets/img/hse.png') }}" alt="Logo HSE" width="56" height="56">
                            </div>
                            <div>
                                <div class="fw-bold fs-4 lh-1">SIM K3</div>
                                <div class="small text-white-50">Sistem Informasi Manajemen K3</div>
                            </div>
                        </div>

                        <h1 class="fw-bold mb-2 fade-up" style="font-size: 1.9rem; animation-delay:.12s">Keselamatan,
                            Kesehatan &amp; Lingkungan Kerja</h1>
                        <p class="text-white-50 mb-4 fade-up" style="animation-delay:.18s">
                            Platform terintegrasi untuk mengelola pelaporan, monitoring, dan mitigasi risiko
                            Health, Safety &amp; Environment di seluruh area operasional perusahaan.
                        </p>

                        <div class="brand-feature fade-up" style="animation-delay:.24s">
                            <div class="brand-feature-icon"><i class="bi bi-clipboard2-check"></i></div>
                            <div>
                                <div class="fw-semibold">Pelaporan Insiden Real-time</div>
                                <div class="small text-white-50">Catat dan pantau insiden K3 secara langsung</div>
                            </div>
                        </div>
                        <div class="brand-feature fade-up" style="animation-delay:.30s">
                            <div class="brand-feature-icon"><i class="bi bi-graph-up-arrow"></i></div>
                            <div>
                                <div class="fw-semibold">Analisis &amp; Statistik Risiko</div>
                                <div class="small text-white-50">Dashboard indikator kinerja keselamatan kerja</div>
                            </div>
                        </div>
                        <div class="brand-feature fade-up" style="animation-delay:.36s">
                            <div class="brand-feature-icon"><i class="bi bi-people"></i></div>
                            <div>
                                <div class="fw-semibold">Multi Peran Pengguna</div>
                                <div class="small text-white-50">Admin, Supervisor, Karyawan, Kontraktor, dan lainnya
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="small text-white-50 position-relative">&copy; {{ date('Y') }} SIM K3. All rights
                        reserved.</div>
                </div>

                <!-- Login Form Panel -->
                <div
                    class="col-lg-6 col-12 auth-form-panel d-flex align-items-center justify-content-center p-3 p-md-4 overflow-hidden">
                    <div class="auth-form-card fade-up" style="max-width: 400px; width: 100%; animation-delay:.1s">

                        <div class="d-flex d-lg-none align-items-center gap-2 mb-3">
                            <img src="{{ asset('assets/img/hse.png') }}" alt="Logo HSE" width="40" height="40">
                            <div class="fw-bold fs-5" style="color: var(--hse-green);">SIM K3</div>
                        </div>

                        <div class="welcome-icon"><i class="bi bi-shield-check"></i></div>
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

                        <form method="POST" action="{{ route('loginproses') }}" id="loginForm" novalidate>
                            @csrf

                            <div class="mb-3 form-floating-icon">
                                <i class="bi bi-envelope field-icon"></i>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="yourEmail"
                                    placeholder=" " value="{{ old('email') }}" required autofocus>
                                <label for="yourEmail">Email</label>
                            </div>

                            <div class="mb-1 form-floating-icon">
                                <i class="bi bi-lock field-icon"></i>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="yourPassword"
                                    placeholder=" " required>
                                <label for="yourPassword">Password</label>
                                <button type="button" class="password-toggle-btn" id="togglePassword"
                                    aria-label="Tampilkan password" tabindex="-1">
                                    <i class="bi bi-eye-slash" id="togglePasswordIcon"></i>
                                </button>
                            </div>
                            <div class="capslock-warning" id="capslockWarning">
                                <i class="bi bi-exclamation-triangle-fill"></i> Caps Lock aktif
                            </div>

                            <div class="d-flex align-items-center justify-content-between my-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" value="1"
                                        id="rememberMe">
                                    <label class="form-check-label small" for="rememberMe">Ingat saya</label>
                                </div>
                            </div>

                            <button class="btn btn-hse w-100" type="submit" id="submitBtn">
                                <span id="submitBtnIcon"><i class="bi bi-box-arrow-in-right me-1"></i></span>
                                <span id="submitBtnText">Masuk</span>
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

        const passwordInput = document.getElementById('yourPassword');
        const capslockWarning = document.getElementById('capslockWarning');
        passwordInput.addEventListener('keyup', function (event) {
            const isCapsLock = event.getModifierState && event.getModifierState('CapsLock');
            capslockWarning.classList.toggle('show', !!isCapsLock);
        });
        passwordInput.addEventListener('blur', function () {
            capslockWarning.classList.remove('show');
        });

        document.getElementById('loginForm').addEventListener('submit', function () {
            const btn = document.getElementById('submitBtn');
            btn.disabled = true;
            document.getElementById('submitBtnIcon').innerHTML = '<span class="spinner-border spinner-border-sm-custom me-1"></span>';
            document.getElementById('submitBtnText').textContent = 'Memproses...';
        });
    </script>

    @include('sweetalert::alert')

</body>

</html>
