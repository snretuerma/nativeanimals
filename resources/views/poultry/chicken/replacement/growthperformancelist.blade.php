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
                        <label for="id_no">Date Hatched</label>
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
                      <th>ID</th>
                      <th>Date Hatched</th>
                      <th>Day 0</th>
                      <th>Day 21</th>
                      <th>Day 45</th>
                      <th>Day 75</th>
                      <th>Day 100</th>
                      <th>Day 120</th>
                      </tr>
                    </thead>

                  <tbody>

                    @isset($chicks)
                      @foreach ($chicks as $chick)
                        <tr>
                          <td>{{ $chick->id }}</td>
                          <td>{{ $chick->date_hatched }}</td>
                          @if (substr($chick->growth, 0, 1) == 0)
                            <td class="center"><a href="{{ URL::route('farm.poultry.replacement_growth_performance_id', ['id' => $chick->id, 'record' => 0]) }}"><i class="material-icons">add_circle</i></a></td>
                          @else
                              <td class="center"><i class="material-icons">add_circle</i></td>
                          @endif

                          @if (substr($chick->growth, 1, 1) == 0)
                            <td class="center"><a href="{{ URL::route('farm.poultry.replacement_growth_performance_id', ['id' => $chick->id, 'record' => 21]) }}"><i class="material-icons">add_circle</i></a></td>
                          @else
                              <td class="center"><i class="material-icons">add_circle</i></td>
                          @endif

                          @if (substr($chick->growth, 2, 1) == 0)
                            <td class="center"><a href="{{ route('farm.poultry.replacement_growth_performance_id', ['id' => $chick->id, 'record' => 45]) }}"><i class="material-icons">add_circle</i></a></td>
                          @else
                              <td class="center"><i class="material-icons">add_circle</i></td>
                          @endif

                          @if (substr($chick->growth, 3, 1) == 0)
                            <td class="center"><a href="{{ URL::route('farm.poultry.replacement_growth_performance_id', ['id' => $chick->id, 'record' => 75]) }}"><i class="material-icons">add_circle</i></a></td>
                          @else
                              <td class="center"><i class="material-icons">add_circle</i></td>
                          @endif

                          @if (substr($chick->growth, 4, 1) == 0)
                            <td class="center"><a href="{{ URL::route('farm.poultry.replacement_growth_performance_id', ['id' => $chick->id, 'record' => 100]) }}"><i class="material-icons">add_circle</i></a></td>
                          @else
                              <td class="center"><i class="material-icons">add_circle</i></td>
                          @endif

                          @if (substr($chick->growth, 5, 1) == 0)
                            <td class="center"><a href="{{ URL::route('farm.poultry.replacement_growth_performance_id', [$chick->id, 120]) }}"><i class="material-icons">add_circle</i></a></td>
                          @else
                              <td class="center"><i class="material-icons">add_circle</i></td>
                          @endif
                        </tr>
                      @endforeach
                    @endisset
                    @empty($chick)
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>No Data Found</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    @endempty
                  </tbody>
                  </table>

                  {{-- <ul class="pagination center"> <li>{{ $animals->appends(Request::except('page'))->links() }}</li> </ul> --}}

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
