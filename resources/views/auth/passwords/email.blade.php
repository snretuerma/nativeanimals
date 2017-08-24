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

                <form class="row form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

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

                    <div class="row form-group">
                        <div class="col s12 center">
                            <button type="submit" class="btn waves-effect waves-light green darken-4">
                                Send Password Reset Link
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection