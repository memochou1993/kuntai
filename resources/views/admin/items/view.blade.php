@extends('layouts.admin')

@section('content')
    @if (!empty($item))
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-wrap">
                    <div>詳細資料</div>
                    
                    <div class="ml-sm-auto">
                        <a href="{{ Route('front.items.view', $item->id) }}">查看</a>
                        |
                        @if ($previous_item_id)
                            <a href="{{ Route('admin.items.view', $previous_item_id) }}">上一筆</a>
                        @else
                            <a>上一筆</a>
                        @endif
                        |
                        @if ($next_item_id)
                            <a href="{{ Route('admin.items.view', $next_item_id) }}">下一筆</a>
                        @else
                            <a>下一筆</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="d-flex flex-wrap">
                    <div class="col-md-4">
                        <div class="d-flex flex-column">
                            <div class="d-flex justify-content-md-end mb-3">
                                <div class="card-image">
                                    @if (File::exists('storage/images/item/front/'.$item->id.'_m.jpg'))
                                        <div class="mb-3">
                                            <img src="{{ asset('storage/images/item/front/'.$item->id.'_m.jpg') }}" alt="{{ $item->first_name }}"/>
                                        </div>
                                        
                                        <div class="text-center" id="item-gallery">
                                            <img src="{{ asset('storage/images/item/front/'.$item->id.'_s.jpg') }}"/>
                                            <img src="{{ asset('storage/images/item/back/'.$item->id.'_s.jpg') }}"/>
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <img src="{{ asset('images/item/no_image.png') }}" alt="No Image"/>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                        <dl class="row">
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">中文名稱</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->first_name }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">原文名稱</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->second_name }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">年分</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->year }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">類型一</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->first_genre }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">類型二</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->second_genre }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">國家</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->country }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">產區</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->region }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">酒廠</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->maker }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">品牌</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->brand }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">容量</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->capacity }} mL</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">酒精濃度</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->abv }}%</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">價格</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">NTD$ {{ $item->price }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">折扣</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->discount }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">單位一</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->first_unit }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">單位二</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->second_unit }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">條碼</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->barcode }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">描述</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{!! $item->description !!}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">品種</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">
                                    @if (count($item_varieties) > 0)
                                        @for($i = 0; $i < count($item_varieties); $i++)
                                            {{ $item_varieties[$i]->name }}@unless ((count($item_varieties) - 1) == $i){{ ', ' }}@endunless
                                        @endfor
                                    @endif
                                </div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">標記</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">
                                    @if (count($item_tags) > 0)
                                        @for($i = 0; $i < count($item_tags); $i++)
                                            {{ $item_tags[$i]->name }}@unless ((count($item_tags) - 1) == $i){{ ', ' }}@endunless
                                        @endfor
                                    @endif
                                </div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">修改者</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->editor }}</div>
                            </dd>
                            <dt class="col-md-3 text-md-right">
                                <div class="first-line-outdent-4">建立者</div>
                            </dt>
                            <dd class="col-md-9">
                                <div class="first-line-outdent-5">{{ $item->user->name }}</div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <div class="col-md-4">
                        <button class="btn btn-default form-control" onclick="location.href='{{ route('admin.items.update', $item->id) }}'">修改</button>
                    </div>
                        
                    <div class="col-md-4">
                        <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="button" class="btn btn-default form-control" data-toggle="confirm">刪除</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection