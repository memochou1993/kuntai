@extends('layouts.front')

@section('content')
    <h1 class="display-5">廣太洋酒</h1>
    <hr class="my-4">
    <div class="jumbotron py-5" id="intro">
        <p class="lead">自 1997 年創立至今，主要販售商品為進口酒類，如葡萄酒、白蘭地、威士忌、日本酒及各類調酒。廣太洋酒以「廣結善緣、平等、共享」作為經營理念，致力於推廣台灣的品酒文化。</p>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('front.home.about') }}" role="button">了解更多</a>
        </p>
    </div>
    <hr class="my-4">

    <h1 class="display-5">最新消息</h1>
    <hr class="my-4">
    <div class="d-flex flex-wrap">
        @if (count($posts) > 1)
            @foreach ($posts as $post)
                <div class="col-xl-2 text-xl-right">@if($post->pin) <i class="fas fa-thumbtack text-danger"></i> @endif {{ date('Y-m-d', strtotime($post->created_at)) }}</div>
                <div class="col-xl-2">{{ $post->title }}</div>
                <div class="col-xl-8">{{ $post->content }}</div>
            @endforeach
        @endif
    </div>
    <div class="d-flex justify-content-center box-post-pagination">
        @if ($agent->isMobile())
            {{ $posts->links('vendor.pagination.simple-bootstrap-4') }}
        @else
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
        @endif
    </div>
    <hr class="my-4">

    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselIndicators" data-slide-to="1"></li>
            <li data-target="#carouselIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('public/images/carousel/1.jpeg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('public/images/carousel/2.jpeg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('public/images/carousel/3.jpeg') }}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection