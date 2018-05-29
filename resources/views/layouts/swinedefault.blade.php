<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8" />
    <title>Native Pigs: @yield('title')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/thirdparty/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.1/css/materialize.min.css">
    <link rel="stylesheet" href="/css/global.css">
    @yield('initScriptsAndStyles')
  </head>
  <body>

    {{-- Fixed Side Navigation --}}
    <div class="navbar-fixed">
      <nav class="red darken-4" role="navigation">
        <div class="nav-wrapper">
          <a href="dashboard.html" class="brand-logo"><img src="/images/logo-swine.png" height="60" / ></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="dashboard-swine.html">Home</a></li>
            <li><a href="dashboard-swine.html">{{ Auth::user()->name }}</a></li>
            <li><a href="logout" id="logoutbutton" onclick="window.location='https://accounts.google.com/Logout?&continue=http://www.google.com/';">Logout</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <ul id="slide-out" class="side-nav grey lighten-2 fixed">
      <li>
        <div class="user-view">
          <div class="background red darken-4"></div>
          <a href="#!"><img class="circle" src="/images/farmer.png"></a>
          <a href="#!"><span class="white-text name">{{ Auth::user()->name }}</span></a>
          <a href="#!"><span class="white-text email">{{ Auth::user()->email   }}</span></a>
        </div>
      </li>
      <li><a href="{{route('farm.index')}}"><i class="material-icons">dashboard</i>Dashboard</a></li>
      <li><div class="divider red lighten-2"></div></li>
      <li><a href="{{route('farm.pig.add_sow_record')}}">Add Sow Record</a></li>
      <li><a href="{{route('farm.pig.add_boar_record')}}">Add Boar Record</a></li>
      <li><a href="{{route('farm.pig.animal_record')}}">View Animal Records</a></li>
      <li><a href="{{route('farm.pig.add_sowlitter_record')}}">Sow-Litter Record</a></li>
      <li><a href="{{route('farm.poultry.dashboard')}}">Mortality and Sales</a></li>
      <li><a href="#!">View Pedigree</a></li>
      <li><div class="divider red lighten-2"></div></li>
      <li><a href="#!"><i class="material-icons">settings</i>Farm Profile</a></li>
    </ul>

    {{-- Extra components --}}
    @yield('extraComponents')

    {{-- Content of the page --}}
    @yield('content')

    {{-- Footer --}}

    <script type="text/javascript" src="/thirdparty/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="/thirdparty/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="/js/global.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.1/js/materialize.min.js"></script> --}}

    @yield('scripts')
  </body>
</html>
