@extends('layouts.newLayout')

@section('title')
  Breeder Daily Records | Family List
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h5>Breeder Daily Records | Family List</h5>
      <div class="divider"></div>
         <table class="responsive-table centered bordered highlight">
            <thead>
               <tr>
                  <th>Family</th>
                  <th>Pen</th>
                  <th>Records</th>
               </tr>
            </thead>

            <tbody>
               @forelse ($families as $family)
                  <tr>
                     <td>{{$family->number}}</td>
                     <td>{{$family->getPen()->number}}</td>
                     <td><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Show records" href="{{URL::route('farm.poultry.breeder.daily_records', [$family->id])}}"><i class="material-icons">details</i></a></td>
                  </tr>
               @empty
                  <tr>
                     <td></td>
                     <td>No families to show</td>
                     <td></td>
                  </tr>
               @endforelse
            </tbody>
         </table>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
