@extends('layouts.admin')

@section('content')
    @if (count($item_elements) > 0)
        <table class="table table-hover table-flexible">
            <thead>
                <tr>
                    <th>名字</th>
                    <th>類型</th>
                    <th class="sm-display">排序</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item_elements as $item_element)
                    <tr>
                        <td>
                            <a href="{{ route("admin.itemElements.view", $item_element->id) }}">{{$item_element->name}}</a>
                        </td>
                        <td>
                            {{$item_element->type}}
                        </td>
                        <td class="sm-display">
                            {{$item_element->order}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            
        <div class="d-flex justify-content-center box-item-pagination">
            @if ($agent->isMobile())
                {{ $item_elements->links('vendor.pagination.simple-bootstrap-4') }}
            @else
                {{ $item_elements->links('vendor.pagination.bootstrap-4') }}
            @endif
        </div>
    @endif
@endsection
