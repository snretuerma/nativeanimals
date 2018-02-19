@extends('layouts.newLayout')

@section('title')
  Growth Performance
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Growth Performance</h4>
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
                      <th>Weight Recorded</th>
                      <th>Add Record</th>
                      </tr>
                    </thead>

                  <tbody>

                    @isset($animals)
                      @foreach ($animals as $animal)
                        <tr>
                          <td>{{ $animal->registryid }}</td>
                          @if ($animal->growth == 0)
                            <td>No Weight Record</td>
                          @elseif ($animal->growth == 1)
                            <td>Weight at Day 0</td>
                          @elseif ($animal->growth == 2)
                            <td>Weight at Day 21</td>
                          @elseif ($animal->growth == 3)
                            <td>Weight at Day 45</td>
                          @elseif ($animal->growth == 4)
                            <td>Weight at Day 75</td>
                          @elseif ($animal->growth == 5)
                            <td>Weight at Day 100</td>
                          @else
                            <td>Weight at Day 120</td>
                          @endif
                          @if ($animal->growth < 7)
                            <td class="center"><a href="{{ URL::route('farm.poultry.page_feeding_records_id', [$animal->id]) }}"><i class="material-icons">add_circle</i></a></td>
                          @else
                              <td class="center"><i class="material-icons">add_circle</i></td>
                          @endif
                        </tr>
                      @endforeach
                    @endisset
                    @empty($animals)
                      <tr>
                        <td></td>
                        <td>No Data Found</td>
                        <td></td>
                      </tr>
                    @endempty
                  </tbody>
                  </table>

                  <ul class="pagination center"> <li>{{ $animals->appends(Request::except('page'))->links() }}</li> </ul>

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
