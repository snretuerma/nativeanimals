@extends('layouts.newLayout')

@section('title')
  Replacement : Feeding Performance
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h5>Replacement : Feeding Performance</h5>
      <div class="divider"></div>
      <div class="row">
         <div class="col s12 m12 l12">
            Pen Number: <strong>{{$pen->number}}</strong>
         </div>
      </div>

      <div class="row">
          <div class="col s12 m12 l12">
            {!! Form::open([ 'route' => 'farm.poultry.replacement.feeding_fetch', 'method' => 'post']) !!}
            <input type="hidden" name="pen_id" value="{{$pen->id}}">
             <div class="row">
               <div class="col s12 m12 l12">
                   <div class="col s12 m6 l6">
                      <label for="date_fed">Date Fed</label>
                      <input id="date_fed" type="text" class="datepicker" name="date_fed">
                   </div>
               </div>
             </div>
             <div class="row">
               <div class="col s12 m12 l12">
                 <div class="input-field col s12 m6 l6">
                   <input id="amount_offered" type="number" min=0 class="validate" name="amount_offered" step="any">
                   <label for="amount_offered">Amount of Concentrates Offered (g)</label>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col s12 m12 l12">
                 <div class="input-field col s12 m6 l6">
                   <input id="amount_refused" type="number" min=0 class="validate" name="amount_refused" step="any">
                   <label for="amount_refused">Amount of Concentrates Refusal (g)</label>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col s12 m12 l12">
                 <div class="input-field col s12 m6 l6">
                   <input id="remarks" type="text" class="validate" name="remarks">
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
            {!!Form::close()!!}
          </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
   <script type="text/javascript" src="/js/poultry/replacement_feeding_form.js"></script>
@endsection
