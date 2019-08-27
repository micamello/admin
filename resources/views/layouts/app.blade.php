<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="Administrador Mi Camello" name="description" />
    <meta content="Mi Camello" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Sweet Alert -->
    <link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    @yield('css')
  </head>
  
  <!--********************************MENU LATERAL***********************************************-->
  
  <body class="fixed-left">

    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

    <!-- Begin page -->
    <div id="wrapper">

      <!-- ========== Left Sidebar Start ========== -->
      <div class="left side-menu">
        <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
          <i class="ion-close"></i>
        </button>

        <!-- LOGO -->
        <div class="topbar-left">
          <div class="text-center bg-logo">                
            <a href="{{ url('/home') }}" class="logo"><img src="{{ asset('images/logo.png') }}" height="50" alt="logo"></a> 
          </div>
        </div>
        <div class="sidebar-user">
          <img src="{{ asset('images/user.png') }}" alt="user" class="rounded-circle img-thumbnail mb-1">
          <h6 class="">{{ Auth::user()->nombres }} </h6>           
          <ul class="list-unstyled list-inline mb-0 mt-2">
            <li class="list-inline-item">
              <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Profile"><i class="dripicons-user text-purple"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Settings"><i class="dripicons-gear text-dark"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="{{ route('logout') }}" class="" data-toggle="tooltip" data-placement="top" title="Log out" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="dripicons-power text-danger"></i></a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>     
            </li>
          </ul>           
        </div>

        <div class="sidebar-inner slimscrollleft">
          <div id="sidebar-menu">
            <ul>
              <li class="menu-title">Principal</li>
              <li><a href="{{ url('/home') }}" class="waves-effect"><i class="dripicons-device-desktop"></i><span> Inicio</span></a></li>                
              <li class="menu-title">Menu</li>                            
              <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-document-edit"></i><span> Mantenimientos </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                  <li><a href="{{ url('/administradores') }}">Administrador</a></li>
                  <li><a href="{{ url('/roles') }}">Rol</a></li>
                  <li><a href="{{ url('/acciones') }}">Acciones del Sistema</a></li>
                  <li><a href="{{ url('/plantillasEmail') }}">Plantillas correo</a></li>
                </ul>
              </li>
              <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-card"></i><span> Consultas </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                  {{-- <li><a href="{{ url('/resultados') }}">Resultados encuestas</a></li> --}}
                  <li><a href="{{ route('candidatos') }}">Listar Candidatos</a></li>
                </ul>
              </li>                         
            </ul>
          </div>
          <div class="clearfix"></div>
        </div> <!-- end sidebarinner -->
      </div>
      <!-- Left Sidebar End -->

      <!-- Start right Content here -->

      <div class="content-page">
        <!-- Start content -->
        <div class="content">

          <!-- Top Bar Start -->
          <div class="topbar">
            <nav class="navbar-custom">

              <ul class="list-inline float-right mb-0">                                
                <li class="list-inline-item dropdown notification-list">
                  <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-mail noti-icon"></i>
                    <span class="badge badge-danger noti-icon-badge">5</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                      <h5><span class="badge badge-danger float-right">745</span>Messages</h5>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon"><img src="{{ asset('images/user.png') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                      <p class="notify-details"><b>Charles M. Jones</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon"><img src="{{ asset('images/user.png') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                      <p class="notify-details"><b>Thomas J. Mimms</b><small class="text-muted">You have 87 unread messages</small></p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon"><img src="{{ asset('images/user.png') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                      <p class="notify-details"><b>Luis M. Konrad</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                    </a>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item border-top">View All</a>

                  </div>
                </li>

                <li class="list-inline-item dropdown notification-list">
                  <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-bell noti-icon"></i>
                    <span class="badge badge-success noti-icon-badge">2</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                      <h5><span class="badge badge-danger float-right">87</span>Notification</h5>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                      <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div>
                      <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon bg-warning"><i class="mdi mdi-glass-cocktail"></i></div>
                      <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                    </a>
                    
                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item border-top">View All </a>

                  </div>
                </li>

                <li class="list-inline-item dropdown notification-list">
                  <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('images/user.png') }}" alt="user" class="rounded-circle">
                  </a>
                  <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title"><h5>Bienvenido</h5></div>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5 text-muted"></i> My Wallet</a>
                    <a class="dropdown-item" href="#"><span class="badge badge-success float-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>             
                  </div>
                </li>
              </ul>

              <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                  <button class="button-menu-mobile open-left waves-light waves-effect"><i class="mdi mdi-menu"></i></button>
                </li>                                
              </ul>

              <div class="clearfix"></div>
            </nav>
          </div>
          <!-- Top Bar End -->

          @yield('content')

        </div> <!-- content -->

        <footer class="footer">© 2018 Mi Camello</footer>
      </div>
      <!-- End Right content here -->

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/modernizr.min.js') }}"></script>
    <script src="{{ asset('js/detect.js') }}"></script>
    <script src="{{ asset('js/fastclick.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>

    <!-- Parsley js -->
    <script src="{{ asset('plugins/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('pages/validation.init.js') }}"></script>

    <script src="{{ asset('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('pages/sweet-alert.init.js') }}"></script>
    
    <!-- App js -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
        
  </body>
</html>