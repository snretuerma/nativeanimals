@extends('layouts.default')

@section('title')
	Native Animals PH | Home
@endsection

@section('content')
<div class="row">
	<div class="col s10 offset-s1 center">
		<h3>Welcome, {{ Auth::user()->name }}!</h3>

	</div>
</div>
@endsection