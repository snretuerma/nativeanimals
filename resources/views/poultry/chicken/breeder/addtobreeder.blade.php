@extends('layouts.newLayout')

@section('title')
  Breeder - Add to Family
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Add to Breeder Group</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {!! Form::open(['route' => 'farm.poultry.page_add_animals_breeder', 'method' => 'post']) !!}
                <div class="row">
                  <div class="col s12 m12 l12">
                    {{-- <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <select>
                          <option value="" disabled selected>Select Family</option>
                          @forelse ($families as $family)
                            <option value="{{$family->value}}">{{$family->value}}</option>
                          @empty
                            No Available Families
                          @endforelse
                        </select>
                        <label>Family</label>
                      </div>
                    </div> --}}
                    {{-- <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <select>
                          <option value="" disabled selected>Select Father ID</option>
                          @forelse ($malebreeders as $male)
                            <option value="{{$male->value}}">{{$male->value}}</option>
                          @empty
                            No Available Families
                          @endforelse
                        </select>
                        <label>Father</label>
                      </div>
                    </div> --}}
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text" class="validate">
                        <label for="search">Search ID</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <table class="bordered highlight responsive-table centered">
                      <thead>
                        <tr>
                          <th data-field="id">Registry ID</th>
                          <th data-field="action1">Add to Family</th>
                          <th data-field="action2">Create Family</th>
                        </tr>
                      </thead>

                      <tbody>
                        @forelse ($replacements as $replacement)
                          <tr>
                            <td>{{$replacement->registryid}}</td>
                            <td>
                              <a><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                            </td>
                            <td>
                              <a><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td></td>
                            <td>No Animals in Replacement Stocks</td>
                            <td></td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              {!!Form::close()!!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
