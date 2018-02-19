@extends('layouts.newLayout')

@section('title')
  Dashboard
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Dashboard</h4>
      <div class="divider"></div>
      <div class="row">

        <div class="col s12 m6 l6">
          <div class="card-panel yellow lighten-3">
            <h4>Breeder Status</h4>
              <canvas id="breeder" width="400" height="400"></canvas>
          </div>
        </div>

        <div class="col s12 m6 l6">
          <div class="card-panel yellow lighten-3">
            <h4>Replacement Status</h4>
            <canvas id="replacement" width="400" height="400"></canvas>
          </div>
        </div>

        <div class="col s12 m12 l12">
          <div class="card-panel yellow lighten-3">
            <h4>Overall</h4>
            <canvas id="overall" width="400" height="400"></canvas>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/dashboard_chartjs.js"></script>
@endsection
