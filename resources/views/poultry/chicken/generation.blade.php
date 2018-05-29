@extends('layouts.newLayout')

@section('title')
  Generation
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Breeder Generations</h4>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
              <div class="row">
                <div class="col s12 m12 l12">
                  <table class="bordered centered responsive-table">
                    <thead>
                      <tr>
                        <th>Generation</th>
                        <th>Action</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($generations as $generation)
                        <tr>
                          <td>{{$generation->number}}</td>
                          @if ($generation->is_active)
                            <td>
                              <a class="waves-effect waves-light modal-trigger tooltipped edit_button" href="#edit_generation" data-position="bottom" data-delay="50" data-tooltip="Edit" data-gennum="{{$generation->number}}" data-generation="{{$generation->id}}"><i class="material-icons">mode_edit</i></a>
                            </td>
                            <td>
                              <a class="waves-effect waves-light modal-trigger tooltipped inactive_button" data-position="bottom" data-delay="50" data-tooltip="Cull Generation" @click.prevent="displayConfirmationModal(title='{{$generation->number}}', value='{{$generation->id}}')" v-bind:title="{{$generation->number}}" v-bind:value="{{$generation->id}}" href="#inactive_confirm" data-gennum="{{$generation->number}}" data-generation="{{$generation->id}}"><i class="material-icons">close</i></a>
                            </td>
                          @else
                            <td>
                               <i class="material-icons">remove</i>
                            </td>
                            <td>
                              <i class="material-icons">remove</i>
                            </td>
                          @endif
                        </tr>
                      @empty
                        <tr>
                           <td></td>
                           <td>No Generation</td>
                           <td></td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
                <div class="row center">
                   <div class="col s12 m12 l12">
                     {{ $generations->links() }}
                   </div>
                </div>
              </div>
               <div class="fixed-action-btn">
                  <a class="btn-floating btn-large yellow darken-3 modal-trigger tooltipped" href="#add_gen" data-position="left" data-delay="50" data-tooltip="Add Generation">
                     <i class="large material-icons">add</i>
                  </a>
               </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="inactive_confirm" class="modal  modal-close">
    <div class="modal-content">
      <h5 id="confirmation_title"></h5>
      <div class="row">
        <div class="col s12 m12 l12">
          Mark this generation as <strong>inactive</strong> and <strong>cull</strong> all the animals in the generation?
          This action is permanent and cannot be undone. Click confirm to continue the action
        </div>
      </div>

      <div class="row">
        <div class="col s6 m6 l6 center">
          {!! Form::open(['method' => 'post']) !!}
          <input id="gen_confirmation" type="hidden" name="generation_id" value="">
          <button class="btn waves-effect waves-light"><i class="material-icons left">check_circle</i>Confirm</button>
          {!!Form::close()!!}
        </div>
        <div class="col s6 m6 l6 center">
          <a class="btn waves-effect waves-light"><i class="material-icons left">cancel</i>Cancel</a>
        </div>
      </div>
    </div>
  </div>

  {{-- <confirmation></confirmation> --}}

  <div id="edit_generation" class="modal">
    <div class="modal-content">
      <h5 id="edit_title"></h5>
      {!! Form::open(['route' => 'farm.poultry.breeder.edit_generation' ,'method' => 'post']) !!}
      <input id="generation_edit" type="hidden" name="generation_edit">
      <label for="line_edit_div">Add Lines</label>
      <div id="line_edit_div" class="row">
        <div id="line_edit" class="input-field col s12 m6 6">
          <input type="text" name="line_edit[]">
        </div>
      </div>
      <div class="row center">
        <div class="col s12 m12 l12">
          <a id="edit_line_button" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Add Line Field</a>
        </div>
      </div>
      <div class="row right">
        <div class="col s12 m12 l12">
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right"></i>
          </button>
        </div>
      </div>
      {!!Form::close()!!}
    </div>
  </div>

  <div id="add_gen" class="modal">
    <div class="modal-content">
      <h4 class="center">Add Generation</h4>
      {!! Form::open(['route' => 'farm.poultry.add_generation', 'method' => 'post']) !!}
      <div class="row">
        <div class="input-field col s12 m12 l12">
          <input id="generation" type="text" maxlength="4" required name="generation">
          <label for="generation">Generation</label>
        </div>
      </div>
      <label for="line_div">Add Lines</label>
      <div id="line_div" class="row">
        <div id="line1" class="input-field col s12 m6 6">
          <input type="text" maxlength="4" name="line[]">
        </div>
      </div>
      <div class="row center">
        <div class="col s12 m12 l12">
          <a id="add_line_button" class="waves-effect waves-light btn yellow darken-3"><i class="material-icons left">add</i>Add Line Field</a>
        </div>
      </div>
      <div class="row right">
        <div class="col s12 m12 l12">
          <a href="#!" class="modal-action modal-close waves-effect waves-yellow btn-flat">Cancel</a>
          <button class="btn yellow darken-3 waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right"></i>
          </button>
        </div>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/vue/addGeneration.js"></script>
  {{-- <script type="text/javascript" src="/js/vue/generations.js"></script> --}}
  @if(Session::has('generation-create'))
     <script>
        Materialize.toast('Generation Added', 4000)
     </script>
  @endif
@endsection
