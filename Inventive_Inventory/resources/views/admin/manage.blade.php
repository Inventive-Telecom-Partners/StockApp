@extends('/layout/admin')

@section('mainContent')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Gestion des stocks</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Modification des stocks</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Modification des stocks</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#addStock" data-toggle="tab">Ajouter stock</a></li>
                  <li class="nav-item"><a class="nav-link" href="#addShelf" data-toggle="tab">Ajouter étagère</a></li>
                  <li class="nav-item"><a class="nav-link" href="#addLevel" data-toggle="tab">Ajouter étage</a></li>
                  <li class="nav-item"><a class="nav-link" href="#displayStock" data-toggle="tab">Afficher les stocks</a></li>
                  <li class="nav-item"><a class="nav-link" href="#displayShelf" data-toggle="tab">Afficher les étagères</a></li>
                  <li class="nav-item"><a class="nav-link" href="#displayLevel" data-toggle="tab">Afficher les étages</a></li>
                </ul>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="addStock">
                    <form action="/admin/createStock" method="post">
                    @csrf
                      <div class="form-group">
                        <label for="inputName">Nom</label>
                        <input type="text" id="inputName" class="form-control" placeholder="Nom du stock" name="Stock_Name">
                      </div>

                      <div class="form-group">
                        <label for="inputDesc">Description</label>
                        <input type="text" id="inputDesc" class="form-control" placeholder="Description du stock" name="Description">
                      </div>

                    <a href="{{url('/admin/manage')}}" class="btn btn-secondary">Annulé</a>
                    <input type="submit" value="Ajouter" class="btn btn-success float-right">
                  </form>

                  </div>
                  <!-- /.tab-pane addStock-->

                  <div class="tab-pane" id="changeStock">
                    <form>
                      <div class="form-group">
                        <label for="inputChStock">Stock à modifier</label>
                        <select id="inputChStock" class="form-control custom-select">
                          <option selected disabled>Sélectionner un stock</option>
                            @foreach ($stockData as $stock)
                              @if($stock->Stock_Name == "noStock")
                              @else
                              <option value="{{$stock->id}}">{{$stock->Stock_Name}}</option>
                              @endif
                            @endforeach
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputName">Nom</label>
                        <input type="text" id="inputName" class="form-control" placeholder="Nouveau nom du stock">
                      </div>
                      
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="inputEtagere">Nombre d'étagères (1 à 30) </label>
                            <input type="number" class="form-control" id="inputEtagere" placeholder="Nombre d'étagères" min="1" max="30">
                          </div>
                        </div>

                        <div class="col">
                          <div class="form-group">
                            <label for="inputEtage">Nombre d'étages (1 à 15) </label>
                            <input type="number" class="form-control" id="inputEtage" placeholder="Nombre d'étages" min="1" max="15">
                          </div>
                        </div>
                      </div>

                      <a href="{{url('/admin/manage')}}" class="btn btn-secondary">Annulé</a>
                      <input type="submit" value="Modifier" class="btn btn-success float-right">
                    </form>
                  </div>
                  <!-- /.tab-pane changeStock -->





                  <div class="tab-pane" id="addShelf">
                    <form action="/admin/createShelf" method="post">
                    @csrf

                      <div class="form-group">
                        <label for="inputShelfStock">Créer étagère pour le stock :</label>
                        <select id="inputShelfStock" class="form-control custom-select">
                          <option selected disabled>Sélectionner un stock</option>
                            @foreach ($stockData as $stock)
                              @if($stock->Stock_Name == "noStock")
                              @else
                              <option value="{{$stock->id}}">{{$stock->Stock_Name}}</option>
                              @endif
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="inputShelfName">Nom</label>
                        <input type="text" id="inputShelfName" class="form-control" placeholder="Nom de l'étagère" name="Shelf_Name">
                      </div>

                      <div class="form-group">
                        <label for="inputShelfDesc">Description</label>
                        <input type="text" id="inputShelfDesc" class="form-control" placeholder="Description de l'étagère" name="Description">
                      </div>

                      <a href="{{url('/admin/manage')}}" class="btn btn-secondary">Annulé</a>
                      <input type="submit" value="Ajouter" class="btn btn-success float-right">
                    </form>

                  </div>
                  <!-- /.tab-pane addShelf-->

                  <div class="tab-pane" id="addLevel">
                    <form action="/admin/createLevel" method="post">
                    @csrf

                      <div class="form-group">
                        <label for="inputLevelStock">Créer étage pour le stock :</label>
                        <select id="inputLevelStock" class="form-control custom-select">
                          <option selected disabled>Sélectionner un stock</option>
                            @foreach ($stockData as $stock)
                              @if($stock->Stock_Name == "noStock")
                              @else
                              <option value="{{$stock->id}}">{{$stock->Stock_Name}}</option>
                              @endif
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="inputLevelShelf">Créer étage pour l'étagère :</label>
                        <select id="inputLevelShelf" class="form-control custom-select">
                          <option selected disabled>Sélectionner une étagère</option>
                            @foreach ($shelfData as $shelf)
                              @if($shelf->Shelf_Name == "noShelf")
                              @else
                              <option value="{{$stock->id}}">{{$shelf->Shelf_Name}}</option>
                              @endif
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="inputLevelName">Nom</label>
                        <input type="text" id="inputLevelName" class="form-control" placeholder="Nom de l'étage" name="Level_Name">
                      </div>

                      <div class="form-group">
                        <label for="inputLevelDesc">Description</label>
                        <input type="text" id="inputLevelDesc" class="form-control" placeholder="Description de l'étage" name="Description">
                      </div>

                      <a href="{{url('/admin/manage')}}" class="btn btn-secondary">Annulé</a>
                      <input type="submit" value="Ajouter" class="btn btn-success float-right">
                    </form>

                  </div>
                  <!-- /.tab-pane addLevel-->

                  <div class="tab-pane" id="displayStock">
                    <!-- *Les objets du stock supprimé se retrouveront dans le stock par défaut : "noStock"* -->
                    @foreach($stockData as $stock)
                    @if($stock->Stock_Name == "noStock")
                    @else
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <div class="row justify-content-between">
                              <div class="col">
                                <h3 class="card-title"><b>{{$stock->Stock_Name}}</b></h3>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <a href="{{ url ('admin/edit/')}}" class="btn btn-success">Modifier</a>
                                </div>
                                <div class="col">
                                  <form action="{{ url ('admin/delete/')}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Supprimer" class="btn btn-danger">
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <p>{{$stock->Description}}</p>
                            </div>
                          </div>
                          <!-- /.card-header -->
                        </div>
                        <!-- /.card -->
                      </div>
                    </div>
                    <!-- /.row -->
                    @endif
                    @endforeach
                  </div>
                  <!-- /.tab-pane displayStock-->

                  <div class="tab-pane" id="displayShelf">
                    <!-- *Les objets du stock supprimé se retrouveront dans le stock par défaut : "noStock"* -->
                    @foreach($shelfData as $shelf)
                    @if($shelf->Shelf_Name == "noShelf")
                    @else
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <div class="row justify-content-between">
                              <div class="col">
                                <h3 class="card-title"><b>{{$shelf->Shelf_Name}}</b></h3>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <a href="{{ url ('admin/edit/')}}" class="btn btn-success">Modifier</a>
                                </div>
                                <div class="col">
                                  <form action="{{ url ('admin/delete/')}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Supprimer" class="btn btn-danger">
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <p>{{$shelf->Description}}</p>
                            </div>
                          </div>
                          <!-- /.card-header -->
                        </div>
                        <!-- /.card -->
                      </div>
                    </div>
                    <!-- /.row -->
                    @endif
                    @endforeach
                  </div>
                  <!-- /.tab-pane displayShelf -->

                  <div class="tab-pane" id="displayLevel">
                    <!-- *Les objets du stock supprimé se retrouveront dans le stock par défaut : "noStock"* -->
                    @foreach($levelData as $level)
                    @if($level->Level_Name == "noLevel")
                    @else
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <div class="row justify-content-between">
                              <div class="col">
                                <h3 class="card-title"><b>{{$level->Level_Name}}</b></h3>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <a href="{{ url ('admin/edit/')}}" class="btn btn-success">Modifier</a>
                                </div>
                                <div class="col">
                                  <form action="{{ url ('admin/delete/')}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Supprimer" class="btn btn-danger">
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <p>{{$level->Description}}</p>
                            </div>
                          </div>
                          <!-- /.card-header -->
                        </div>
                        <!-- /.card -->
                      </div>
                    </div>
                    <!-- /.row -->
                    @endif
                    @endforeach
                  </div>
                  <!-- /.tab-pane displayLevel-->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
            
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      
    </section>
    <!-- /.content -->
@endsection