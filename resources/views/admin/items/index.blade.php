@extends('layouts.admin')

@section('content')
    @if (count($items) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="sm-display text-center">ID</th>
                    <th>中文名稱</th>
                    <th class="lg-display">原文名稱</th>
                    <th class="md-display">年分</th>
                    <th class="xl-display">國家</th>
                    <th class="xl-display">產區</th>
                    <th class="xl-display">酒廠</th>
                    <th class="xl-display">品種</th>
                    <th class="xl-display">品牌</th>
                    <th class="md-display">價格</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td class="sm-display text-center">{{ $item->id }}</td>
                        <td>
                            <a href="{{ route("admin.items.view", $item->id) }}">{{ $item->first_name }}</a>
                        </td>
                        <td class="lg-display">{{ $item->second_name }}</td>
                        <td class="md-display">{{ $item->year }}</td>
                        <td class="xl-display">{{ $item->country }}</td>
                        <td class="xl-display">{{ $item->region }}</td>
                        <td class="xl-display">{{ $item->maker }}</td>
                        <td class="xl-display">{{ $item->variety }}</td>
                        <td class="xl-display">{{ $item->brand }}</td>
                        <td class="md-display">NTD$ {{ $item->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            
        <div class="d-flex justify-content-center box-item-pagination">
            @if ($agent->isMobile())
                {{ $items->links('vendor.pagination.simple-bootstrap-4') }}
            @else
                {{ $items->links('vendor.pagination.bootstrap-4') }}
            @endif
        </div>
    @endif
@endsection
