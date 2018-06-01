@extends('layouts.newLayout')

@section('title')
  Breeder Egg Quality | {{$family->number}}
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <div class="row">
         <div class="col s12 m12 l12">
            <h5>Breeder Egg Quality</h5>
         </div>
         <div class="col s12 m4 l4">
            <strong>Family: {{$family->number}}</strong>
         </div>
         <div class="col s12 m4 l4">
            <strong>Pen: {{$family->getPen()->number}}</strong>
         </div>
         <div class="col s12 m4 l4">
            <a class="waves-effect waves-light btn red modal-trigger" href="#delete_confirm"><i class="material-icons left">close</i>Delete</a>
         </div>
      </div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="col s12 m12 l12">
               {!! Form::open(['route' => 'farm.poultry.page_egg_quality_family_form_submit_edit', 'method' => 'put']) !!}
                  <input type="hidden" name="family" value="{{$family->id}}">
                  <input type="hidden" name="record" value="{{$eggquality->id}}">
                  <div class="row">
                     <div class="col s12 m12 l12">
                        <div class="row">
                           <div class="col s12 m12 l12">
                              Egg Quality at
                           </div>
                        </div>
                        <div class="row">
                           <div class="col s12 m4 l4">
                             <input onclick="document.getElementById('age-others').disabled = true;" class="with-gap" name="egg_quality_at" type="radio" id="egg_quality_35" value = "35" required/>
                             <label for="egg_quality_35">35 Weeks of Age</label>
                           </div>
                           <div class="col s12 m4 l4">
                             <input onclick="document.getElementById('age-others').disabled = true;" class="with-gap" name="egg_quality_at" type="radio" id="egg_quality_40" value = "40" required/>
                             <label for="egg_quality_40">40 Weeks of Age</label>
                           </div>
                           <div class="col s12 m4 l4">
                             <input onclick="document.getElementById('age-others').disabled = true;" class="with-gap" name="egg_quality_at" type="radio" id="egg_quality_60" value = "60" required/>
                             <label for="egg_quality_60">60 Weeks of Age</label>
                           </div>
                        </div>
                        <div class="row valign-wrapper left">
                           <div class="col s12 m6 l6">
                              <input onclick="document.getElementById('age-others').disabled = false;" class="with-gap" name="egg_quality_at" type="radio" id="egg_quality_others" value = "" required/>
                             <label for="egg_quality_others">Others</label>
                           </div>
                           <div class="col s12 m6 l6">
                              <input id="age-others" type="number" value="" disabled=true>
                           </div>
                        </div>
                     </div>
                  </div>

                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="egg_weight" type="number" min=0 class="validate" name="egg_weight" step="any">
                        <label for="egg_weight">Egg Weight (g)</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="egg_color" type="text" class="validate" name="egg_color" placeholder="e.g. Brown, Cream">
                        <label for="egg_color">Egg Color</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="egg_shape" type="text" class="validate" name="egg_shape" placeholder="e.g. Ovoid">
                        <label for="egg_shape">Egg Shape</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="length" type="number" min=0 class="validate" name="egg_length" step="any">
                        <label for="length">Length (mm)</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="width" type="number" min=0 class="validate" name="egg_width" step="any">
                        <label for="width">Width (mm)</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="albumen_height" type="number" min=0 class="validate" name="albumen_height" step="any">
                        <label for="albumen_height">Albument Height (mm)</label>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- Shape Index (width/length)*100 --}}
                {{-- Haugh Unit () --}}
                {{-- Average Shell Thickness --}}
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="albumen_weight" type="number" class="validate" name="albumen_weight" step="any" min=0>
                        <label for="albumen_weight">Albumen Weight (mm)</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="yolk_weight" type="number" class="validate" name="yolk_weight" step="any" min=0>
                        <label for="yolk_weight">Yolk Weight (g)</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input id="yolk_color" type="text" class="validate" name="yolk_color">
                        <label for="yolk_color">Yolk Color</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="shell_weight" type="number" class="validate" name="shell_weight" step="any" min=0>
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
                        <input id="top" type="number" min=0 class="validate" name="thickness_top" step="any">
                        <label for="top">Top</label>
                      </div>
                      <div class="input-field col s12 m4 l4">
                        <input id="middle" type="number" min=0 class="validate" name="thickness_mid" step="any">
                        <label for="middle">Middle</label>
                      </div>
                      <div class="input-field col s12 m4 l4">
                        <input id="bottom" type="number" min=0 class="validate" name="thickness_bot" step="any">
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

  <div id="delete_confirm" class="modal modal-close">
    <div class="modal-content">
     <h5 id="confirmation_title">Delete</h5>
     <div class="row">
        <div class="col s12 m12 l12">
         Click confirm to <strong>Delete</strong> this record.
         This action is permanent and cannot be undone.
        </div>
     </div>

     <div class="row">
        <div class="col s6 m6 l6 center">
         {!! Form::open(['route'=> 'farm.poultry.page_egg_quality_family_form_delete','method' => 'delete']) !!}
         <input type="hidden" name="delete" value="{{$eggquality->id}}">
         <input type="hidden" name="del_family" value="{{$family->id}}">
         <button class="btn waves-effect waves-light"><i class="material-icons left">check_circle</i>Confirm</button>
         {!!Form::close()!!}
        </div>
        <div class="col s6 m6 l6 center">
         <a class="btn waves-effect waves-light"><i class="material-icons left">cancel</i>Cancel</a>
        </div>
     </div>
    </div>
  </div>
@endsection

@section('scripts')
   <script>
   $(document).ready(function()
   {
     $("#age-others").val(0);
     if({!! json_encode($eggquality->egg_quality_at) !!} == 35){
        $("#egg_quality_35").prop( "checked", true );
     }else if({!! json_encode($eggquality->egg_quality_at) !!} == 40){
        $("#egg_quality_40").prop( "checked", true );
     }else if({!! json_encode($eggquality->egg_quality_at) !!} == 60){
        $("#egg_quality_60").prop( "checked", true );
     }else{
        $("#age-others").val({!! json_encode($eggquality->egg_quality_at) !!});
        $("#egg_quality_others").val({!! json_encode($eggquality->egg_quality_at) !!});
        $("#egg_quality_others").prop( "checked", true );
        $("#age-others").prop("disabled", false);
     }
     $("#egg_weight").val({!! json_encode($eggquality->egg_weight) !!});
     $("#egg_color").val({!! json_encode($eggquality->egg_color) !!});
     $("#egg_shape").val({!! json_encode($eggquality->egg_shape) !!});
     $("#length").val({!! json_encode($eggquality->egg_length) !!});
     $("#width").val({!! json_encode($eggquality->egg_width) !!});
     $("#albumen_height").val({!! json_encode($eggquality->albumen_height) !!});
     $("#albumen_weight").val({!! json_encode($eggquality->albumen_weight) !!});
     $("#yolk_weight").val({!! json_encode($eggquality->yolk_weight) !!});
     $("#yolk_color").val({!! json_encode($eggquality->yolk_color) !!});
     $("#shell_weight").val({!! json_encode($eggquality->shell_weight) !!});
     $("#top").val({!! json_encode($eggquality->thickness_top) !!});
     $("#middle").val({!! json_encode($eggquality->thickness_mid) !!});
     $("#bottom").val({!! json_encode($eggquality->thickness_bot) !!});
     $("#date_collected").val({!! json_encode($eggquality->date_collected) !!});

     function update()
     {
        $("#egg_quality_others").val($("#age-others").val());
     }
     $(document).on("change, keyup", "#age-others, #egg_quality_others", update);
   });
   </script>
@endsection
