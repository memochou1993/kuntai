@extends('layouts.front')

@section('content')
    <div class="jumbotron py-3" id="intro">
        <div class="d-flex flex-wrap">
            <div class="col-xl-4 p-0">
                <h1 class="h3">門市資訊</h1>
                <p class="lead">全新竹最專業的葡萄酒專賣店</p>
                <hr class="my-4">
                <dl class="row">
                    <dt class="col-xl-4 text-xl-right">營業時間</dt>
                    <dd class="col-xl-8">14:00 - 23:00</dd>
                    <dt class="col-xl-4 text-xl-right">門市地址</dt>
                    <dd class="col-xl-8">新竹市長安街 118 號</dd>
                    <dt class="col-xl-4 text-xl-right">連絡電話</dt>
                    <dd class="col-xl-8">03-5280118</dd>
                </dl>
                <hr class="my-4">
                <div class="text-right">
                    <a class="btn btn-primary btn" href="{{ route('front.home.contact') }}" role="button">聯絡我們</a>
                </div>
            </div>
            <div class="col-xl-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.626830711024!2d120.96241771500175!3d24.808228584078666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346835c07b32fbe9%3A0xed13f4368586208f!2z5buj5aSq5LyB5qWt5rSL6KGM!5e0!3m2!1szh-TW!2stw!4v1519309071913" id="map" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection