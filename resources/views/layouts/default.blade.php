<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ar" lang="ar">

  <head>
    @include('includes.head')
    @yield('styles')

  </head>

  <body id="page-top">
    @include('includes.header')
    @include('includes.sidebar')

    <div class="container-fluid p-0">
        @yield('content')
    </div>

    @include('includes.footer')
    @yield('scripts')
  </body>
</html>
