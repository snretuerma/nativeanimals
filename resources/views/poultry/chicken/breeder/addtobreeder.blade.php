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
                    <div class="row">
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
                    </div>
                    <div class="row">
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
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <select>
                          <option value="" disabled selected>Select Mother ID</option>
                          @forelse ($femalebreeders as $female)
                            <option value="{{$female->value}}">{{$female->value}}</option>
                          @empty
                            No Available Families
                          @endforelse
                        </select>
                        <label>Mother</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m12 l12">
                        <a class="waves-effect waves-light btn"><i class="material-icons left">add</i>Add New Family</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text" class="validate">
                        <label for="search">Search</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="row">
                      @forelse ($replacements as $replacement)
                        <div class="col s6 m4 l4">
                          <input type="checkbox" class="filled-in" id="{{$replacement->id}}" name="add_breeder[]" value="{{$replacement->id}}"/>
                          <label for="{{$replacement->id}}">{{$replacement->registryid}}</label>
                        </div>
                      @empty
                        <div class="col s12 m12 l12 center">
                          No Animals to Add
                        </div>
                      @endforelse
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12 center">
                    <button class="btn waves-effect waves-light yellow darken-3" type="submit">Add
                      <i class="material-icons right">add</i>
                    </button>
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
