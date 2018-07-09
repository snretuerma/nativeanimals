@extends('layouts.newLayout')

@section('title')
    Family Summary
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="row">
                <div class="col s12 m12 l12" >
                    <h5>Family Summary</h5>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card-panel">
                        <div class="row">
                            <div class="col s12 m6 l6">

                            </div>
                            <div class="col s12 m6 l6">
                                <div class="row">
                                    <div class="col s12 m12 l12"><h4>{{$family->number}}</h4></div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6 l6">Generation</div>
                                    <div class="col s12 m6 l6">Line</div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m5 l5 offset-m1 offset-l1"><h5>{{$family->getGeneration()->number}}</h5></div>
                                    <div class="col s12 m5 l5 offset-m1 offset-l1"><h5>{{$family->getLine()->number}}</h5></div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6 l6">Male <i class="fas fa-mars"></i></div>
                                    <div class="col s12 m6 l6">Female <i class="fas fa-venus"></i></div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m5 l5 offset-m1 offset-l1"><h5>{{$family->getNumberOfMaleAndFemale()[0]}}</h5></div>
                                    <div class="col s12 m5 l5 offset-m1 offset-l1"><h5>{{$family->getNumberOfMaleAndFemale()[1]}}</h5></div>
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
                                <div class="card">
                                    <div class="card-content">
                                        <h5>Summary</h5>
                                    </div>
                                    <div class="card-tabs">
                                        <ul class="tabs tabs-fixed-width">
                                            <li class="tab"><a href="#pheno">Phenotypic</a></li>
                                            <li class="tab"><a href="#morpho">Morphometric</a></li>
                                            <li class="tab"><a href="#prod">Production</a></li>
                                            <li class="tab"><a href="#mort">Mortality and Culling</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-content grey lighten-4">
                                        <div id="pheno">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Plummage Color</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Color</th>
                                                            <th>Frequency</th>
                                                            <th>Percentage</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($pheno[0] as $key=>$value)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$value}}</td>
                                                                <td>{{round(($value/array_sum($pheno[0]))*100, 2)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Plummage Pattern</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Pattern</th>
                                                            <th>Frequency</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($pheno[1] as $key=>$value)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$value}}</td>
                                                                <td>{{round(($value/array_sum($pheno[1]))*100, 2)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Hackle Color</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Color</th>
                                                            <th>Frequency</th>
                                                            <th>Percentage</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($pheno[2] as $key=>$value)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$value}}</td>
                                                                <td>{{round(($value/array_sum($pheno[2]))*100, 2)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Hackle Pattern</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Pattern</th>
                                                            <th>Frequency</th>
                                                            <th>Percentage</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($pheno[3] as $key=>$value)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$value}}</td>
                                                                <td>{{round(($value/array_sum($pheno[3]))*100, 2)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Body Carriage</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Type</th>
                                                            <th>Frequency</th>
                                                            <th>Percentage</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($pheno[4] as $key=>$value)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$value}}</td>
                                                                <td>{{round(($value/array_sum($pheno[4]))*100, 2)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Comb Type</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Type</th>
                                                            <th>Frequency</th>
                                                            <th>Percentage</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($pheno[5] as $key=>$value)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$value}}</td>
                                                                <td>{{round(($value/array_sum($pheno[5]))*100, 2)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Comb Color</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Color</th>
                                                            <th>Frequency</th>
                                                            <th>Percentage</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($pheno[6] as $key=>$value)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$value}}</td>
                                                                <td>{{round(($value/array_sum($pheno[6]))*100, 2)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Earlobe Color</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Color</th>
                                                            <th>Frequency</th>
                                                            <th>Percentage</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($pheno[7] as $key=>$value)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$value}}</td>
                                                                <td>{{round(($value/array_sum($pheno[7]))*100, 2)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Iris Color</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Color</th>
                                                            <th>Frequency</th>
                                                            <th>Percentage</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($pheno[8] as $key=>$value)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$value}}</td>
                                                                <td>{{round(($value/array_sum($pheno[8]))*100, 2)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Beak Color</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Color</th>
                                                            <th>Frequency
                                                            <th>Percentage</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($pheno[9] as $key=>$value)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$value}}</td>
                                                                <td>{{round(($value/array_sum($pheno[9]))*100, 2)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Shank Color</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Color</th>
                                                            <th>Frequency</th>
                                                            <th>Percentage</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($pheno[10] as $key=>$value)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$value}}</td>
                                                                <td>{{round(($value/array_sum($pheno[10]))*100, 2)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Skin Color</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Color</th>
                                                            <th>Frequency</th>
                                                            <th>Percentage</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($pheno[11] as $key=>$value)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$value}}</td>
                                                                <td>{{round(($value/array_sum($pheno[11]))*100, 2)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="morpho">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Height</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Number of Samples</th>
                                                            <th>Average</th>
                                                            <th>Standard Deviation</th>
                                                            <th>Minimum</th>
                                                            <th>Maximum</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{count($morpho[0])}}</td>
                                                            <td>{{round(array_sum($morpho[0])/count($morpho[0]), 4)}}</td>
                                                                @if(\App\Helpers\AppHelper::stats_standard_deviation($morpho[0]) == false)
                                                                    <td>NaN</td>
                                                                @else
                                                                    <td>{{round(\App\Helpers\AppHelper::stats_standard_deviation($morpho[0]), 4)}}</td>
                                                                @endif
                                                            <td>{{min($morpho[0])}}</td>
                                                            <td>{{max($morpho[0])}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Weight</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Number of Samples</th>
                                                            <th>Average</th>
                                                            <th>Standard Deviation</th>
                                                            <th>Minimum</th>
                                                            <th>Maximum</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{count($morpho[1])}}</td>
                                                            <td>{{round(array_sum($morpho[1])/count($morpho[1]), 4)}}</td>
                                                            @if(\App\Helpers\AppHelper::stats_standard_deviation($morpho[1]) == false)
                                                                <td>NaN</td>
                                                            @else
                                                                <td>{{round(\App\Helpers\AppHelper::stats_standard_deviation($morpho[1]), 4)}}</td>
                                                            @endif
                                                            <td>{{min($morpho[1])}}</td>
                                                            <td>{{max($morpho[1])}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Body Length</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Number of Samples</th>
                                                            <th>Average</th>
                                                            <th>Standard Deviation</th>
                                                            <th>Minimum</th>
                                                            <th>Maximum</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{count($morpho[2])}}</td>
                                                            <td>{{round(array_sum($morpho[2])/count($morpho[2]), 4)}}</td>
                                                            @if(\App\Helpers\AppHelper::stats_standard_deviation($morpho[2]) == false)
                                                                <td>NaN</td>
                                                            @else
                                                                <td>{{round(\App\Helpers\AppHelper::stats_standard_deviation($morpho[2]), 4)}}</td>
                                                            @endif
                                                            <td>{{min($morpho[2])}}</td>
                                                            <td>{{max($morpho[2])}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Chest Circumference</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Number of Samples</th>
                                                            <th>Average</th>
                                                            <th>Standard Deviation</th>
                                                            <th>Minimum</th>
                                                            <th>Maximum</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{count($morpho[3])}}</td>
                                                            <td>{{round(array_sum($morpho[3])/count($morpho[3]), 4)}}</td>
                                                            @if(\App\Helpers\AppHelper::stats_standard_deviation($morpho[3]) == false)
                                                                <td>NaN</td>
                                                            @else
                                                                <td>{{round(\App\Helpers\AppHelper::stats_standard_deviation($morpho[3]), 4)}}</td>
                                                            @endif
                                                            <td>{{min($morpho[3])}}</td>
                                                            <td>{{max($morpho[3])}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Wing Span</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Number of Samples</th>
                                                            <th>Average</th>
                                                            <th>Standard Deviation</th>
                                                            <th>Minimum</th>
                                                            <th>Maximum</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{count($morpho[4])}}</td>
                                                            <td>{{round(array_sum($morpho[4])/count($morpho[4]), 4)}}</td>
                                                            @if(\App\Helpers\AppHelper::stats_standard_deviation($morpho[4]) == false)
                                                                <td>NaN</td>
                                                            @else
                                                                <td>{{round(\App\Helpers\AppHelper::stats_standard_deviation($morpho[4]), 4)}}</td>
                                                            @endif
                                                            <td>{{min($morpho[4])}}</td>
                                                            <td>{{max($morpho[4])}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Shank Length</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Number of Samples</th>
                                                            <th>Average</th>
                                                            <th>Standard Deviation</th>
                                                            <th>Minimum</th>
                                                            <th>Maximum</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{count($morpho[5])}}</td>
                                                            <td>{{round(array_sum($morpho[5])/count($morpho[5]), 4)}}</td>
                                                            @if(\App\Helpers\AppHelper::stats_standard_deviation($morpho[5]) == false)
                                                                <td>NaN</td>
                                                            @else
                                                                <td>{{round(\App\Helpers\AppHelper::stats_standard_deviation($morpho[5]), 4)}}</td>
                                                            @endif
                                                            <td>{{min($morpho[5])}}</td>
                                                            <td>{{max($morpho[5])}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="prod">
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <div class="card">
                                                        <div class="card-content"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Percent Fertility</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Average</th>
                                                            <th>Standard Deviation</th>
                                                            <th>Minimum</th>
                                                            <th>Maximum</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(!empty($percentfertility))
                                                            <tr>
                                                                <td>{{round(array_sum($percentfertility)/count($percentfertility), 2)}}</td>
                                                                @if(\App\Helpers\AppHelper::stats_standard_deviation($percentfertility) == false)
                                                                <td>0</td>
                                                                @else
                                                                <td>{{round(\App\Helpers\AppHelper::stats_standard_deviation($percentfertility), 2)}}</td>
                                                                @endif
                                                                <td>{{round(min($percentfertility), 2)}}</td>
                                                                <td>{{round(max($percentfertility), 2)}}</td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td></td>
                                                                <td>Empty</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <h5>Percent Hatchability</h5>
                                                    <table class="responsive-table highlight bordered centered">
                                                        <thead>
                                                        <tr>
                                                            <th>Average</th>
                                                            <th>Standard Deviation</th>
                                                            <th>Minimum</th>
                                                            <th>Maximum</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(!empty($percenthatchability))
                                                            <tr>
                                                                <td>{{round(array_sum($percenthatchability)/count($percenthatchability), 2)}}</td>
                                                                @if(\App\Helpers\AppHelper::stats_standard_deviation($percenthatchability) == false)
                                                                    <td>0</td>
                                                                @else
                                                                    <td>{{round(\App\Helpers\AppHelper::stats_standard_deviation($percenthatchability), 2)}}</td>
                                                                @endif
                                                                <td>{{round(min($percenthatchability), 2)}}</td>
                                                                <td>{{round(max($percenthatchability), 2)}}</td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td></td>
                                                                <td>Empty</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="mort">
                                            sadasd
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
