@extends('layouts.default')

@section('title')
	Native Animals PH | Administrator
@endsection

@section('content')
	<div class="row">
        <div class="col s10 offset-s1 center" style="padding-bottom:20px;">
          <h3>Welcome, {{ Auth::user()->name }}!</h3>
          <div class="imgoverlay">
            <img src="images/farm.png" height="40%" width="40%"/>
            <div class="overlay"></div>
            <div class="buttons">
              <a onclick="addDetails()" class="btn green waves-effect">Add farm</a><br>
            </div>
          </div>
        </div>
        <div id="farmdetails" style="display:none;">
          <form class="row" method="POST" action="{{route('admin.addFarm')}}">
          	{{ csrf_field() }}
            <div class="col s8 offset-s2">
              <h5 class="center">Farm details</h5>
              <div class="col s8 offset-s2 card-panel">
                <div class="col s10 offset-s1 input-field">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="farmname" type="text" class="validate" name="name">
                  <label for="farmname">Farm name</label>
                </div>
                <div class="col s10 offset-s1 input-field">
                  <i class="material-icons prefix">email</i>
                  <input id="emailadd" type="email" class="validate" name="email">
                  <label for="emailadd">Email address</label>
                </div>
                <div class="col s10 offset-s1 input-field">
                  <i class="material-icons prefix">phone_iphone</i>
                  <input id="mobileno" type="text" class="validate" name="mobile">
                  <label for="mobileno">Mobile number</label>
                </div>
                <div class="col s10 offset-s1 input-field">
                  <i class="material-icons prefix">account_balance</i>
                  <input id="farm_id" type="text" class="validate" name="farm_id">
                  <label for="farm_id">Farm ID</label>
                </div>
                <div class="col s10 offset-s1">
                  <p class="center">Type of farm</p>
                  <div class="row">
                    <div class="col s4">
                      <input id="pig" type="checkbox" class="filled-in" name="farmtype[]" value="pig"/><label for="pig" >Pigs</label>
                    </div>
                    <div class="col s4">
                      <input id="chicken" type="checkbox" class="filled-in" name="farmtype[]" value="chicken"/><label for="chicken" >Chicken</label>
                    </div>
                    <div class="col s4">
                      <input id="duck" type="checkbox" class="filled-in" name="farmtype[]" value="duck"/><label for="duck" >Ducks</label>
                    </div>
                  </div>
                </div>
                <div class="col s6 offset-s3 center">
        					<button class="btn waves-effect waves-light green darken-4" type="submit" name="action">Add<i class="material-icons right">add</i>
        					</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
@endsection