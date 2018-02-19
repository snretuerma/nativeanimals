@extends('layouts.newLayout')

@section('title')
  Breeder - Hatchery Parameters {{-- Specify if breeder or replacement when backend added through variable passed --}}
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Hatchery Parameters</h4> {{-- Specify if breeder or replacement when backend added through variable passed --}}
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {!! Form::open([ 'method' => 'post']) !!}
                <div class="row">
                  <div class="input-field col s12">
                    <select name="family">
                      <option value="" disabled selected>Choose family</option>
                      <option value="1">Family 1</option>
                      <option value="2">Family 2</option>
                      <option value="3">Family 3</option>
                    </select>
                  <label>Family</label>
                  </div>
                </div>

                {{-- structure  row -> col -> col: input-field --}}
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="date_eggs_set" type="text" class="datepicker" name="date_eggs_set">
                        <label for="date_eggs_set">Date Egg Set</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="generation" type="text" class="validate" name="generation">
                        <label for="generation">Generation of Parents</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="line" type="text" class="validate" name="line">
                        <label for="line">Line</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="family" type="text" class="validate" name="family">
                        <label for="family">Family</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="pen" type="text" class="validate" name="pen">
                        <label for="pen">Pen No.</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      {{-- Compute based from the age of the Family / Age of Family based on date eggs collected --}}

                      {{-- <div class="input-field col s12 m6 l6">
                        <input id="week_taken" type="text" class="validate" name="week_taken">
                        <label for="week_taken">Week of Lay Taken When Eggs Were Collected</label>
                      </div> --}}
                      {{-- <div class="input-field col s12 m6 l6">
                        <input id="date_eggs_set" type="text" class="datepicker" name="date_eggs_set">
                        <label for="date_eggs_set">Date Eggs Set</label>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="no_eggs_set" type="number" class="validate" name="no_eggs_set" min=0>
                        <label for="no_eggs_set">No. of Eggs Set (pcs)</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="no_fertile" type="number" class="validate" name="no_fertile" min=0>
                        <label for="no_fertile">No. of Fertile Eggs</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="date_hatched" type="text" class="datepicker" name="date_hatched">
                        <label for="date_hatched">Date Hatched</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="no_eggs_hatched" type="number" class="validate" name="no_eggs_hatched" min=0>
                        <label for="no_eggs_hatched">No. of Hatched Eggs</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="moved_to_pen" type="text" class="validate" name="moved_to_pen" required>
                        <label for="moved_to_pen">Moved to Brooder Pen No.</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="remarks" type="text" class="validate" name="remarks" placeholder="i.e. ID Code, Color Code">
                        <label for="remarks">Remarks</label>
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
