@extends('layouts.front')

@section('content')
    <div class="d-flex flex-wrap">
        <div class="col-lg-9 order-lg-2 box">
            @if (count($items) > 0)
                <div class="d-flex flex-wrap box-item">
                    <div class="d-flex col-12 box-bar">
                        <div class="ml-auto">
                            <i class="fas fa-th"></i>
                        </div>
                    </div>

                    @foreach ($items as $item)
                        <div class="d-sm-flex align-content-sm-between flex-sm-wrap col-lg-3 col-md-4 col-sm-6 box-item-content">
                            <div class="w-100">
                                <div class="text-center box-item-image">
                                    <a href="{{ route('front.items.view', $item->id) }}">
                                        @if (File::exists('storage/images/item/front/'.$item->id.'_m.jpg'))
                                            <img src="{{ asset('storage/images/item/front/'.$item->id.'_m.jpg') }}" alt="{{ $item->first_name }}" class="box-item-image-size"/>
                                        @else
                                            <img src="{{ asset('images/item/no_image.png') }}" alt="No Image" class="box-item-image-size"/>
                                        @endif
                                    </a>
                                </div>
                                
                                <div class="text-4 first-line-outdent-4">
                                    <a href="{{ route('front.items.view', $item->id) }}">
                                        {{ $item->country }}{{ $item->first_name }}
                                    </a>
                                </div>

                                <div class="text-5 first-line-outdent-5">
                                    {{ $item->second_name }} {{ $item->year }}
                                </div>
                            </div>

                            <div class="w-100">
                                <div class="text-5 first-line-outdent-5">
                                    {{ $item->capacity }} mL
                                </div>

                                <div class="text-5 first-line-outdent-5 entry-price">
                                    NTD$ {{ $item->price }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            
                <div class="d-flex justify-content-center box-item-pagination">
                    @if ($agent->isMobile())
                        {{ $items->appends(request()->input())->links('vendor.pagination.simple-bootstrap-4') }}
                    @else
                        {{ $items->links('vendor.pagination.bootstrap-4') }}
                    @endif
                </div>
            @else
                <div class="alert alert-warning p-5" role="alert">
                    <h4 class="alert-heading">很抱歉，找不到相關的酒款。</h4>
                    <hr>
                    您可以使用空白鍵來增加關鍵詞，例如「紅酒 2009」。
                </div>
            @endif
        </div>

        <div class="col-lg-3 order-lg-1 box">
            @include('front.includes.sidebar')
        </div>
    </div>
@endsection