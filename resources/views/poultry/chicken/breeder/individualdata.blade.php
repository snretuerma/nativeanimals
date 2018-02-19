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
                        <h5>0001</h5>
                      </div>
                    </div>
                    <table class="responsive-table">
                      <tbody>
                        <tr>
                          <td>Generation</td>
                          <td><strong>0001</strong></td>
                        </tr>
                        <tr>
                          <td>Line</td>
                          <td><strong>0001</strong></td>
                        </tr>
                        <tr>
                          <td>Family</td>
                          <td><strong>0002</strong></td>
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
                        <td><strong>Brown</strong></td>
                      </tr>
                      <tr>
                        <td>Plummage Pattern</td>
                        <td><strong>Laced</strong></td>
                      </tr>
                      <tr>
                        <td>Hackle Color</td>
                        <td><strong>Red</strong></td>
                      </tr>
                      <tr>
                        <td>Hackle Pattern</td>
                        <td><strong>Plain</strong></td>
                      </tr>
                      <tr>
                        <td>Body Carriage</td>
                        <td><strong>Upright</strong></td>
                      </tr>

                      <tr>
                        <td>Comb Type</td>
                        <td><strong>Single</strong></td>
                      </tr>

                      <tr>
                        <td>Comb Color</td>
                        <td><strong>Red</strong></td>
                      </tr>

                      <tr>
                        <td>Earlobe Color</td>
                        <td><strong>White</strong></td>
                      </tr>

                      <tr>
                        <td>Iris Color</td>
                        <td><strong>Orange</strong></td>
                      </tr>

                      <tr>
                        <td>Beak Color</td>
                        <td><strong>White</strong></td>
                      </tr>

                      <tr>
                        <td>Shank Color</td>
                        <td><strong>White</strong></td>
                      </tr>

                      <tr>
                        <td>Skin Color</td>
                        <td><strong>White</strong></td>
                      </tr>

                      <tr>
                        <td>Other Unique Features</td>
                        <td><strong>None</strong></td>
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
                        <td><strong>27 cm</strong></td>
                      </tr>
                      <tr>
                        <td>Weight</td>
                        <td><strong>1.7 kg</strong></td>
                      </tr>
                      <tr>
                        <td>Body Length</td>
                        <td><strong>34 cm</strong></td>
                      </tr>
                      <tr>
                        <td>Chest Circumference</td>
                        <td><strong>37 cm</strong></td>
                      </tr>
                      <tr>
                        <td>Wing Span</td>
                        <td><strong>38 cm</strong></td>
                      </tr>
                      <tr>
                        <td>Shank Lenghth</td>
                        <td><strong>10 cm</strong></td>
                      </tr>
                      <tr>
                        <td>Date Hatched</td>
                        <td><strong>01-01-2018</strong></td>
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
