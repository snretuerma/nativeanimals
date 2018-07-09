@extends('layouts.newLayout')

@section('title')
    Pens
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
      <div class="col s12 m12 l12">
         <div class="row">
            <h5>Pens</h5>
         </div>
         <div class="row">
            <div class="col s12 m12 l12">
               <table class="centered responsive-table bordered highlight">
                  <thead>
                    <tr>
                      <th>Pen Number</th>
                      <th>Pen Type</th>
                      <th>Capacity</th>
                      <th>Content</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- <template >
                      <pen-rows></pen-rows>
                    </template> --}}
                    @forelse ($pens as $pen)
                       <tr>
                         <td>{{ $pen->number }}</td>
                         <td>{{ ucfirst($pen->pen_type) }}</td>
                         <td>{{ $pen->capacity }}</td>
                         <td>{{ $pen->capacity - $pen->current_capacity  }}</td>
                       </tr>
                    @empty
                       <tr>
                         <td></td>
                         <td>No Pens</td>
                         <td></td>
                         <td></td>
                       </tr>
                    @endforelse
                  </tbody>
                </table>
            </div>
         </div>
         <div class="row center">
            <div class="col s12 m12 l12">
               {{ $pens->links() }}
            </div>
         </div>
      </div>
    </div>
    <div class="fixed-action-btn">
      <a class="btn-floating btn-large yellow darken-3 modal-trigger tooltipped" href="#add_pen" data-position="left" data-delay="50" data-tooltip="Add Pen">
          <i class="large material-icons">add</i>
      </a>
   </div>

   <div id="add_pen" class="modal modal">
     <div class="modal-content">
       <h5 class="center">Add Pen</h5>
       <div class="row">
         <div class="col s12 m12 l12">
            {!! Form::open(['route' => 'farm.poultry.create_pens' , 'method' => 'post']) !!}
               <div class="row">
                  <div class="input-field col s12 m6 l6">
                     <input id="pen_no" type="text" name="pen_no">
                     <label for="pen_no">Pen No.</label>
                  </div>
               </div>
               <div class="row">
                  <div class="col s12 m4 l4">
                     <input class="with-gap" name="pen_type" type="radio" id="brooder" value="brooder"/>
                     <label for="brooder">Brooder</label>
                  </div>
                  <div class="col s12 m4 l4">
                     <input class="with-gap" name="pen_type" type="radio" id="grower" value="grower"/>
                     <label for="grower">Grower</label>
                  </div>
                  <div class="col s12 m4 l4">
                     <input class="with-gap" name="pen_type" type="radio" id="layer" value="layer"/>
                     <label for="layer">Layer</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12 m6 l6">
                     <input id="capacity" type="number" name="capacity" min="0">
                     <label for="capacity">Capacity</label>
                  </div>
               </div>
               <div class="row">
                  <div class="col s12 m12 l12 center">
                     <button class="btn waves-effect waves-light yellow darken-3"><i class="material-icons left">add</i>Add</button>
                  </div>
               </div>
            {!!Form::close()!!}
         </div>
       </div>
     </div>
   </div>

@endsection

@section('scripts')
  {{-- <script type="text/javascript" src="/js/vue/pens.js"></script> --}}
  @if(Session::has('pen-create'))
     <script>
        Materialize.toast('Pen Created', 4000);
     </script>
  @elseif (Session::has('pen-fail'))
     <script>
       Materialize.toast('Pen Creation Failed', 4000);
     </script>
  @endif
@endsection
