@extends('layouts.admin')

@section('content')
    @if (!empty($item_element))
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-wrap">
                    <div>詳細資料</div>
                    
                    <div class="ml-sm-auto">
                        @if ($previous_item_element_id)
                            <a href="{{ Route('admin.itemElements.view', $previous_item_element_id) }}"><i class="fas fa-angle-double-left"></i> 上一筆</a>
                        @else
                            <a><i class="fas fa-angle-double-left"></i> 上一筆</a>
                        @endif
                        ・
                        @if ($next_item_element_id)
                            <a href="{{ Route('admin.itemElements.view', $next_item_element_id) }}">下一筆 <i class="fas fa-angle-double-right"></i></a>
                        @else
                            <a>下一筆 <i class="fas fa-angle-double-right"></i></a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body">
                <dl class="row">
                    <dt class="col-md-4 text-md-right">
                        <div class="outdent-4">類型</div>
                    </dt>
                    <dl class="col-md-8">
                        <div class="outdent-5">{{ $item_element->type }}</div>
                    </dl>
                    <dt class="col-md-4 text-md-right">
                        <div class="outdent-4">名字</div>
                    </dt>
                    <dl class="col-md-8">
                        <div class="outdent-5">{{ $item_element->name }}</div>
                    </dl>
                    <dt class="col-md-4 text-md-right">
                        <div class="outdent-4">排序</div>
                    </dt>
                    <dl class="col-md-8">
                        <div class="outdent-5">{{ $item_element->order }}</div>
                    </dl>
                </dl>
            </div>
            
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <div class="col-md-4">
                        <button class="btn btn-default form-control" onclick="location.href='{{ route('admin.itemElements.showUpdateForm', $item_element->id) }}'">修改</button>
                    </div>
                        
                    <div class="col-md-4">
                        <form action="{{ route('admin.itemElements.destroy', $item_element->id) }}" method="POST">
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
