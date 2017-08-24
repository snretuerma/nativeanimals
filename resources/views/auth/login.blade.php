@extends('layouts.default')

@section('title')
    Login - Native Animals PH
@endsection

@section('content')
<div style="padding-top: 30px;"></div>
<div class="container">
    <div class="row">
        <div class="col s10 offset-s1 card-panel">
            <h3 class="center">Login</h3>
            <div class="row">
                <form class="col s12 center" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>
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
                            <input id="pw" type="password" class="validate" name="password" required>
                            <label for="pw">Password</label>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col s12 center">
                            <input id="rememberme" type="checkbox" class="filled-in" name="remember" {{ old('remember') ? 'checked' : '' }} /><label for="rememberme">Remember Me</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col s12">
                            <button type="submit" class="btn waves-effect waves-light green darken-4">
                                Login
                            </button>

                            <a class="green-text text-darken-4" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
