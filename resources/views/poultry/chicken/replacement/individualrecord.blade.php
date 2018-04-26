@extends('layouts.newLayout')

@section('title')
  Replacement - Individual Record
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Individual Record</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {!! Form::open(['route' => 'farm.poultry.get_replacement_individual_record', 'method' => 'post']) !!}
                <div class="row">
                  <div class="col s12 m12 l12">
                      <div class="input-field col s12 m6 l6">
                        <input id="date_hatched" type="text" class="datepicker" name="date_hatched" required>
                        <label for="date_hatched">Date Hatched</label>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="individual_id" type="text" class="validate" name="individual_id" required>
                      <label for="individual_id">Individual ID</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="generation" type="text" class="validate" name="generation" required>
                      <label for="generation">Generation</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="line" type="text" class="validate" name="line" required>
                      <label for="line">Line</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                     <div  class="input-field col s12 m6 l6">
                      <select name = "family" required>
                         <option value="" disabled selected>Choose family</option>
                         @foreach ($families as $family)
                           <option value="{{ $family->id }}">{{ $family->number }}</option>
                         @endforeach
                      </select>
                      <label>Family</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 l12">
                        <div class="input-field col s6 m6 l6">
                          <select name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                          </select>
                          <label>Gender</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                      <div class="input-field col s12 m6 l6">
                        <input id="date_transferred" type="text" class="datepicker" name="date_transferred" required>
                        <label for="date_transferred">Date Transferred</label>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div  class="input-field col s12 m6 l6">
                      <select name = "moved_to_pen" required>
                         <option value="" disabled selected>Choose pen</option>
                         @foreach ($pens as $pen)
                           <option value="{{ $pen->id }}">{{ $pen->number }}</option>
                         @endforeach
                      </select>
                      <label>Moved to Pen Number</label>
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
