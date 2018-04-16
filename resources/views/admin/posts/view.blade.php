@extends('layouts.admin')

@section('content')
    @if (count($post) > 0)
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-wrap">
                    <div>詳細資料</div>
                    
                    <div class="ml-sm-auto">
                        <a href="{{ Route('front.home.index') }}">查看</a>
                        |
                        @if ($previous_post_id)
                            <a href="{{ Route('admin.posts.view', $previous_post_id) }}">上一筆</a>
                        @else
                            <a>上一筆</a>
                        @endif
                        |
                        @if ($next_post_id)
                            <a href="{{ Route('admin.posts.view', $next_post_id) }}">下一筆</a>
                        @else
                            <a>下一筆</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body">
                <dl class="row">
                    <dt class="col-md-4 text-md-right">
                        <div class="outdent-4">日期</div>
                    </dt>
                    <dl class="col-md-8">
                        <div class="outdent-5">{{ date('Y-m-d', strtotime($post->created_at)) }}</div>
                    </dl>
                    <dt class="col-md-4 text-md-right">
                        <div class="outdent-4">標題</div>
                    </dt>
                    <dl class="col-md-8">
                        <div class="outdent-5">{{ $post->title }}</div>
                    </dl>
                    <dt class="col-md-4 text-md-right">
                        <div class="outdent-4">內容</div>
                    </dt>
                    <dl class="col-md-8">
                        <div class="outdent-5">{{ $post->content }}</div>
                    </dl>
                    <dt class="col-md-4 text-md-right">
                        <div class="outdent-4">置頂</div>
                    </dt>
                    <dl class="col-md-8">
                        <div class="outdent-5">@if ($post->pin) 是 @else 否 @endif</div>
                    </dl>
                    <dt class="col-md-4 text-md-right">
                        <div class="outdent-4">修改者</div>
                    </dt>
                    <dl class="col-md-8">
                        <div class="outdent-5">{{ $post->editor }}</div>
                    </dl>
                    <dt class="col-md-4 text-md-right">
                        <div class="outdent-4">建立者</div>
                    </dt>
                    <dl class="col-md-8">
                        <div class="outdent-5">{{ $post->user->name }}</div>
                    </dl>
                </dl>
            </div>
            
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <div class="col-md-4">
                        <button class="btn btn-default form-control" onclick="location.href='{{ route('admin.posts.showUpdateForm', $post->id) }}'">修改</button>
                    </div>
                        
                    <div class="col-md-4">
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
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