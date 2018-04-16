@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        
        <div class="d-flex justify-content-center">
            <div class="col-md-8 my-2">
                <div class="card my-5">
                    <div class="card-header">首頁</div>

                    <div class="card-body pt-5 pb-5">
                        您已登入！
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
