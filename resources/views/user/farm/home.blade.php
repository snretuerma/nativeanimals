@extends('layouts.default')

@section('title')
	Native Animals PH | Authenticate
@endsection

@section('content')
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="card-panel center">
				<h4>Authentication Code</h4>
				<form method="POST" action="{{route('farm.confirmAuthenticationCode')}}">
					{{ csrf_field() }}
					<div class="row">
						<div class="input-field col s12 m8 l6 offset-l3 offset-m2">
							<i class="material-icons prefix">vpn_key</i>
							<input id="auth_code" type="password" class="validate" name="auth_code">
							<label for="auth_code">Authentication Code</label>
						</div>
					</div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Authenticate</button>
				</form>
			</div>
		</div>
	</div>
@endsection