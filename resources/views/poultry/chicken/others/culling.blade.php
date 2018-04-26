@extends('layouts.newLayout')

@section('title')
   {{ucfirst($type)}} Mortality
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <div class="row valign-wrapper">
          <h4>{{ucfirst($type)}} Mortality</h4>
      </div>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {!! Form::open([ 'route' => 'farm.poultry.removal_sales_submit', 'method' => 'post']) !!}
               <input type="hidden" name="id" value="{{$id}}">
               <input type="hidden" name="type" value="{{$type}}">
               {{-- @forelse ($animals as $animal)
               @endforelse --}}
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
