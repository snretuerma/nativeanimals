@extends('layouts.swinedefault ')

@section('initScriptsAndStyles')
  <link type="text/css" rel="stylesheet" href="{{ asset('css/pig.css') }}"  media="screen,projection"/>
@endsection

@section('title')
  Animal Records
@endsection

@section('content')
  <main>
    <div class="container">
      <div class="row">
          <h4>View Animal Records</h4>
          <div class="divider"></div>
          <div class="row">
          <div class="col s12">
            <div class="row">
              <div class="col s11 offset-s1">
                <ul class="tabs tabs-fixed-width red darken-4">
                  <li class="tab col s6"><a href="#tab1">Sow</a></li>
                  <li class="tab col s6"><a href="#tab2">Boar</a></li>
                </ul>
              </div>
              <div id="tab1" class="col s11 offset-s1">
                <table class="centered striped">
                  <thead>
                    <tr>
                      <th>Registration ID</th>
                      <th>Edit/Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a class="modal-trigger" href="#modalsow">QUEBAIBP-20161F1000</a></td>
                      <td>
                        <a href="#modal2" class="btn-floating yellow waves-light waves-effect modal-trigger"><i class="material-icons">edit</i></a>
                        <a href="#!" class="btn-floating red waves-light waves-effect"><i class="material-icons">delete</i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div id="tab2" class="col s11 offset-s1">
                <table class="centered striped">
                  <thead>
                    <tr>
                      <th>Registration ID</th>
                      <th>Edit/Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a class="modal-trigger" href="#modalboar">QUEBAIBP-20161M2000</a></td>
                      <td>
                        <a href="#modal2" class="btn-floating yellow waves-light waves-effect modal-trigger"><i class="material-icons">edit</i></a>
                        <a href="#!" class="btn-floating red waves-light waves-effect"><i class="material-icons">delete</i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- Modal Structure -->
                <div id="modalsow" class="modal modal-fixed-footer">
                  <div class="modal-content red darken-4 white-text">
                    <h4>View record</h4>
                    <div class="row">
                      <div class="col s4">
                        <img src="images/sow.jpg" width="80%">
                      </div>
                      <div class="col s8">
                        <div class="white black-text">
                          <h5>Registration ID</h5>
                        </div>
                        <div style="margin-top:10px;">
                          <div class="col s5 card-panel white black-text center">
                            <h5>? months</h5>
                            <p>Age</p>
                          </div>
                          <div class="col s5 push-s2 card-panel white black-text center">
                            <h5>? kg</h5>
                            <p>Body Weight</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12">
                        what to display, what to view
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer red lighten-2">
                    <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Close</a>
                  </div>
                </div>
                <div id="modalboar" class="modal modal-fixed-footer">
                  <div class="modal-content red darken-4 white-text">
                    <h4>View record</h4>
                    <div class="row">
                      <div class="col s4">
                        <img src="images/boar.jpg" width="80%">
                      </div>
                      <div class="col s8">
                        <div class="white black-text">
                          <h5>Registration ID</h5>
                        </div>
                        <div style="margin-top:10px;">
                          <div class="col s5 card-panel white black-text center">
                            <h5>? months</h5>
                            <p>Age</p>
                          </div>
                          <div class="col s5 push-s2 card-panel white black-text center">
                            <h5>? kg</h5>
                            <p>Body Weight</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer red lighten-2">
                    <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Close</a>
                  </div>
                </div>
                <div id="modal2" class="modal modal-fixed-footer">
                  <div class="modal-content red darken-4 white-text">
                    <h4>Edit record</h4>
                    <p>A bunch of text</p>
                  </div>
                  <div class="modal-footer red lighten-2">
                    <a href="#!" class="modal-action modal-close btn waves-effect waves-light green darken-4">Save</a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection

@section('scripts')
  {{-- <script type="text/javascript" src="{{asset('js/custom.js')}}"></script> --}}
@endsection
