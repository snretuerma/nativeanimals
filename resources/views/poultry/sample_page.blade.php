@extends('layouts.newLayout')

@section('title')
  Create Pens
@endsection

@section('initScriptsAndStyles')
  <script>
    var data ={!! json_encode($pens) !!};
  </script>
@endsection

@section('content')
  {{-- <template :pens={{$pens}}></template> --}}
  <div class="row">
      <add-pens></add-pens>

      <div class="col s12 m12 l12">
        <div class="card-panel">
          <table class="centered responsive-table bordered">
            <thead>
              <tr>
                <th>Pen Number</th>
                <th>Capacity</th>
                <th>Pen Type</th>
              </tr>
            </thead>

            <tbody>
              {{-- <template >
                <pen-rows></pen-rows>
              </template> --}}

              <tr v-for="(pen, index) in pens">
                <td>@{{ pen.number }}</td>
                <td>@{{ pen.capacity }}</td>
                <td>sample</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/vue/pens.js"></script>
@endsection
