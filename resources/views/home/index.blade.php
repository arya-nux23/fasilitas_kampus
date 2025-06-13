@extends('home.temp.templete')
@section('content')
    <!-- Banner Here -->
    <section class="banner__section bannerbg">
        <!--Mask-->
        <div class="banner__bgmask">
            <img src="{{ asset('pages') }}/assets/img/elements/box-element.png" alt="mask">
        </div>
        <!--Mask-->
        <!--Container-->
        <div class="container">
            <div class="banner__wrapper">
                <div class="row g-4  justify-content-between">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="banner__content">
                            <div class="content__box">
                                <span class="d3 wow fadeInDown" data-wow-duration="4s">
                                    Website <span class="theme">Sewa</span> Fasilitas <span class="theme2">Kampus</span>
                                    Kelompok-4
                                </span>
                                <p class="wow fadeInUp" data-wow-duration="2s">
                                    Universitas Bahaudin Mudhary Madura (UNIBA Madura)
                                </p>
                            </div>
                            <div class="ai__text">
                                <img src="{{ asset('pages') }}/assets/img/elements/t-element.png" alt="ai">
                            </div>
                            <div class="ai__elements">
                                <img src="{{ asset('pages') }}/assets/img/elements/ai-element.png" alt="ai">
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-1 col-xl-1 col-lg-1"></div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-8">
                        <div class="banner__thumb">
                            <div class="thumb">
                                <img src="{{ asset('pages') }}/assets/img/banner/banner1.png" alt="banner">
                            </div>
                            <div class="rocket__element">
                                <img src="{{ asset('pages') }}/assets/img/elements/rocket-element.png" alt="rocket">
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-1 col-xl-1 col-lg-1"></div>
                </div>
            </div>
        </div>
        <!--Container-->
        <!--Elements-->
        <div class="ball__element">
            <img src="{{ asset('pages') }}/assets/img/elements/ball-element.png" alt="ball">
        </div>
        <div class="banner__mask">
            <img src="{{ asset('pages') }}/assets/img/elements/shape-element1.png" alt="mask">
        </div>
        <div class="dark__mask d-none">
            <img src="{{ asset('pages') }}/assets/img/elements/banner-shape1-dark.png" alt="mask">
        </div>
        <div class="light__element1">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <div class="light__element2">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <div class="light__element3">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <div class="light__element4">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <div class="light__element5">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <!--Elements-->
    </section>
    <!-- Banner End -->

    <!-- About Here -->
    <section class="about__section bg__white pt-120 pb__60">
        <!--Container-->
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <!--about content-->
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="about__content">
                        <div class="section__header">
                            <h2 class="wow fadeInUp" data-wow-duration="2s">
                                The world's leading AI and machine learning company
                            </h2>
                            <p class="wow fadeInDown" data-wow-duration="2s">
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't
                                look even slightly believable. If you are going to use a passage of Lorem Ipsum, you
                                need to be sure there isn't anything embarrassing hidden in the middle of text.
                            </p>
                        </div>
                        <ul class="about__chack wow fadeInDown">
                            <li>
                                <span class="icon">
                                    <i class="material-symbols-outlined">
                                        task_alt
                                    </i>
                                </span>
                                <span>
                                    Talent Advisory Team
                                </span>
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="material-symbols-outlined">
                                        task_alt
                                    </i>
                                </span>
                                <span>
                                    100% Security System
                                </span>
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="material-symbols-outlined">
                                        task_alt
                                    </i>
                                </span>
                                <span>
                                    High-Quality Results
                                </span>
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="material-symbols-outlined">
                                        task_alt
                                    </i>
                                </span>
                                <span>
                                    24 Hours Supports
                                </span>
                            </li>
                        </ul>
                        <a href="about.html" class="cmn--btn">
                            <span>Read More</span>
                        </a>
                    </div>
                </div>
                <!--about content-->
                <div class="col-xxl-1 col-xl-1 col-lg-1"></div>
                <!--about thumb-->
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-9 col-sm-9">
                    <div class="about__thumb">
                        <div class="brain__element">
                            <img src="{{ asset('pages') }}/assets/img/elements/brain-element.png" alt="breain">
                        </div>
                        <img src="{{ asset('pages') }}/assets/img/about/about1.png" alt="about">
                    </div>
                </div>
                <!--about thumb-->
                <div class="col-xxl-1 col-xl-1 col-lg-1"></div>
            </div>
        </div>
        <!--Container-->
        <!--Shape-->
        <div class="about__shape1">
            <img src="{{ asset('pages') }}/assets/img/elements/ashape-elements.png" alt="about">
        </div>
        <!--Shape-->
        <!--element-->
        <div class="light__element1">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <div class="light__element2">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <div class="light__element3">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <div class="light__element4">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <div class="light__element5">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <!--element-->
    </section>
    <!-- About End -->

    <!-- Feature Here -->
    <section class="feature__section bgsection pt-120 pb-120">
        <!--container-->
        <div class="container">
            <!--Section header-->
            <div class="section__header section__center pb__60 wow fadeInUp" data-wow-duration="2s">
                <h2>
                    Key Services Features
                </h2>
                <p class="pb__32">
                    AI is the broader concept of machines being able to carry out tasks in a way that would normally
                    require human intelligence.
                </p>
                <a href="service-details.html" class="cmn--btn border__btn">
                    <span>
                        Get Started
                    </span>
                </a>
            </div>
            <!--Section header-->
            <div class="row g-5 justify-content-center align-items-center">
                <!--col grid-->
                <div class="col-sm-6 col-xl-4">
                    <div class="feature__component__wrap feature__right__align">
                        <div class="feature__items wow fadeInUp" data-wow-duration="1s">
                            <div class="icon">
                                <img src="{{ asset('pages') }}/assets/img/feature/man.png" alt="icon">
                            </div>
                            <div class="content">
                                <h4>
                                    Robotic Automation
                                </h4>
                                <p>
                                    Machine learning (ML), a fundamental concept of AI research since...
                                </p>
                            </div>
                        </div>
                        <div class="feature__items pl__space wow fadeInUp" data-wow-duration="2s">
                            <div class="icon">
                                <img src="{{ asset('pages') }}/assets/img/feature/ai.png" alt="icon">
                            </div>
                            <div class="content">
                                <h4>
                                    Image Processing
                                </h4>
                                <p>
                                    Machine learning (ML), a fundamental concept of AI research since...
                                </p>
                            </div>
                        </div>
                        <div class="feature__items wow fadeInUp" data-wow-duration="2.2s">
                            <div class="icon">
                                <img src="{{ asset('pages') }}/assets/img/feature/cloud.png" alt="icon">
                            </div>
                            <div class="content">
                                <h4>
                                    Al For Cloud Services
                                </h4>
                                <p>
                                    Machine learning (ML), a fundamental concept of AI research since...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--col grid-->
                <div class="col-8 order-sm-3 order-xl-2 col-xl-4">
                    <div class="feature__thumb">
                        <img src="{{ asset('pages') }}/assets/img/feature/feature.png" alt="feature">
                    </div>
                </div>
                <!--col grid-->
                <div class="col-sm-6 order-sm-2 col-xl-4">
                    <div class="feature__component__wrap">
                        <div class="feature__items wow fadeInUp" data-wow-duration="2.4s">
                            <div class="icon">
                                <img src="{{ asset('pages') }}/assets/img/feature/machine.png" alt="icon">
                            </div>
                            <div class="content">
                                <h4>
                                    Machine Learning
                                </h4>
                                <p>
                                    Machine learning (ML), a fundamental concept of AI research since...
                                </p>
                            </div>
                        </div>
                        <div class="feature__items pr__space wow fadeInUp" data-wow-duration="2.6s">
                            <div class="icon">
                                <img src="{{ asset('pages') }}/assets/img/feature/virtual.png" alt="icon">
                            </div>
                            <div class="content">
                                <h4>
                                    Virtual Reality
                                </h4>
                                <p>
                                    Machine learning (ML), a fundamental concept of AI research since...
                                </p>
                            </div>
                        </div>
                        <div class="feature__items wow fadeInUp" data-wow-duration="2.8s">
                            <div class="icon">
                                <img src="{{ asset('pages') }}/assets/img/feature/neurology.png" alt="icon">
                            </div>
                            <div class="content">
                                <h4>
                                    Deep Learning
                                </h4>
                                <p>
                                    Machine learning (ML), a fundamental concept of AI research since...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--col grid-->
            </div>
        </div>
        <!--container-->
        <!--elements-->
        <div class="feature__rocket">
            <img src="{{ asset('pages') }}/assets/img/elements/feature-rocket.png" alt="rocket">
        </div>
        <div class="feature__ai">
            <img src="{{ asset('pages') }}/assets/img/elements/feature-ali.png" alt="rocket">
        </div>
        <div class="light__element1">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <div class="light__element2">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <div class="light__element3">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <div class="light__element4">
            <img src="{{ asset('pages') }}/assets/img/elements/light-elements.png" alt="light">
        </div>
        <!--elements-->
    </section>
    <!-- Feature End -->

    <!-- Blog Details End -->
    <section class="blog__details__section pt-80 pb-80">
        <!--container-->
        <div class="container">
            <!--blog details head-->
            <div class="blog__details__head ">
                <h2>
                    Fasilitas dipakai
                </h2>
            </div>
            <!--blog details head-->
            <div class="blog__details__wrap owl-theme owl-carousel">
                @foreach ($peminjam as $item)
                    <div class="capabilities__items blog__grid__items">
                        <a class="thumb">
                            <img src="{{ asset('storage/' . $item->fasilitas->foto) }}" alt="capabi"
                                style="width: 400px; height: 302px;">
                        </a>
                        <div class="content">
                            <h4>
                                <a>
                                    {{ $item->fasilitas->nama_fasilitas }}
                                </a>
                            </h4>
                            <ul class="admin__wrap">
                                <li>
                                    <span class="icon">
                                        <i class="material-symbols-outlined">
                                            group
                                        </i>
                                    </span>
                                    <span>
                                        {{ $item->mahasiswa->nama_mhs }}
                                    </span>
                                </li>
                                <li>
                                    <span class="icon">
                                        <i class="material-symbols-outlined">
                                            event_available
                                        </i>
                                    </span>
                                    <span>
                                        {{ $item->date }}
                                    </span>
                                </li>
                            </ul>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!--container-->
    </section>
    <!-- Blog Details End -->
    {{-- Read more --}}
    {{-- <a href="#" class="capa__more" data-bs-toggle="modal" data-bs-target="#modalFotoProject">
     <span>Read More</span>
    <i class="material-symbols-outlined">east</i></a> --}}
    <!-- efective Here -->
    <section class="efective__section bg__white pt-120 pb-120">
        <!--container-->
        <div class="container">
            <div class="row justify-content-between flex-row-reverse">
                <!--col grid-->
                <div class="col-xl-6 col-lg-7">
                    <div class="efective__content">
                        <div class="section__header pb__32">
                            <h2 class="wow fadeInUp" data-wow-duration="1s">
                                Step-by-step user manual for effective and efficient use
                            </h2>
                            <p class="wow fadeInDown" data-wow-duration="2s">
                                AI is the broader concept of machines being able to perform tasks that would normally
                                require human intelligence, such as visual perception, speech recognition, and language
                                translation.
                            </p>
                        </div>
                        <div class="efective__data__wrapper">
                            <div class="efect__data__iems wow fadeInUp" data-wow-duration="1s">
                                <div class="icons">
                                    <img src="{{ asset('pages') }}/assets/img/efective/braindata.png" alt="icon">
                                </div>
                                <div class="content">
                                    <h5>
                                        Data Generated
                                    </h5>
                                    <p>
                                        The integration of AI and ML is leading to the creation of intelligent systems
                                        that can automate tasks, improve decision-making
                                    </p>
                                </div>
                            </div>
                            <div class="efect__data__iems wow fadeInUp" data-wow-duration="2s">
                                <div class="icons icons2">
                                    <img src="{{ asset('pages') }}/assets/img/efective/datastored.png" alt="icon">
                                </div>
                                <div class="content">
                                    <h5>
                                        Data Stored
                                    </h5>
                                    <p>
                                        The integration of AI and ML is leading to the creation of intelligent systems
                                        that can automate tasks, improve decision-making
                                    </p>
                                </div>
                            </div>
                            <div class="efect__data__iems wow fadeInUp" data-wow-duration="2.2s">
                                <div class="icons icons3">
                                    <img src="{{ asset('pages') }}/assets/img/efective/dataprocessing.png"
                                        alt="icon">
                                </div>
                                <div class="content">
                                    <h5>
                                        Data Processing
                                    </h5>
                                    <p>
                                        The integration of AI and ML is leading to the creation of intelligent systems
                                        that can automate tasks, improve decision-making
                                    </p>
                                </div>
                            </div>
                            <div class="efect__data__iems wow fadeInUp" data-wow-duration="2.5s">
                                <div class="icons icons4">
                                    <img src="{{ asset('pages') }}/assets/img/efective/actionable.png" alt="icon">
                                </div>
                                <div class="content">
                                    <h5>
                                        Actionable Insights
                                    </h5>
                                    <p>
                                        The integration of AI and ML is leading to the creation of intelligent systems
                                        that can automate tasks, improve decision-making
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--col grid-->
                <div class="col-xl-5 col-lg-5 col-md-12">
                    <div class="efective__thumb">
                        <img src="{{ asset('pages') }}/assets/img/efective/efective.png" alt="efective">
                        <!--efect Element-->
                        <div class="efect__element2">
                            <img src="{{ asset('pages') }}/assets/img/elements/efect-cross2.png" alt="img">
                        </div>
                        <div class="efect__element3">
                            <img src="{{ asset('pages') }}/assets/img/elements/efect-cross.png" alt="img">
                        </div>
                        <div class="efect__element4">
                            <img src="{{ asset('pages') }}/assets/img/elements/efect-trevuj.png" alt="img">
                        </div>
                        <div class="efect__element5">
                            <img src="{{ asset('pages') }}/assets/img/elements/efecttablet1.png" alt="img">
                        </div>
                        <div class="efect__element6">
                            <img src="{{ asset('pages') }}/assets/img/elements/efecttablet2.png" alt="img">
                        </div>
                        <div class="efect__element7">
                            <img src="{{ asset('pages') }}/assets/img/elements/efect-rount.png" alt="img">
                        </div>
                        <!--efect Element-->
                    </div>
                </div>
                <!--col grid-->
            </div>
        </div>
        <!--container-->
        <!--elements-->
        <div class="eye__elements">
            <img src="{{ asset('pages') }}/assets/img/elements/eye-element.png" alt="eye">
        </div>
        <div class="efect__element1">
            <img src="{{ asset('pages') }}/assets/img/elements/efect-ball.png" alt="img">
        </div>
        <!--elements-->
    </section>
    <!-- efective End -->

    <!-- Newsletter Here -->
    <section class="newsletter__section bg__white">
        <!--container-->
        <div class="container">
            <!--newsletter wrapper-->
            <div class="newsletter__wrapper pt-120 pb-120">
                <div class="row justify-content-center">
                    <!--col grid-->
                    <div class="col-xl-6 col-lg-6">
                        <div class="newsletter__content">
                            <div class="section__header section__center">
                                <h2 class="wow fadeInUp" data-wow-duration="1s">
                                    Subscribe to newsletters and get news.
                                </h2>
                                <p class="wow fadeInUp" data-wow-duration="2s">
                                    Sign up for updates and stay informed about the latest developments and be a part of
                                    our community and get the latest news and insights
                                </p>
                            </div>
                            <form action="#">
                                <input type="email" placeholder="Enter your email address">
                                <button class="cmn--btn" type="submit">
                                    <span>
                                        Subscribe
                                    </span>
                                </button>
                            </form>
                            <!--map mast-->
                            <div class="map__mask">
                                <img src="{{ asset('pages') }}/assets/img/elements/map.png" alt="ma--mask">
                            </div>
                            <!--map mast-->
                        </div>
                    </div>
                    <!--col grid-->
                </div>
                <!--newletter element-->
                <div class="news__element1">
                    <img src="{{ asset('pages') }}/assets/img/elements/news-elements2.png" alt="new">
                </div>
                <div class="news__element2">
                    <img src="{{ asset('pages') }}/assets/img/elements/news-element1.png" alt="new">
                </div>
                <!--newletter element-->
            </div>
            <!--newsletter wrapper-->
        </div>
        <!--container-->
        <!--efect Element-->
        <div class="efect__element2">
            <img src="{{ asset('pages') }}/assets/img/elements/efect-cross.png" alt="img">
        </div>
        <div class="efect__cross">
            <img src="{{ asset('pages') }}/assets/img/elements/efect-cross2.png" alt="img">
        </div>
        <div class="efect__element7">
            <img src="{{ asset('pages') }}/assets/img/elements/efect-rount.png" alt="img">
        </div>
        <div class="efect__element8">
            <img src="{{ asset('pages') }}/assets/img/elements/efect-rount.png" alt="img">
        </div>
        <!--efect Element-->
    </section>
    <!-- Newsletter End -->
@endsection
