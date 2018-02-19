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
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($generations as $generation)
                        <tr>
                          <td>{{$generation->number}}</td>
                          @if ($generation->is_active)
                            <td>
                              <a class="waves-effect waves-light btn red modal-trigger" href="#inactive_confirm">Inactive</a>
                            </td>
                          @else
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
  <div id="inactive_confirm" class="modal">
    <div class="modal-content">
      <h5>Family</h5>
      <div class="row">
        <div class="col s12 m12 l12">
          Mark this generation as <strong>inactive</strong> and <strong>cull</strong> all the animals in the generation?
          This action is permanent and cannot be undone. Click confirm to continue the action
        </div>
      </div>
      {!! Form::open(['route' => 'farm.poultry.add_generation', 'method' => 'post']) !!}
      <input type="hidden" name="generation_id" value="">
      <div class="row">
        <div class="col s6 m6 l6 center">
          <a class="btn waves-effect waves-light"><i class="material-icons left">check_circle</i>Confirm</a>
        </div>
        <div class="col s6 m6 l6 center">
          <a class="btn waves-effect waves-light"><i class="material-icons left">cancel</i>Cancel</a>
        </div>
      </div>
      {!!Form::close()!!}
    </div>
  </div>

  <div id="add_gen" class="modal">
    <div class="modal-content">
      <h4>Add Generation</h4>
      <div class="row">
        {!! Form::open(['route' => 'farm.poultry.add_generation', 'method' => 'post']) !!}
        <div class="input-field col s12 m12 l12">
          <input id="generation" type="text" required name="generation">
          <label for="generation">Generation</label>
        </div>
      </div>
      <div class="row center">
        <div class="col s12 m12 l12">
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">add</i>
          </button>
        </div>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
@endsection

@section('scripts')

@endsection
