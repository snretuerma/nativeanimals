@extends('layouts.newLayout')

@section('title')
  Breeder - Family Record
@endsection

@section('initScriptsAndStyles')
  {{-- s --}}
@endsection

@section('content')
    {{-- <family-record-form :generations="{{$generations}}" lines="{{$lines}}" :pens="{{$pens}}">

    </family-record-form> --}}
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="row valign-wrapper">
          <div class="col s1 m1 l1">
            <a href="{{route('farm.poultry.breeder.familymenu')}}" class="back_button previous round">&#8249;</a>
          </div>
          <div class="col s11 m7 l7">
            <h4>Family {{$family->number}}</h4>
          </div>
          <div class="col s12 m4 l4 right-align">
            <a class="waves-effect waves-light btn modal-trigger yellow darken-3" href="#add_animals_modal">Add Animals</a>
          </div>
        </div>

        <div class="divider"></div>
          <div class="row">
            <div class="col s12 m12 l12">
              <table class="bordered responsive-table">
                <thead>
                  <tr>
                    <th>Animal ID</th>
                    <th>Generation</th>
                    <th>Line</th>
                    <th>Date Added</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($members as $member)
                    <tr>
                      <td>{{$member->getAnimalInstance()->registryid}}</td>
                      <td>{{$member->getAnimalInstance()->getGeneration()->value}}</td>
                      <td>{{$member->getAnimalInstance()->getLine()->value}}</td>
                      <td>{{$member->date_start}}</td>
                    </tr>
                  @empty
                    <tr>
                      <td></td>
                      <td></td>
                      <td><span>Family has no members</span></td>
                      <td></td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="row">
              <div class="col s12 m12 l12 center">
                <button class="btn waves-effect waves-light yellow darken-3" type="submit">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
          </div>
          {{-- {!!Form::close()!!} --}}
      </div>
    </div>

    <div id="add_animals_modal" class="modal">
      {!! Form::open(['route' => 'farm.poultry.page_add_animals', 'method' => 'post']) !!}
      <div class="modal-content">
        <div class="row">
          <div class="col s12 m12 l12">
          <h4>Available Animals</h4>
          </div>
        </div>
        <div class="divider"></div>
        <div class="row">
          <div class="col s12 m12 l12">
          <p class="boxed_form">
            <input type="hidden" name="family_id" value="{{$family->id}}">
            @forelse ($add_animals as $add_animal)
                <div class="col 12 m6 l6">
                  <input name="animals[]" value="{{$add_animal->id}}" type="checkbox" class="filled-in" id="{{$add_animal->id}}" />
                  <label for="{{$add_animal->id}}">{{$add_animal->registryid}}</label>
                </div>
            @empty
              <div class="row">
                <div class="col s12 m12 l12 center-align">
                  No animals to add
                </div>
              </div>
            @endforelse
          </p>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="modal-action modal-close waves-effect waves-green btn-flat" type="submit">Agree</button>
      </div>
      {!!Form::close()!!}
    </div>

@endsection

@section('scripts')

@endsection
