<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>ITP STOCK</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dist/css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets\dist\css\inout.css')}}">
    </head>
    <body>   
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('assets/dist/img/logo/itpStock.png')}}" alt="Logo" height="180" width="180">
    </div>
    <header class="header-area header-sticky">
            <div class="row justify-content-end" style="padding: 20px">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="#" class="logo">
                            <img src="{{asset('assets/dist/img/logo/itpStock.png')}}" alt="Logo" style="height : 7vmax">
                        </a>
                        <ul class="nav">
                            <li><a href="login.php">Se connecter</a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
    </header>
    <div class="main-banner" id="top">
        <div class="container-fluid">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>STOCK IN</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Stock IN</h4>
                                                <div class="main-border-button">
                                                    <a href="{{url('/StockIn')}}">Entrer</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{asset('assets\dist\img\accueil\in.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>STOCK OUT</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Stock OUT</h4>
                                                <div class="main-border-button">
                                                    <a href="{{url('/StockOut')}}">Entrer</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{asset('assets\dist\img\accueil\out.png')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 Inventive Telecom Partner</strong>
    with <i class="fas fa-heart"></i>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.5
    </div>
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/dist/js/pages/dashboard.js')}}"></script>
</body>
</html>
