@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-4 mt-5">
            <div class="card my-5">
                <div class="card-header">登入</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">帳號</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">密碼</label>
                            
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" id="remember" @if (old('remember')) checked @endif }}>
                                <label class="custom-control-label" for="remember">記住我</label>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                確定
                            </button>
                        </div>
                            
                        <div class="form-group text-center">
                            <a href="{{ route('password.request') }}">
                                忘記密碼？
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
