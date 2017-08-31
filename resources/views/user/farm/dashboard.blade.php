@extends('layouts.default')

@section('title')
	Native Animals PH | Home
@endsection

@section('content')
<<<<<<< HEAD
	<div class="row">
		<div class="col s12 m12 l12">
			Authenticated
		</div>
	</div>
=======

<div class="row">
	<div class="col s10 offset-s1 center">
		<h3>Welcome, {{ Auth::user()->name }}!</h3>

		
	</div>
</div>
>>>>>>> upstream/master
@endsection