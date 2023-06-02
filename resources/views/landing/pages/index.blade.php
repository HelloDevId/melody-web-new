@extends('landing.layout.main')
@section('title')
    Home
@endsection

@section('header')
    <header>
    @endsection

    @section('content')
        <section class="section-slide">
            <div class="wrap-slick1">
                <div class="slick1">
                    <div class="item-slick1" style="background-image: url({{ asset('landing/images/slide-01.jpg') }});">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                    <span class="ltext-101 cl2 respon2">
                                        Women Collection 2023
                                    </span>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                        NEW SEASON
                                    </h2>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    <a href="product.html"
                                        class="flex-c-m stext-101 cl0 size-101 bg10 bor1 hov-btn4 p-lr-15 trans-04">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick1" style="background-image: url({{ asset('landing/images/slide-02.jpg') }});">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                    <span class="ltext-101 cl2 respon2">
                                        Glow Up Now
                                    </span>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn"
                                    data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                        New Season
                                    </h2>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                    <a href="product.html"
                                        class="flex-c-m stext-101 cl0 size-101 bg10 bor1 hov-btn4 p-lr-15 trans-04">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Title page -->
        <section class="bg-img1 txt-center p-lr-15 p-tb-92"
            style="background-image: url('{{ asset('landing/images/bg-01.jpg') }}');">
            <h2 class="ltext-105 cl0 txt-center">
                Top Product
            </h2>
        </section>


       
            <section class="sec-relate-product bg0 p-t-45 p-b-105">
                <div class="container">
                    <div class="p-b-45">
                        <h3 class="ltext-103 cl5">
                            Top Product
                        </h3>
                    </div>

                    <!-- Slide2 -->

                    <div class="wrap-slick2">
                        <div class="slick2">
                            @foreach ($topproduct as $datanya)
                                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-pic hov-img0">
                                            <img src="{{ asset('foto/product/' . $datanya['image']) }}" alt="IMG-PRODUCT">

                                            <a href="/detail-product/{{ $datanya->id }}"
                                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn5 p-lr-15 trans-04 js-show-modal1">
                                                View
                                            </a>
                                        </div>

                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l ">
                                                <a href="/detail-product/{{ $datanya->id }}"
                                                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    {{ $datanya->name }}
                                                </a>

                                                <span class="stext-105 cl3">
                                                    Rp. {{ number_format($datanya->price) }} /
                                                    {{ $datanya->kategori->name }}
                                                    /
                                                    {{ $datanya->jumlah_terjual }} Jumlah
                                                </span>
                                            </div>

                                            {{-- <div class="block2-txt-child2 flex-r p-t-3">
                                                <a href="#"
                                                    class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                    <img class="icon-heart1 dis-block trans-04"
                                                        src="{{ asset('landing/images/icons/icon-heart-01.png') }}"
                                                        alt="ICON">
                                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                        src="{{ asset('landing/images/icons/icon-heart-02.png') }}"
                                                        alt="ICON">
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
    


        <!-- Title page -->
        <section class="bg-img1 txt-center p-lr-15 p-tb-92"
            style="background-image: url('{{ asset('landing/images/bg-03.jpg') }}');">
            <h2 class="ltext-105 cl0 txt-center">
                Product
            </h2>
        </section>
        <!-- Product -->
        <section class="bg0 p-t-23 p-b-130">
            <div class="container">
                <div class="p-b-10">
                    <h3 class="ltext-103 cl5">
                        Product Overview
                    </h3>
                </div>
                <br><br>
                <div class="row isotope-grid">
                    @foreach ($product as $data)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="{{ asset('foto/product/' . $data['image']) }}" alt="IMG-PRODUCT">

                                    <a href="/detail-product/{{ $data->id }}"
                                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn5 p-lr-15 trans-04 js-show-modal1">
                                        View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="/detail-product/{{ $data->id }}"
                                            class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{ $data->name }}
                                        </a>

                                        <span class="stext-105 cl3">
                                            Rp. {{ number_format($data->price) }} / {{ $data->kategori->name }} /
                                            {{ $data->jumlah_terjual }} Terjual
                                        </span>
                                    </div>

                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <img class="icon-heart1 dis-block trans-04"
                                                src="{{ asset('landing/images/icons/icon-heart-01.png') }}"
                                                alt="ICON">
                                            <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                src="{{ asset('landing/images/icons/icon-heart-02.png') }}"
                                                alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->

                    <div class="flex-c-m flex-w w-full p-t-38">
                        {{ $product->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>



        </section>
        <!-- Title page -->
        <section class="bg-img1 txt-center p-lr-15 p-tb-92"
            style="background-image: url('{{ asset('landing/images/bg-02.jpg') }}');">
            <h2 class="ltext-105 cl0 txt-center">
                About
            </h2>
        </section>

        <!-- Content page -->
        <section class="bg0 p-t-75 p-b-120">
            <div class="container">
                <div class="row p-b-148">
                    <div class="col-md-7 col-lg-8">
                        <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                            <h3 class="mtext-111 cl2 p-b-16">
                                Our Story
                            </h3>

                            <p class="stext-113 cl6 p-b-26">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat consequat enim,
                                non
                                auctor massa ultrices non. Morbi sed odio massa. Quisque at vehicula tellus, sed tincidunt
                                augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                                mus.
                                Maecenas varius egestas diam, eu sodales metus scelerisque congue. Pellentesque habitant
                                morbi
                                tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas gravida justo eu
                                arcu
                                egestas convallis. Nullam eu erat bibendum, tempus ipsum eget, dictum enim. Donec non neque
                                ut
                                enim dapibus tincidunt vitae nec augue. Suspendisse potenti. Proin ut est diam. Donec
                                condimentum euismod tortor, eget facilisis diam faucibus et. Morbi a tempor elit.
                            </p>

                            <p class="stext-113 cl6 p-b-26">
                                Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna.
                                Aliquam
                                aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac
                                orci
                                ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus
                                sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel
                                tincidunt
                                erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et
                                maximus enim ligula ac ligula.
                            </p>

                            <p class="stext-113 cl6 p-b-26">
                                Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call
                                us
                                on (+1) 96 716 6879
                            </p>
                        </div>
                    </div>

                    <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                        <div class="how-bor1 ">
                            <div class="hov-img0">
                                <img src="{{ asset('landing/images/about-01.jpg') }}" alt="IMG">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                        <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                            <h3 class="mtext-111 cl2 p-b-16">
                                Our Mission
                            </h3>

                            <p class="stext-113 cl6 p-b-26">
                                Mauris non lacinia magna. Sed nec lobortis dolor. Vestibulum rhoncus dignissim risus, sed
                                consectetur erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                ac
                                turpis egestas. Nullam maximus mauris sit amet odio convallis, in pharetra magna gravida.
                                Praesent sed nunc fermentum mi molestie tempor. Morbi vitae viverra odio. Pellentesque ac
                                velit
                                egestas, luctus arcu non, laoreet mauris. Sed in ipsum tempor, consequat odio in, porttitor
                                ante. Ut mauris ligula, volutpat in sodales in, porta non odio. Pellentesque tempor urna
                                vitae
                                mi vestibulum, nec venenatis nulla lobortis. Proin at gravida ante. Mauris auctor purus at
                                lacus
                                maximus euismod. Pellentesque vulputate massa ut nisl hendrerit, eget elementum libero
                                iaculis.
                            </p>

                            <div class="bor16 p-l-29 p-b-9 m-t-22">
                                <p class="stext-114 cl6 p-r-40 p-b-11">
                                    Creativity is just connecting things. When you ask creative people how they did
                                    something,
                                    they feel a little guilty because they didn't really do it, they just saw something. It
                                    seemed obvious to them after a while.
                                </p>

                                <span class="stext-111 cl8">
                                    - Steve Job’s
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                        <div class="how-bor2">
                            <div class="hov-img0">
                                <img src="{{ asset('landing/images/about-02.jpg') }}" alt="IMG">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Title page -->
        <section class="bg-img1 txt-center p-lr-15 p-tb-92"
            style="background-image: url({{ asset('landing/images/bg-01.jpg') }});">
            <h2 class="ltext-105 cl0 txt-center">
                Contact
            </h2>
        </section>

        <section class="bg0 p-t-104 p-b-116">
            <div class="container">
                <div class="flex-w flex-tr">
                    {{-- <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                        <form>
                            <h4 class="mtext-105 cl2 txt-center p-b-30">
                                Send Us A Message
                            </h4>

                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                                    placeholder="Your Email Address">
                                <img class="how-pos4 pointer-none"
                                    src="{{ asset('landing/images/icons/icon-email.png') }}" alt="ICON">
                            </div>

                            <div class="bor8 m-b-30">
                                <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
                            </div>

                            <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                                Submit
                            </button>
                        </form>
                    </div> --}}
                    <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                        <div class="flex-w w-full p-b-42">
                           
                           <div class="flex-w w-full">
                            <span class="fs-18 cl5 txt-center size-211">
                                <span class="fa fa-whatsapp"></span>
                            </span>

                            <div class="size-212 p-t-2">
                                <span class="mtext-110 cl2">
                                    Whatsapp
                                </span>

                                <p class="stext-115 cl13 size-213 p-t-18">
                                   <a href="https://api.whatsapp.com/send/?phone=6285335688688&text&type=phone_number&app_absent=0">+62 853-3568-8688</a> 
                                </p>
                            </div>
                        </div>

                        </div>

                        <div class="flex-w w-full p-b-42">
                            <span class="fs-18 cl5 txt-center size-211">
                                <span class="fa fa-instagram"></span>
                            </span>

                            <div class="size-212 p-t-2">
                                <span class="mtext-110 cl2">
                                    Instagram
                                </span>

                                <p class="stext-115 cl13 size-213 p-t-18">
                                   <a href="https://www.instagram.com/melodybeauty29/">melodybeauty29</a> 
                                </p>
                            </div>
                        </div>

                        
                    </div>

                    <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                        <div class="flex-w w-full p-b-42">
                            <span class="fs-18 cl5 txt-center size-211">
                                <span class="lnr lnr-map-marker"></span>
                            </span>

                            <div class="size-212 p-t-2">
                                <span class="mtext-110 cl2">
                                    Address
                                </span>

                                <p class="stext-115 cl13 size-213 p-t-18">
                                  <a href="https://goo.gl/maps/Se1GDpDWP2yfeXQF9">Jl. Mastrip Ruko mastrp Square No.72, Krajan Barat, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121</a>  
                                </p>
                            </div>
                        </div>

                       

                        
                    </div>
                </div>
            </div>
        </section>


       
    @endsection
