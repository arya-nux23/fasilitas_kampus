@extends('home.temp.template')
@section('content')
    <!-- Hero Start -->
    <div class="section tech-hero-section-6"
        style="background-image: url({{ asset('pages') }}/assets/images/bg/hero-6-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <h3 class="sub-title" data-aos-delay="600" data-aos="fade-up">Kelompok 4</h3>
                        <h2 class="title" data-aos="fade-up" data-aos-delay="800">Peminjaman Fasilitas Kampus</h2>
                        <p data-aos="fade-up" data-aos-delay="900"> Universitas Bahaudin Mudhary Madura (UNIBA Madura). </p>
                    </div>
                    <!-- Hero Content End -->
                </div>
                <div class="col-md-6">
                    <!-- Hero Image Start -->
                    <div class="hero-images">
                        <div class="images">
                            <img src="{{ asset('pages') }}/assets/images/hero-6.png" alt="">
                        </div>
                    </div>
                    <!-- Hero Image ennd -->
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- About Start -->
    <div class="section about-section-6 section-padding-03"
        style="background-image: url({{ asset('pages') }}/assets/images/bg/ser-2-bg.png);">
        <div class="container">
            <!-- About Wrap Start -->
            <div class="about-wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- About Left Start -->
                        <div class="about-left">
                            <div class="section-title">
                                <h3 class="sub-title">Who We Are</h3>
                                <h2 class="title">Platform peminjaman fasilitas kampus untuk mendukung kegiatan akademik dan organisasi.</h2>
                            </div>
                        </div>
                        <!-- About Left End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- About Right Start -->
                        <div class="about-right">
                            <div class="about-experience-award">
                                <div class="single-item">
                                    <h2 class="number">25</h2>
                                    <span>Memberikan layanan terbaik</span>
                                </div>
                                <div class="single-item">
                                    <h2 class="number">10</h2>
                                    <span>Siap digunakan <br> kapan saja</span>
                                </div>
                            </div>
                        </div>
                        <!-- About Right End -->
                    </div>
                </div>
            </div>
            <!-- About Wrap End -->
        </div>
    </div>
    <!-- About End -->

    <!-- Service-6 Start -->
    <div class="section service-section-3 service-section-6">
        <div class="container">
            <!-- Service Wrap Start -->
            <div class="service-wrap-3">
                <div class="service-slider-wrap">
                    <div class="swiper-container service-6-active slider-bullet">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!-- Service Item Start -->
                                <div class="service-item"
                                    style="background-image: url({{ asset('pages') }}/assets/images/service/service-8.png);">
                                    <div class="service-content">
                                        <h3 class="title"><a href="#">Fasilitas Kelas</a></h3>
                                        <p>Peminjaman ruang kelas untuk kegiatan belajar atau organisasi.</p>

                                    </div>
                                </div>
                                <!-- Service Item End -->
                            </div>
                            <div class="swiper-slide">
                                <!-- Service Item Start -->
                                <div class="service-item"
                                    style="background-image: url({{ asset('pages') }}/assets/images/service/service-9.png);">
                                    <div class="service-content">
                                        <h3 class="title"><a href="#">Fasilitas Olahraga</a></h3>
                                        <p>Booking lapangan atau alat olahraga kampus dengan mudah.</p>
                                    </div>
                                </div>
                                <!-- Service Item End -->
                            </div>
                            <div class="swiper-slide">
                                <!-- Service Item Start -->
                                <div class="service-item"
                                    style="background-image: url({{ asset('pages') }}/assets/images/service/service-10.png);">
                                    <div class="service-content">
                                        <h3 class="title"><a href="#">Peralatan Multimedia</a></h3>
                                        <p>Peminjaman proyektor, speaker, dan alat multimedia lainnya.</p>
                                    </div>
                                </div>
                                <!-- Service Item End -->
                            </div>
                        </div>

                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <!-- Service Wrap End -->
        </div>
    </div>

    <!-- Service-6 End -->

    <!-- Overview Start -->
    <div class="section overview-section section-padding-02">
        <div class="container">
            <!-- Overview Wrap Start -->
            <div class="overview-wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Overview Image Start -->
                        <div class="overview-img">
                            <div class="image">
                                <img src="{{ asset('pages') }}/assets/images/overview-img-1.png" alt="">
                            </div>
                        </div>
                        <!-- Overview Image End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Overview Content Start -->
                        <div class="overview-content">
                            <div class="section-title">
                                <h3 class="sub-title">Fasilitas Kampus</h3>
                                <h2 class="title">Platform Modern untuk Peminjaman Fasilitas Kampus</h2>
                            </div>
                            <div class="overview-list">
                                <ul>
                                    <li>
                                        <span class="overview-icon"><i class="fas fa-check"></i></span>
                                        <span class="overview-text">Mendukung kegiatan akademik dan non-akademik dengan efisien</span>
                                    </li>
                                    <li>
                                        <span class="overview-icon"><i class="fas fa-check"></i></span>
                                        <span class="overview-text"> Kemudahan akses dan pemesanan fasilitas kampus secara online</span>
                                    </li>
                                    <li>
                                        <span class="overview-icon"><i class="fas fa-check"></i></span>
                                        <span class="overview-text">Dikelola dengan sistem yang aman dan terintegrasi</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Overview Content End -->
                    </div>
                </div>
            </div>
            <!-- Overview Wrap End -->
        </div>
    </div>
    <!-- Overview End -->

    <!-- Service-2 Start -->
    <div class="section service-section-2 section-padding-03" style="background-image: url(assets/images/bg/ser-2-bg.png);">
        <div class="container">
            <!-- Service-2 Wrap Start -->
            <div class="service-wrap-2">
                <div class="section-title2 text-center">
                    <h3 class="sub-title">What we do</h3>
                    <h2 class="title"><span>Fasilitas</span> di pakai </h2>
                </div>
                <!-- Service-2 Content Wrap Start -->

                <div class="service-content-wrap-2">
                    <div class="swiper-container service-2-active">
                        <div class="swiper-wrapper">
                            @foreach ($peminjam as $item)
                                <div class="swiper-slide">
                                    <!-- Service Item Start -->
                                    <div class="service-item">
                                        <div class="service-img">
                                            {{-- <div class="shape-1"></div>
                                            <div class="shape-2"></div> --}}
                                            <a class="image" href="#"><img
                                                    src="{{ asset('storage/' . $item->fasilitas->foto) }}" alt="capabi"
                                                    style="width: 411px; height: 332px;"></a>
                                        </div>
                                        <div class="service-content">
                                            <h3 class="title">{{ $item->fasilitas->nama_fasilitas }}</h3>
                                            <div class="blog-meta mt-2">
                                                <div>
                                                    <i class="fas fa-user"></i>
                                                    <a href="#">{{ $item->mahasiswa->nama_mhs }}</a>
                                                </div>
                                                <div>
                                                    <i class="far fa-calendar-alt"></i> {{ $item->date }}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Service Item End -->
                                </div>
                            @endforeach
                        </div>

                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <!-- Service-2 Content Wrap End -->
            </div>
            <!-- Service-2 Wrap End -->
        </div>
    </div>
    <!-- Service-2 End -->

    <!-- Overview-2 Start -->
    <div class="section overview-section-2 section-padding">
        <div class="container">
            <!-- Overview Wrap Start -->
            <div class="overview-wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Overview Content Start -->
                        <div class="overview-content">
                            <div class="section-title">
                                <h3 class="sub-title">Pengelolaan Fasilitas</h3>
                                <h2 class="title">Peminjaman lebih mudah dan terpantau secara digital.</h2>
                            </div>
                            <p class="text">Layanan cepat, aman, dan efisien untuk seluruh civitas kampus. </p>
                            <div class="counter-wrap">
                                <!-- Counter Item Start -->
                                <div class="counter-item">
                                    <div class="counter-text">
                                        <span>
                                            <span class="counter">354</span>+
                                        </span>
                                        <p>Peminjaman Proses</p>
                                    </div>
                                </div>
                                <!-- Counter Item End -->
                                <!-- Counter Item Start -->
                                <div class="counter-item">
                                    <div class="counter-text">
                                        <span>
                                            <span class="counter">119</span>+
                                        </span>
                                        <p>Pengguna puas</p>
                                    </div>
                                </div>
                                <!-- Counter Item End -->
                            </div>
                        </div>
                        <!-- Overview Content End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Overview Image Start -->
                        <div class="overview-img">
                            <div class="shape">
                                <img src="{{ asset('pages') }}/assets/images/overview-shape-2.png" alt="">
                            </div>
                            <div class="image">
                                <img src="{{ asset('pages') }}/assets/images/overview-img-2.png" alt="">
                            </div>
                        </div>
                        <!-- Overview Image End -->
                    </div>
                </div>
            </div>
            <!-- Overview Wrap End -->
        </div>
    </div>
    <!-- Overview-2 End -->

    <!-- Cta Start -->
    <div class="section cta-section-3 section-padding-03"
        style="background-image: url({{ asset('pages') }}/assets/images/bg/cta-5.jpg);">
        <div class="container">
            <!-- Cta Wrap Start -->
            <div class="cta-wrap-3">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="cta-content text-center">
                            <h2 class="title">Mari Gunakan Bersama</h2>
                            <p>This is only glimpse Please <a>Contact US</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cta Wrap End -->
        </div>
    </div>
    <!-- Cta End -->
@endsection
