<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Native Chicken and Duck | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/thirdparty/fontawesome-free-5.0.4/web-fonts-with-css/css/fontawesome-all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/thirdparty/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/poultry/custom.css">
    @yield('initScriptsAndStyles')
  </head>
  <body>
    <ul id="slide-out" class="side-nav fixed yellow lighten-2">
      <li><div class="user-view">
        <div class="background ">
          <img src="http://via.placeholder.com/350x400">
        </div>
        <a href="#!"><img class="circle" src="/images/farmer.png"></a>
        <a href="#!name"><span class="black-text name">{{Auth::user()->name}}</span></a>
        <a href="#!email"><span class="black-text email">{{Auth::user()->email}}</span></a>
      </div></li>

      <li class="no-padding">
        <ul>
          <li>
            <a href="{{route('farm.poultry.dashboard')}}" class="collapsible-header">Dashboard<i class="material-icons">dashboard</i></a>
          </li>
        </ul>
      </li>

      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Breeder<i class="material-icons">add_circle</i></a>
            <div class="collapsible-body">
              <ul class="yellow lighten-3">
                <li><a href="{{route('farm.poultry.fetch_generation')}}">Generation</a></li>
                <li><a href="{{route('farm.poultry.breeder.familymenu')}}">Family Records</a></li>
                {{-- <li><a href="{{route('farm.poultry.breeder.daily')}}">Daily Records (OLD)</a></li> --}}
                <li><a href="{{route('farm.poultry.breeder.family_daily_records')}}">Daily Records</a></li>
                <li><a href="{{route('farm.poultry.complete_hatchery_list')}}">Hatchery Records</a></li>
                <li><a href="{{route('farm.poultry.page_egg_quality')}}">Egg Quality Records (OLD)</a></li>
                <li><a href="{{route('farm.poultry.page_egg_quality')}}">Egg Quality Records (NEW)</a></li>
                <li><a href="{{route('farm.poultry.page_view_breeders')}}">View Breeders</a></li>
                {{-- <li><a href="{{route('farm.poultry.page_add_to_breeder')}}">Add to Family</a></li>
                <li><a href="{{route('farm.poultry.page_family_record')}}">Family Record</a></li>
                <li><a href="{{route('farm.poultry.page_daily_records')}}">Daily Records</a></li>
                <li><a href="{{route('farm.poultry.page_hatchery_parameters')}}">Hatchery Parameters</a></li>
                <li><a href="{{route('farm.poultry.page_egg_quality')}}">Egg Quality Characteristics</a></li> --}}
              </ul>
            </div>
          </li>
        </ul>
      </li>

      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Replacement<i class="material-icons">add_circle_outline</i></a>
            <div class="collapsible-body">
              <ul class="yellow lighten-3">
                <li><a href="{{route('farm.poultry.page_replacement_individual_record')}}">Individual Record</a></li>
                <li><a href="{{route('farm.poultry.page_phenomorphosearchid')}}">Phenotypic and Morphometric</a></li>
                <li><a href="{{route('farm.poultry.replacement.feeding_list')}}">Feeding Record</a></li>

                {{-- <li><a href="{{route('farm.poultry.page_phenomorphosearchid')}}">Morphometric Characteristics</a></li> --}}
              </ul>
            </div>
          </li>
        </ul>
      </li>

      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Brooders and Growers<i class="fas fa-cart-plus"></i></a>
            <div class="collapsible-body">
              <ul class="yellow lighten-3">
                <li><a href="{{route('farm.poultry.page_replacement_growth_performance')}}">Growth Performance</a></li>
                <li><a href="{{route('farm.poultry.broodersgrowers_feedinglist')}}">Feeding Records</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>

      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Others<i class="material-icons">trending_up</i></a>
            <div class="collapsible-body">
              <ul class="yellow lighten-3">
                {{-- <li><a href="{{route('farm.poultry.page_feeding_records')}}">Feeding Records</a></li> --}}
                <li><a href="{{route('farm.poultry.removal_menu')}}">Mortality, Culling and Sales</a></li>
                <li><a href="{{route('farm.poultry.create_pens_page')}}">Create Pens</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
{{--
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">View<i class="material-icons">search</i></a>
            <div class="collapsible-body">
              <ul class="yellow lighten-3">
                <li><a href="{{route('farm.poultry.page_view_breeders')}}">Breeders</a></li>
                <li><a href="{{route('farm.poultry.page_view_replacement')}}">Replacement Stocks</a></li>
                <li><a href="{{route('farm.poultry.page_view_culled')}}">Mortalities</a></li>
                <li><a href="{{route('farm.poultry.page_view_sold')}}">Sales</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li> --}}

      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Farm Settings<i class="material-icons">settings</i></a>
            <div class="collapsible-body">
              <ul class="yellow lighten-3">
                <li><a href="#!">Edit Farm Profile</a></li>
                <li><a href="#!">Logout</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>

    </ul>

    {{-- Remove comment for responsive app for mobile phones --}}
    {{-- <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a> --}}

    <header class="yellow lighten-3 nav-wrapper center">
      <div class="logo center">
        <a href="{{route('farm.index')}}" class="brand-logo"><img src="/images/logo-poultry.png" height="70" / ></a>
      </div>
    </header>

    <main id="root">
      <div class="container">
        @yield('content')
      </div>
    </main>

    <footer class="page-footer yellow lighten-3">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="black-text">Native Chicken and Duck</h5>
                <p class="black-text">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="black-text">Links</h5>
                <ul>
                  <li><a class="black-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="black-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="black-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="black-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container black-text">
            © 2018 Copyright Text
            <a class="black-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
    <script src="/js/laroute.js"></script>
    <script type="text/javascript" src="/thirdparty/vue.js"></script>
    <script type="text/javascript" src="/thirdparty/axios-master/dist/axios.min.js"></script>
    <script type="text/javascript" src="/thirdparty/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="/thirdparty/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="/js/global.js"></script>
    <script type="text/javascript" src="/thirdparty/Chart.bundle.min.js"></script>
    @yield('scripts')
  </body>
</html>
