@extends('layouts.newLayout')

@section('title')
  Brooders and Growers Mortality
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <div class="row valign-wrapper">
          <h4>Brooders and Growers Mortality</h4>
      </div>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {!! Form::open([ 'route' => 'farm.poultry.removal_sales_submit', 'method' => 'post']) !!}
               <input type="hidden" name="id" value="{{$id}}">
               <input type="hidden" name="type" value="{{$type}}">
               <div class="row">
                  <div class="col s12 m6 l6">
                     <label for="date_sold">Date Died</label>
                     <input id="date_sold" type="text" class="datepicker" name="date_died" required>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12 m6 l6">
                     <input id="number_male" type="number" min="0" name="number_male">
                     <label for="number_male">Number of Male</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12 m6 l6">
                     <input id="number_female" type="number" min="0" name="number_female">
                     <label for="number_female">Number of Female</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12 m6 l6">
                     <input id="total" type="number" min="1" name="quantity">
                     {{-- <label for="total">Total</label> --}}
                  </div>
               </div>
               <div class="row">
                  <div class="col s12 m6 l6">
                     <label>Remarks</label>
                     <select class="browser-default" name="mort_reason">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="Sickness">Sickness</option>
                        <option value="Trauma - Natural">Trauma - Natural</option>
                        <option value="Trauma - Predatory">Trauma - Predatory</option>
                     </select>
                  </div>
               </div>
               <div class="row center">
                  <button class="btn waves-effect waves-light yellow darken-3" type="submit">Submit
                     <i class="material-icons right">send</i>
                  </button>
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
   <script type="text/javascript"  src="/js/poultry/mortality_form.js"></script>
@endsection
