@extends('layouts.newLayout')

@section('title')
  Breeder : Feeding Record List
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h5>Replacement : Feeding Record List</h5>
      <div class="divider"></div>
      <div class="row">
         <div class="col s12 m12 l12">
            Pen Number: <strong>{{$pen->number}}</strong>
         </div>
      </div>
      <div class="row">
          <div class="col s12 m12 l12">
              {{-- {!! Form::open(['route' => 'farm.poultry.page_phenomorphosearchid_value', 'method' => 'post']) !!} --}}
                {{-- structure  row -> col -> col: input-field --}}
                <div class="row center">
                  <div class="col s12 m12 l12">
                    <div class="row  valign-wrapper">
                      <div class="col s12 m8 l8">
                        <label for="date_search">Date</label>
                        <input id="date_search" type="text" class="datepicker" name="date">
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
                  <table class="bordered centered responsive-table highlight">
                    <thead>
                      <tr>
                        <th>Date Fed</th>
                        <th>Type Offered</th>
                        <th>Type Refused</th>
                        <th>Amount Offered</th>
                        <th>Amount Refused</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                  <tbody>
                    @isset($feedings)
                      @foreach ($feedings as $feeding)
                        <tr>
                           <td>{{$feeding->date_fed}}</td>
                          <td>{{$feeding->feed_offered}}</td>
                          <td>{{$feeding->feed_refused}}</td>
                          <td>{{$feeding->amount_offered}}</td>
                          <td>{{$feeding->amount_refused}}</td>
                          <td><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Edit entry" href="{{URL::route('farm.poultry.replacement.feeding_record_edit', [$feeding->id])}}"><i class="material-icons">edit</i></a></td>
                        </tr>
                      @endforeach
                    @endisset
                 @empty($feedings)
                      <tr>
                        <td></td>
                        <td></td>
                        <td>No Data</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    @endempty
                  </tbody>
                  </table>
                </div>
              </div>
              <div class="row center">
                 <div class="col s12 m12 l12">
                    {{ $feedings->links() }}
                 </div>
              </div>
          </div>
      </div>
      <div class="fixed-action-btn">
        <a data-position="left" data-delay="50" data-tooltip="Add family data" href="{{URL::route('farm.poultry.replacement.feeding_record_form', [$pen->id])}}" class="btn-floating btn-large yellow darken-3 tooltipped">
          <i class="large material-icons">add</i>
        </a>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
