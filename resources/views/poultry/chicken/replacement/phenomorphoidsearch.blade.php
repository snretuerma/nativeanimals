@extends('layouts.newLayout')

@section('title')
  Morphometric and Phenotypic Characteristics
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Add Morphometric and Phenotypic Characteristics</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {!! Form::open(['route' => 'farm.poultry.page_phenomorphosearchid_value', 'method' => 'post']) !!}
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
                      <th>Phenotypic</th>
                      <th>Morphometric</th>
                      </tr>
                    </thead>

                  <tbody>

                    @isset($replacement)
                      @foreach ($replacement as $animal)
                        <tr>
                          <td>{{ $animal->registryid }}</td>
                          @if ($animal->phenotypic == true)
                            <td class="center"><i class="material-icons">add_circle</i></td>
                          @else
                            <td class="center"><a href="{{ URL::route('farm.poultry.page_replacement_phenotypic_id', [$animal->id]) }}"><i class="material-icons">add_circle</i></a></td>
                          @endif
                          @if ($animal->morphometric == true)
                            <td class="center"><i class="material-icons">add_circle</i></td>
                          @else
                            <td class="center"><a href="{{ URL::route('farm.poultry.page_replacement_morphometric_id', [$animal->id]) }}"><i class="material-icons">add_circle</i></a></td>
                          @endif
                        </tr>
                      @endforeach
                    @endisset
                    @empty($replacement)
                      <tr>
                        <td></td>
                        <td>No Data Found</td>
                        <td></td>
                      </tr>
                    @endempty
                  </tbody>
                  </table>

                  <ul class="pagination center"> <li>{{ $replacement->appends(Request::except('page'))->links() }}</li> </ul>

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
