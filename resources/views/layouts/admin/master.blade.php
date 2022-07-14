<!doctype html>
<html lang="vi-VN">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ env('APP_NAME') }} </title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg sticky-top bg-light" style="z-index: 9999">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">GOLSOFT</a>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-4 sidebar-container sticky-top">
            <div class="row">
              <div class="col-md-12">
                @include('layouts.admin.sidebar')
              </div>
            </div>
          </div>
          <div class="col-md-8" style="min-height: 80vh">
            <div class="row">
              <div class="col-md-12">
                @yield('content')
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg sticky-bottom bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">FOOTER</a>
      </div>
    </nav>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>
