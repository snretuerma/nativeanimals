@extends('layouts.newLayout')

@section('title')
  Daily Records
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Daily Records</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            {{-- <div class="card-panel"> --}}
              {!! Form::open(['route' => 'farm.poultry.breeder.fetch.daily', 'method' => 'post']) !!}
              <div class="row">
                <div class="col s12 m12 l12">
                  <select class="browser-default" id="select_family" name="family">
                    <option value="" disabled selected>Choose family</option>
                    @forelse ($families as $family)
                      <option class="chosen_family" data-id="{{$family->id}}" value="{{$family->id}}">{{$family->number}}</option>
                    @empty
                      <option value="" disabled>No Available Families</option>
                    @endforelse
                  </select>
                <label>Family</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12 m12 l12">
                  <ul class="tabs">
                    <li id="head1" class="tab col s3 m3 l3"><a href="#tab1">Egg Production</a></li>
                    <li id="head2" class="tab col s3 m3 l3"><a href="#tab2">Feeding Record</a></li>
                    <li id="head3" class="tab col s3 m4 l3 disabled"><a href="#tab3">Mortality Record</a></li>
                    <li id="head4" class="tab col s3 m3 l3 disabled"><a href="#tab4">Culling Record</a></li>
                  </ul>
                </div>
                <div id="tab1" class="col s12">
                  <div class="row">
                    <div class="col s12 m12 l12">
                      <div class="row">
                        <div class="col s12 m12 l12">
                           <div class="row">
                             <div class="input-field col s12 m12 l12">
                              <input id="date_eggs_collected" type="text" class="datepicker" name="date_eggs_collected">
                              <label for="date_eggs_collected">Date Eggs Collected</label>
                             </div>
                           </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 m12 l12">
                           <div class="row">
                             <div class="input-field col s12 m6 l6">
                              <input id="total_eggs_collected" type="number" min=0 class="validate" name="total_eggs_collected">
                              <label for="total_eggs_collected">Total Eggs Collected</label>
                             </div>
                             <div class="input-field col s12 m6 l6">
                              <input id="total_egg_weight" type="text" class="validate" name="total_egg_weight">
                              <label for="total_egg_weight">Total Egg Weight (g)</label>
                             </div>
                           </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 m12 l12">
                           <div class="row">
                             <div class="input-field col s12 m6 l6">
                              <input id="no_broken" type="number" min=0 class="validate" name="no_broken">
                              <label for="no_broken">No. of Broken Eggs</label>
                             </div>
                             <div class="input-field col s12 m6 l6">
                              <input id="no_shell" type="number" min=0 class="validate" name="no_shell">
                              <label for="no_shell">No. of Soft-shelled/Shell-less</label>
                             </div>
                           </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 m12 l12">
                           <div class="row">
                             <div class="input-field col s12 m12 l12">
                              <input id="remarks" type="text" class="validate" name="remarks">
                              <label for="remarks">Remarks</label>
                             </div>
                           </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="tab2" class="col s12">
                  <div class="row">
                   <div class="col s12 m12 l12">
                      <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="input-field col s12 m6 l6">
                              <input id="date_collected" type="text" class="datepicker" name="date_collected">
                              <label for="date_collected">Date Collected</label>
                            </div>
                        </div>
                      </div>
                      {{-- <div class="row">
                        <div class="col s12 m12 l12">
                         <div class="col s12 m6 l6">
                            <input id="pen" type="hidden" class="validate" name="pen" value="">
                         </div>
                        </div>
                      </div> --}}
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
                            <input id="type_refused" type="text" class="validate" name="type_refused" placeholder="i.e. Concentrates, Vegetables, Trimmings, etc">
                            <label for="type_refused">Type of Feed Refused</label>
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
                            <input id="remarks" type="text" name="remarks">
                            <label for="remarks">Remarks</label>
                         </div>
                        </div>
                      </div>
                   </div>
                  </div>
                </div>
                <div id="tab3" class="col s12">
                  <div class="row">
                     <div id="mortality_form" class="col s12 m12 l12">
                        <div class="row">
                          <div class="col s6 l6 m6">

                          </div>
                          <div class="col s6 l6 m6">

                          </div>
                        </div>
                     </div>
                  </div>
                </div>
                <div id="tab4" class="col s12">
                  <div class="row">
                   <div id="culling_form" class="col s12 m12 l12">
                      <div class="row">
                        <div class="col s6 l6 m6">

                        </div>
                        <div class="col s6 l6 m6">

                        </div>
                      </div>
                   </div>
                  </div>
                </div>
                  <div class="center">
                     <button class="btn waves-effect waves-light yellow darken-3" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                     </button>
                  </div>
              </div>
            {{-- </div> --}}
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
   <script type="text/javascript" src="/js/poultry/daily_records_page.js"></script>
@endsection
