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
               <h5>Breeder Feeding Record</h5>
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
         {!! Form::open(['route' => 'farm.poultry.breeder.daily_records_feeding_record_edit_submit', 'method' => 'put']) !!}
            <div class="row">
                <div class="col s12 m12 l12">
                   <input type="hidden" name="family" value="{{$family->id}}">
                   <input type="hidden" name="pen" value="{{$family->getPen()->id}}">
                   <input type="hidden" name="feedingrecid" value="{{$feedingrec->id}}">
                   <div class="row">
                     <div class="col s12 m12 l12">
                        <div class="col s12 m6 l6">
                           <label for="date_collected">Date Collected</label>
                           <input id="date_collected" type="text" class="datepicker" name="date_collected" required>
                        </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col s12 m12 l12">
                      <div class="input-field col s12 m6 l6">
                         <input id="amount_offered" type="number" min=0 step="any" class="validate" name="amount_offered" required>
                         <label for="amount_offered">Amount of Concentrates Offered (g)</label>
                      </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col s12 m12 l12">
                      <div class="input-field col s12 m6 l6">
                         <input id="amount_refused" type="number" min=0 step="any" class="validate" name="amount_refused" required>
                         <label for="amount_refused">Amount of Concentrates Refused (g)</label>
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
                   <div class="row">
                    <div class="col s12 m12 l12 center">
                      <button class="btn waves-effect waves-light yellow darken-3" type="submit">Submit
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
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
          {!! Form::open(['route'=> 'farm.poultry.breeder.daily_records_feeding_record_delete','method' => 'delete']) !!}
          <input type="hidden" name="delete" value="{{$feedingrec->id}}">
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
        $("#date_collected").val({!! json_encode($feedingrec->date_fed) !!});
        $("#amount_offered").val({!! json_encode($feedingrec->amount_offered) !!});
        $("#amount_refused").val({!! json_encode($feedingrec->amount_refused) !!});
        $("#remarks").val({!! json_encode($feedingrec->remarks) !!});
      });
   </script>
@endsection
