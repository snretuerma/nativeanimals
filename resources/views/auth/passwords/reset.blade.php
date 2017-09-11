@extends('layouts.default')

@section('title')
    Reset Password - Native Animals PH
@endsection

@section('content')
<div style="padding-top: 30px;"></div>
<div class="container">
    <div class="row">
        <div class="col s10 offset-s1 card-panel">
            <h3 class="center">Reset Password</h3>
            <div class="row">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="col s12 center" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" class="validate" name="email" value="{{ $email or old('email') }}" required autofocus>
                            <label for="email">Email Address</label>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="password" type="password" class="validate" name="password" required>
                            <label for="password">Password</label> 

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="input-field s8 offset-s2">
                            <i class="material-icons prefix">content_copy</i>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col s12">
                            <button type="submit" class="btn waves-effect waves-light teal">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
