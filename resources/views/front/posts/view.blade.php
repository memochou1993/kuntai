@extends('layouts.front')

@section('content')
    @if (!empty($post))
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-wrap">
                    <div><a href="{{ URL::previous() }}">回上一頁</a></div>
                    
                    <div class="ml-sm-auto">
                        @if ($previous_post_id)
                            <a href="{{ Route('front.posts.view', $previous_post_id) }}">上一則</a>
                        @else
                            <a>上一則</a>
                        @endif
                        |
                        @if ($next_post_id)
                            <a href="{{ Route('front.posts.view', $next_post_id) }}">下一則</a>
                        @else
                            <a>下一則</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="mr-sm-auto px-3">
                        {{ $post->title }}
                    </div>
                    <div class="ml-sm-auto px-3">
                        {{ date('Y-m-d', strtotime($post->created_at)) }}
                    </div>
                </div>
                <div class="row">
                    <div class="px-3">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection