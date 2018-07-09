@extends('layouts.newLayout')

@section('title')
  Hatchery Parameters | Family Log
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 l12">
      <h5>Hatchery Parameters | {{$family->number}} Logs</h5>
      <div class="divider"></div>
      <table class="centered responsive-table bordered">
        <thead>
          <tr>
              <th>Date Set</th>
              <th>Number Set</th>
              <th>Week of Lay</th>
              <th>Fertile</th>
              <th>Hatched Eggs</th>
              <th>Date Hatched</th>
              <th>Moved to Pen</th>
              <th>Remarks</th>
              <th>Add</th>
              <th>Edit</th>
              <th>Delete</th>
          </tr>
        </thead>

        <tbody>
          @forelse ($chicks as $chick)
            <tr>
              <td>{{$chick->date_eggs_set}}</td>
              <td>{{$chick->number_eggs_set}}</td>
              <td>{{$chick->week_of_lay}}</td>
              <td>{{$chick->fertile_eggs}}</td>
              <td>{{$chick->hatched_eggs}}</td>
              <td>{{$chick->date_hatched}}</td>
              @if ($chick->current_pen_id != NULL)
                 <td>{{$chick->getPen()}}</td>
              @else
                 <td>{{$chick->current_pen_id}}</td>
              @endif
              <td>{{$chick->remarks}}</td>
              @if ($chick->hatchery_record != "11")
                 @if ($chick->hatchery_record == "01")
                    <td><a href="{{URL::route('farm.poultry.hatchery_form2', [$chick->id])}}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Complete this entry"><i class="material-icons">add</i></a></td>
                 @elseif($chick->hatchery_record == "10")
                    <td><a href="{{URL::route('farm.poultry.hatchery_form3', [$chick->id])}}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Complete this entry"><i class="material-icons">add</i></a></td>
                 @endif

              @else
                 <td class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Record completed for this entry"><i class="material-icons">add</i></td>
              @endif
              <td><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit entry" href="{{URL::route('farm.poultry.page_egg_quality_family_log', [$chick->id])}}"><i class="material-icons">edit</i></a></td>
              <td><a class="tooltipped modal-trigger delete" data-position="bottom" data-delay="50" data-tooltip="Delete entry" data-chick="{{$chick->id}}" href="#delete_confirm"><i class="material-icons">close</i></a></td>
            </tr>
          @empty
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>No Record</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="row center">
       <div class="col s12 m12 l12">
          {{ $chicks->links() }}
       </div>
    </div>

  </div>
  <div class="fixed-action-btn">
    <a data-position="left" data-delay="50" data-tooltip="Add hatchery data" href="{{URL::route('farm.poultry.hatchery_form1', [$family->id])}}" class="btn-floating btn-large yellow darken-3 tooltipped">
      <i class="large material-icons">add</i>
    </a>
  </div>

  {{-- <div id="delete_confirm" class="modal modal-close">
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
         {!! Form::open(['route'=> 'farm.poultry.hatchery_family_delete','method' => 'delete']) !!}
         <input id="delete_confirm_value" type="hidden" name="delete" value="">
         <input type="hidden" name="del_family" value="{{$family->id}}">
         <button class="btn waves-effect waves-light"><i class="material-icons left">check_circle</i>Confirm</button>
         {!!Form::close()!!}
        </div>
        <div class="col s6 m6 l6 center">
         <a class="btn waves-effect waves-light"><i class="material-icons left">cancel</i>Cancel</a>
        </div>
     </div>
    </div>
  </div> --}}

@endsection

@section('scripts')
   <script>
      $(".delete").click(function() {
         $('#delete_confirm_value').val($(this).attr('data-chick'));
      });
   </script>
@endsection
