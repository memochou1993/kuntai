@extends('layouts.admin')

@section('content')
    @include('common.errors')

    <form action="{{ route('admin.items.add') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}

        <div class="card">
            <div class="card-header">新增</div>

            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-information-tab" data-toggle="pill" href="#pills-information" role="tab" aria-controls="pills-information" aria-selected="true">基本資料</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-selected="false">商品描述</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-image-tab" data-toggle="pill" href="#pills-image" role="tab" aria-controls="pills-image" aria-selected="false">圖片上傳</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-type-tab" data-toggle="pill" href="#pills-type" role="tab" aria-controls="pills-type" aria-selected="true">商品類型</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-unit-tab" data-toggle="pill" href="#pills-unit" role="tab" aria-controls="pills-unit" aria-selected="true">商品單位</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-information" role="tabpanel" aria-labelledby="pills-information-tab">
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 control-label text-md-right">中文名稱</label>
                            <div class="col-md-6">
                                <input type="text" name="first_name" value="{{ old('first_name') }}" id="first_name" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="second_name" class="col-md-4 control-label text-md-right">原文名稱</label>
                            <div class="col-md-6">
                                <input type="text" name="second_name" value="{{ old('second_name') }}" id="second_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 control-label text-md-right">年分</label>
                            <div class="col-md-6">
                                <select name="year" id="year" class="form-control">
                                    <option value="" selected></option>
                                    @for ($year = $today->year; $year >=1981; $year--)
                                        @if ($year == old('year'))
                                            <option value="{{ $year }}" selected>{{ $year }}</option>
                                        @else
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="country" class="col-md-4 control-label text-md-right">國家</label>
                            <div class="col-md-6">
                                <select name="country" id="country" class="form-control">
                                    <option value="" selected></option>

                                    @foreach ($item_country_names as $item_country_name)
                                        @if ($item_country_name->name == old('country'))
                                            <option value="{{ $item_country_name->name }}" selected>{{ $item_country_name->name }}</option>
                                        @else
                                            <option value="{{ $item_country_name->name }}">{{ $item_country_name->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="region" class="col-md-4 control-label text-md-right">產區</label>
                            <div class="col-md-6">
                                <input type="text" name="region" value="{{ old('region') }}" id="region" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="maker" class="col-md-4 control-label text-md-right">酒廠</label>
                            <div class="col-md-6">
                                <input type="text" name="maker" value="{{ old('maker') }}" id="maker" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="brand" class="col-md-4 control-label text-md-right">品牌</label>
                            <div class="col-md-6">
                                <input type="text" name="brand" value="{{ old('brand') }}" id="brand" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="capacity" class="col-md-4 control-label text-md-right">容量</label>
                            <div class="col-md-6">
                                <input type="text" name="capacity" value="{{ old('capacity') }}" id="capacity" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="abv" class="col-md-4 control-label text-md-right">酒精濃度</label>
                            <div class="col-md-6">
                                <input type="text" name="abv" value="{{ old('abv') }}" id="abv" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 control-label text-md-right">價格</label>
                            <div class="col-md-6">
                                <input type="text" name="price" value="{{ old('price') }}" id="price" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="discount" class="col-md-4 control-label text-md-right">折扣</label>
                            <div class="col-md-6">
                                <input type="text" name="discount" value="{{ old('discount') }}" id="discount" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="barcode" class="col-md-4 control-label text-md-right">條碼</label>
                            <div class="col-md-6">
                                <input type="text" name="barcode" value="{{ old('barcode') }}" id="barcode" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="variety" class="col-md-4 control-label text-md-right">品種</label>
                            <div class="col-md-6">
                                <input type="text" name="variety" value="{{ old('variety') }}" id="variety" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tag" class="col-md-4 control-label text-md-right">標記</label>
                            <div class="col-md-6">
                                <textarea name="tag" id="tag" class="form-control">{{ old('tag') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                        <div class="form-group row">
                            <label for="description" class="col-md-4 control-label text-md-right">描述</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="pills-image" role="tabpanel" aria-labelledby="pills-image-tab">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-md-right">正面圖片</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" name="image_front" class="custom-file-input" id="image_front">
                                    <label for="image_front" class="custom-file-label"><span class="file-name">選擇檔案</span></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 control-label text-md-right">背面圖片</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" name="image_back" class="custom-file-input" id="image_back">
                                    <label for="image_back" class="custom-file-label"><span class="file-name">選擇檔案</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-type" role="tabpanel" aria-labelledby="pills-type-tab">
                        <div class="form-group row">
                            <label for="first_genre" class="col-md-4 control-label text-md-right">類型一</label>
                            <div class="col-md-6">
                                <select name="first_genre" id="first_genre" class="form-control">
                                    <option value="" selected></option>

                                    @foreach ($item_first_genre_names as $item_first_genre_name)
                                        @if ($item_first_genre_name->name == old('first_genre'))
                                            <option value="{{ $item_first_genre_name->name }}" selected>{{ $item_first_genre_name->name }}</option>
                                        @else
                                            <option value="{{ $item_first_genre_name->name }}">{{ $item_first_genre_name->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="second_genre" class="col-md-4 control-label text-md-right">類型二</label>
                            <div class="col-md-6">
                                <select name="second_genre" id="second_genre" class="form-control">
                                    <option value="" selected></option>

                                    @foreach ($item_second_genre_names as $item_second_genre_name)
                                        @if ($item_second_genre_name->name == old('second_genre'))
                                            <option value="{{ $item_second_genre_name->name }}" selected>{{ $item_second_genre_name->name }}</option>
                                        @else
                                            <option value="{{ $item_second_genre_name->name }}">{{ $item_second_genre_name->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-unit" role="tabpanel" aria-labelledby="pills-unit-tab">
                        <div class="form-group row">
                            <label for="first_unit" class="col-md-4 control-label text-md-right">單位一</label>
                            <div class="col-md-6">
                                <select name="first_unit" id="first_unit" class="form-control">
                                    <option value="" selected></option>

                                    @foreach ($item_first_unit_names as $item_first_unit_name)
                                        @if ($item_first_unit_name->name == old('first_unit'))
                                            <option value="{{ $item_first_unit_name->name }}" selected>{{ $item_first_unit_name->name }}</option>
                                        @else
                                            <option value="{{ $item_first_unit_name->name }}">{{ $item_first_unit_name->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="second_unit" class="col-md-4 control-label text-md-right">單位二</label>
                            <div class="col-md-6">
                                <select name="second_unit" id="second_unit" class="form-control">
                                    <option value="" selected></option>

                                    @foreach ($item_second_unit_names as $item_second_unit_name)
                                        @if ($item_second_unit_name->name == old('second_unit'))
                                            <option value="{{ $item_second_unit_name->name }}" selected>{{ $item_second_unit_name->name }}</option>
                                        @else
                                            <option value="{{ $item_second_unit_name->name }}">{{ $item_second_unit_name->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-default form-control">
                            確定
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection