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
          <a href="{{URL::route('farm.poultry.hatchery_family_log', [$family->id])}}" class="back_button previous round">&#8249;</a>
        </div>
        <div class="col s11 m11 l11">
           <h5>Hatchery Parameters</h5>
        </div>
      </div>
      <div class="row">
         <div class="col s12 m12 l12">
            Family: <strong>{{$family->number}}</strong>
         </div>
      </div>
      <div class="divider"></div>
        <div class="row">
          <div class="col s12 m12 l12">
              {!! Form::open([ 'route' => 'farm.poultry.hatchery_form1_submit', 'method' => 'post']) !!}
                <input type="hidden" name="family" value="{{$family->id}}">
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <label for="date_eggs_set">Date Egg Set</label>
                        <input id="date_eggs_set" type="text" class="datepicker" name="date_eggs_set">
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
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
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
@endsection

@section('scripts')

@endsection