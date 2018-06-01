@extends('layouts.newLayout')

@section('title')
  Breeder Egg Quality | {{$family->number}}
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <div class="row">
         <div class="col s12 m12 l12">
            <h5>Egg Quality Records</h5>
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
            <table class="responsive-table centered bordered highlight">
               <thead>
                  <tr>
                     <th>Week</th>
                     <th>Sample No.</th>
                     <th>Weight</th>
                     <th>Color</th>
                     <th>Shape</th>
                     <th>Length</th>
                     <th>Width</th>
                     <th>Albumen Height</th>
                     <th>Albumen Weight</th>
                     <th>Yolk Weight</th>
                     <th>Yolk Color</th>
                     <th>Shell Weight</th>
                     <th>Top Thickness</th>
                     <th>Middle Thickness</th>
                     <th>Bottom Thickness</th>
                     <th>Edit</th>
                  </tr>
               </thead>

               <tbody>
                  @forelse ($eggqualities as $eggquality)
                     <tr>
                        <td>{{$eggquality->egg_quality_at}}</td>
                        <td>{{$eggquality->sample_no}}</td>
                        <td>{{$eggquality->egg_weight}}</td>
                        <td>{{$eggquality->egg_color}}</td>
                        <td>{{$eggquality->egg_shape}}</td>
                        <td>{{$eggquality->egg_length}}</td>
                        <td>{{$eggquality->egg_width}}</td>
                        <td>{{$eggquality->albumen_height}}</td>
                        <td>{{$eggquality->albumen_weight}}</td>
                        <td>{{$eggquality->yolk_weight}}</td>
                        <td>{{$eggquality->yolk_color}}</td>
                        <td>{{$eggquality->shell_weight}}</td>
                        <td>{{$eggquality->thickness_top}}</td>
                        <td>{{$eggquality->thickness_mid}}</td>
                        <td>{{$eggquality->thickness_bot}}</td>
                        <td><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Edit entry" href="{{URL::route('farm.poultry.page_egg_quality_family_edit', [$eggquality->id])}}"><i class="material-icons">edit</i></a></td>
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
                        <td>No Record</td>
                        <td></td>
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
                  {{ $eggqualities->links() }}
               </div>
            </div>
         </div>
      </div>
      <div class="fixed-action-btn">
        <a data-position="left" data-delay="50" data-tooltip="Add family data" href="{{URL::route('farm.poultry.page_egg_quality_family_form', [$family->id])}}" class="btn-floating btn-large yellow darken-3 tooltipped">
          <i class="large material-icons">add</i>
        </a>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
