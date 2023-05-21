@yield('header')
<!-- Header desktop -->
<div class="container-menu-desktop">
    <!-- Topbar -->
    <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">

            <!-- Logo desktop -->
            <a href="/" class="logo">
                <img src="{{ asset('landing/images/icons/logo-01.png') }}" alt="IMG-LOGO">
            </a>

            <!-- Menu desktop -->
            <div class="menu-desktop">
                <ul class="main-menu">
                    <li>
                        <a href="/">Home</a>
                    </li>

                    <li>
                        <a href="/blog">Blog</a>
                    </li>


                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- Header Mobile -->
<div class="wrap-header-mobile">
    <!-- Logo moblie -->
    <div class="logo-mobile">
        <a href="/"><img src="{{ asset('landing/images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
    </div>



    <!-- Button show menu -->
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </div>
</div>


<!-- Menu Mobile -->
<div class="menu-mobile">
    <ul class="main-menu-m">


        <li>
            <a href="/">Home</a>
        </li>


        <li>
            <a href="/blog">Blog</a>
        </li>


    </ul>
</div>


</header>
