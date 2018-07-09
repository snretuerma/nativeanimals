@extends('layouts.newLayout')

@section('title')
  Breeder Daily Records | {{$family->number}}
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
   <div class="row">
      <div class="col s12 m12 l12">
         <div class="row">
            <div class="col s112 s12 l12">
               <h5>Breeder Feeding Record</h5>
            </div>
            <div class="col s12 l6 m6">
               Family: <strong>{{$family->number}}</strong>
            </div>
            <div class="col s12 l6 m6">
               Pen: <strong>{{$family->getPen()->number}}</strong>
            </div>
         </div>
         @if ($errors->any())
            <div class="row">
               <div class="col s12 m12 l12">
                  <div class="card-panel red lighten-5">
                     <ul>
                        @foreach ($errors->all() as $error)
                           <li><strong>{{ $error }}</strong></li>
                        @endforeach
                     </ul>
                  </div>
               </div>
            </div>
         @endif
         {!! Form::open(['route' => 'farm.poultry.breeder.daily_records_feeding_record_submit', 'method' => 'post']) !!}
            <div class="row">
                <div class="col s12 m12 l12">
                   <input type="hidden" name="family" value="{{$family->id}}">
                   <input type="hidden" name="pen" value="{{$family->getPen()->id}}">
                   <div class="row">
                     <div class="col s12 m12 l12">
                        <div class="col s12 m6 l6">
                           <label for="date_collected">Date Collected</label>
                           <input id="date_collected" type="text" class="datepicker" name="date_collected" required>
                        </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col s12 m12 l12">
                      <div class="input-field col s12 m6 l6">
                         <input id="amount_offered" type="number" min=0 step="any" class="validate" name="amount_offered" required>
                         <label for="amount_offered">Amount of Concentrates Offered (g)</label>
                      </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col s12 m12 l12">
                      <div class="input-field col s12 m6 l6">
                         <input id="amount_refused" type="number" min=0 step="any" class="validate" name="amount_refused" required>
                         <label for="amount_refused">Amount of Concentrates Refused (g)</label>
                      </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col s12 m12 l12">
                      <div class="input-field col s12 m6 l6">
                         <input id="remarks" type="text" name="remarks">
                         <label for="remarks">Remarks</label>
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
                </div>
            </div>
         {!!Form::close()!!}
      </div>
   </div>
@endsection

@section('scripts')
   @if(Session::has('add-feeding_rec-success'))
      <script>
         Materialize.toast('Egg production recorded', 4000)
      </script>
   @endif
@endsection
