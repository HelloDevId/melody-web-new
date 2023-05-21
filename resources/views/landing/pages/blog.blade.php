@extends('landing.layout.main')

@section('title')
    Blog
@endsection

@section('header')
    <header class="header-v4">
    @endsection

    @section('content')
        <!-- Title page -->
        <section class="bg-img1 txt-center p-lr-15 p-tb-92"
            style="background-image: url('{{ asset('landing/images/bg-02.jpg') }}');">
            <h2 class="ltext-105 cl0 txt-center">
                Blog
            </h2>
        </section>
        <!-- Content page -->
        <section class="bg0 p-t-62 p-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-9 p-b-80">
                        <div class="p-r-45 p-r-0-lg">
                            <!-- item blog -->
                            @foreach ($post as $data)
                                <div class="p-b-63">
                                    <a href="/detail-blog/{{ $data->id }}" class="hov-img0 how-pos5-parent">
                                        <img src="{{ asset('foto/post/' . $data['image']) }}" alt="IMG-BLOG">
                                    </a>

                                    <div class="p-t-32">
                                        <h4 class="p-b-15">
                                            <a href="/detail-blog/{{ $data->id }}"
                                                class="ltext-108 cl2 hov-cl2 trans-04">
                                                {{ $data->title }}
                                            </a>
                                        </h4>

                                        <p class="stext-117 cl6">
                                            {{ $data->slug }}
                                        </p>

                                        <div class="flex-w flex-sb-m p-t-18">

                                            <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                                <span>
                                                    <span class="cl4">By</span> {{ $data->user->name }}
                                                    <span class="cl12 m-l-4 m-r-6">|</span>
                                                </span>

                                                <span>
                                                    {{ $data->created_at->format('d M Y') }}
                                                    <span class="cl12 m-l-4 m-r-6">|</span>
                                                </span>
                                            </span>

                                            <a href="/detail-blog/{{ $data->id }}"
                                                class="stext-101 cl2 hov-cl2 trans-04 m-tb-10">
                                                Continue Reading

                                                <i class="fa fa-long-arrow-right m-l-9"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Pagination -->
                            <div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
                                {{ $post->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
