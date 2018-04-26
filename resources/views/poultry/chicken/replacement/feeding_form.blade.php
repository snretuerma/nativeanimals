@extends('layouts.newLayout')

@section('title')
  Replacement : Feeding Performance
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Replacement : Feeding Performance</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {!! Form::open([ 'route' => 'farm.poultry.replacement.feeding_fetch', 'method' => 'post']) !!}
                <div class="row">
                  <div class="col s12 m12 l12">
                    Stage: <h5>Replacement Stock</h5>
                  </div>
                  <input type="hidden" name="id" value="{{$animal->id}}">
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                      <div class="input-field col s12 m6 l6">
                        <input id="date_fed" type="text" class="datepicker" name="date_fed">
                        <label for="date_fed">Date Fed</label>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="feed_offered" type="text" class="validate" name="feed_offered" placeholder="i.e. Concentrates, Vegetables, Trimmings, etc">
                      <label for="feed_offered">Feed Offered</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                         <input id="feed_refused" type="text" class="validate" name="feed_refused" placeholder="i.e. Concentrates, Vegetables, Trimmings, etc">
                      <label for="feed_refused">Feed Refused</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="type_offered" type="text" class="validate" name="type_offered" placeholder="i.e. Concentrates, Vegetables, Trimmings, etc">
                      <label for="type_offered">Type of Feed Offered</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="amount_offered" type="number" min=0 class="validate" name="amount_offered">
                      <label for="amount_offered">Amount of Feed Offered (g)</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="amount_refused" type="number" min=0 class="validate" name="amount_refused">
                      <label for="amount_refused">Amount of Feed Refusal (g)</label>
                    </div>
                  </div>
                </div>
                {{-- <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="col s12 m6 l6">
                        <div>
                           Mortality
                        </div>
                        <div class="switch">
                           <label>
                              No
                              <input id="mortality_switch" name="mortality" type="checkbox">
                              <span class="lever"></span>
                              Yes
                           </label>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                     <label>Reason</label>
                     <select id="mortality_select" name="mort_reason" class="browser-default" disabled="disabled">
                        <option value="" disabled selected>Choose reason</option>
                        <option value="Sickness">Sickness</option>
                        <option value="Trauma - Natural">Trauma - Natural</option>
                        <option value="Trauma - Predatory">Trauma - Predatory</option>
                     </select>
                    </div>
                  </div>
                </div> --}}
                {{-- <div class="row">
                   <div class="col s12 m12 l12">
                    <div class="col s12 m6 l6">
                        <div>
                           Culling
                        </div>
                        <div class="switch">
                           <label>
                              No
                              <input id="culling_switch" name="culling" type="checkbox">
                              <span class="lever"></span>
                              Yes
                           </label>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                     <label>Reason</label>
                     <select id="culling_select" name="cull_reason" class="browser-default" disabled="disabled">
                        <option value="" disabled selected>Choose reason</option>
                        <option value="Sickness">Sickness</option>
                        <option value="Unproductive">Unproductive</option>
                        <option value="Off-colored">Off-colored</option>
                     </select>
                    </div>
                  </div>
                </div> --}}
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="remarks" type="text" class="validate" name="remarks">
                      <label for="remarks">Remarks</label>
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
    </div>
  </div>
@endsection

@section('scripts')
   <script type="text/javascript" src="/js/poultry/replacement_feeding_form.js"></script>
@endsection
