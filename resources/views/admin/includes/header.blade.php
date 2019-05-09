@auth
    <div class="container">
        <div class="d-flex flex-wrap box" id="header">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">
                <div>
                    <a href="{{ route('admin.home.index') }}"><img src="{{ asset('images/logo.png')}}" alt="KUNTAI" class="box-logo"/></a>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-12 ml-auto box-search">
                <form action="{{ route('admin.items.index') }}" method="GET" class="form-horizontal">
                    <div class="input-group">
                        <input type="text" name="q" value="@if (!empty($request->q)){{ $request->q }}@endif" class="form-control" placeholder="請輸入關鍵詞">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit">
                                <i class="fas fa-search box-search-icon"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    <div class="d-flex flex-wrap" id="info">
        <div class="col-xl-7">
            {!! Breadcrumbs::render() !!}
        </div>
        
        <div class="col-xl-5 text-xl-right">
            歡迎 {{ Auth::user()->name }} 登入系統
        </div>
    </div>
@endauth

@guest
    <div class="d-flex flex-wrap" id="info"></div>
@endguest