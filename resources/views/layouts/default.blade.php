<!DOCTYPE html>
<html lang="en">

  <head>
    @include('includes.head')
  </head>

  <body id="page-top">
    @include('includes.header')
    @include('includes.sidebar')

    <div class="container-fluid p-0">
        @yield('content')
    </div>
    @include('includes.footer')

  </body>
</html>
