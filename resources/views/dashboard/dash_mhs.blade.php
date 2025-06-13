@extends('layout.temp_mhs')
@section('content')
    <div class="d-flex">
        <!-- Welcome Section (75%) -->
        <div class="welcome-farol card bg-primary border-0 rounded-10 position-relative mb-4 w-75 me-3">
            <div class="card-body p-4 my-2 d-flex justify-content-between align-items-center">
                <!-- Teks (75%) -->
                <div class="mw-75">
                    <h3 class="text-white fw-semibold fs-20 mb-2">Selamat Datang Di Dashboard!</h3>
                    <p class="text-white fs-15">
                        "Dashboard ini memudahkan dalam mengelola penyewaan fasilitas kampus, pemesanan ruangan, dan
                        administrasi pengguna."
                    </p>
                </div>
                <!-- Gambar (25%) -->
                <div class="mw-25">
                    <img src="{{ asset('admin') }}/assets/images/welcome-shape2.png" class="img-fluid"
                        style="max-width: 100px;" alt="welcome-shape">
                </div>
            </div>
        </div>
        <!-- User Activities Section (25%) -->
        <div class="card bg-white border-0 rounded-10 mb-4 w-25">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
                    <h4 class="fw-semibold fs-18 mb-0">Mahasiswa Active</h4>
                </div>
                <ul class="ps-0 mb-0 list-unstyled">
                    <li class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="ri-user-add-line fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-10">
                                <span>{{ Auth::guard('mahasiswa')->user()->nama_mhs }}</span>
                            </div>
                        </div>
                        <div class="text-end">
                            <div id="referral_join"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xxl col-xl-4 col-sm-6 col-md-4">
            <div class="stats-box style-two card bg-white border-0 rounded-10 mb-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="flex-shrink-0">
                            <div class="icon transition rounded-circle">
                                <i class="flaticon-goal"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="body-font fw-bold fs-3 mb-2">{{ $pengajuan->count() }}</h3>
                            <span>Total Pengajuan Fasilitas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl col-xl-4 col-sm-6 col-md-4">
            <div class="stats-box style-two card bg-white border-0 rounded-10 mb-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="flex-shrink-0">
                            <div class="icon transition rounded-circle bg-ff8a54">
                                <i class="flaticon-idea"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="body-font fw-bold fs-3 mb-2">{{ $sudah_dikonfirmasi->count() }}</h3>
                            <span>Jumlah peminjaman Fasilitas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
