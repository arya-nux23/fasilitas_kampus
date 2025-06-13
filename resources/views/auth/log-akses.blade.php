@extends('home.temp.templete')
@section('content')
    <!-- sign in Here -->
    <section class="sigin__page bg__white">
        <div class="container">
            <div class="signin__wrapper">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <div class="signin__content__left">
                            <div class="signin__head">
                                <h3>
                                    Welcome Back!
                                </h3>
                                <p>
                                    Sign in to your account and join us
                                </p>
                            </div>
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
                            <form method="POST" action="/login">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="form__grp">
                                            <label for="emailid">Email</label>
                                            <input type="email" name="email" id="emailid"
                                                placeholder="Enter Your Email...">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form__grp">
                                            <label for="paswords">Password</label>
                                            <div class="form__grp position-relative">
                                                <input type="password" name="password" id="paswords"
                                                    placeholder="Enter Your Password..." class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="forget__right">
                                    <a href="javascript:void(0)" class="forget">
                                        Forget password
                                    </a>
                                </div>
                                {{-- <p class="accout">
                                    Do you have an account? <a href="signin.html">Signup</a>
                                </p> --}}
                                <button class="cmn--btn">
                                    <span>
                                        Signin
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="signin__thumb">
                            <img src="{{ asset('pages') }}/assets/img/signin/signin.png" alt="signin">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sign in End -->
@endsection
