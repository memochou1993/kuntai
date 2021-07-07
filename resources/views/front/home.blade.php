@extends('layouts.front')

@section('content')
    <div class="jumbotron py-3" id="intro">
        <h1 class="h3">廣太洋酒</h1>
        <hr class="my-4">
        <p class="lead">自 1997 年創立至今，主要販售商品為進口酒類，如葡萄酒、白蘭地、威士忌、日本酒及各類調酒。廣太洋酒以「廣結善緣・平等・共享」作為經營理念，致力於推廣台灣的品酒文化。</p>
    </div>
    
    @if (count($posts) > 0)
        <div class="jumbotron py-3" id="intro">
            <h1 class="h3">最新消息</h1>
            <hr class="my-4">
            <div class="d-flex flex-wrap">
                @foreach ($posts as $post)
                    <div class="col-xl-2 text-xl-right my-2">@if ($post->pin) <i class="fas fa-thumbtack text-danger mr-1"></i> @endif {{ date('Y-m-d', strtotime($post->created_at)) }}</div>
                    <div class="col-xl-10 my-2"><a href="{{ route('front.posts.view', $post->id) }}">{{ $post->title }}</a></div>
                @endforeach
            </div>
            <hr class="my-4">
            <div class="d-flex justify-content-center box-post-pagination">
                @if ($agent->isMobile())
                    {{ $posts->links('vendor.pagination.simple-bootstrap-4') }}
                @else
                    {{ $posts->links('vendor.pagination.bootstrap-4') }}
                @endif
            </div>
        </div>
    @endif

    <div class="jumbotron py-3" id="intro">
        <h1 class="h3">門市資訊</h1>
        <hr class="my-4">
        <div class="d-flex flex-wrap">
            <div class="col-xl-4 p-0">
                <dl class="row">
                    <dt class="col-xl-4 text-xl-right">營業時間</dt>
                    <dd class="col-xl-8">14:00 - 23:00</dd>
                    <dt class="col-xl-4 text-xl-right">門市地址</dt>
                    <dd class="col-xl-8">新竹市長安街 118 號</dd>
                    <dt class="col-xl-4 text-xl-right">連絡電話</dt>
                    <dd class="col-xl-8">03-5280118</dd>
                </dl>
            </div>
            <div class="col-xl-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.626830711024!2d120.96241771500175!3d24.808228584078666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346835c07b32fbe9%3A0xed13f4368586208f!2z5buj5aSq5LyB5qWt5rSL6KGM!5e0!3m2!1szh-TW!2stw!4v1519309071913" id="map" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="jumbotron py-3" id="intro">
        <h1 class="h3">公司沿革</h1>
        <hr class="my-4">
        <div class="d-flex flex-wrap">
            <div class="col-xl-2 text-xl-right my-2">1997 年</div>
            <div class="col-xl-10 my-2">廣太企業有限公司成立，開始經銷各國酒品。</div>
            <div class="col-xl-2 text-xl-right my-2">1998 年</div>
            <div class="col-xl-10 my-2">酒齡葡萄酒坊成立。</div>
            <div class="col-xl-2 text-xl-right my-2">1999 年</div>
            <div class="col-xl-10 my-2">經銷英屬維爾京亨典國際股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2000 年</div>
            <div class="col-xl-10 my-2">經銷星坊股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2002 年</div>
            <div class="col-xl-10 my-2">經銷金醇股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2003 年</div>
            <div class="col-xl-10 my-2">經銷法蘭斯股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2004 年</div>
            <div class="col-xl-10 my-2">經銷愛丁頓寰盛股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2004 年</div>
            <div class="col-xl-10 my-2">經銷帝亞吉歐股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2005 年</div>
            <div class="col-xl-10 my-2">經銷格蘭父子股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2005 年</div>
            <div class="col-xl-10 my-2">經銷東順興股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2005 年</div>
            <div class="col-xl-10 my-2">經銷三商行股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2006 年</div>
            <div class="col-xl-10 my-2">經銷三得利股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2007 年</div>
            <div class="col-xl-10 my-2">經銷保樂利加股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2007 年</div>
            <div class="col-xl-10 my-2">經銷雀拉股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2007 年</div>
            <div class="col-xl-10 my-2">經銷欣合興股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2009 年</div>
            <div class="col-xl-10 my-2">經銷亞法股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2015 年</div>
            <div class="col-xl-10 my-2">經銷泰淂利股份有限公司相關商品。</div>
            <div class="col-xl-2 text-xl-right my-2">2016 年</div>
            <div class="col-xl-10 my-2">經銷沃福股份有限公司相關商品。</div>
        </div>
    </div>

    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselIndicators" data-slide-to="1"></li>
            <li data-target="#carouselIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/carousel/1.jpeg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/carousel/2.jpeg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/carousel/3.jpeg') }}" alt="Third slide">
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
