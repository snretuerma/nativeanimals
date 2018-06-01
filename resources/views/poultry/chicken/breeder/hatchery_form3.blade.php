@extends('layouts.newLayout')

@section('title')
  Hatchery Parameters
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <div class="row valign-wrapper">
        <div class="col s1 m1 l1">
          <a href="{{URL::route('farm.poultry.hatchery_family_log', [$family->id])}}" class="back_button previous round">&#8249;</a>
        </div>
        <div class="col s11 m11 l11">
           <h5>Hatchery Parameters</h5>
        </div>
      </div>
      <div class="row">
         <div class="col s12 m12 l12">
            Family: <strong>{{$family->number}}</strong>
         </div>
      </div>
      <div class="divider"></div>
        <div class="row">
          <div class="col s12 m12 l12">
              {!! Form::open([ 'route' => 'farm.poultry.hatchery_form3_submit', 'method' => 'put']) !!}
                <input type="hidden" name="family" value="{{$family->id}}">
                <input type="hidden" name="chick" value="{{$chick->id}}">
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="hatched_eggs" type="number" class="validate" name="hatched_eggs" min=0 max="{{$chick->fertile_eggs}}" required>
                        <label for="hatched_eggs">No. of Eggs Hatched (pcs)</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <label for="date_hatched">Date Hatched</label>
                        <input id="date_hatched" type="text" class="datepicker" name="date_hatched" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <label for="moved_to_pen">Moved to Brooder Pen No.</label>
                        <select id="moved_to_pen" class="browser-default" name="moved_to_pen" required>
                          <option value="" disabled selected>Moved to Brooder Pen no.</option>
                          @forelse ($pens as $pen)
                            <option value="{{$pen->id}}">{{$pen->number}}</option>
                          @empty
                            <option value="" disabled selected>No Available pens</option>
                          @endforelse
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="remarks" type="text" name="remarks" required>
                        <label for="remarks">Remarks</label>
                      </div>
                    </div>
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
        </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
