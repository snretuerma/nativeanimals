@extends('layouts.newLayout')

@section('title')
  Breeder - Egg Quality Characteristics {{-- Specify if breeder or replacement when backend added through variable passed --}}
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Egg Quality</h4> {{-- Specify if breeder or replacement when backend added through variable passed --}}
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {!! Form::open(['route' => 'farm.poultry.fetch_egg_quality', 'method' => 'post']) !!}
                {{-- structure  row -> col -> col: input-field --}}
                <div class="row">
                  <div class="col s12 m3 l3">
                    Egg Quality at
                  </div>
                  <div class="col s12 m3 l3">
                    <input class="with-gap" name="egg_quality_at" type="radio" id="egg_quality_35" value = "35" required/>
                    <label for="egg_quality_35">35 days</label>
                  </div>
                  <div class="col s12 m3 l3">
                    <input class="with-gap" name="egg_quality_at" type="radio" id="egg_quality_40" value = "40" required/>
                    <label for="egg_quality_40">40 days</label>
                  </div>
                  <div class="col s12 m3 l3">
                    <input class="with-gap" name="egg_quality_at" type="radio" id="egg_quality_60" value = "60" required/>
                    <label for="egg_quality_60">60 days</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
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
                      <div class="col s12 m6 l6">
                        <label for="line">Line</label>
                        <select id="line" class="validate browser-default" name="line" disabled="disabled">
                         <option value="" disabled selected>Choose Line</option>

                         {{-- @forelse ($lines as $line)
                           <option value="{{$line->id}}">{{$line->number}} (Generation : {{$line->getGeneration()->number}})</option>
                         @empty
                            <option value="" disabled selected>No Available Lines</option>
                         @endforelse --}}
                        </select>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <label for="family">Family</label>
                        <select id="family" class="validate browser-default" name="family" disabled="disabled">
                          <option value="" disabled selected>Choose Family</option>
                          {{-- @forelse ($families as $family)
                              <option value="{{$family->id}}">{{$family->number}}</option>
                          @empty
                            <option value="" disabled selected>No Available family</option>
                          @endforelse --}}
                        </select>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="egg_weigth" type="number" min=0 class="validate" name="egg_weight">
                        <label for="egg_weight">Egg Weight (g)</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="egg_color" type="text" class="validate" name="egg_color" placeholder="e.g. Brown, Cream">
                        <label for="egg_color">Egg Color</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="egg_shape" type="text" class="validate" name="egg_shape" placeholder="e.g. Ovoid">
                        <label for="egg_shape">Egg Shape</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="length" type="number" min=0 class="validate" name="egg_length">
                        <label for="length">Length (mm)</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="width" type="number" min=0 class="validate" name="egg_width">
                        <label for="width">Width (mm)</label>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="shell_weight" type="number" min=0 class="validate" name="shell_weight">
                        <label for="shell_weight">Shell Weight (g)</label>
                      </div>
                    </div>
                  </div>
                </div> --}}
                {{-- Shape Index (width/length)*100 --}}
                {{-- Haugh Unit () --}}
                {{-- Average Shell Thickness --}}
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="abumen_height" type="number" min=0 class="validate" name="albumen_height">
                        <label for="albumen_height">Albument Height (mm)</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="albumen_weight" type="number" class="validate" name="albumen_weight">
                        <label for="albumen_weight">Albumen Weight (mm)</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="yolk_weight" type="number" class="validate" name="yolk_weight">
                        <label for="yolk_weight">Yolk Weight (g)</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="yolk_color" type="text" class="validate" name="yolk_color">
                        <label for="yolk_color">Yolk Color</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input id="shell_weight" type="number" class="validate" name="shell_weight">
                        <label for="shell_weight">Shell Weight (g)</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 l12">
                        Shell Thickness (mm)
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m4 l4">
                        <input id="top" type="number" min=0 class="validate" name="thickness_top">
                        <label for="top">Top</label>
                      </div>
                      <div class="input-field col s12 m4 l4">
                        <input id="middle" type="number" min=0 class="validate" name="thickness_mid">
                        <label for="middle">Middle</label>
                      </div>
                      <div class="input-field col s12 m4 l4">
                        <input id="bottom" type="number" min=0 class="validate" name="thickness_bot">
                        <label for="bottom">Bottom</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                   <div class="col s12 m12 l12">
                     <div class="row">
                        <div class="col s12 m12 l12">
                           <label for="date_collected">Date Collected</label>
                           <input id="date_collected" type="text" class="datepicker" name="date_collected">
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
    </div>
  </div>
@endsection

@section('scripts')
   <script type="text/javascript" src="/js/poultry/egg_quality_page.js"></script>
@endsection
