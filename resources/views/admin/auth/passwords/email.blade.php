@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-4 mt-5">
            <div class="card my-5">
                <div class="card-header">忘記密碼</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">電子郵件</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                送出重設密碼連結
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
