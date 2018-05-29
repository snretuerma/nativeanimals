@extends('layouts.newLayout')

@section('title')
  Replacement - Individual Record
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Individual Record</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {!! Form::open(['route' => 'farm.poultry.get_replacement_individual_record', 'method' => 'post']) !!}
                <div class="row">
                  <div class="col s12 m12 l12">
                      <div class="col s12 m6 l6">
                        <label for="date_hatched">Date Hatched</label>
                        <input id="date_hatched" type="text" class="datepicker" name="date_hatched" required>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="individual_id" type="text" class="validate" name="individual_id" required>
                      <label for="individual_id">Individual ID</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
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
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="col s12 m6 l6">
                     <label for="line">Line</label>
                     <select id="line" class="validate browser-default" name="line" disabled="disabled">
                        <option value="" disabled selected>Choose Line</option>
                     </select>
                     </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                     <div  class="col s12 m6 l6">
                        <label for="family">Family</label>
                        <select id="family" class="validate browser-default" name="family" disabled="disabled">
                          <option value="" disabled selected>Choose Family</option>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="col s12 m12 l12">
                        <div class="col s6 m6 l6">
                           <label>Gender</label>
                          <select name="gender" class="browser-default" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                      <div class="col s12 m6 l6">
                        <label for="date_transferred">Date Transferred</label>
                        <input id="date_transferred" type="text" class="datepicker" name="date_transferred" required>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div  class="col s12 m6 l6">
                       <label>Moved to Pen Number</label>
                      <select name = "moved_to_pen" class="browser-default" required>
                         <option value="" disabled selected>Choose pen</option>
                         @foreach ($pens as $pen)
                           <option value="{{ $pen->id }}">{{ $pen->number }}</option>
                         @endforeach
                      </select>
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
   <script>
   $(document).ready(function(){
     $("#generation").change(function (event) {
       event.preventDefault();
       $("#line").empty();
       var generation_id = $(this).find(':selected').data("genid");
       $.ajax({
         url: window.location.href+'/'+generation_id,
         type: 'GET',
         cache: false,
         data: {generation_id},
         success: function(data)
         {
           if(data.length > 0){
             data.forEach(function(data){
                 $("#line").append('\
                   <option data-lineid="'+data.id+'" value="'+data.id+'">'+data.number+'</option>\
                 ');
             });
           }else{
             $("#line").append('\
               <option disabled selected>No Lines in this Generation</option>\
             ');
           }
         }
       });

       $("#line").removeAttr('disabled');
     });
     $("#line").change(function (e) {
      e.preventDefault();
      $("#family").empty();
      var line_id = $(this).find(':selected').data("lineid");
      $.ajax({
        url: window.location.href+'/line/'+line_id,
        type: 'GET',
        cache: false,
        data: {line_id},
        success: function(data)
        {
          if(data.length > 0){
            data.forEach(function(data){
                $("#family").append('\
                  <option value="'+data.id+'">'+data.number+'</option>\
                ');
            });
          }else{
            $("#family").append('\
              <option disabled selected>No Families in this Line</option>\
            ');
          }
        }
      });
      $("#family").removeAttr('disabled');
    });
   });
   </script>
   @if(Session::has('individual-record-success'))
      <script>
         Materialize.toast('Individual record saved', 4000)
      </script>
   @endif
@endsection
