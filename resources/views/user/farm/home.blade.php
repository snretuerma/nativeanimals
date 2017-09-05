@extends('layouts.farm')

@section('title')
	Native Animals PH | Home
@endsection

@section('content')

<div class="row">
	<div class="col s10 center">
		<h3>Welcome, {{ Auth::user()->name }}!</h3>

		<div class="row center">
			<div class="col s4 card-panel">
				<img src="images/pigbody.png" height="90" width="90" />
		        <a href="#!" class="btn btn-flat waves-effect waves-light">Pigs</a>
		    </div>
		    <div class="col s4 card-panel">
				<img src="images/duckbody.png" height="90" width="90" />
		        <a href="#!" class="btn btn-flat waves-effect waves-light">Ducks</a>
		    </div>
        </div>

	</div>
</div>
@endsection