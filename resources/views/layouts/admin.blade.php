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
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">

    <title>@yield('title')</title>

    @stack('prepend-style')
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        <link href="/style/main.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css"/>
    @stack('addon-style')
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
            <a href="{{ route('admin-dashboard') }}" class="list-group-item list-group-item-action {{ (request()->is('admin') ? 'active' : '') }}"> Dasbor</a>
            <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/category*') ? 'active' : '') }}">Kategori</a>
            <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/product*') ? 'active' : '') }}">Produk</a>
            <a href="{{ route('gallery.index')}}"  class="list-group-item list-group-item-action {{ request()->is('admin/gallery*') ? 'active' : '' }}">Galeri</a>
            <a href="{{ route('transaction.index') }}" class="list-group-item list-group-item-action {{ request()->is('admin/transaction') || request()->is('admin/transaction/{id}/edit') ? 'active' : '' }}"> Transaksi</a>
            <a href="{{ route('detail.index') }}" class="list-group-item list-group-item-action {{ request()->is('admin/detail*')  ? 'active' : '' }}" > Transaksi Detail</a>
            <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/user*') ? 'active' : '') }}">Pengguna</a>
            <a href="{{ route('logout') }}" class="list-group-item list-group-item-action"
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
                      
                      Hai admin yang baik dan tidak sombong
                    </a>
                    <div class="dropdown-menu">
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
                      Hi admin yang baik dan tidak sombong
                    </a>
                  </li>
                  <li class="nav-item">
                    
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
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
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
