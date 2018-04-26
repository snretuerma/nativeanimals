@extends('layouts.newLayout')

@section('title')
  {{ucfirst($type)}} Sales
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <div class="row valign-wrapper">
          <h4>{{ucfirst($type)}} Sales</h4>
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
                     <label for="date_sold">Date Sold</label>
                     <input id="date_sold" type="text" class="datepicker" name="date_sold" required>
                  </div>
               </div>
               {{-- <div class="row">
                  <div class="col s12 m6 l6">
                     <label for="classification">Classification</label>
                     <select id="classification" class="browser-default" name="classification">
                     <option value="egg">Egg</option>
                     <option value="live">Live</option>
                     </select>
                  </div>
               </div> --}}
               <div class="row">
                  <div class="input-field col s12 m6 l6">
                     <input id="quantity" type="number" min="1" name="quantity">
                     <label for="quantity">Quantity</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12 m6 l6">
                     <input id="price" type="number" min="0" name="price">
                     <label for="price">Price/kg or Price/pc</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12 m6 l6">
                     <textarea id="remarks" class="materialize-textarea" name="remarks"></textarea>
                     <label for="remarks">Remarks</label>
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

@endsection
