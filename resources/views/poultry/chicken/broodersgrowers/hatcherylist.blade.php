@extends('layouts.newLayout')

@section('title')
  Hatchery List
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 l12">
      <h4>Hatchery List</h4>
      <div class="divider"></div>
      <table class="centered responsive-table bordered">
        <thead>
          <tr>
              <th>Family</th>
              <th>Date Eggs Set</th>
              <th>Complete Record</th>
          </tr>
        </thead>

        <tbody>
          @forelse ($chicks as $chick)
            <tr>
              <td>{{$chick->getFamily()}}</td>
               <td>{{$chick->date_eggs_set}}</td>
               <td><a href="{{URL::route('farm.poultry.complete_hatchery_page', [$chick->id])}}"><i class="material-icons">edit</i></a></td>
            </tr>
          @empty
            <tr>
              <td></td>
              <td>No Data</td>
              <td></td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="fixed-action-btn">
      <a href="{{route('farm.poultry.page_hatchery_parameters')}}" class="btn-floating btn-large yellow darken-3">
        <i class="large material-icons">add</i>
      </a>
    </div>
  </div>

@endsection

@section('scripts')

@endsection
