<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/farol/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2024 06:21:49 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/remixicon.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/sidebar-menu.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/simplebar.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/apexcharts.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/prism.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/rangeslider.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/sweetalert.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/quill.snow.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/style.css">

    <link rel="icon" type="image/png" href="{{ asset('admin') }}/assets/images/favicon.png">

    <title>Farol - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body>

    <div class="preloader" id="preloader">
        <div class="preloader">
            <div class="waviy position-relative">
                <span class="d-inline-block">F</span>
                <span class="d-inline-block">A</span>
                <span class="d-inline-block">R</span>
                <span class="d-inline-block">O</span>
                <span class="d-inline-block">L</span>
            </div>
        </div>
    </div>


    <div class="container-fluid">
    <div class="main-content d-flex flex-column px-0">
        <div class="m-auto mw-510 py-5">
            <form action="/login" method="POST">
                @csrf

                <div class="d-flex align-items-center gap-4 mb-3">
                    <h4 class="fs-3 mb-0">Welcome</h4>
                    <a href="/">
                        <img src="{{ asset('admin/assets/images/logo.svg') }}" alt="logo">
                    </a>
                </div>

                @if (session('loginError'))
                    <div class="alert alert-danger">
                        {{ session('loginError') }}
                    </div>
                @endif

                <p class="fs-18 mb-5">Masuk</p>

                <div class="card bg-white border-0 rounded-10 mb-4">
                    <div class="card-body p-4">
                        <div class="form-group mb-4">
                            <label class="label">Email</label>
                            <input type="email" name="email" class="form-control h-58"
                                   placeholder="envytheme@info.com" required>
                        </div>

                        <div class="form-group mb-0">
                            <label class="label">Password</label>
                            <div class="password-wrapper position-relative">
                                <input type="password" name="password" id="password"
                                       class="form-control h-58 text-dark" placeholder="Masukkan password" required>
                                <i class="ri-eye-off-line password-toggle-icon translate-middle-y top-50 end-0 position-absolute"
                                   style="color: #A9A9C8; font-size: 16px; right: 15px !important;" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-sm-flex justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label fs-16 text-gray-light" for="remember">
                            Remember me
                        </label>
                    </div>
                    <a href="forget-password.html"
                       class="fs-16 text-primary text-decoration-none mt-2 mt-sm-0 d-block">
                        Forgot your password?
                    </a>
                </div>

                <button type="submit"
                        class="btn btn-primary fs-16 fw-semibold text-white py-2 py-md-3 px-4 w-100">
                    Login
                </button>
            </form>
        </div>
    </div>
</div>


    <button class="btn btn-danger theme-settings-btn p-0 position-fixed z-2 text-center"
        style="bottom: 30px; right: 30px; width: 40px; height: 40px;" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
        <i data-feather="settings" class="wh-20 text-white position-relative" style="top: -1px; outline: none;"
            data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Click On Theme Settings"></i>
    </button>
    <div class="offcanvas offcanvas-end bg-white" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1"
        id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel"
        style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
        <div class="offcanvas-header bg-body-bg py-3 px-4 mb-4">
            <h5 class="offcanvas-title fs-18" id="offcanvasScrollingLabel">Theme Settings</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-4">
            <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">RTL / LTR</h4>
            <div class="settings-btn rtl-btn">
                <label id="switch" class="switch">
                    <input type="checkbox" onchange="toggleTheme()" id="slider">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="mb-4 pb-2"></div>
            <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Light / Dark</h4>
            <button class="switch-toggle settings-btn dark-btn" id="switch-toggle">
                Click To <span class="dark">Dark</span> <span class="light">Light</span>
            </button>
            <div class="mb-4 pb-2"></div>
            <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Only Sidebar Light / Dark</h4>
            <button class="sidebar-light-dark settings-btn sidebar-dark-btn" id="sidebar-light-dark">
                Click To <span class="dark1">Dark</span> <span class="light1">Light</span>
            </button>
            <div class="mb-4 pb-2"></div>
            <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Only Header Light / Dark</h4>
            <button class="header-light-dark settings-btn header-dark-btn" id="header-light-dark">
                Click To <span class="dark2">Dark</span> <span class="light2">Light</span>
            </button>
            <div class="mb-4 pb-2"></div>
            <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Only Footer Light / Dark</h4>
            <button class="footer-light-dark settings-btn footer-dark-btn" id="footer-light-dark">
                Click To <span class="dark3">Dark</span> <span class="light3">Light</span>
            </button>
            <div class="mb-4 pb-2"></div>
            <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Card Style Radius / Square</h4>
            <button class="card-radius-square settings-btn card-style-btn" id="card-radius-square">
                Click To <span class="square">Square</span> <span class="radius">Radius</span>
            </button>
            <div class="mb-4 pb-2"></div>
            <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Card Style BG White / Gray</h4>
            <button class="card-bg settings-btn card-bg-style-btn" id="card-bg">
                Click To <span class="white">White</span> <span class="gray">Gray</span>
            </button>
            <div class="mb-4 pb-2"></div>
            <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Container Style Fluid / Boxed</h4>
            <button class="boxed-style settings-btn fluid-boxed-btn" id="boxed-style">
                Click To <span class="fluid">Fluid</span> <span class="boxed">Boxed</span>
            </button>
        </div>
    </div>


    <script src="{{ asset('admin') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/sidebar-menu.js"></script>
    <script src="{{ asset('admin') }}/assets/js/dragdrop.js"></script>
    <script src="{{ asset('admin') }}/assets/js/rangeslider.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/sweetalert.js"></script>
    <script src="{{ asset('admin') }}/assets/js/quill.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/data-table.js"></script>
    <script src="{{ asset('admin') }}/assets/js/prism.js"></script>
    <script src="{{ asset('admin') }}/assets/js/clipboard.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/feather.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/simplebar.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/fslightbox.js"></script>
    <script src="{{ asset('admin') }}/assets/js/custom/custom.js"></script>
</body>

<!-- Mirrored from templates.hibootstrap.com/farol/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2024 06:21:49 GMT -->

</html>
