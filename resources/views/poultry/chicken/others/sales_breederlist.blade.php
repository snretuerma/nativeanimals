@extends('layouts.newLayout')

@section('title')
  Breeder Sales List
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Breeder Sales List</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
               <div class="row">
                   <div class="col s12 m12 l12">
                     {!! Form::open(['route' => 'farm.poultry.breeder_removal_list_sales_submit', 'method' => 'post']) !!}
                     @forelse ($familymembers as $member)
                        <div class="row valign-wrapper">
                           <div class="col s12 m5 l5">
                              <input type="checkbox" class="filled-in" id="{{$member->id}}" name="animal_id[]" value="{{$member->id}}" />
                              <label for="{{$member->id}}">{{$member->registryid}}</label>
                           </div>
                           <div class="input-field col s12 m2 l2">
                              <input id="price" type="number" min="0" name="price[]">
                              <label for="price">Price/kg</label>
                           </div>
                           <div class="input-field col s12 m2 l2">
                              <input id="date_sold" type="text" class="datepicker" name="date[]">
                              <label for="date_sold">Date Sold</label>
                           </div>
                           <div class="col s12 m3 l3">
                              <label>Remarks</label>
                              <select class="browser-default" name="sales_reason[]">
                                 <option value="" disabled selected>Choose your option</option>
                                 <option value="Sickness">Sickness</option>
                                 <option value="Unproductive">Unproductive</option>
                                 <option value="Off-colored">Off-colored</option>
                              </select>
                           </div>
                        </div>
                     @empty
                        <div class="row">
                           <div class="col s12 m12 l12 center">
                              No Animal in the Selected Family
                           </div>
                        </div>
                     @endforelse

                     <div class="row valign-wrapper">
                        <div class="col s12 m12 l12 center">
                           <button class="btn waves-effect waves-light yellow darken-3" type="submit" name="action">Submit
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
    </div>
  </div>
@endsection

@section('scripts')

@endsection
