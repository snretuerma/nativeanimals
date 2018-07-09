@extends('layouts.newLayout')

@section('title')
    Family Records
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="row ">
                <div class="col s12 m4 l4 valign">
                    <h5>Family Records</h5>
                </div>
                <div class="col s12 m8 l8">
                    <div class="row">
                        <form class="col s12">
                            <div class="row valign-wrapper">
                                <div class="col s12 m9 l9 valign    ">
                                    <label>Generation</label>
                                    <select class="browser-default">
                                        <option value="" disabled selected>Choose generation</option>
                                        @foreach($gens as $gen)
                                        <option value="{{$gen->id}}">{{$gen->number}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col s12 m3 l3 valign">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">Change</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <ul class="tabs tabs-fixed-width">
                        <li class="tab col s3"><a href="#pheno">Phenotypic</a></li>
                        <li class="tab col s3"><a href="#morpho">Morphometric</a></li>
                        <li class="tab col s3"><a href="#prod">Production</a></li>
                        <li class="tab col s3"><a href="#inv">Inventory</a></li>
                    </ul>
                </div>
                <div id="pheno" class="col s12 m12 l12">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Plummage Color</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Plummage Pattern</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Pattern</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Pattern</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Hackle Color</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Hackle Pattern</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Pattern</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Pattern</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Body Carriage</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Comb Type</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Comb Color</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Earlobe Color</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Iris Color</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Beak Color</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Shank Color</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Skin Color</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Color</th>
                                                    <th>Frequency</th>
                                                    <th>Percentage</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
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
                <div id="morpho" class="col s12 m12 l12">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Height</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Samples</th>
                                                    <th>Average</th>
                                                    <th>std</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Samples</th>
                                                    <th>Average</th>
                                                    <th>std</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Weight</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Samples</th>
                                                    <th>Average</th>
                                                    <th>std</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Samples</th>
                                                    <th>Average</th>
                                                    <th>std</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Body Length</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Samples</th>
                                                    <th>Average</th>
                                                    <th>std</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Samples</th>
                                                    <th>Average</th>
                                                    <th>std</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Chest Circumference</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Samples</th>
                                                    <th>Average</th>
                                                    <th>std</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Samples</th>
                                                    <th>Average</th>
                                                    <th>std</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Wing Span</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Samples</th>
                                                    <th>Average</th>
                                                    <th>std</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Samples</th>
                                                    <th>Average</th>
                                                    <th>std</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Shank Length</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Male</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Samples</th>
                                                    <th>Average</th>
                                                    <th>std</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center">
                                            <h5>Female</h5>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <table class="responsive-table bordered highlight">
                                                <thead>
                                                <tr>
                                                    <th>Samples</th>
                                                    <th>Average</th>
                                                    <th>std</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
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
                <div id="prod" class="col s12 m12 l12">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Egg Production</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Egg Production Info</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Age at First Egg</th>
                                                            <th>Eggs by 40 weeks</th>
                                                            <th>Eggs per Laying Cycle</th>
                                                            <th>Laying Period</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Percent Fertility</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Average</th>
                                                            <th>std</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Percent Hatchability</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Average</th>
                                                            <th>std</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m4 l4">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Egg Quality at 35 weeks</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Mean</th>
                                                            <th>STD</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m4 l4">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Egg Quality at 40 weeks</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Mean</th>
                                                            <th>STD</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m4 l4">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Egg Quality at 60 weeks</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Mean</th>
                                                            <th>STD</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
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
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Feed Consumption</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Brooding</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Average</th>
                                                            <th>std</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Growing</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Average</th>
                                                            <th>std</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Laying</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Average</th>
                                                            <th>std</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
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
                </div>
                <div id="inv" class="col s12">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Mortality</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Brooding</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Average</th>
                                                            <th>std</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Growing</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Average</th>
                                                            <th>std</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Laying</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Average</th>
                                                            <th>std</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
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
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5>Sales</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Brooding</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Average</th>
                                                            <th>std</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Growing</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Average</th>
                                                            <th>std</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <strong>Laying</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <table class="responsive-table bordered highlight">
                                                        <thead>
                                                        <tr>
                                                            <th>Family</th>
                                                            <th>Average</th>
                                                            <th>std</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
