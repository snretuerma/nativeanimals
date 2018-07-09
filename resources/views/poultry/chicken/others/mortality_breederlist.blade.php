@extends('layouts.newLayout')

@section('title')
  Breeder Mortality List
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Breeder Mortality List</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
               <div class="row">
                   <div class="col s12 m12 l12">
                     {!! Form::open(['route' => 'farm.poultry.breeder_removal_list_mortality_submit', 'method' => 'post']) !!}
                     @forelse ($familymembers as $member)
                        <div class="row valign-wrapper">
                           <div class="col s12 m6 l6">
                              <input type="checkbox" class="filled-in" id="{{$member->getAnimalInstance()->id}}" name="animal_id[]" value="{{$member->getAnimalInstance()->id}}" />
                              <label for="{{$member->getAnimalInstance()->id}}">{{$member->getAnimalInstance()->registryid}}</label>
                           </div>
                           <div class="input-field col s12 m2 l2">
                              <input id="date_died" type="text" class="datepicker" name="date[]">
                              <label for="date_died">Date Died</label>
                           </div>
                           <div class="col s12 m4 l4">
                              <label>Remarks</label>
                              <select class="browser-default" name="mort_reason[]">
                                 <option value="" disabled selected>Choose your option</option>
                                 <option value="Sickness">Sickness</option>
                                 <option value="Trauma - Natural">Trauma - Natural</option>
                                 <option value="Trauma - Predatory">Trauma - Predatory</option>
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
