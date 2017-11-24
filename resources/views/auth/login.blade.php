@extends('layouts.default')

@section('title')
  Login - Native Animals PH
@endsection

@section('content')
  <div class="col s12 m12 l12 offset-s6">
    <div class="row">
      <div class="col s12 m12 l12" >
        <img id="login_logo" src="images/logo-default.png" alt="Native Animals">
      </div>
    </div>
    <div class="row">
      <div class="col s12 m12 l12 center-align">
        <a id="login_button" class="amber darken-1 waves-effect waves-light btn-large" href="{{url('login/google')}}">Login with Google</a>
      </div>
    </div>
  </div>
@endsection
