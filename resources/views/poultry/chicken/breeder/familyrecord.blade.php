@extends('layouts.newLayout')

@section('title')
  Breeder - Family Record
@endsection

@section('initScriptsAndStyles')
  {{-- s --}}
@endsection

@section('content')
    {{-- <family-record-form :generations="{{$generations}}" lines="{{$lines}}" :pens="{{$pens}}">

    </family-record-form> --}}

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="row valign-wrapper">
          <div class="col s1 m1 l1">
            <a href="{{route('farm.poultry.breeder.familymenu')}}" class="back_button previous round">&#8249;</a>
          </div>
          <div class="col s11 m11 l11">
            <h4>New Family Record</h4>
          </div>
        </div>

        <div class="divider"></div>
          {!! Form::open(['route' => 'farm.chicken.submit_family_record', 'method' => 'post']) !!}
          <div class="row">
            <div class="input-field col s12 m6 l6">
              <input id="family_id" type="text" class="validate" name="family_id">
              <label for="family_id">Family ID</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="date_transferred" type="text" class="datepicker" name="date_transferred">
              <label for="date_transferred">Date Transferred</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l6">
              <select name = "generation" validate>
              <option value="" disabled selected>Choose generation</option>
              @foreach ($generations as $generation)
                <option value="{{$generation->number}}">{{$generation->number}}</option>
              @endforeach
              </select>
              <label>Generation</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l6">
              <input id="date_hatched" type="text" class="datepicker" name="date_hatched">
              <label for="date_hatched">Date Hatched</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l6">
              <select name="line" validate >
              <option value="" disabled selected>Choose line</option>
              @foreach ($lines as $line)
                <option value="{{$line->number}}">{{$line->number}} (Generation : {{$line->getGeneration()->number}})</option>
              @endforeach
              </select>
              <label>Line</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l6">
              <input id="age_first_egg" type="number" min=0 class="validate" name="age_first_egg">
              <label for="age_first_egg">Age at First Egg</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l6">
              <select name = "pen_no" validate>
              <option value="" disabled selected>Choose pen</option>
              @foreach ($pens as $pen)
                <option value="{{$pen->number}}">{{$pen->number}}</option>
              @endforeach
              </select>
              <label>Moved to Pen Number</label>
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
  {{-- <script type="text/javascript" src="/js/vue/createfamily.js"></script> --}}
@endsection
