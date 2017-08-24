@extends('layouts.default')

@section('title')
	Native Animals PH | Administrator
@endsection

@section('content')
	 <div class="row">
        <div class="col s12 center">
          <h3>Farms</h3>
        </div>
      </div>
      <div class="row">
        <div class="col s4 offset-s4">
          <ul class="tabs">
            <li class="tab col s6"><a href="#grid"><i class="material-icons green-text text-darken-4">view_module</i></a></li>
            <li class="tab col s6"><a href="#list"><i class="material-icons green-text text-darken-4">list</i></a></li>
          </ul>
        </div>
        <div id="grid" class="col s12">
          <div class="row center">
             @foreach($farms as $farm)
				   <div class="col s4 card-panel">
		              <img src="{{asset('images/farmicon.png')}}" width="30%" height="30%">
		              <h4>{{$farm->getName()}}</h4>
		              <p>{{$farm->farm_id}}</p>
		              <p>{{$farm->getEmail()}}</p>
		              <p>{{$farm->mobile_no}}</p>
		            </div>
              @endforeach
         
          </div>
        </div>
        <div id="list" class="col s12">
          <table class="centered highlight">
            <thead>
              <tr>
                  <th>Farm name</th>
                  <th>Farm ID</th>
                  <th>Email</th>
                  <th>Contact number</th>
              </tr>
            </thead>

            <tbody>
              @foreach($farms as $farm)
              <tr>
                <td>{{$farm->getName()}}</td>
                <td>{{$farm->farm_id}}</td>
                <td>{{$farm->getEmail()}}</td>
                <td>{{$farm->mobile_no}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
@endsection