@extends('layouts.newLayout')

@section('title')
  Family Records
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Family Records</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="col s12 m6 l6">
          <div class="row">
            <div class="col s12 m12 l12">
              <a href="{{route('farm.poultry.add_to_family_animal')}}">
              <div class="card-panel">
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
              <div class="card-panel">
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
  </div>
@endsection

@section('scripts')

@endsection
