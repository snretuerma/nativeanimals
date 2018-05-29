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
         <h4>Select Family</h4>
      </div>
   </div>
   {!! Form::open(['route' => 'farm.poultry.get_female_content', 'method' => 'post']) !!}
   <input type="hidden" name="add_to_family" value="{{$family_id}}">
   <div class="row">
      <div class="col s12 m12 l12">
         <label for="add_female_family_select">Family</label>
         <select id="add_female_family_select" name = "family" required>
            <option value="" disabled selected>Choose family</option>
            @foreach ($keys as $key)
             <option value="{{$key}}">{{$families[$key][0]->family_number}}</option>
            @endforeach
         </select>

      </div>
      <div class="row">
        <div class="col s12 m12 l12 center">
          <button class="btn waves-effect waves-light yellow darken-3" type="submit">Submit
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
   </div>
   {!!Form::close()!!}
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
