@extends('layouts.newLayout')

@section('title')
  Hatchery Parameters
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <div class="row valign-wrapper">
        <div class="col s1 m1 l1">
          <a href="{{route('farm.poultry.complete_hatchery_list')}}" class="back_button previous round">&#8249;</a>
        </div>
        <div class="col s11 m11 l11">
           <h4>Hatchery Parameters</h4>
        </div>
      </div>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {!! Form::open([ 'route' => 'farm.poultry.fetch_hatchery_parameters', 'method' => 'post']) !!}
                <div class="row">
                  <div class="input-field col s12">
                    <select name="family">
                      <option value="" disabled selected>Choose family</option>
                      @forelse ($families as $family)
                          <option value="{{$family->id}}">{{$family->number}}</option>
                      @empty
                        <option value="" disabled selected>No Available families</option>
                      @endforelse
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
                        <select class="validate" name="generation">
                          <option value="" disabled selected>Choose Generation</option>
                          @forelse ($generations as $generation)
                              <option value="{{$generation->id}}">{{$generation->number}}</option>
                          @empty
                            <option value="" disabled selected>No Available generations</option>
                          @endforelse
                        </select>
                        <label>Generation of Parents</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <select class="validate" name="line">
                          <option value="" disabled selected>Choose Line</option>
                          @forelse ($lines as $line)
                              <option value="{{$line->id}}">{{$line->number}} (Generation : {{$line->getGeneration()->number}})</option>
                          @empty
                            <option value="" disabled selected>No Available lines</option>
                          @endforelse
                        </select>
                        <label>Line</label>
                      </div>
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
                      {{-- <div class="input-field col s12 m6 l6">
                        <input id="no_fertile" type="number" class="validate" name="no_fertile" min=0>
                        <label for="no_fertile">No. of Fertile Eggs</label>
                      </div> --}}
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
                {{-- <div class="row">
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
                      <div class="input-field col s12 m6 l6">
                        <select id="moved_to_pen" class="validate" name="moved_to_pen">
                          <option value="" disabled selected>Moved to Brooder Pen no.</option>
                          @forelse ($pens as $pen)
                              <option value="{{$pen->id}}">{{$pen->number}}</option>
                          @empty
                            <option value="" disabled selected>No Available pens</option>
                          @endforelse
                        </select>
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
                </div> --}}
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
