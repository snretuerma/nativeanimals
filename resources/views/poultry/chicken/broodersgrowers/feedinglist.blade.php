@extends('layouts.newLayout')

@section('title')
  Feeding List for Brooders & Growers
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 l12">
      <h4>Brooders & Growers Feeding Record List</h4>
      <div class="divider"></div>
      <table class="centered responsive-table bordered">
        <thead>
          <tr>
              <th>Family</th>
              <th>Date Eggs Set</th>
              <th>Brooding</th>
              <th>Hardening</th>
              <th>Growing</th>
          </tr>
        </thead>

        <tbody>
          @forelse ($chicks as $chick)
            <tr>
              <td>{{$chick->getFamily()}}</td>
               <td>{{$chick->date_eggs_set}}</td>
               @if (substr($chick->feeding, 0, 1) == 0)
                  <td class="center"><a href="{{ URL::route('farm.poultry.broodersgrowers_feedingrecord', ['id' => $chick->id, 'record' => 'brooding']) }}"><i class="material-icons">add_circle</i></a></td>
               @else
                  <td class="center"><i class="material-icons">add_circle</i></td>
               @endif

               @if (substr($chick->feeding, 1, 1) == 0)
                  <td class="center"><a href="{{ URL::route('farm.poultry.broodersgrowers_feedingrecord', ['id' => $chick->id, 'record' => 'hardening']) }}"><i class="material-icons">add_circle</i></a></td>
               @else
                  <td class="center"><i class="material-icons">add_circle</i></td>
               @endif

               @if (substr($chick->feeding, 2, 1) == 0)
                  <td class="center"><a href="{{ URL::route('farm.poultry.broodersgrowers_feedingrecord', ['id' => $chick->id, 'record' => 'growing']) }}"><i class="material-icons">add_circle</i></a></td>
               @else
                  <td class="center"><i class="material-icons">add_circle</i></td>
               @endif
            </tr>
          @empty
            <tr>
              <td></td>
              <td></td>
              <td>No Data</td>
              <td></td>
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
