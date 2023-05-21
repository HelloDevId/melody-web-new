@extends('landing.layout.main')

@section('title')
    {{ $post->title }} - Blog Detail
@endsection

@section('header')
    <header class="header-v4">
    @endsection

    @section('content')
        <!-- breadcrumb -->
        <div class="container">
            <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
                <a href="/" class="stext-109 cl8 hov-cl2 trans-04">
                    Home
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>

                <a href="/blog" class="stext-109 cl8 hov-cl2 trans-04">
                    Blog
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>

                <span class="stext-109 cl4">
                    {{ $post->title }}
                </span>
            </div>
        </div>


        <!-- Content page -->
        <section class="bg0 p-t-52 p-b-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-9 p-b-80">
                        <div class="p-r-45 p-r-0-lg">
                            <!--  -->
                            <div class="wrap-pic-w how-pos5-parent">
                                <img src="{{ asset('foto/post/' . $post['image']) }}" alt="IMG-BLOG">


                            </div>
                            <div class="p-t-32">
                                <span class="flex-w flex-m stext-111 cl2 p-b-19">
                                    <span>
                                        <span class="cl4">By</span> {{ $post->user->name }}
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>

                                    <span>
                                        {{ $post->created_at->format('d M Y') }}
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>
                                </span>

                                <h4 class="ltext-109 cl2 p-b-28">
                                    {{ $post->title }}
                                </h4>

                                <p class="stext-117 cl6 p-b-26">
                                    {{ $post->content }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    @endsection
