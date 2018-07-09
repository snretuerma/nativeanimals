@extends('layouts.newLayout')

@section('title')
  Family List
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 l12">
      <h4>Family List</h4>
      <div class="divider"></div>
      <table class="centered responsive-table bordered">
        <thead>
          <tr>
              <th>Number</th>
              <th>Status</th>
              <th>Pen Number</th>
              <th>Add Animals</th>
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
              <td>{{$family->pen_number}}</td>
              <td><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Add animals to family" href="{{URL::route('farm.chicken.add_animals_to_family', [$family->id])}}"><i class="material-icons">add</i></a></td>
            </tr>
          @empty
            <tr>
              <td></td>
              <td></td>
              <td>No Families</td>
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

    <div class="fixed-action-btn">
      <a data-position="left" data-delay="50" data-tooltip="Add family data" href="{{route('farm.poultry.page_add_family')}}" class="btn-floating btn-large yellow darken-3 tooltipped">
        <i class="large material-icons">add</i>
      </a>
    </div>
  </div>

@endsection

@section('scripts')

@endsection
