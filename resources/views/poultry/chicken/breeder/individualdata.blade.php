@extends('layouts.newLayout')

@section('title')
  Family Summary
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Individual Summary</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="row">
            <div class="col s12 m5 l5">
              <a href="#"><img class="individual_animal_image" src="/images/chicken.JPG"></a>
            </div>
            <div class="col s12 m7 l7">
              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="card-panel">
                    <div class="row">
                      <div class="col s12 m12 l12">
                        <h5>{{$animal->registryid}}</h5>
                      </div>
                    </div>
                    <table class="responsive-table">
                      <tbody>
                        <tr>
                          <td>Generation</td>
                          <td><strong>{{$animal->getGeneration()->value}}</strong></td>
                        </tr>
                        <tr>
                          <td>Line</td>
                          <td><strong>{{$animal->getLine()->value}}</strong></td>
                        </tr>
                        <tr>
                          <td>Family</td>
                          <td><strong>{{$animal->getFamily()->value}}</strong></td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
            <div class="col s12 m12 l12">
              <div class="row">
                <div class="col s12 m6 l6">
                  <div class="row">
                    <div class="col s12 m12 l12">
                      <h5>Phenotypic Characteristics</h5>
                    </div>
                  </div>
                  <table class="responsive-table bordered">
                    <tbody>
                      <tr>
                        <td>Plummage Color</td>
                        <td><strong>{{$properties[8]->value}}</strong></td>
                      </tr>
                      <tr>
                        <td>Plummage Pattern</td>
                        <td><strong>{{$properties[9]->value}}</strong></td>
                      </tr>
                      <tr>
                        <td>Hackle Color</td>
                        <td><strong>{{$properties[10]->value}}</strong></td>
                      </tr>
                      <tr>
                        <td>Hackle Pattern</td>
                        <td><strong>{{$properties[11]->value}}</strong></td>
                      </tr>
                      <tr>
                        <td>Body Carriage</td>
                        <td><strong>{{$properties[12]->value}}</strong></td>
                      </tr>

                      <tr>
                        <td>Comb Type</td>
                        <td><strong>{{$properties[13]->value}}</strong></td>
                      </tr>

                      <tr>
                        <td>Comb Color</td>
                        <td><strong>{{$properties[14]->value}}</strong></td>
                      </tr>

                      <tr>
                        <td>Earlobe Color</td>
                        <td><strong>{{$properties[15]->value}}</strong></td>
                      </tr>

                      <tr>
                        <td>Iris Color</td>
                        <td><strong>{{$properties[16]->value}}</strong></td>
                      </tr>

                      <tr>
                        <td>Beak Color</td>
                        <td><strong>{{$properties[17]->value}}</strong></td>
                      </tr>

                      <tr>
                        <td>Shank Color</td>
                        <td><strong>{{$properties[18]->value}}</strong></td>
                      </tr>

                      <tr>
                        <td>Skin Color</td>
                        <td><strong>{{$properties[19]->value}}</strong></td>
                      </tr>

                      <tr>
                        <td>Other Unique Features</td>
                        <td><strong>{{$properties[20]->value}}</strong></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col s12 m6 l6">
                  <div class="row">
                    <div class="col s12 m12 l12">
                      <h5>Morphometric Characteristics</h5>
                    </div>
                  </div>
                  <table class="responsive-table bordered">
                    <tbody>
                      <tr>
                        <td>Height</td>
                        <td><strong>{{$properties[21]->value}}</strong></td>
                      </tr>
                      <tr>
                        <td>Weight</td>
                        <td><strong>{{$properties[22]->value}}</strong></td>
                      </tr>
                      <tr>
                        <td>Body Length</td>
                        <td><strong>{{$properties[23]->value}}</strong></td>
                      </tr>
                      <tr>
                        <td>Chest Circumference</td>
                        <td><strong>{{$properties[24]->value}}</strong></td>
                      </tr>
                      <tr>
                        <td>Wing Span</td>
                        <td><strong>{{$properties[25]->value}}</strong></td>
                      </tr>
                      <tr>
                        <td>Shank Lenghth</td>
                        <td><strong>{{$properties[26]->value}}</strong></td>
                      </tr>
                      <tr>
                        <td>Date Hatched</td>
                        <td><strong>{{$properties[27]->value}}</strong></td>
                      </tr>
                    </tbody>
                  </table>
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
