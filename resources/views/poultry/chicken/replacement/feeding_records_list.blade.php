@extends('layouts.newLayout')

@section('title')
  Breeder : Feeding Record List
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Replacement : Feeding Record List</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {{-- {!! Form::open(['route' => 'farm.poultry.page_phenomorphosearchid_value', 'method' => 'post']) !!} --}}
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
              {{-- {!!Form::close()!!} --}}
              <div class="row">
                <div class="col s12 m12 l12">
                  <table class="bordered centered responsive-table">
                    <thead>
                      <tr>
                      <th>Registry ID</th>
                      <th>Add Record</th>
                      </tr>
                    </thead>
                  <tbody>
                    @isset($replacements)
                      @foreach ($replacements as $animal)
                        <tr>
                          <td>{{ $animal->registryid }}</td>
                          <td class="center"><a href="{{ URL::route('farm.poultry.replacement.feeding_form', ['id' => $animal->id]) }}"><i class="material-icons">add_circle</i></a></td>
                        </tr>
                      @endforeach
                    @endisset
                    @empty($replacements)
                      <tr>
                        <td>No Data</td>
                        <td></td>
                      </tr>
                    @endempty
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
