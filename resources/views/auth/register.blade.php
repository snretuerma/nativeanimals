@extends('layouts.default')

@section('title')
    Register - Native Animals PH
@endsection

@section('content')
<div style="padding-top: 30px;"></div>
<div class="container">
    <div class="row">
        <div class="col s10 offset-s1 card-panel">
            <h3 class="center">Register</h3>
            <div class="row">
                <form class="col s12 center" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required autofocus>
                            <label for="name">Name</label>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
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

                    <div class="row form-group">
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">content_copy</i>
                            <input id="password-confirm" type="password" class="validate" name="password_confirmation" required>
                            <label for="password-confirm">Confirm Password</label>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col s12">
                            <button type="submit" class="btn waves-effect waves-light teal">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
