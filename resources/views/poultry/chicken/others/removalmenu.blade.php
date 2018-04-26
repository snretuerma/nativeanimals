@extends('layouts.newLayout')

@section('title')
  Animal Removal Menu
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Animal Removal Menu</h4>
      <div class="divider"></div>
      <div class="row center-align">
         <div class="col s12 m6 l6">
            <a href="{{ route('farm.poultry.breeder_family_removal_list') }}">
               <div id="breeder_removal_card" class="card-panel hoverable yellow lighten-3 black-text">
                  Breeders
               </div>
            </a>
         </div>
         <div class="col s12 m6 l6">
            <a href="{{ route('farm.poultry.replacement_family_removal_list') }}">
               <div id="replacement_removal_card" class="card-panel hoverable yellow lighten-3 black-text">
                  Replacement
               </div>
            </a>
         </div>
         <div class="col s12 m6 l6">
            <a href="{{ route('farm.poultry.broodersgrowers_removal_list') }}">
               <div id="broodersgrowers_removal_card" class="card-panel hoverable yellow lighten-3 black-text">
                  Brooders & Growers
               </div>
            </a>
         </div>
         <div class="col s12 m6 l6">
            <a href="{{ URL::route('farm.poultry.removal_sales_form', ['null', "egg"]) }}">
               <div id="broodersgrowers_removal_card" class="card-panel hoverable yellow lighten-3 black-text">
                  Eggs
               </div>
            </a>
         </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
