{{-- DELETE IF NOT USED --}}
@extends('layouts.newLayout')

@section('title')
  Family Records
@endsection

@section('initScriptsAndStyles')

@endsection

@section('content')
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Family Records</h4>
      <div class="divider"></div>
      <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <div class="input-field col s12">
           <select>
             <option value="" disabled selected>Choose Family</option>
             <option value="1">Family 1</option>
             <option value="2">Family 2</option>
             <option value="3">Family 3</option>
           </select>
           <label>Family ID</label>
         </div>
         <div class="row">
           <div class="col s12 m12 l12">
            <table class="bordered responsive-table">
              <thead>
              <tr>
              <th>Registry ID</th>
              <th>Status</th>
              <th></th>
              </tr>
              </thead>

              <tbody>
              <tr>
              <td>0001</td>
              <td>Active</td>
              <td><i class="fas fa-plus"></i></td>
              </tr>
              <tr>
              <td>0002</td>
              <td>Active</td>
              <td><i class="fas fa-plus"></i></td>
              </tr>
              <tr>
              <td>0003</td>
              <td>Active</td>
              <td><i class="fas fa-plus"></i></td>
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
@endsection

@section('scripts')

@endsection
