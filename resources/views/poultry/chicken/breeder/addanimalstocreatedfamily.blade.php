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
          <div class="col s11 m3 l3">
            <h4>Family {{$family->number}}</h4>
          </div>
          <div class="col s12 m4 l4 right-align">
           <a id="add_male_button" class="waves-effect waves-light btn modal-trigger yellow darken-3" href="#add_male_modal" data-family_id="{{$family->id}}">Add Males<i class="fas fa-mars right"></i></a>
          </div>
          <div class="col s12 m4 l4 right-align">
            @if ($family->male_id === null)
               <a class="waves-effect waves-light btn modal-trigger yellow darken-3 disabled">Add Females<i class="fas fa-venus right"></i></a>
            @else
               <a id="add_female_button" class="waves-effect waves-light btn modal-trigger yellow darken-3" href="{{URL::route('farm.poultry.get_female', [$family->id])}}" data-family_id="{{$family->id}}">Add Females<i class="fas fa-venus right"></i></a>
            @endif
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

          {{-- <div class="row">
            <div class="row">
              <div class="col s12 m12 l12 center">
                <button class="btn waves-effect waves-light yellow darken-3" type="submit">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
          </div> --}}
          {{-- {!!Form::close()!!} --}}
      </div>
    </div>

    <div id="add_male_modal" class="modal">
      {!! Form::open(['route' => 'farm.poultry.add_male', 'method' => 'post']) !!}
      <div class="modal-content">
        <div class="row">
          <div class="col s12 m12 l12">
             <h4 class="center">Available Males</h4>
          </div>
        </div>
        <div class="divider"></div>
        <div class="row">
          <div class="col s12 m12 l12">
          <p class="boxed_form">
            <input type="hidden" name="family_id" value="{{$family->id}}">
            <div id="male_modal_content">
            </div>
          </p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="modal-action modal-close waves-effect waves-green btn-flat" type="submit">Add</button>
      </div>
      {!!Form::close()!!}
    </div>

    <div id="add_female_modal" class="modal">
      {!! Form::open(['route' => 'farm.poultry.add_female', 'method' => 'post']) !!}
      <div class="modal-content">
        <div class="row">
          <div class="col s12 m12 l12">
             <h4 class="center">Available Females</h4>
          </div>
        </div>
        <div class="divider"></div>
        <div class="row">
          <div class="col s12 m12 l12">
          <p class="boxed_form">
            <input type="hidden" name="family_id" value="{{$family->id}}">
            <div id="female_modal_content">
            </div>
          </p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="modal-action modal-close waves-effect waves-green btn-flat" type="submit">Add</button>
      </div>
      {!!Form::close()!!}
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
   <script type="text/javascript" src="/js/poultry/ajax_requests.js"></script>
   @if(Session::has('add-male-empty'))
      <script>
         Materialize.toast('No male animal selected', 4000)
      </script>
   @elseif (Session::has('add-male-success'))
      <script>
         Materialize.toast('Animals added', 4000)
      </script>
   @endif
@endsection
