@extends('/layout/home_layout')

@section('mainContent')

<div class="main-banner" id="top" style="padding:0px; margin:50px">
        <div class="container-fluid" >
                    <div class="right-content">
                        <div class="row" >
                            <div class="col-lg-4" style="margin: 20px auto 20px">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style="color:black">STOCK IN</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Stock IN</h4>
                                                <div class="main-border-button">
                                                    <a href="{{url('/stockIn')}}">Entrée de stock</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{asset('assets\dist\img\accueil\in.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" style="margin: 20px auto 20px">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style="color:black">STOCK OUT</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Stock OUT</h4>
                                                <div class="main-border-button">
                                                    <a href="{{url('/stockOut')}}">Sortie de stock</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{asset('assets\dist\img\accueil\out.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" style="margin: 20px auto 20px">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style="color:black">Recherche</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Rechercher</h4>
                                                <div class="main-border-button">
                                                    <a href="{{url('/research')}}">Faire une recherche</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{asset('assets\dist\img\accueil\recherche.jpg')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
