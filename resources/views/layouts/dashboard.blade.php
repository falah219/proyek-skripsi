<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Proyek Skripsi" />
    <meta name="author" content="Falah Yudhistira Hanan" />

    <title>@yield('title')</title>

    @stack('prepend-style')
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        <link href="/style/main.css" rel="stylesheet" />
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    @stack('addon-script')
  </head>

  <body>

    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/admin.png" alt="" class="my-4" style="max-width: 150px;">
          </div>
          <div class="list-group list-group-flush">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard') ? 'active' : '') }}"> Dashboard</a>
            <a href="{{ route('dashboard-profile') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/profiles') ? 'active' : '') }}">Data Diri</a>
            <a href="{{ route('dashboard-transaction') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/transaction*') ? 'active' : '') }}"> Transaksi</a>
            <a href="{{ route("home") }}" class="list-group-item list-group-item-action">Kembali ke menu utama</a>
            <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">

          <!--NAVBAR-->
          <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
            <div class="container-fluid">
              <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                &laquo; Menu
              </button>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
          
                <!-- Desktop Menu -->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                     <img src="/images/user.png" alt="" class="rounded-circle mr-2 profile-picture">
                      Hi, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                      <a href="{{ route("home") }}" class="dropdown-item">Kembali ke menu utama</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </div>
                  </li>
                </ul>
          
                <!-- Mobile Menu -->
                <ul class="navbar-nav d-block d-lg-none">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Hi, {{ Auth::user()->name }}
                    </a>
                  </li>
                </ul>
          
          
              </div>
            </div>
          </nav>

          {{-- Content --}}
          @yield('content')

        </div>  
      </div>
    </div>

    @stack('prepend-script')
        <!-- Bootstrap core JavaScript -->
        <script src="/vendor/jquery/jquery.slim.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="/script/navbar-scroll.js"></script>
        <script>
        AOS.init();
        </script>
        <script>
        $('#menu-toggle').click(function (params) {
            params.preventDefault();
            $('#wrapper').toggleClass('toggled');
        })
        </script>
    @stack('addon-script')    
  </body>
</html>
