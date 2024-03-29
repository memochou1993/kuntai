@extends('layouts.admin')

@section('content')
    @include('common.errors')

    @if (!empty($item_element))
        <form action="{{ route('admin.itemElements.update', $item_element->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="card">
                <div class="card-header">修改</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="type" class="col-md-4 control-label text-md-right">類型</label>
                        <div class="col-md-6">
                            <select name="type" id="type" class="form-control" required>
                                <option value="" disabled></option>

                                @foreach ($item_element_types as $item_element_type)
                                    @if ($item_element_type->type == $item_element->type)
                                        <option value="{{ $item_element_type->type }}" selected>{{ $item_element_type->type }}</option>
                                    @else
                                        <option value="{{ $item_element_type->type }}">{{ $item_element_type->type }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 control-label text-md-right">名字</label>
                        <div class="col-md-6">
                            <input type="text" name="name" value="{{ $item_element->name }}" id="name" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="order" class="col-md-4 control-label text-md-right">排序</label>
                        <div class="col-md-6">
                            <input type="text" name="order" value="{{ $item_element->order }}" id="order" class="form-control">
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
    @endif
@endsection
