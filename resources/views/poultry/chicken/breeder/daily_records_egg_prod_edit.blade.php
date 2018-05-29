@extends('layouts.newLayout')

@section('title')
  Breeder Daily Records | {{$family->number}}
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
   <div class="row">
      <div class="col s12 m12 l12">
         <div class="row">
            <div class="col s12 m12 l12">
               <h5>Breeder Egg Production</h5>
            </div>
            <div class="col s12 l4 m4">
               Family: <strong>{{$family->number}}</strong>
            </div>
            <div class="col s12 l4 m4">
               Pen: <strong>{{$family->getPen()->number}}</strong>
            </div>
            <div class="col s12 m4 l4">
               <a class="waves-effect waves-light btn red modal-trigger" href="#delete_confirm"><i class="material-icons left">close</i>Delete</a>
            </div>
         </div>
         @if ($errors->any())
            <div class="row">
               <div class="col s12 m12 l12">
                  <div class="card-panel red lighten-5">
                     <ul>
                        @foreach ($errors->all() as $error)
                           <li><strong>{{ $error }}</strong></li>
                        @endforeach
                     </ul>
                  </div>
               </div>
            </div>
         @endif
         {!! Form::open(['route' => 'farm.poultry.breeder.daily_records_egg_prod_edit_submit', 'method' => 'put']) !!}
            <div class="row">
              <div class="col s12 m12 l12">
                <input type="hidden" name="family" value="{{$family->id}}">
                <input type="hidden" name="pen" value="{{$family->getPen()->id}}">
                <input type="hidden" name="eggcollectionid" value="{{$eggcollection->id}}">
                <div class="row">
                  <div class="col s12 m12 l12">
                     <div class="row">
                        <div class="col s12 m12 l12">
                           <label for="date_eggs_collected">Date Eggs Collected</label>
                           <input id="date_eggs_collected" type="text" class="datepicker" name="date_eggs_collected" required>
                        </div>
                     </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                     <div class="row">
                       <div class="input-field col s12 m4 l4">
                        <input id="total_eggs_collected" type="number" min=0 class="validate" name="total_eggs_collected" required>
                        <label for="total_eggs_collected">Total Eggs Intact</label>
                       </div>
                       <div class="input-field col s12 m4 l4">
                        <input id="total_egg_weight" type="number" min=0 step="any" class="validate" name="total_egg_weight" required>
                        <label for="total_egg_weight">Total Weight of Intact Eggs(g)</label>
                       </div>
                       <div class="input-field col s12 m4 l4">
                       <input id="averege_egg_weight" type="text" value="" disabled>
                       <label for="averege_egg_weight">Average Egg Weight (g)</label>
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
                        <input id="remarks" type="text" name="remarks">
                        <label for="remarks">Remarks</label>
                       </div>
                     </div>
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
          {!! Form::open(['route'=> 'farm.poultry.breeder.daily_records_egg_prod_delete','method' => 'delete']) !!}
          <input type="hidden" name="delete" value="{{$eggcollection->id}}">
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

        $("#date_eggs_collected").val({!! json_encode($eggcollection->date_collected) !!});
        $("#total_eggs_collected").val({!! json_encode($eggcollection->number_of_eggs) !!});
        $("#total_egg_weight").val({!! json_encode($eggcollection->weight) !!});
        $("#averege_egg_weight").val({!! json_encode($eggcollection->weight) !!}/{!! json_encode($eggcollection->number_of_eggs) !!});
        $("#no_broken").val({!! json_encode($eggcollection->broken_eggs) !!});
        $("#no_shell").val({!! json_encode($eggcollection->soft_shelled_eggs) !!});
        $("#remarks").val({!! json_encode($eggcollection->remarks) !!});
        function updateAverage()
        {
            var eggs = 0;
            var weight = 0;
            eggs = parseInt($("#total_eggs_collected").val());
            weight =  parseFloat($("#total_egg_weight").val());
            var average = (weight / eggs);
            $("#averege_egg_weight").val(average);
        }
        $(document).on("change, keyup", "#total_eggs_collected, #total_egg_weight", updateAverage);
      });
   </script>
   @if(Session::has('add-egg_prod-success'))
      <script>
         Materialize.toast('Egg production recorded', 4000)
      </script>
   @endif
@endsection
