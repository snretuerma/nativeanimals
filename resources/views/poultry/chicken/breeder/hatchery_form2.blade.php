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
              {!! Form::open([ 'route' => 'farm.poultry.hatchery_form2_submit', 'method' => 'put']) !!}
                <input type="hidden" name="family" value="{{$family->id}}">
                <input type="hidden" name="chick" value="{{$chick->id}}">

                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="fertile_eggs" type="number" class="validate" name="fertile_eggs" min=0 max="{{$chick->number_eggs_set}}">
                        <label for="fertile_eggs">No. of Fertile Eggs (pcs)</label>
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
@endsection

@section('scripts')

@endsection
