<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Digital</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.ico" sizes="16x16">

    <!-- Remix icon font CSS -->
    <link rel="stylesheet" href="assets/css/remixicon.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/lib/bootstrap.min.css">
    <!-- Apex Chart CSS -->
    <link rel="stylesheet" href="assets/css/lib/apexcharts.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="assets/css/lib/dataTables.min.css">
    <!-- Text Editor CSS -->
    <link rel="stylesheet" href="assets/css/lib/editor-katex.min.css">
    <link rel="stylesheet" href="assets/css/lib/editor.atom-one-dark.min.css">
    <link rel="stylesheet" href="assets/css/lib/editor.quill.snow.css">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="assets/css/lib/flatpickr.min.css">
    <!-- Calendar CSS -->
    <link rel="stylesheet" href="assets/css/lib/full-calendar.css">
    <!-- Vector Map CSS -->
    <link rel="stylesheet" href="assets/css/lib/jquery-jvectormap-2.0.5.css">
    <!-- Popup CSS -->
    <link rel="stylesheet" href="assets/css/lib/magnific-popup.css">
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="assets/css/lib/slick.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <section class="auth bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="https://i1.wp.com/lib.upnjatim.ac.id/wp-content/uploads/2024/02/WhatsApp-Image-2024-02-07-at-11.32.45-1-1-1024x768.jpeg?ssl=1"
                    alt="">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <h4 class="mb-12">Masuk ke Akun Anda</h4>
                    <p class="mb-32 text-secondary-light text-lg">Selamat datang kembali! Silakan masukkan detail akun
                        Anda.</p>
                </div>
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" class="form-control h-56-px bg-neutral-50 radius-12" name="email"
                            placeholder="Email" required>
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" class="form-control h-56-px bg-neutral-50 radius-12"
                                id="your-password" placeholder="Password" name="password" required>
                        </div>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                        <span
                            class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                            data-toggle="#your-password"></span>
                    </div>
                    <div class="d-flex justify-content-between gap-2">
                        <div class="form-check style-check d-flex align-items-center">
                            <input class="form-check-input border border-neutral-300" name="remember" type="checkbox"
                                value="1" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="javascript:void(0)" class="text-primary-600 fw-medium">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"
                        id="submit-button" disabled>
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- jQuery library JS -->
    <script src="assets/js/lib/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Apex Chart JS -->
    <script src="assets/js/lib/apexcharts.min.js"></script>
    <!-- Data Table JS -->
    <script src="assets/js/lib/dataTables.min.js"></script>
    <!-- Iconify Font JS -->
    <script src="assets/js/lib/iconify-icon.min.js"></script>
    <!-- jQuery UI JS -->
    <script src="assets/js/lib/jquery-ui.min.js"></script>
    <!-- Vector Map JS -->
    <script src="assets/js/lib/jquery-jvectormap-2.0.5.min.js"></script>
    <script src="assets/js/lib/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Popup JS -->
    <script src="assets/js/lib/magnific-popup.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="assets/js/lib/slick.min.js"></script>
    <!-- Main JS -->
    <script src="assets/js/app.js"></script>

    <script>
        const rememberCheckbox = document.getElementById('remember');
        const submitButton = document.getElementById('submit-button');

        rememberCheckbox.addEventListener('change', function() {
            submitButton.disabled = !this.checked;
        });
    </script>

    <script>
        function initializePasswordToggle(toggleSelector) {
            $(toggleSelector).on('click', function() {
                $(this).toggleClass("ri-eye-off-line");
                var input = $($(this).attr("data-toggle"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        }
        initializePasswordToggle('.toggle-password');
    </script>

</body>

</html>
