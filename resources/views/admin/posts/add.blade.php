@extends('layouts.admin')

@section('content')
    @include('common.errors')

    <form action="{{ route('admin.posts.add') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="card">
            <div class="card-header">新增</div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">標題</label>
                    <div class="col-md-6">
                        <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="content" class="col-md-4 col-form-label text-md-right">內容</label>
                    <div class="col-md-6">
                        <textarea name="content" class="form-control" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">置頂</label>
                    <div class="col-md-6">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="pin_true" name="pin" value="1" class="custom-control-input">
                            <label class="custom-control-label" for="pin_true">是</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="pin_false" name="pin" value="0"  class="custom-control-input">
                            <label class="custom-control-label" for="pin_false">否</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-default form-control">
                            確定
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection