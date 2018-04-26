@extends('layouts.newLayout')

@section('title')
   Growth Performance
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Growth Performance
         @if ($record == '0')
            at Day 0
         @elseif ($record == '21')
            at Day 21
         @elseif ($record == '45')
            at Day 45
         @elseif ($record == '75')
            at Day 75
         @elseif ($record == '100')
            at Day 100
         @elseif ($record == '120')
            at Day 120
         @endif
      </h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
               <div class="row">
                  <div class="col s12 l6 m6">
                     ID: <strong>{{$chick->id}}</strong>
                  </div>
                  <div class="col s12 l6 m6">
                     Date Hatched: <strong>{{$chick->date_hatched}}</strong>
                  </div>
               </div>
               <div class="row">
                  <div class="col s12 l6 m6">
                     Generation: <strong>{{$chick->getGeneration()}}</strong>
                  </div>
                  <div class="col s12 l6 m6">
                     Line: <strong>{{$chick->getLine()}}</strong>
                  </div>
               </div>
               <div class="row">
                  <div class="col s12 l6 m6">
                     Family: <strong>{{$chick->getFamily()}}</strong>
                  </div>
                  <div class="col s12 l6 m6">
                     Pen: <strong>{{$chick->getPen()}}</strong>
                  </div>
               </div>
              {!! Form::open(['route' => 'farm.poultry.replacement_growth_performance_save', 'method' => 'post']) !!}
               <input type="hidden" name="weight_at" value="{{$record}}">
               <input type="hidden" name="animal_id" value="{{$chick->id}}">
                <div class="row">
                  <div class="col s12 m12 l12">
                      <div class="input-field col s12 m6 l6">
                        <input id="date_collected" type="text" class="datepicker" name="date_collected" required>
                        <label for="date_collected">Date Collected</label>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="m_quantity" type="number" min=0 max="{{$chick->hatched_eggs}}" lass="validate" name="m_quantity" required>
                      <label for="m_quantity">Male Quantity</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                      <input id="m_weight" type="number" min=0 class="validate" name="m_weight" required>
                      <label for="m_weight">Male Weight</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m12 l12">
                     <div class="input-field col s12 m6 l6">
                      <input id="f_quantity" type="number" min=0 max="{{$chick->hatched_eggs}}" class="validate" name="f_quantity" required>
                      <label for="f_quantity">Female Quantity</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                      <input id="f_weight" type="number" min=0 class="validate" name="f_weight" required>
                      <label for="f_weight">Female Weight</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m12 l12">
                     <div class="input-field col s12 m6 l6">
                      <input id="t_quantity" type="number" min=0 max="{{$chick->hatched_eggs}}" class="validate" name="t_quantity" required>
                      <label for="t_quantity">Total Quantity</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                      <input id="t_weight" type="number" min=0 class="validate" name="t_weight" required>
                      <label for="t_weight">Total Weight</label>
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
