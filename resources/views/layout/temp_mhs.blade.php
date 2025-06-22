<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/farol/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2024 06:18:35 GMT -->

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
    <!-- Tambahkan ini di <head> layout.template -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="icon" type="image/png" href="{{ asset('admin') }}/assets/images/favicon.png">

    <title>{{ $title }}</title>
    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bitcoin-icon i {
            font-size: 60px;
            color: #f2a900;
            /* warna emas khas bitcoin */
            animation: spin 2s linear infinite;
        }

        /* Animasi spin */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="bitcoin-icon">
                <i class="fab fa-bitcoin"></i>
            </div>
        </div>
    </div>
    <div class="sidebar-area" id="sidebar-area">
        <div class="logo position-relative">
            <a href="index.html" class="d-block text-decoration-none">
                <img src="{{ asset('admin') }}/assets/images/logo-icon.png" alt="logo-icon">
                <span class="logo-text fw-bold text-dark">Farol</span>
            </a>
            <button
                class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y"
                id="sidebar-burger-menu">
                <i data-feather="x"></i>
            </button>
        </div>
        <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar>
            <ul class="menu-inner">

                <li class="menu-item">
                    <a href="/dashboard/mahasiswa" class="menu-link">
                        <i data-feather="bar-chart-2" class="menu-icon tf-icons"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="menu-title small text-uppercase">
                    <span class="menu-title-text">DATA</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle active">
                        <i data-feather="list" class="menu-icon tf-icons"></i>
                        <span class="title">Peminjam</span>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="/peminjam/mahasiswa" class="menu-link">
                                pinjam hari ini
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="menu-item">
                    <a href="/setting" class="menu-link">
                        <i data-feather="book-open" class="menu-icon tf-icons"></i>
                        <span class="title">Pengaturan Profil</span>
                    </a>
                </li> --}}
            </ul>
        </aside>
    </div>


    <div class="container-fluid">
        <div class="main-content d-flex flex-column">

            <header class="header-area bg-white mb-4 rounded-bottom-10" id="header-area">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-sm-6 col-md-4">
                        <div class="left-header-content">
                            <ul
                                class="d-flex align-items-center ps-0 mb-0 list-unstyled justify-content-center justify-content-sm-start">
                                <li>
                                    <button class="header-burger-menu bg-transparent p-0 border-0"
                                        id="header-burger-menu">
                                        <i data-feather="menu"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-6 col-md-8">
                        <div class="right-header-content mt-2 mt-sm-0">
                            <ul
                                class="d-flex align-items-center justify-content-center justify-content-sm-end ps-0 mb-0 list-unstyled">

                                <li class="header-right-item d-none d-md-block">
                                    <div class="today-date">
                                        <span id="digitalDate"></span>
                                        <i data-feather="clock"></i>
                                    </div>
                                </li>
                                <li class="header-right-item">
                                    <div class="dropdown admin-profile">
                                        <div class="d-xxl-flex align-items-center bg-transparent border-0 text-start p-0 cursor"
                                            data-bs-toggle="dropdown">
                                            <div class="flex-shrink-0">
                                                <img class="rounded-circle wh-54"
                                                    src="{{ asset('admin') }}/assets/images/yp.jpg"
                                                    alt="admin">
                                            </div>
                                        </div>
                                        <ul class="dropdown-menu border-0 bg-white w-100 admin-link">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center text-body"
                                                    href="/logout">
                                                    <i data-feather="log-out"></i>
                                                    <span class="ms-2">Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>


            <div class="conten">
                @yield('content')
            </div>

            <div class="flex-grow-1"></div>

            <footer class="footer-area bg-white text-center rounded-top-10">
                <p class="fs-14">© <span class="text-primary">Informatick</span> C-22 <a
                        href="https://arya-nux23.github.io/portofolio/" target="_blank"
                        class="text-decoration-none">Kelompok4</a></p>
            </footer>

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


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
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
    <script src="{{ asset('admin') }}/assets/js/apexcharts.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/amcharts.js"></script>
    <script src="{{ asset('admin') }}/assets/js/custom/ecommerce-chart.js"></script>
    <script src="{{ asset('admin') }}/assets/js/custom/custom.js"></script>
    <script>
        setInterval(() => {
            const now = new Date();
            const tanggalJam = now.toLocaleString('id-ID');
            document.getElementById('digitalDate').textContent = tanggalJam;
        }, 1000);
    </script>
</body>

<!-- Mirrored from templates.hibootstrap.com/farol/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2024 06:19:40 GMT -->

</html>
