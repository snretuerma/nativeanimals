@extends('layouts.newLayout')

@section('title')
  Breeder List
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Individual Breeder List</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {!! Form::open([ 'method' => 'post']) !!}
                {{-- structure  row -> col -> col: input-field --}}
                <div class="row center">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m8 l8">
                        <input id="id_no" type="text" class="validate" name="id_no">
                        <label for="id_no">Registry ID</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <button class="btn waves-effect waves-light yellow darken-3" type="submit">Search
                          <i class="material-icons right">search</i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

              {!!Form::close()!!}
              <div class="row">
                <div class="col s12 m12 l12">
                  <table class="bordered centered responsive-table">
                    <thead>
                      <tr>
                      <th>Registry ID</th>
                      <th>Status</th>
                      <th></th>
                      </tr>
                    </thead>

                  <tbody>
                    <tr>
                      <td>0001</td>
                      <td>Active</td>
                      <td><a class="waves-effect waves-light btn yellow darken-3" href="{{route('farm.poultry.page_view_breeders_individual_data')}}"><i class="fas fa-info-circle"></i></a></td>
                      {{-- <td class="center"><a href="{{ URL::route('farm.poultry.animal_records_id', [$animal->id]) }}"><i class="material-icons">search</i></a></td> --}}
                    </tr>
                  </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
