@extends('layouts.newLayout')

@section('title')
  Breeder - Phenotypic Characteristics {{-- Specify if breeder or replacement when backend added through variable passed --}}
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Phenotypic Characteristics</h4> {{-- Specify if breeder or replacement when backend added through variable passed --}}
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="row">
                    <div class="col s12 m6 l6">
                      Province: <strong><u></u></strong>
                    </div>
                    <div class="col s12 m6 l6">
                      Generation: <strong><u></u></strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12 m6 l6">
                      Farm ID: <strong><u></u></strong>
                    </div>
                    <div class="col s12 m6 l6">
                      Line: <strong><u></u></strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12 m6 l6">
                      Breed Name: <strong><u></u></strong>
                    </div>
                    <div class="col s12 m6 l6">
                      Family: <strong><u></u></strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12 m6 l6">
                      Date Collected: <strong><u></u></strong>
                    </div>
                    <div class="col s12 m6 l6">
                      Animal Type: <strong><u>Chicken</u></strong>
                    </div>
                  </div>
                </div>
              </div>
              {!! Form::open([ 'method' => 'post']) !!}
                {{-- structure  row -> col -> col: input-field --}}
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s6 m6 l6">
                        <select>
                          <option value="" disabled selected>Select Gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                        <label>Gender</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="id_no" type="text" class="validate" name="id_no">
                        <label for="id_no">ID Number</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Plummage Color
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="plummage_color" type="radio" id="plummage_color_white"  />
                        <label for="plummage_color_white">White</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="plummage_color" type="radio" id="plummage_color_black"  />
                        <label for="plummage_color_black">Black</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="plummage_color" type="radio" id="plummage_color_red"  />
                        <label for="plummage_color_red">Red</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="plummage_color" type="radio" id="plummage_color_redblack"  />
                        <label for="plummage_color_redblack">Red-Black</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="plummage_color" type="radio" id="plummage_color_orange"  />
                        <label for="plummage_color_orange">Orange</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="plummage_color" type="radio" id="plummage_color_brown"  />
                        <label for="plummage_color_brown">Brown</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="plummage_color_others" type="text" class="validate" name="plummage_color_others">
                        <label for="plummage_color_others">Others</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Plummage Pattern
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="plummage_pattern" type="radio" id="plummage_pattern_plain"  />
                        <label for="plummage_pattern_plain">Plain</label>
                      </div>
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="plummage_pattern" type="radio" id="plummage_pattern_barred"  />
                        <label for="plummage_pattern_barred">Barred</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="plummage_pattern_others" type="text" class="validate" name="plummage_pattern_others">
                        <label for="plummage_pattern_others">Others</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Body Carriage
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="body_carriage" type="radio" id="body_carriage_upright"  />
                        <label for="body_carriage_upright">Upright</label>
                      </div>
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="body_carriage" type="radio" id="body_carriage_slight"  />
                        <label for="body_carriage_slight">Slight Upright</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="body_carriage_others" type="text" class="validate" name="body_carriage_others">
                        <label for="body_carriage_others">Others</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Comb Type
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="comb_type" type="radio" id="comb_type_single"  />
                        <label for="comb_type_single">Single</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="comb_type" type="radio" id="comb_type_pea"  />
                        <label for="comb_type_pea">Pea</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="comb_type" type="radio" id="comb_type_rose"  />
                        <label for="comb_type_rose">Rose</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="comb_type_others" type="text" class="validate" name="comb_type_others">
                        <label for="comb_type_others">Others</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Comb Color
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="comb_color" type="radio" id="comb_color_red"  />
                        <label for="comb_color_red">Red</label>
                      </div>
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="comb_color" type="radio" id="comb_color_pink"  />
                        <label for="comb_color_pink">Pink</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="comb_color_others" type="text" class="validate" name="comb_color_others">
                        <label for="comb_color_others">Others</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Earlobe Color
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="earlobe_color" type="radio" id="earlobe_color_white"  />
                        <label for="earlobe_color_white">White</label>
                      </div>
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="earlobe_color" type="radio" id="earlobe_color_red"  />
                        <label for="earlobe_color_red">Red</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="earlobe_color_others" type="text" class="validate" name="earlobe_color_others">
                        <label for="earlobe_color_others">Others</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Shank Color
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="shank_color" type="radio" id="shank_color_white"  />
                        <label for="shank_color_white">White</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="shank_color" type="radio" id="shank_color_black"  />
                        <label for="shank_color_black">Black</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="shank_color" type="radio" id="shank_color_yellow"  />
                        <label for="shank_color_yellow">Yellow</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="shank_color" type="radio" id="shank_color_green"  />
                        <label for="shank_color_green">Green</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="shank_color" type="radio" id="shank_color_bluish"  />
                        <label for="shank_color_bluish">Bluish-grey</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="earlobe_color_others" type="text" class="validate" name="earlobe_color_others">
                        <label for="earlobe_color_others">Others</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Skin Color
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="skin_color" type="radio" id="skin_color_white"  />
                        <label for="skin_color_white">White</label>
                      </div>
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="skin_color" type="radio" id="skin_color_yellow"  />
                        <label for="skin_color_yellow">Yellow</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="skin_color_others" type="text" class="validate" name="skin_color_others">
                        <label for="skin_color_others">Others</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Skin Color
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="iris_color" type="radio" id="iris_color_red"  />
                        <label for="iris_color_red">Red</label>
                      </div>
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="iris_color" type="radio" id="iris_color_orange"  />
                        <label for="iris_color_orange">Orange</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="iris_color" type="radio" id="iris_color_brown"  />
                        <label for="iris_color_brown">Brown</label>
                      </div>
                      <div class="col s12 m6 l6">
                        <input class="with-gap" name="iris_color" type="radio" id="iris_color_yellow"  />
                        <label for="iris_color_yellow">Yellow</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="iris_color_others" type="text" class="validate" name="iris_color_others">
                        <label for="iris_color_others">Others</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Beak Color
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="beak_color" type="radio" id="beak_color_white"  />
                        <label for="beak_color_white">White</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="beak_color" type="radio" id="beak_color_black"  />
                        <label for="beak_color_black">Black</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <input class="with-gap" name="beak_color" type="radio" id="beak_color_yellow"  />
                        <label for="beak_color_yellow">Yellow</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="beak_color_others" type="text" class="validate" name="beak_color_others">
                        <label for="beak_color_others">Others</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 1l2">
                        Other Unique Features
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="other_features" type="text" class="validate" name="other_features" placeholder="e.g. Frizzly, Silky">
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
  </div>
@endsection

@section('scripts')

@endsection
