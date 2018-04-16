@extends('layouts.front')

@section('content')
    @include('common.errors')

    @include('common.status')

    <form action="{{ route('front.home.contact') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text">連絡我們</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">您的名字</label>
                            <div class="col-md-6">
                                <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">郵件地址</label>
                            <div class="col-md-6">
                                <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">訊息內容</label>
                            <div class="col-md-6">
                                <textarea name="content" id="content" rows="5" class="form-control" required>{{ old('content') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                @if ($agent->isMobile())
                                    {!! NoCaptcha::display(['data-size' => 'compact']) !!}
                                @else
                                    {!! NoCaptcha::display(['data-size' => 'normal']) !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-default form-control">
                                    送出
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection