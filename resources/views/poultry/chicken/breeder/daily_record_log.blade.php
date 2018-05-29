@extends('layouts.newLayout')

@section('title')
  Breeder Daily Records | {{$family->number}}
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <div class="row">
         <div class="col s12 m12 l12">
            <h5>Breeder Daily Records</h5>
         </div>
         <div class="col s12 m6 l6">
            <strong>Family: {{$family->number}}</strong>
         </div>
         <div class="col s12 m6 l6">
            <strong>Pen: {{$family->getPen()->number}}</strong>
         </div>
      </div>
      <div class="row">
         <div class="col s12">
            <ul class="tabs tabs-fixed-width">
               <li class="tab col s6 m6 l6"><a class="active" href="#egg_production">Egg Production</a></li>
               <li class="tab col s6 m6 l6"><a href="#feeding_record">Feeding Records</a></li>
            </ul>
         </div>
         <div id="egg_production" class="col s12">
            <table class="responsive-table centered bordered highlight">
               <thead>
                  <tr>
                     <th>Date Collected</th>
                     <th>Number of Intact</th>
                     <th>Total Weight</th>
                     <th>Average Weight</th>
                     <th>Broken</th>
                     <th>Soft-shelled/Shell-less</th>
                     <th>Edit</th>
                  </tr>
               </thead>

               <tbody>
                  @forelse ($eggcollections as $eggcollection)
                     <tr>
                        <td>{{$eggcollection->date_collected}}</td>
                        <td>{{$eggcollection->number_of_eggs}}</td>
                        <td>{{$eggcollection->weight}}</td>
                        <td>{{$eggcollection->weight/$eggcollection->number_of_eggs}}</td>
                        <td>{{$eggcollection->broken_eggs}}</td>
                        <td>{{$eggcollection->soft_shelled_eggs}}</td>
                        <td><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Edit entry" href="{{URL::route('farm.poultry.breeder.daily_records_egg_prod_edit', [$eggcollection->id])}}"><i class="material-icons">edit</i></a></td>
                     </tr>
                  @empty
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                  @endforelse
               </tbody>
            </table>
            <div class="row center-align">
               <div class="col s12 m12 l12">
                  {{ $eggcollections->links() }}
               </div>
            </div>
         </div>
         <div id="feeding_record" class="col s12">
            <table class="responsive-table centered bordered highlight">
               <thead>
                  <tr>
                     <th>Date Fed</th>
                     <th>Type Offered</th>
                     <th>Type Refused</th>
                     <th>Amount Offered</th>
                     <th>Amount Refused</th>
                     <th>Edit</th>
                  </tr>
               </thead>

               <tbody>
                  @forelse ($feedings as $feeding)
                     <tr>
                        <td>{{$feeding->date_fed}}</td>
                        <td>{{$feeding->type_offered}}</td>
                        <td>{{$feeding->type_refused}}</td>
                        <td>{{$feeding->amount_offered}}</td>
                        <td>{{$feeding->amount_refused}}</td>
                        <td><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Edit entry" href="{{URL::route('farm.poultry.breeder.daily_records_feeding_record_edit', [$feeding->id])}}"><i class="material-icons">edit</i></a></td>
                     </tr>
                  @empty
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                  @endforelse
               </tbody>
            </table>
            <div class="row center-align">
               <div class="col s12 m12 l12">
                  {{ $feedings->links() }}
               </div>
            </div>
         </div>
      </div>
      <div class="fixed-action-btn">
         <a class="btn-floating btn-large amber darken-3 tooltipped" data-position="left" data-delay="50" data-tooltip="Add Records">
            <i class="fas fa-plus"></i>
         </a>
         <ul>
         <li><a href="{{URL::route('farm.poultry.breeder.daily_records_egg_prod', [$family->id])}}" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-delay="50" data-tooltip="Add Egg Collection Record"><i class="far fa-list-alt"></i></a></li>
         <li><a href="{{URL::route('farm.poultry.breeder.daily_records_feeding_record', [$family->id])}}" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-delay="50" data-tooltip="Add Feeding Record"><i class="fas fa-utensils"></i></a></li>
         </ul>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
