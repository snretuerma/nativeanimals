@extends('layouts.newLayout')

@section('title')
  Egg Quality | Family List
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 l12">
      <h5>Egg Qulaity | Family List</h5>
      <div class="divider"></div>
      <table class="centered responsive-table bordered">
        <thead>
          <tr>
              <th>Number</th>
              <th>Status</th>
              <th>Pen Number</th>
              <th>Records</th>
          </tr>
        </thead>

        <tbody>
          @forelse ($families as $family)
            <tr>
              <td>{{$family->number}}</td>
              @if ($family->is_active)
                <td>Active</td>
              @else
                <td>Inactive</td>
              @endif
              <td>{{$family->getPen()->number}}</td>
              <td><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Show egg quality record for family" href="{{URL::route('farm.poultry.page_egg_quality_family_log', [$family->id])}}"><i class="material-icons">list</i></a></td>
            </tr>
          @empty
            <tr>
              <td></td>
              <td>No Family</td>
              <td></td>
              <td></td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="row center">
       <div class="col s12 m12 l12">
          {{ $families->links() }}
       </div>
    </div>

  </div>

@endsection

@section('scripts')

@endsection
