@extends('layouts.newLayout')

@section('title')
  Generation
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Breeder Generation</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
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
                              <a class="waves-effect waves-light btn green modal-trigger edit_button" href="#edit_generation" data-gennum="{{$generation->number}}" data-generation="{{$generation->id}}">Edit</a>
                            </td>
                            <td>
                              <a class="waves-effect waves-light btn red modal-trigger inactive_button" href="#inactive_confirm" data-gennum="{{$generation->number}}" data-generation="{{$generation->id}}">Inactive</a>
                            </td>
                          @else
                            <td>
                            </td>
                            <td>
                              <a class="btn disabled">Culled</a>
                            </td>
                          @endif
                        </tr>
                      @empty

                      @endforelse

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col s12 m12 l12">
                  <a class="btn-floating btn-med waves-effect waves yellow darken-3 right modal-trigger" href="#add_gen"><i class="material-icons">add</i></a>
                </div>
              </div>
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
      <label for="pen_div">Add Pens</label>
      <div id="pen_div" class="row">
        <div id="pen1" class="input-field col s12 m6 6">
          <input type="text" name="pen[]">
        </div>
      </div>
      <div class="row center">
        <div class="col s12 m12 l12">
          <a id="add_pen_button" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Add Pen Field</a>
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
      <h4>Add Generation</h4>
      {!! Form::open(['route' => 'farm.poultry.add_generation', 'method' => 'post']) !!}
      <div class="row">
        <div class="input-field col s12 m12 l12">
          <input id="generation" type="text" required name="generation">
          <label for="generation">Generation</label>
        </div>
      </div>
      <label for="line_div">Add Lines</label>
      <div id="line_div" class="row">
        <div id="line1" class="input-field col s12 m6 6">
          <input type="text" name="line[]">
        </div>
      </div>
      <div class="row center">
        <div class="col s12 m12 l12">
          <a id="add_line_button" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Add Line Field</a>
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
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/vue/addGeneration.js"></script>

@endsection
