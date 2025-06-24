<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from thepixelcurve.com/html/techmax/techmax/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Jun 2025 01:40:07 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('pages') }}/assets/images/favicon.png">

    <!-- CSS
 ============================================ -->

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('pages') }}/assets/css/plugins/all.min.css">
    <link rel="stylesheet" href="{{ asset('pages') }}/assets/css/plugins/flaticon.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('pages') }}/assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('pages') }}/assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('pages') }}/assets/css/plugins/aos.css">
    <link rel="stylesheet" href="{{ asset('pages') }}/assets/css/plugins/magnific-popup.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('pages') }}/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <!-- <link rel="stylesheet" href="/assets/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="/assets/css/style.min.css"> -->

</head>

<body>

    <div class="main-wrapper">


        <!-- Preloader start -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- Preloader End -->


        <!-- Header Start  -->
        <div id="header" class="section header-section header-section-2 header-section-5 transparent-header">

            <div class="container">

                <!-- Header Wrap Start  -->
                <div class="header-wrap">

                    <div class="header-logo">
                        <a class="logo-white" href="/page"><img
                                src="{{ asset('pages') }}/assets/images/logo34.png" alt=""></a>
                        <a class="logo-black" href="/page"><img src="{{ asset('pages') }}/assets/images/logo34.png"
                                alt=""></a>
                    </div>

                    <div class="header-menu d-none d-lg-block">
                        <ul class="main-menu">
                            <li>
                                <a href="/page">Profil</a>
                            </li>
                            <li><a href="/sewa">Fasilitas</a></li>
                        </ul>
                    </div>

                    <!-- Header Meta Start -->
                    <div class="header-meta">
                        <div class="header-btn-2 d-none d-xl-block">
                            <a class="btn" href="/login">Login</a>
                        </div>
                        <!-- Header Toggle Start -->
                        <div class="header-toggle d-lg-none">
                            <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        <!-- Header Toggle End -->
                    </div>
                    <!-- Header Meta End  -->

                </div>
                <!-- Header Wrap End  -->

            </div>
        </div>
        <!-- Header End -->

        <!-- Offcanvas Start-->
        <div class="offcanvas offcanvas-start" id="offcanvasExample">
            <div class="offcanvas-header">
                <!-- Offcanvas Logo Start -->
                <div class="offcanvas-logo">
                    <a href="index.html"><img src="{{ asset('pages') }}/assets/images/logo34.png"
                            alt=""></a>
                </div>
                <!-- Offcanvas Logo End -->
                <button type="button" class="close-btn" data-bs-dismiss="offcanvas"><i
                        class="flaticon-close"></i></button>
            </div>

            <!-- Offcanvas Body Start -->
            <div class="offcanvas-body">
                <div class="offcanvas-menu">
                    <ul class="main-menu">
                        <li>
                            <a href="/page">Profil</a>
                        </li>
                        <li><a href="/sewa">Fasilitas</a></li>
                    </ul>
                </div>
            </div>
            <!-- Offcanvas Body End -->
        </div>
        <!-- Offcanvas End -->

        @yield('content')


        <!-- Footer Section Start -->
        <div class="section footer-section"
            style="background-image: url({{ asset('pages') }}/assets/images/bg/footer-bg.jpg);">

            <div class="container">
                <!-- Footer Widget Wrap Start -->
                <div class="footer-widget-wrap footer-widget-wrap-2">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget-about">
                                <a class="footer-logo" href="index.html"><img
                                        src="{{ asset('pages') }}/assets/images/logo-21.png" alt="Logo"></a>
                                <div class="widget-info">
                                    <ul>
                                        <li>
                                            <div class="info-icon">
                                                <i class="flaticon-phone-call"></i>
                                            </div>
                                            <div class="info-text">
                                                <span><a href="#">+91 458 654 528</a></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="info-icon">
                                                <i class="far fa-envelope-open"></i>
                                            </div>
                                            <div class="info-text">
                                                <span><a href="#">info@example.com</a></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="info-icon">
                                                <i class="flaticon-pin"></i>
                                            </div>
                                            <div class="info-text">
                                                <span>60 East 65th Street, NY</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Useful Links</h4>

                                <div class="widget-link">
                                    <ul class="link">
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">About Company</a></li>
                                        <li><a href="#">Payment Gatway</a></li>
                                        <li><a href="#">Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Our Services</h4>

                                <div class="widget-link">
                                    <ul class="link">
                                        <li><a href="#">Data Security</a></li>
                                        <li><a href="#">IT Managment</a></li>
                                        <li><a href="#">Outsourcing</a></li>
                                        <li><a href="#">Networking</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Support</h4>

                                <div class="widget-link">
                                    <ul class="link">
                                        <li><a href="#">Documentation</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">FAQS</a></li>
                                        <li><a href="#">Download</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>
                    </div>
                </div>
                <!-- Footer Widget Wrap End -->
            </div>

            <!-- Footer Copyright Start -->
            <div class="footer-copyright-area">
                <div class="container">
                    <div class="footer-copyright-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <!-- Footer Copyright Text Start -->
                                <div class="copyright-text">
                                    <p>© Copyrights 2023 Techmax All rights reserved. </p>
                                </div>
                                <!-- Footer Copyright Text End -->
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <!-- Footer Copyright Social Start -->
                                <div class="copyright-social">
                                    <ul class="social">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Footer Copyright Social End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Copyright End -->
        </div>
        <!-- Footer Section End -->

        <!-- back to top start -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- back to top end -->

    </div>

    <!-- JS
    ============================================ -->
    <script src="{{ asset('pages') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('pages') }}/assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('pages') }}/assets/js/plugins/popper.min.js"></script>
    <script src="{{ asset('pages') }}/assets/js/plugins/bootstrap.min.js"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('pages') }}/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{ asset('pages') }}/assets/js/plugins/aos.js"></script>
    <script src="{{ asset('pages') }}/assets/js/plugins/waypoints.min.js"></script>
    <script src="{{ asset('pages') }}/assets/js/plugins/back-to-top.js"></script>
    <script src="{{ asset('pages') }}/assets/js/plugins/jquery.counterup.min.js"></script>
    <script src="{{ asset('pages') }}/assets/js/plugins/appear.min.js"></script>
    <script src="{{ asset('pages') }}/assets/js/plugins/jquery.magnific-popup.min.js"></script>


    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->


    <!-- Main JS -->
    <script src="{{ asset('pages') }}/assets/js/main.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>


<!-- Mirrored from thepixelcurve.com/html/techmax/techmax/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Jun 2025 01:40:12 GMT -->

</html>
