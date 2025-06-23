@extends('home.temp.template')
@section('content')
<div class="section tech-hero-section-4" style="background-image: url({{ asset('pages') }}/assets/images/bg/hero-4-bg.jpg); width: 1920px; height: 674px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Hero Content Start -->
                <div class="hero-content">
                    <h2 class="title" data-aos="fade-up" data-aos-delay="800" style="white-space: nowrap;">Fasilitas Kampus</h2>
                </div>

                <!-- Hero Content End -->
            </div>
            <div class="col-md-6">
                <!-- Hero Image Start -->
                <div class="hero-images">
                    <div class="shape-1">
                        <img src="{{ asset('pages') }}/assets/images/hero-shape-4.png" alt="">
                    </div>
                    <div class="images">
                        <img src="{{ asset('pages') }}/assets/images/hero-6.png" alt="">
                    </div>
                </div>
                <!-- Hero Image ennd -->
            </div>
        </div>
    </div>
</div>

<!-- Blog Start -->
<div class="section blog-section section-padding">
    <div class="container">
        <!-- Blog Grid Wrap Start -->
        <div class="blog-grid-wrap">
            <div class="row">
                @foreach ($fasilitas as $item)
                <div class="col-lg-4 col-md-6">
                    <!-- Single Blog Start -->
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="#"><img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Fasilitas"
                                style="width: 410px; height: 247px;"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="fas fa-map-marker-alt"></i> {{ $item->lokasi }}</span>
                            </div>
                            <h3 class="title"><a href="#">{{ $item->nama_fasilitas }}</a></h3>
                            <p><b>Description: </b>{{ $item->deskripsi }}</p>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                @endforeach
            </div>
        </div>
        <!-- Blog Grid Wrap End -->
    </div>
</div>
<!-- Blog End -->
@endsection
