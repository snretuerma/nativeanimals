@extends('layouts.newLayout')

@section('title')
  Family List
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  {{-- <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Family Records</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="col s12 m6 l6">
          <div class="row">
            <div class="col s12 m12 l12">
              <a href="{{route('farm.poultry.add_to_family_animal')}}">
              <div class="card-panel hoverable">
                <div class="row">
                  <div class="col s12 m12 l12 center">
                    <h5>Add to Family</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12 center">
                    <i class="far fa-plus-square"></i>
                  </div>
                </div>
              </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l6">
          <div class="row">
            <a href="{{ route('farm.poultry.page_family_record') }}">
            <div class="col s12 m12 l12">
              <div class="card-panel hoverable">
                <div class="row">
                  <div class="col s12 m12 l12 center">
                    <h5>Create Family</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12 center">
                    <i class="fas fa-plus-square"></i>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <div class="row">
    <div class="col s12 m12 l12">
      <h4>Family List</h4>
      <div class="divider"></div>
      <table class="centered responsive-table bordered">
        <thead>
          <tr>
              <th>Number</th>
              <th>Status</th>
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
              <td><a href="{{URL::route('farm.chicken.add_animals_to_family', [$family->id])}}"><i class="material-icons">add</i></a></td>
            </tr>
          @empty
            <tr>
              <td></td>
              <td>No Families</td>
              <td></td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="fixed-action-btn">
      <a href="{{route('farm.poultry.page_add_family')}}" class="btn-floating btn-large yellow darken-3">
        <i class="large material-icons">add</i>
      </a>
    </div>
  </div>

@endsection

@section('scripts')

@endsection
