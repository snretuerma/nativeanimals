@extends('layouts.newLayout')

@section('title')
  Breeder - Family Record
@endsection

@section('initScriptsAndStyles')
@endsection

@section('content')
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="row valign-wrapper">
          <div class="col s1 m1 l1">
            <a href="{{route('farm.poultry.breeder.familymenu')}}" class="back_button previous round tooltipped" data-position="bottom" data-delay="50" data-tooltip="Back to family list">&#8249;</a>
          </div>
          <div class="col s11 m11 l11">
            <h4>New Family Record</h4>
          </div>
        </div>

        <div class="divider"></div>
          {!! Form::open(['route' => 'farm.poultry.submit_family_record', 'method' => 'post']) !!}
          <div class="row">
            <div class="input-field col s12 m6 l6">
              <input id="family_id" type="text" class="validate" name="family_id">
              <label for="family_id">Family ID</label>
            </div>
          </div>
          <div class="row">
            <div class="col s6">
               <label for="date_transferred">Date Transferred</label>
               <input id="date_transferred" type="text" class="datepicker" name="date_transferred">
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6 l6">
               <label for="generation">Generation</label>
              <select id="generation" class="validate browser-default" name="generation">
                <option value="" disabled selected>Choose Generation</option>
                @forelse ($generations as $generation)
                  <option class="chosen_generation" data-genid="{{$generation->id}}" value="{{$generation->id}}">{{$generation->number}}</option>
                @empty
                  <option value="" disabled selected>No Available Generation</option>
                @endforelse
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6 l6">
               <label for="date_hatched">Date Hatched</label>
               <input id="date_hatched" type="text" class="datepicker" name="date_hatched">
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6 l6">
               <label for="line">Line</label>
              <select id="line" class="validate browser-default" name="line" disabled="disabled">
               <option value="" disabled selected>Choose Line</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6 l6">
               <label for="date_first_egg">Date of First Egg</label>
               <input id="date_first_egg" type="text" min=0 class="datepicker" name="date_first_egg">
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6 l6">
              <label for="pen_no">Moved to Pen Number</label>
              <select id="pen_no" class="validate browser-default" name = "pen_no" validate>
              <option value="" disabled selected>Choose pen</option>
              @foreach ($pens as $pen)
                <option value="{{$pen->id}}">{{$pen->number}}</option>
              @endforeach
              </select>

            </div>
          </div>
          <div class="row">
            <div class="row">
              <div class="col s12 m12 l12 center">
                <button class="btn waves-effect waves-light yellow darken-3" type="submit">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
          </div>
          {!!Form::close()!!}
      </div>
    </div>

@endsection

@section('scripts')
  <script type="text/javascript" src="/js/poultry/ajax_requests.js"></script>
  @if(Session::has('family-create'))
     <script>
        Materialize.toast('Family Added', 4000)
     </script>
  @elseif(Session::has('family-fail'))
    <script>
        Materialize.toast('Family Creation Failed', 4000)
    </script>
  @endif
@endsection
