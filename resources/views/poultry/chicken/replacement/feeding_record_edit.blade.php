@extends('layouts.newLayout')

@section('title')
  Replacement : Feeding Performance
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h5>Replacement : Feeding Performance</h5>
      <div class="divider"></div>
      <div class="row">
         <div class="col s12 m6 l6">
            Pen Number: <strong>{{$pen->number}}</strong>
         </div>
         <div class="col s12 m6 l6">
            <a class="waves-effect waves-light btn red modal-trigger" href="#delete_confirm"><i class="material-icons left">close</i>Delete</a>
         </div>
      </div>

      <div class="row">
          <div class="col s12 m12 l12">
            {!! Form::open([ 'route' => 'farm.poultry.replacement.feeding_edit_submit', 'method' => 'put']) !!}
            <input type="hidden" name="pen_id" value="{{$pen->id}}">
            <input type="hidden" name="record_id" value="{{$feeding->id}}">
             <div class="row">
               <div class="col s12 m12 l12">
                   <div class="col s12 m6 l6">
                      <label for="date_fed">Date Fed</label>
                      <input id="date_fed" type="text" class="datepicker" name="date_fed">
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
                   <input id="amount_offered" type="number" min=0 class="validate" name="amount_offered" step="any">
                   <label for="amount_offered">Amount of Feed Offered (g)</label>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col s12 m12 l12">
                 <div class="input-field col s12 m6 l6">
                   <input id="amount_refused" type="number" min=0 class="validate" name="amount_refused" step="any">
                   <label for="amount_refused">Amount of Feed Refusal (g)</label>
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
         {!! Form::open(['route'=> 'farm.poultry.replacement.feeding_edit_delete','method' => 'delete']) !!}
         <input type="hidden" name="delete" value="{{$feeding->id}}">
         <input type="hidden" name="delete_pen" value="{{$pen->id}}">
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
     $("#date_fed").val({!! json_encode($feeding->date_fed) !!});
     $("#feed_offered").val({!! json_encode($feeding->feed_offered) !!});
     $("#feed_refused").val({!! json_encode($feeding->feed_refused) !!});
     $("#amount_offered").val({!! json_encode($feeding->amount_offered) !!});
     $("#amount_refused").val({!! json_encode($feeding->amount_refused) !!});
     $("#remarks").val({!! json_encode($feeding->remarks) !!});
   });
   </script>
@endsection
