<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Native Animals PH | @yield('title')</title>

    <link rel="stylesheet" href="thirdparty/fontawesome-free-5.0.4/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/thirdparty/bulma-0.6.2/css/bulma.css">
    @yield('initScriptsAndStyles')
  </head>
  <body class="has-navbar-fixed-top">
    <section class="section">
      <div class="container">
        <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
          <div class="navbar-brand">
            <a class="navbar-item" href="#">
              <img src="/images/logo-poultry.png" alt="Native Animals PH" height="70">
            </a>

            <div class="navbar-burger">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <div class="navbar-end">
            <div class="navbar-item">
              <div class="field is-grouped">
                  <a href="#">Logout</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </section>
  </body>
</html>
