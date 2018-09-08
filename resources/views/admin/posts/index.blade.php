@extends('layouts.admin')

@section('content')
    @if (count($posts) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>日期</th>
                    <th>標題</th>
                    <th class="sm-display"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ date('Y-m-d', strtotime($post->created_at)) }}</td>
                        <td>
                            <a href="{{ route("admin.posts.view", $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </td>
                        <td class="sm-display">@if($post->pin) <i class="fas fa-thumbtack text-danger"></i> @endif</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            
        <div class="d-flex justify-content-center box-post-pagination">
            @if ($agent->isMobile())
                {{ $posts->links('vendor.pagination.simple-bootstrap-4') }}
            @else
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
            @endif
        </div>
    @endif
@endsection