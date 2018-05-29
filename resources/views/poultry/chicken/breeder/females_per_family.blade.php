@extends('layouts.newLayout')

@section('title')
  Breeder - Add Female
@endsection

@section('initScriptsAndStyles')
  {{-- s --}}
@endsection

@section('content')
   <div class="row">
      <div class="col s12 m12 l12">
         <h4>{{$family->number}}</h4>
      </div>
   </div>
   {!! Form::open(['route' => 'farm.poultry.add_female', 'method' => 'post']) !!}
      <input type="hidden" name="add_to_family" value="{{$add_to_family}}">
      <input type="hidden" name="family_id" value="{{$family->id}}">
      <div class="row">
         <div class="col s12 m12 l12">
            <div class="row">
               @forelse ($females as $female)
                  <div class="col 12 m6 l6">
                     <input name="animals[]" value="{{$female->id}}" type="checkbox" class="filled-in" id="{{$female->id}}" />
                     <label for="{{$female->id}}">{{$female->registryid}}</label>
                  </div>
               @empty
                  <div class="col 12 m12 l12 center-align">
                     No female to display
                  </div>
               @endforelse

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
@endsection

@section('scripts')
   <script type="text/javascript" src="/js/poultry/ajax_requests.js"></script>
   @if(Session::has('add-female-empty'))
      <script>
         Materialize.toast('No female animal selected', 4000)
      </script>
   @elseif (Session::has('add-female-success'))
      <script>
         Materialize.toast('Animals added', 4000)
      </script>
   @endif
@endsection
