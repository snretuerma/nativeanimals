@extends('layouts.farm')

@section('title')
	Native Animals PH | Home
@endsection

@section('content')

<div class="row">
	<div class="col s10 center">
		<h3>Welcome, {{ Auth::user()->name }}!</h3>

		
	</div>
</div>
@endsection