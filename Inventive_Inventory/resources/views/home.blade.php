@extends('/layout/home_layout')

@section('mainContent')

<div class="main-banner" id="top">
        <div class="container-fluid" >
                    <div class="right-content">
                        <div class="row " >
                            <div class="col-lg-4">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style="color:black">STOCK IN</h4>s
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Stock IN</h4>
                                                <div class="main-border-button">
                                                    <a href="{{url('/StockIn')}}">Entrée de stock</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{asset('assets\dist\img\accueil\in.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style="color:black">STOCK OUT</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Stock OUT</h4>
                                                <div class="main-border-button">
                                                    <a href="{{url('/StockOut')}}">Sortie de stock</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{asset('assets\dist\img\accueil\out.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style="color:black">Recherche</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Rechercher</h4>
                                                <div class="main-border-button">
                                                    <a href="{{url('/Research')}}">Faire une recherche</a>
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
