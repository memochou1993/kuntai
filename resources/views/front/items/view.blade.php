@extends('layouts.front')

@section('content')
    <div class="d-flex flex-wrap">
        <div class="col-lg-9 order-lg-1 box">
            <div class="d-flex flex-wrap box-item">
                <div class="col-xl-12 box-bar">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fas fa-info-circle box-item-icon"></i>
                        </div>

                        <div>
                            @auth
                                <a href="{{ Route('admin.items.update', $item->id) }}">編輯</a>
                            @endauth
                        </div>
                    </div>
                </div>
            
                <div class="d-flex flex-wrap box-item-content">
                    <div class="col-xl-4 mb-3">
                        @if (File::exists('storage/app/public/images/item/front/'.$item->id.'_m.jpg'))
                            <div class="d-flex flex-wrap">
                                <div class="col-xl-6 mb-3">
                                    <img id="item-zoom" src="{{ asset('storage/app/public/images/item/front/'.$item->id.'_m.jpg') }}" data-zoom-image="{{ asset('storage/app/public/images/item/front/'.$item->id.'_l.jpg') }}" alt="{{ $item->first_name }}"/>
                                </div>
                                
                                <div class="col-xl-6 text-xl-right">
                                    <div id="item-gallery">
                                        <a href="#" data-image="{{ asset('storage/app/public/images/item/front/'.$item->id.'_m.jpg') }}" data-zoom-image="{{ asset('storage/app/public/images/item/front/'.$item->id.'_l.jpg') }}">
                                            <img id="zoom" src="{{ asset('storage/app/public/images/item/front/'.$item->id.'_s.jpg') }}"/>
                                        </a>
                                        
                                        <a href="#" data-image="{{ asset('storage/app/public/images/item/back/'.$item->id.'_m.jpg') }}" data-zoom-image="{{ asset('storage/app/public/images/item/back/'.$item->id.'_l.jpg') }}">
                                            <img id="zoom" src="{{ asset('storage/app/public/images/item/back/'.$item->id.'_s.jpg') }}"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center">
                                <img src="{{ asset('images/item/no_image.png') }}" alt="{{ $item->first_name }}"/>
                            </div>
                        @endif
                    </div>

                    <div class="col-xl-8">
                        <div class="d-flex flex-wrap">
                            <div class="col-sm-3 my-1">
                                <div class="text-4 first-line-outdent-4 text-sm-right">中文名稱</div>
                            </div>
                            <div class="col-sm-9 my-1">
                                <div class="text-5 first-line-outdent-5">{{ $item->first_name }}</div>
                            </div>
                            @if (!empty($item->second_name))
                                <div class="col-sm-3 my-1">
                                    <div class="text-4 first-line-outdent-4 text-sm-right">原文名稱</div>
                                </div>
                                <div class="col-sm-9 my-1">
                                    <div class="text-5 first-line-outdent-5">{{ $item->second_name }}</div>
                                </div>
                            @endif
                            @if (!empty($item->year))
                                <div class="col-sm-3 my-1">
                                    <div class="text-4 first-line-outdent-4 text-sm-right">年分</div>
                                </div>
                                <div class="col-sm-9 my-1">
                                    <div class="text-5 first-line-outdent-5"><a href="{{ route('front.items.index', ['q' => $item->year]) }}">{{ $item->year }}</a></div>
                                </div>
                            @endif
                            @if (!empty($item->country))
                                <div class="col-sm-3 my-1">
                                    <div class="text-4 first-line-outdent-4 text-sm-right">國家</div>
                                </div>
                                <div class="col-sm-9 my-1">
                                    <div class="text-5 first-line-outdent-5"><a href="{{ route('front.items.index', ['q' => $item->country]) }}">{{ $item->country }}</a></div>
                                </div>
                            @endif
                            @if (!empty($item->region))
                                <div class="col-sm-3 my-1">
                                    <div class="text-4 first-line-outdent-4 text-sm-right">產區</div>
                                </div>
                                <div class="col-sm-9 my-1">
                                    <div class="text-5 first-line-outdent-5"><a href="{{ route('front.items.index', ['q' => $item->region]) }}">{{ $item->region }}</a></div>
                                </div>
                            @endif
                            @if (!empty($item->maker))
                                <div class="col-sm-3 my-1">
                                    <div class="text-4 first-line-outdent-4 text-sm-right">酒廠</div>
                                </div>
                                <div class="col-sm-9 my-1">
                                    <div class="text-5 first-line-outdent-5"><a href="{{ route('front.items.index', ['q' => $item->maker]) }}">{{ $item->maker }}</a></div>
                                </div>
                            @endif
                            @if (!empty($item->brand))
                                <div class="col-sm-3 my-1">
                                    <div class="text-4 first-line-outdent-4 text-sm-right">品牌</div>
                                </div>
                                <div class="col-sm-9 my-1">
                                    <div class="text-5 first-line-outdent-5"><a href="{{ route('front.items.index', ['q' => $item->brand]) }}">{{ $item->brand }}</a></div>
                                </div>
                            @endif
                            @if (!empty($item->capacity))
                                <div class="col-sm-3 my-1">
                                    <div class="text-4 first-line-outdent-4 text-sm-right">容量</div>
                                </div>
                                <div class="col-sm-9 my-1">
                                    <div class="text-5 first-line-outdent-5">{{ $item->capacity }} mL</div>
                                </div>
                            @endif
                            @if (!empty($item->abv))
                                <div class="col-sm-3 my-1">
                                    <div class="text-4 first-line-outdent-4 text-sm-right">酒精濃度</div>
                                </div>
                                <div class="col-sm-9 my-1">
                                    <div class="text-5 first-line-outdent-5">{{ $item->abv }}%</div>
                                </div>
                            @endif
                            @if (!empty($item->price))
                                <div class="col-sm-3 my-1">
                                    <div class="text-4 first-line-outdent-4 text-sm-right">價格</div>
                                </div>
                                <div class="col-sm-9 my-1">
                                    <div class="text-5 first-line-outdent-5">NTD$ {{ $item->price }}</div>
                                </div>
                            @endif
                            @if (count($item_varieties) > 0)
                                <div class="col-sm-3 my-1">
                                    <div class="text-4 first-line-outdent-4 text-sm-right">品種</div>
                                </div>
                                <div class="col-sm-9 my-1">
                                    @for($i = 0; $i < count($item_varieties); $i++)
                                        <button onclick="location.href='{{ route('front.items.index', ['q' => $item_varieties[$i]->name]) }}'" class="btn btn-warning btn-variety">{{ $item_varieties[$i]->name }}</button>
                                    @endfor
                                </div>
                            @endif
                            @if (count($item_tags) > 0)
                                <div class="col-sm-3 my-1">
                                    <div class="text-4 first-line-outdent-4 text-sm-right">標記</div>
                                </div>
                                <div class="col-sm-9 my-1">
                                    @for($i = 0; $i < count($item_tags); $i++)
                                        <button onclick="location.href='{{ route('front.items.index', ['q' => $item_tags[$i]->name]) }}'" class="btn btn-info btn-tag">{{ $item_tags[$i]->name }}</button>
                                    @endfor
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="box-item-content">
                    @if (!empty($item->description))
                        <div class="text-5 first-line-indent-5">
                            {!! $item->description !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-3 order-lg-2 box">
            <div class="d-flex flex-column box-item">
                @if (count($item_speciality_items) > 0)
                    <div class="text-center box-bar">精選酒款</div>

                    @foreach ($item_speciality_items as $item_speciality_item)
                        <div class="box-item-content">
                            <div class="text-center">
                                @if (File::exists('storage/app/public/images/item/front/'.$item_speciality_item->id.'_m.jpg'))
                                    <a href="{{ route('front.items.view', $item_speciality_item->id) }}">
                                        <img src="{{ asset('storage/app/public/images/item/middle/'.$item_speciality_item->id.'.jpg')}}" alt="{{ $item_speciality_item->first_name }}" class="box-item-image-size"/>
                                    </a>
                                @else
                                    <a href="{{ route('front.items.view', $item_speciality_item->id) }}">
                                        <img src="{{ asset('images/item/no_image.png')}}" alt="{{ $item_speciality_item->first_name }}" class="box-item-image-size"/>
                                    </a>
                                @endif
                            </div>

                            <div class="text-4 first-line-outdent-4">
                                <a href="{{ route('front.items.view', $item_speciality_item->id) }}">
                                    {{ $item_speciality_item->first_name }}
                                </a>
                            </div>

                            <div class="text-5 first-line-outdent-5">
                                {{ $item_speciality_item->second_name }} {{ $item_speciality_item->year }}
                            </div>

                            <div class="text-5 first-line-outdent-5">
                                {{ $item_speciality_item->country }}
                            </div>

                            <div class="text-5 first-line-outdent-5 entry-price">
                                NTD$ {{ $item_speciality_item->price }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="d-flex flex-column box-item">
                @if (count($item_association_items) > 0)
                    <div class="text-center box-bar">其他人還看了</div>

                    @foreach ($item_association_items as $item_association_item)
                        <div class="box-item-content">
                            <div class="text-center">
                                @if (File::exists('storage/app/public/images/item/front/'.$item_association_item->id.'_m.jpg'))
                                    <a href="{{ route('front.items.view', $item_association_item->id) }}">
                                        <img src="{{ asset('storage/app/public/images/item/front/'.$item_association_item->id.'_m.jpg')}}" alt="{{ $item_association_item->first_name }}" class="box-item-image-size"/>
                                    </a>
                                @else
                                    <a href="{{ route('front.items.view', $item_association_item->id) }}">
                                        <img src="{{ asset('images/item/no_image.png')}}" alt="{{ $item_association_item->first_name }}" class="box-item-image-size"/>
                                    </a>
                                @endif
                            </div>

                            <div class="text-4 first-line-outdent-4">
                                <a href="{{ route('front.items.view', $item_association_item->id) }}">
                                    {{ $item_association_item->first_name }}
                                </a>
                            </div>

                            <div class="text-5 first-line-outdent-5">
                                {{ $item_association_item->second_name }} {{ $item_association_item->year }}
                            </div>

                            <div class="text-5 first-line-outdent-5">
                                {{ $item_association_item->country }}
                            </div>

                            <div class="text-5 first-line-outdent-5 entry-price">
                                NTD$ {{ $item_association_item->price }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection