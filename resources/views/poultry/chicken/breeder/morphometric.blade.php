@extends('layouts.newLayout')

@section('title')
  Breeder - Morphometric Characteristics {{-- Specify if breeder or replacement when backend added through variable passed --}}
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Morphometric Characteristics</h4> {{-- Specify if breeder or replacement when backend added through variable passed --}}
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="row">
                    <div class="col s12 m6 l6">
                      Province: <strong><u></u></strong>
                    </div>
                    <div class="col s12 m6 l6">
                      Generation: <strong><u></u></strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12 m6 l6">
                      Farm ID: <strong><u></u></strong>
                    </div>
                    <div class="col s12 m6 l6">
                      Line: <strong><u></u></strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12 m6 l6">
                      Breed Name: <strong><u></u></strong>
                    </div>
                    <div class="col s12 m6 l6">
                      Family: <strong><u></u></strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12 m6 l6">
                      Date Collected: <strong><u></u></strong>
                    </div>
                    <div class="col s12 m6 l6">
                      Animal Type: <strong><u>Chicken</u></strong>
                    </div>
                  </div>
                </div>
              </div>
              {!! Form::open([ 'method' => 'post']) !!}
                {{-- structure  row -> col -> col: input-field --}}
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s6 m6 l6">
                        <select>
                          <option value="" disabled selected>Select Gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                        <label>Gender</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="id_no" type="text" class="validate" name="id_no">
                        <label for="id_no">ID Number</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Date of Hatch
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input type="text" class="datepicker" name="date_hatched">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="body_weight" type="number" class="validate" name="body_weight" min=0>
                        <label for="body_weight">Body Weight (kg)</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="height" type="number" class="validate" name="height" min=0>
                        <label for="height">Height (cm)</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="body_length" type="number" class="validate" name="body_length" min=0>
                        <label for="body_length">Body Length (cm)</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="chest_circumference" type="number" class="validate" name="chest_circumference" min=0>
                        <label for="chest_circumference">Chest Circumference (cm)</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="wing_span" type="number" class="validate" name="wing_span" min=0>
                        <label for="wing_span">Wing Span (cm)</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="shank_length" type="number" class="validate" name="shank_length" min=0>
                        <label for="shank_length">Shank Length (cm)</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Date at First Lay
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input type="text" class="datepicker" name="date_first_lay">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12 center">
                    <button class="btn waves-effect waves-light yellow darken-3" type="submit">Submit
                      <i class="material-icons right">send</i>
                    </button>
                  </div>
                </div>
              {!!Form::close()!!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
