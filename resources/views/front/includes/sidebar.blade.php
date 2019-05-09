<div class="d-flex flex-column box-item">
    @if (!empty($request->q) and count($items) > 1 or (!empty($request->nq) or !empty($request->year or !empty($request->price))))
        <div class="text-center box-bar">後分類</div>
        
        <div class="d-flex flex-column box-item-content">
            <ul class="list-group">
                @if (!empty($request->nq) or !empty($request->year) or !empty($request->price))
                    <li class="list-group-item">
                        @foreach (explode(',', trim($request->nq)) as $narrowed_query)
                            @foreach (['country' => '國家', 'region' => '產區', 'maker' => '酒廠', 'variety' => '品種', 'brand' => '品牌'] as $key => $value)
                                @if (strpos($narrowed_query, $key) !== false)
                                    {{ $value }}

                                    <a href="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'year' => $request->year, 'price' => $request->price, 'abandoned_nq' => $narrowed_query]) }}">
                                        <div class="d-flex justify-content-between">
                                            <div class="indent-1">
                                                <div class="first-line-outdent-5">
                                                    {{ substr(strrchr($narrowed_query, ":"), 1) }}
                                                </div>
                                            </div>

                                            <div>
                                                <i class="far fa-trash-alt"></i>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        @endforeach

                        @if (!empty($request->year))
                            年分

                            <a href="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'abandoned_year' => $request->year, 'price' => $request->price]) }}">
                                <div class="d-flex justify-content-between">
                                    <div class="indent-1">
                                        <div class="first-line-outdent-5">
                                            {{ $request->year }}
                                        </div>
                                    </div>

                                    <div>
                                        <i class="far fa-trash-alt"></i>
                                    </div>
                                </div>
                            </a>
                        @endif

                        @if (!empty($request->price))
                            價格

                            <a href="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'year' => $request->year, 'abandoned_price' => $request->price]) }}">
                                <div class="d-flex justify-content-between">
                                    <div class="indent-1">
                                        <div class="first-line-outdent-5">
                                            NTD$ {{ $request->price }}
                                        </div>
                                    </div>

                                    <div>
                                        <i class="far fa-trash-alt"></i>
                                    </div>
                                </div>
                            </a>
                        @endif
                    </li>
                @endif
            </ul>

            <div id="accordion">
                @if (count($item_countries) > 1)
                    <div class="card">
                        <div class="card-header" id="headingCountry">
                            <div class="d-flex justify-content-between">
                                國家 ({{ count($item_countries) }})
                                    
                                <a href="#" role="button" data-toggle="collapse" data-target="#collapseCountry" aria-expanded="true" aria-controls="collapseCountry">
                                    <i class="fas fa-plus switch"></i>
                                </a>
                            </div>
                        </div>

                        <div id="collapseCountry" class="collapse" aria-labelledby="headingCountry" data-parent="#accordion">
                            <div class="card-body">
                                <div class="indent-1">
                                    @foreach ($item_countries as $item_country)
                                        <div class="first-line-outdent-5">
                                            <a href="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq.',country:'.$item_country->name, 'year' => $request->year, 'price' => $request->price]) }}">{{ $item_country->name }}</a>
                                                ({{ $item_country->number }})
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (count($item_regions) > 1)
                    <div class="card">
                        <div class="card-header" id="headingRegion">
                            <div class="d-flex justify-content-between">
                                產區 ({{ count($item_regions) }})
                                
                                <a href="#" role="button" data-toggle="collapse" data-target="#collapseRegion" aria-expanded="true" aria-controls="collapseRegion">
                                    <i class="fas fa-plus switch"></i>
                                </a>
                            </div>
                        </div>

                        <div id="collapseRegion" class="collapse" aria-labelledby="headingRegion" data-parent="#accordion">
                            <div class="card-body">
                                <div class="indent-1">
                                    @foreach ($item_regions as $item_region)
                                        <div class="first-line-outdent-5">
                                            <a href="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq.',region:'.$item_region->name, 'year' => $request->year, 'price' => $request->price]) }}">{{ $item_region->name }}</a>
                                                ({{ $item_region->number }})
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (count($item_makers) > 1)
                    <div class="card">
                        <div class="card-header" id="headingMaker">
                            <div class="d-flex justify-content-between">
                                酒廠 ({{ count($item_makers) }})
                                
                                <a href="#" role="button" data-toggle="collapse" data-target="#collapseMaker" aria-expanded="true" aria-controls="collapseMaker">
                                    <i class="fas fa-plus switch"></i>
                                </a>
                            </div>
                        </div>

                        <div id="collapseMaker" class="collapse" aria-labelledby="headingMaker" data-parent="#accordion">
                            <div class="card-body">
                                <div class="indent-1">
                                    @foreach ($item_makers as $item_maker)
                                        <div class="first-line-outdent-5">
                                            <a href="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq.',maker:'.$item_maker->name, 'year' => $request->year, 'price' => $request->price]) }}">{{ $item_maker->name }}</a>
                                                ({{ $item_maker->number }})
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (count($item_brands) > 1)
                    <div class="card">
                        <div class="card-header" id="headingBrand">
                            <div class="d-flex justify-content-between">
                                品牌 ({{ count($item_brands) }})
                                
                                <a href="#" role="button" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
                                    <i class="fas fa-plus switch"></i>
                                </a>
                            </div>
                        </div>

                        <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand" data-parent="#accordion">
                            <div class="card-body">
                                <div class="indent-1">
                                    @foreach ($item_brands as $item_brand)
                                        <div class="first-line-outdent-5">
                                            <a href="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq.',brand:'.$item_brand->name, 'year' => $request->year, 'price' => $request->price]) }}">{{ $item_brand->name }}</a>
                                                ({{ $item_brand->number }})
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (count($item_years) > 1 and empty($request->year))
                    <div class="card">
                        <div class="card-header" id="headingYear">
                            <div class="d-flex justify-content-between">
                                年分 ({{ count($item_years) }})
                                
                                <a href="#" role="button" data-toggle="collapse" data-target="#collapseYear" aria-expanded="true" aria-controls="collapseYear">
                                    <i class="fas fa-plus switch"></i>
                                </a>
                            </div>
                        </div>

                        <div id="collapseYear" class="collapse" aria-labelledby="headingYear" data-parent="#accordion">
                            <div class="card-body">
                                <div class="indent-1">
                                    @foreach ($item_years as $item_year)
                                        <div class="first-line-outdent-5">
                                            <a href="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'year' => ($item_year->name).' ~ '.($item_year->name + 4), 'price' => $request->price]) }}">{{ ($item_year->name).' ~ '.($item_year->name + 4) }}</a>
                                                ({{ $item_year->number }})
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (count($item_prices) > 1 and empty($request->price))
                    <div class="card">
                        <div class="card-header" id="headingPrice">
                            <div class="d-flex justify-content-between">
                                價格 ({{ count($item_prices) }})
                                
                                <a href="#" role="button" data-toggle="collapse" data-target="#collapsePrice" aria-expanded="true" aria-controls="collapsePrice">
                                    <i class="fas fa-plus switch"></i>
                                </a>
                            </div>
                        </div>

                        <div id="collapsePrice" class="collapse" aria-labelledby="headingPrice" data-parent="#accordion">
                            <div class="card-body">
                                <div class="indent-1">
                                    @foreach ($item_prices as $item_price)
                                        <div class="first-line-outdent-5">
                                            <a href="{{ route('front.items.filter', ['q' => $request->q, 'nq' => $request->nq, 'year' => $request->year, 'price' => ($item_price->name).' ~ '.($item_price->name + 499)]) }}">NTD$ {{ ($item_price->name).' ~ '.($item_price->name + 499) }}</a>
                                                ({{ $item_price->number }})
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    @if (count($item_bestseller_items) > 0)
        <div class="text-center box-bar">銷售排行榜</div>

        @foreach ($item_bestseller_items as $item_bestseller_item)
            <div class="box-item-content">
                <div class="text-center">
                    @if (File::exists('storage/images/item/front/'.$item_bestseller_item->id.'_m.jpg'))
                        <a href="{{ route("front.items.view", $item_bestseller_item->id) }}">
                            <img src="{{ asset('storage/images/item/middle/'.$item->id.'_m.jpg')}}" alt="{{ $item_bestseller_item->first_name }}" class="box-item-image-size"/>
                        </a>
                    @else
                        <a href="{{ route("front.items.view", $item_bestseller_item->id) }}">
                            <img src="{{ asset('images/item/no_image.png')}}" alt="{{ $item_bestseller_item->first_name }}" class="box-item-image-size"/>
                        </a>
                    @endif
                </div>

                <div class="text-4 first-line-outdent-4">
                    <a href="{{ route("front.items.view", $item_bestseller_item->id) }}">
                        {{ $item_bestseller_item->first_name }}
                    </a>
                </div>

                <div class="text-5 first-line-outdent-5">
                    {{ $item_bestseller_item->second_name }} {{ $item_bestseller_item->year }}
                </div>

                <div class="text-5 first-line-outdent-5">
                    {{ $item_bestseller_item->country }}
                </div>

                <div class="text-5 first-line-outdent-5 entry-price">
                    NTD$ {{ $item_bestseller_item->price }}
                </div>
            </div>
        @endforeach
    @endif

    @if (count($item_catalogs) > 0)
        <div class="text-center box-bar">品種</div>
        
        <div class="box-item-content">
            <div class="d-flex flex-wrap">
                @foreach ($item_catalogs as $item_catalog)
                    @if ($item_catalog->type == 'Variety')
                        <button onclick="location.href='{{ route('front.items.index', ['q' => $item_catalog->name]) }}'" class="btn btn-warning btn-variety">{{ $item_catalog->name }}</button>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

    @if (count($item_catalogs) > 0)
        <div class="text-center box-bar">標記</div>
        
        <div class="box-item-content">
            <div class="d-flex flex-wrap">
                @foreach ($item_catalogs as $item_catalog)
                    @if ($item_catalog->type == 'Tag')
                        <button onclick="location.href='{{ route('front.items.index', ['q' => $item_catalog->name]) }}'" class="btn btn-info btn-tag">{{ $item_catalog->name }}</button>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</div>