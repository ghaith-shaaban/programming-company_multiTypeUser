<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top" style="background-color: rgb(195, 195, 195)">
      <div class="container-fluid position-relative d-flex align-items-center justify-content-between" >

        <a href="{{route('main')}}" class="logo d-flex align-items-center me-auto me-xl-0">
          <!-- Uncomment the line below if you also wish to use an image logo -->
           <img src="{{asset('storage/assets/img/logo.png')}}" alt="">
          <h1 class="sitename">laravel</h1><span>.</span>
        </a>

        <nav id="navmenu" class="navmenu" >
          <ul>
            <li><a href="{{route('main')}}#hero" class={{Route::is('main')? "active" : ''}}>Home</a></li>
            <li><a href="{{route('main')}}#about" class={{Route::is('main')? "active" : ''}}>About</a></li>
            <li><a href="{{route('main')}}#services" class={{Route::is('main')? "active" : ''}}>Services</a></li>
            <li><a href="{{route('main')}}#project" class={{Route::is('main')? "active" : ''}}>projects</a></li>
            {{-- <li><a href="{{route('main')}}#pricing" class={{Route::is('main')? "active" : ''}}>Pricing</a></li> --}}
            <li><a href="{{route('main')}}#team" class={{Route::is('main')? "active" : ''}}>Team</a></li>
            {{-- <li><a href="{{route('blog')}}" class={{Route::is('blog')? "active" : ''}}>Blog</a></li>
            <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Dropdown 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                  <ul>
                    <li><a href="#">Deep Dropdown 1</a></li>
                    <li><a href="#">Deep Dropdown 2</a></li>
                    <li><a href="#">Deep Dropdown 3</a></li>
                    <li><a href="#">Deep Dropdown 4</a></li>
                    <li><a href="#">Deep Dropdown 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Dropdown 2</a></li>
                <li><a href="#">Dropdown 3</a></li>
                <li><a href="#">Dropdown 4</a></li>
              </ul>
            </li> --}}
            <li><a href="{{route('main')}}#contact" class={{Route::is('main')? "active" : ''}}>Contact</a></li>
            @auth
                @can('admin')
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @endcan
                @can('buyer')
                    <li><a href="{{ route('buyer.dashboard') }}">Dashboard</a></li>
                @endcan
                @can('programmer')
                    <li><a href="{{ route('programmer.dashboard') }}">Dashboard</a></li>
                @endcan
            @else
                <li><a href="{{ route('login') }}">Log in</a></li>
                <li><a href="{{ route('register') }}" >Register</a></li>
            @endauth
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{route('main')}}#about" class={{Route::is('main')? "active" : ''}}>Get Started</a>

      </div>
    </header>

