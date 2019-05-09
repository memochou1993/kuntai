<div class="container">
    <div class="d-flex flex-wrap box" id="header">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">
            <div>
                <a href="{{ route('front.home.index') }}"><img src="{{ asset('images/logo.png')}}" alt="KUNTAI" class="box-logo"/></a>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-12 ml-auto box-search">
            <form action="{{ route('front.items.index') }}" method="GET" class="form-horizontal">
                <div class="input-group">
                    <input type="text" name="q" value="@if (!empty($request->q)){{ $request->q }}@endif" class="form-control" placeholder="請輸入關鍵詞">
                    <div class="input-group-append">
                        <button class="btn btn-info" type="submit">
                            <i class="fas fa-search box-search-icon"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="box-search-keyword">
                @if (!empty($item_element_keywords))
                    @foreach ($item_element_keywords as $item_element_keyword)
                        <a href="{{ route('front.items.index', ['q' => $item_element_keyword]) }}">{{ $item_element_keyword }}</a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <hr>

    <div class="d-flex flex-wrap">
        <div class="col-md-12">
            @if (Request::is('items*'))
                @if (!empty($item_catalogs))
                    <nav class="navbar-expand-md navbar-light nav-sub">
                        <div class="container">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-genre" aria-controls="nav-genre" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse" id="nav-genre">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown
                                            @foreach (explode(',', trim($request->nq)) as $narrowed_query)
                                                    @if (strpos($narrowed_query, 'country') !== false)
                                                        {{ 'active' }}
                                                    @endif
                                            @endforeach">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            國家
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            @foreach ($item_catalogs as $item_catalog)
                                                @if ($item_catalog->type == 'Country')
                                                    <a href="{{ route('front.items.filter', ['nq' => 'country:'.$item_catalog->name]) }}" class="dropdown-item
                                                            @foreach (explode(',', trim($request->nq)) as $narrowed_query)
                                                                    @if (strpos($narrowed_query, $item_catalog->name) !== false)
                                                                        {{ 'active' }}
                                                                    @endif
                                                            @endforeach
                                                        ">{{ $item_catalog->name }} ({{ $item_catalog->number }})
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                    
                                    <li class="nav-item dropdown
                                            @if ($request->year)
                                                {{ 'active' }}
                                            @endif
                                        ">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            年分
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            @foreach ($item_catalogs as $item_catalog)
                                                @if ($item_catalog->type == 'Year')
                                                    <a href="{{ route('front.items.filter', ['year' => $item_catalog->name]) }}" class="dropdown-item
                                                            @if ($item_catalog->name == $request->year)
                                                                {{ 'active' }}
                                                            @endif
                                                        ">{{ $item_catalog->name }} ({{ $item_catalog->number }})
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                    
                                    <li class="nav-item dropdown
                                            @if ($request->price)
                                                {{ 'active' }}
                                            @endif
                                        ">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            價格
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            @foreach ($item_catalogs as $item_catalog)
                                                @if ($item_catalog->type == 'Price')
                                                    <a href="{{ route('front.items.filter', ['price' => $item_catalog->name]) }}" class="dropdown-item
                                                            @if ($item_catalog->name == $request->year)
                                                                {{ 'active' }}
                                                            @endif
                                                        ">NTD$ {{ $item_catalog->name }} ({{ $item_catalog->number }})
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                @endif
            @endif
        </div>
    </div>
    
    @if (Request::is('items*'))
        <div class="d-flex flex-wrap" id="info">
            <div class="col-xl-5">
                {!! Breadcrumbs::render() !!}
            </div>
            
            <div class="col-xl-7">
                <div class="d-flex justify-content-xl-end flex-wrap text-muted">
                    @if (isset($item_counts))
                        <div class="d-inline">找到&nbsp;{{ $item_counts }}&nbsp;筆結果,&ensp;</div>

                        <div class="d-inline">每頁顯示
                            <select onChange="location=this.options[this.selectedIndex].value;">
                                <option value="" disabled selected></option>
                                <option value="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'year' => $request->year, 'limit' => 8, 'order' => $request->order, 'dir' => $request->dir]) }}" @if ($request->limit == 8){{ 'selected' }}@endif>8</option>
                                <option value="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'year' => $request->year, 'limit' => 12, 'order' => $request->order, 'dir' => $request->dir]) }}" @if ($request->limit == 12){{ 'selected' }}@endif>12</option>
                                <option value="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'year' => $request->year, 'limit' => 16, 'order' => $request->order, 'dir' => $request->dir]) }}" @if ($request->limit == 16){{ 'selected' }}@endif>16</option>
                            </select>
                            筆,&ensp;
                        </div>

                        <div class="d-inline">依照
                            <select onChange="location=this.options[this.selectedIndex].value;">
                                <option value="" disabled selected></option>
                                <option value="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'year' => $request->year, 'limit' => $request->limit, 'order' => 'price', 'dir' => $request->dir]) }}" @if ($request->order == 'price'){{ 'selected' }}@endif>價格</option>
                                <option value="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'year' => $request->year, 'limit' => $request->limit, 'order' => 'year', 'dir' => $request->dir]) }}" @if ($request->order == 'year'){{ 'selected' }}@endif>年分</option>
                            </select>

                            @if ($request->dir == 'asc')
                                <a href="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'year' => $request->year, 'limit' => $request->limit, 'order' => $request->order, 'dir' => 'desc']) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                            @elseif ($request->dir == 'desc')
                                <a href="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'year' => $request->year, 'limit' => $request->limit, 'order' => $request->order, 'dir' => 'asc']) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                            @elseif (!isset($request->dir))
                                <a href="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'year' => $request->year, 'limit' => $request->limit, 'order' => $request->order, 'dir' => 'desc']) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                            @endif
                            排序
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>

