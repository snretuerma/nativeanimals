@extends('layouts.newLayout')

@section('title')
  Mortality and Sales
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Mortality and Sales</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {{-- Table for all the replacement stocks to be culled or sold --}}
              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="row">
                    {!! Form::open(['route' => 'farm.chicken.search_monthly_sales', 'method' => 'post']) !!}
                      <div class="input-field col s12 m8 l8">
                        <input value="" id="search" type="text" class="validate" name="search">
                        <label class="active" for="search">Search</label>
                      </div>
                      <div class="col s12 m4 l4">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                          <i class="material-icons right">search</i>
                        </button>
                      </div>
                    {!!Form::close()!!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col s12 m12 l12">
                  <table class="responsive-table highlight bordered highlight centered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Generation</th>
                      <th>Line</th>
                      <th>Family</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <tbody>
                      @isset($replacement)
                        @forelse ($replacement as $animal)
                          <tr>
                            <td>{{$animal->registryid}}</td>
                            <td>{{$animal->getGeneration()}}</td>
                            <td>{{$animal->getLine()}}</td>
                            <td>{{$animal->getFamily()}}</td>
                            <td>
                              <div class="col s12 m6 l6">
                                <a href="#!" class="culled"><i class="fa fa-minus modal-trigger" aria-hidden="true"  href="#culled-modal" data-id="{{$animal->id}}"></i></a>
                              </div>
                              <div class="col s12 m6 l6">
                                <a href="#!" class="sold"><i class="material-icons modal-trigger" href="#sold-modal"  data-id="{{$animal->id}}">attach_money</i></a>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      @endisset
                      {{-- @empty($items)
                        <tr>
                          <td></td>
                          <td></td>
                          <td>No Data Found</td>
                          <td></td>
                          <td></td>
                        </tr>
                      @endempty --}}
                    </tbody>
                  </table>
                </div>
              </div>
              <ul class="pagination center"> <li>{{ $replacement->appends(Request::except('page'))->links() }}</li> </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="culled-modal" class="modal modal-fixed-footer">
    {!! Form::open(['route' => 'farm.poultry.addto_culled',  'method' => 'post']) !!}
      <div class="modal-content">
        <div class="row">
          <div class="col s12 m12 l12">
            Are you sure you want to mark this entry as culled?
            <div class="row">
              <div class="input-field col s12 m12 l12">
                <input id="culled_modal_input" type="hidden" name="culled_animal_id" value="">
                <textarea id="input_culled" class="materialize-textarea" name="culled_remarks"></textarea>
                <label for="input_culled">Remarks</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" type="submit">Submit</button>
      </div>
    {!!Form::close()!!}
  </div>
  <div id="sold-modal" class="modal modal-fixed-footer">
    {!! Form::open(['route' => 'farm.poultry.addto_monthly_sales', 'method' => 'post']) !!}
      <div class="modal-content">
        <div class="row">
          <div class="col s12 m12 l12">
            Are you sure you want to mark this entry as sold?
            <div class="row">
              <div class="input-field col s12 m12 l12">
                <input id="sold_modal_input" type="hidden" name="sold_animal_id" value="">
                <input id="input_sold" type="number" name="sold_weight" min=0 value=0>
                <label for="input_sold" data-success="right">Weight</label>
                {{-- <input placeholder="Reason for selling this entry" id="sell_input" type="text" class="validate">
                <label for="sell_input">Remarks</label> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" type="submit">Submit</button>
      </div>
    {!!Form::close()!!}
  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/vue/addtosales.js"></script>
@endsection
