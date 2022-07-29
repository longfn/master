<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div id="app">
    @include('partitions.header')

    <main class="container-fluid py-2">
      <div class="row mx-5">
        <div class="col-md-4 sidebar-container sticky-top ps-0">
          @include('partitions.sidebar')
        </div>
        <div class="col-md-8 border-start pe-0" style="min-height: 80vh">
          @yield('content')
        </div>
      </div>
    </main>

    @include('partitions.footer')
  </div>
</body>
</html>
