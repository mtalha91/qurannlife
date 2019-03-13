<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
    <span class="d-block d-lg-none">Quran & Life</span>
    <span class="d-none d-lg-block">
        <a class="nav-link js-scroll-trigger active" href="{{ url('/') }}">
            <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ url('/public/img') }}/logo.jpg" alt="">
            @if (Session::has('name'))
            <span style="color:#fff;">Logged in as: {{ Session::get('name')}}</span>
        @endif
        </a>
        
    </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger active" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/about') }}">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/privacy-policy‎') }}">Privacy Policy‎</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/terms-and-service') }}">Terms and Service</a>
        </li>
        
        @if (Session::has('token'))
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/logout') }}">Logout</a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/redirect') }}">Login Facebook</a>
        </li>
        @endif
    </ul>
    </div>
</nav>
