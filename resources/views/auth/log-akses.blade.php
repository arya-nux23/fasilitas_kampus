@extends('home.temp.template')
@section('content')
    <div class="section page-banner-section"
        style="background-image: url({{ asset('pages') }}/assets/images/log1.jpg);">
        <div class="shape-2"></div>
        <div class="container">
            <div class="page-banner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Page Banner Content Start -->
                        <div class="page-banner text-center">
                            <h2 class="title">Login</h2>
                        </div>
                        <!-- Page Banner Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login & Register Start -->
    <div class="section login-register-section section-padding" style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
        <div class="container">

            <!-- Login & Register Wrapper Start -->
            <div class="login-register-wrap">
                <div class="row gx-5 justify-content-center"> <!-- Tambahkan justify-content-center -->
                    <div class="col-lg-6">

                        <!-- Login & Register Box Start -->
                        <div class="login-register-box">
                            <!-- Section Title Start -->
                            <div class="section-title text-center"> <!-- Tambahkan text-center -->
                                <h2 class="title">Login</h2>
                            </div>
                            <!-- Section Title End -->
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            @if (session('error'))
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Login Gagal!',
                                        text: '{{ session('error') }}',
                                        confirmButtonText: 'OK'
                                    });
                                </script>
                            @endif
                            <div class="login-register-form">
                                <form action="/login" method="POST">
                                    @csrf
                                    <div class="single-form">
                                        <input type="email" name="email" class="form-control" placeholder="Username or email">
                                    </div>
                                    <div class="single-form" style="position: relative;">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                        <span class="toggle-password" onclick="togglePassword()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                            <i class="fas fa-eye" id="eyeIcon"></i>
                                        </span>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn">Login</button>
                                    </div>
                                    <div class="single-form">
                                        <p><a href="#">Lost your password?</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login & Register Box End -->
                    </div>
                </div>
            </div>
            <!-- Login & Register Wrapper End -->

        </div>
    </div>

    <!-- Login & Register End -->
@endsection
