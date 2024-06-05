<!doctype html>
<html>
<head>
   @include('include.head')
</head>

<body>
  <header class="row">
      @include('include.header')
  </header>

  <div class="container">
     <div id="main" class="row">
        @yield('content')
     </div>
  </div>

  <footer class="row">
        @include('include.footer')
  </footer>

</body>
</html>