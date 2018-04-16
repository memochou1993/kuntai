@extends('layouts.front')

@section('content')
    <div class="d-flex flex-wrap">
        <div class="col-xl-4 mb-5" id="about">
            <h1 class="display-5">門市資訊</h1>
            <p class="text-4">全新竹最專業的葡萄酒專賣店</p>
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
            <p><a class="btn btn-primary btn-lg" href="{{ route('front.home.contact') }}" role="button">聯絡我們</a></p>
        </div>

        <div class="col-xl-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.626830711024!2d120.96241771500175!3d24.808228584078666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346835c07b32fbe9%3A0xed13f4368586208f!2z5buj5aSq5LyB5qWt5rSL6KGM!5e0!3m2!1szh-TW!2stw!4v1519309071913" id="map" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
</div>

<hr class="my-4">
<h1 class="display-5">公司沿革</h1>
<hr class="my-4">
<div class="row">
    <div class="col-xl-2 text-xl-center">1997 年</div>
    <div class="col-xl-10">廣太企業有限公司成立，開始經銷各國酒品。</div>
    <div class="col-xl-2 text-xl-center">1998 年</div>
    <div class="col-xl-10">酒齡葡萄酒坊成立。</div>
    <div class="col-xl-2 text-xl-center">1999 年</div>
    <div class="col-xl-10">經銷英屬維爾京亨典國際股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2000 年</div>
    <div class="col-xl-10">經銷星坊股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2002 年</div>
    <div class="col-xl-10">經銷金醇股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2003 年</div>
    <div class="col-xl-10">經銷法蘭斯股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2004 年</div>
    <div class="col-xl-10">經銷愛丁頓寰盛股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2004 年</div>
    <div class="col-xl-10">經銷帝亞吉歐股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2005 年</div>
    <div class="col-xl-10">經銷格蘭父子股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2005 年</div>
    <div class="col-xl-10">經銷東順興股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2005 年</div>
    <div class="col-xl-10">經銷三商行股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2006 年</div>
    <div class="col-xl-10">經銷三得利股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2007 年</div>
    <div class="col-xl-10">經銷保樂利加股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2007 年</div>
    <div class="col-xl-10">經銷雀拉股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2007 年</div>
    <div class="col-xl-10">經銷欣合興股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2009 年</div>
    <div class="col-xl-10">經銷亞法股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2015 年</div>
    <div class="col-xl-10">經銷泰淂利股份有限公司相關商品。</div>
    <div class="col-xl-2 text-xl-center">2016 年</div>
    <div class="col-xl-10">經銷沃福股份有限公司相關商品。</div>
</div>
<hr class="my-4">
@endsection