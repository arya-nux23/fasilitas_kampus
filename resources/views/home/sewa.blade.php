@extends('home.temp.templete')
@section('content')
    <!-- Banner Here -->
    <section class="banner__section breadcumnd__banner bannerbg">
        <!--Mask-->
        <div class="banner__bgmask">
            <img src="{{ asset('pages') }}/assets/img/elements/box-element.png" alt="mask">
        </div>
        <!--Mask-->
        <!--Container-->
        <div class="container">
            <div class="breadcumnd__wrapper">
                <div class="row g-4  justify-content-between align-items-end">
                    <!--col-->
                    <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-8">
                        <div class="breadcumnd__content">
                            <h1 class="title">
                                Fasilitas Kampus
                            </h1>
                        </div>
                    </div>
                    <!--col-->
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-8">
                        <div class="breadcumnd__thumb">
                            <img src="{{ asset('pages') }}/assets/img/banner/breadcumnd.png" alt="bread">
                        </div>
                    </div>
                    <!--col-->
                </div>
                <!--ai text-->
                <div class="bread__ai">
                    <img src="{{ asset('pages') }}/assets/img/elements/t-element.png" alt="img">
                </div>
                <!--ai text-->
            </div>
        </div>
        <!--Container-->
    </section>
    <!-- Banner End -->

    <!--Blog Grid Section-->
    <section class="blog__grid__section bg__white pt-80 pb-80">
        <!--container-->
        <div class="container">
            <!--row-->
            <div class="row g-4">
                @foreach ($fasilitas as $item)
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="capabilities__items blog__grid__items">
                            <a href="blog-details.html" class="thumb">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Fasilitas"
                                style="width: 400px; height: 301px;">
                            </a>
                            <div class="content">
                                <h4>
                                    <a href="blog-details.html">
                                        {{ $item->nama_fasilitas }} </a>
                                </h4>
                                <ul class="admin__wrap">
                                    <li>
                                        <span class="icon">
                                            <i class="material-symbols-outlined">
                                                location_on
                                            </i>
                                        </span>
                                        <span>
                                            {{ $item->lokasi }}
                                        </span>
                                    </li>
                                </ul>

                                <p>
                                   Description: {{ $item->deskripsi }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--row-->

            {{-- <!--Pagination-->
            <ul class="pagination pt__40 justify-content-center">
                <li>
                    <a href="javascript:void(0)" class="icon">
                        <i class="material-symbols-outlined">
                            chevron_left
                        </i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        1
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        2
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        3
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        ...
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="icon">
                        <i class="material-symbols-outlined">
                            keyboard_arrow_right
                        </i>
                    </a>
                </li>
            </ul>
            <!--Pagination--> --}}

        </div>
        <!--container-->
    </section>
    <!--Blog Grid Section-->
@endsection
