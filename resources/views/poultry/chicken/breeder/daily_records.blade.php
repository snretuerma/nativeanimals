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
            <div class="card-panel">
              {!! Form::open([ 'method' => 'post']) !!}
              <div class="row">
                <div class="input-field col s12">
                  <select name="family">
                    <option value="" disabled selected>Choose family</option>
                    <option value="1">Family 1</option>
                    <option value="2">Family 2</option>
                    <option value="3">Family 3</option>
                  </select>
                <label>Family</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12 m12 l12">
                  <ul class="collapsible" data-collapsible="accordion">
                    <li>
                      <div class="collapsible-header"><h5>Egg Production</h5></div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s12 m12 l12">
                            <div class="row">
                              <div class="col s12 m12 l12">
                                <div class="row">
                                  <div class="input-field col s12 m12 l12">
                                    <input id="date_eggs_collected" type="text" class="datepicker">
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
                                  <div class="input-field col s12 m6 l6">
                                    <input id="feed_offered" type="number" min=0 class="validate" name="feed_offered">
                                    <label for="feed_offered">Feed Offered (g)</label>
                                  </div>
                                  <div class="input-field col s12 m6 l6">
                                    <input id="feed_refused" type="number" min=0 class="validate" name="feed_refused">
                                    <label for="feed_refused">Feed Refused (g)</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col s12 m12 l12">
                                <div class="row">
                                  <div class="input-field col s12 m6 l6">
                                    <input id="mortality" type="number" min=0 class="validate" name="mortality">
                                    <label for="mortality">No. of Dead Birds</label>
                                  </div>
                                  <div class="input-field col s12 m6 l6">
                                    <input id="culled" type="number" min=0 class="validate" name="culled">
                                    <label for="culled">No. of Culled Birds</label>
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
                    </li>
                    <li>
                      <div class="collapsible-header"><h5>Feeding Record</h5></div>
                      <div class="collapsible-body">
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
                            <div class="row">
                              <div class="col s12 m12 l12">
                                <div class="input-field col s12 m6 l6">
                                  <input id="pen" type="text" class="validate" name="pen">
                                  <label for="pen">Pen No.</label>
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
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header"><h5>Mortality and Culling Record</h5></div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s12 m12 l12">
                            <h6>Mortality</h6>
                            <div class="input-field col s12 m12 l12">
                              <input  id="mortality" type="number" class="validate" name="mortality" min=0>
                              <label for="mortality">Number of Mortalities</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                              <select>
                              <option value="" disabled selected>Choose your option</option>
                              <option value="1">Animal 1</option>
                              <option value="2">Animal 2</option>
                              <option value="3">Animal 3</option>
                              </select>
                              <label>Animal ID</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                              <select>
                              <option value="" disabled selected>Choose your option</option>
                              <option value="1">Sickness</option>
                              <option value="2">Trauma - Natural</option>
                              <option value="3">Trauma - Predatory</option>
                              </select>
                              <label>Remarks</label>
                            </div>
                            <h6>Culling</h6>
                            <div class="input-field col s12 m12 l12">
                              <input  id="culling" type="number" class="validate" name="culling" min=0>
                              <label for="culling">Number of Culled</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                              <select>
                              <option value="" disabled selected>Choose your option</option>
                              <option value="1">Animal 1</option>
                              <option value="2">Animal 2</option>
                              <option value="3">Animal 3</option>
                              </select>
                              <label>Animal ID</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                              <select>
                              <option value="" disabled selected>Choose your option</option>
                              <option value="1">Sickness</option>
                              <option value="2">Unproductive</option>
                              <option value="3">Off-colored</option>
                              </select>
                              <label>Remarks</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <div class="center">
                    <button class="btn waves-effect waves-light yellow darken-3" type="submit" name="action">Submit
                      <i class="material-icons right">send</i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
