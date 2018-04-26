@extends('layouts.newLayout')

@section('title')
  Brooders & Growers : Feeding Performance
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Brooders and Growers : Feeding Performance</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="row">
                    <div class="col s12 m6 l6">
                      Generation: <strong><u>{{$chick->getGeneration()}}</u></strong>
                    </div>
                    <div class="col s12 m6 l6">
                      Line: <strong><u>{{$chick->getLine()}}</u></strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12 m6 l6">
                      Family: <strong><u>{{$chick->getFamily()}}</u></strong>
                    </div>
                    <div class="col s12 m6 l6">
                      Pen No./Batch No.: <strong><u>{{$chick->getPen()}}</u></strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12 m6 l6">
                      Entry Date: <strong><u></u></strong>
                    </div>
                    <div class="col s12 m6 l6">
                      Exit Date: <strong><u></u></strong>
                    </div>
                  </div>
                </div>
              </div>
              {!! Form::open([ 'route' => 'farm.poultry.submit_broodersgrowers_feedingrecord', 'method' => 'post']) !!}
                <div class="row">
                  <div class="col s12 m12 l12">
                    Stage: <h5>{{ucfirst($record)}}</h5>
                  </div>
                  <input type="hidden" name="id" value="{{$chick->id}}">
                  <input type="hidden" name="weight_at" value="{{$record}}">
                </div>
                <div class="row">
                 <div class="col s12 m12 l12">
                   <div class="row">
                     <div class="col s12 m12 l12">
                       <div class="input-field col s6 m6 l6">
                         <select name="month">
                           <option value="" disabled selected>Select Month</option>
                           <option value="January">January</option>
                           <option value="February">February</option>
                           <option value="March">March</option>
                           <option value="April">April</option>
                           <option value="May">May</option>
                           <option value="June">June</option>
                           <option value="July">July</option>
                           <option value="August">August</option>
                           <option value="September">September</option>
                           <option value="October">October</option>
                           <option value="November">November</option>
                           <option value="December">December</option>
                         </select>
                         <label>Month</label>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                      <div class="input-field col s12 m6 l6">
                        <input id="date_collected" type="text" class="datepicker" name="date_collected">
                        <label for="date_collected">Date Collected</label>
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
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="mortality" type="text" class="validate" name="mortality">
                      <label for="mortality">Mortality</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="culled" type="text" class="validate" name="culled">
                      <label for="culled">Culled</label>
                    </div>
                  </div>
                </div>
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

@endsection
