@extends('layouts.newLayout')

@section('title')
  Breeder - Add to Family
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Add to Family</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {!! Form::open(['route' => 'farm.chicken.submit_family_record', 'method' => 'post']) !!}
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <select>
                          <option value="" disabled selected>Select Family</option>
                          <option value="fam1">Family 1</option>
                          <option value="fam2">Family 2</option>
                        </select>
                        <label>Family</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text" class="validate">
                        <label for="search">Search</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s6 m3 l3">
                        <input type="checkbox" class="filled-in" id="sample1"  />
                        <label for="sample1">QUEBAI-12F-2132</label>
                      </div>
                      <div class="col s6 m3 l3">
                        <input type="checkbox" class="filled-in" id="sample2" />
                        <label for="sample2">QUEBAI-12M-2122</label>
                      </div>
                      <div class="col s6 m3 l3">
                        <input type="checkbox" class="filled-in" id="sample3"  />
                        <label for="sample3">QUEBAI-12F-2122</label>
                      </div>
                      <div class="col s6 m3 l3">
                        <input type="checkbox" class="filled-in" id="sample4"  />
                        <label for="sample4">QUEBAI-12F-2122</label>
                      </div>

                      <div class="col s6 m3 l3">
                        <input type="checkbox" class="filled-in" id="sample5"  />
                        <label for="sample5">QUEBAI-11F-21321</label>
                      </div>
                      <div class="col s6 m3 l3">
                        <input type="checkbox" class="filled-in" id="sample6" />
                        <label for="sample6">QUEBAI-13M-6767</label>
                      </div>
                      <div class="col s6 m3 l3">
                        <input type="checkbox" class="filled-in" id="sample7"  />
                        <label for="sample7">QUEBAI-14F-2321</label>
                      </div>
                      <div class="col s6 m3 l3">
                        <input type="checkbox" class="filled-in" id="sample8"  />
                        <label for="sample8">QUEBAI-15F-1111</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12 center">
                    <button class="btn waves-effect waves-light yellow darken-3" type="submit">Add
                      <i class="material-icons right">add</i>
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
