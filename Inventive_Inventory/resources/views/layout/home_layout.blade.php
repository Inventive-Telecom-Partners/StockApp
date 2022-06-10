<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <title>ITP STOCK</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dist/css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/inout.css')}}">
     <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    </head>
    <body>   
    <div class="wrapper">
        <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('assets/dist/img/logo/itpStock.png')}}" alt="Logo" height="180" width="180">
    </div>
    <!-- Section Header begin -->
    <section>
        <header class="main-header navbar navbar-expand navbar-white navbar-light justify-content-around" style="margin-left:0px;">
            <a href="{{url('/')}}" class="logo">
                <img src="{{asset('assets/dist/img/logo/itpStock.png')}}" alt="Logo" style="height : 7vmax">
            </a>
            <h1 class="nav">Inventive Inventory</h1>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Mon Inventaire</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Se connecter</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">S'enregistrer</a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>
    </section>
    <!-- Section Header end -->
    <!-- Section Content begin -->
    <section>
        <div class="content-wrapper justify-content-center" style="margin-left:0px; align-items: center; display:flex; background-image:url({{asset('assets/dist/img/accueil/inventory.jpg')}});background-size: cover; background-repeat: no-repeat;" >
                @yield('mainContent')
        </div>
    </section>
    <!-- Section Header end -->
    <footer class="main-footer" style="margin: 0px; ">
    <strong>Copyright &copy; 2022 Inventive Telecom Partner</strong>
    with <i class="fas fa-heart"></i>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.5
    </div>
  </footer>
</div>
    </div>
    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('assets/dist/js/pages/dashboard.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assetsplugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>