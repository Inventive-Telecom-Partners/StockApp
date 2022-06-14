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
                </ul>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="addStock">
                  <div class="row">
                      *Champs requis
                    </div>
                    <form action="/admin/createStock" method="post">
                    @csrf
                      <div class="form-group">
                        <label for="inputName">Nom*</label>
                        <input type="text" id="inputName" class="form-control" placeholder="Nom du stock" name="Stock_Name" required>
                      </div>

                      <div class="form-group">
                        <label for="inputDesc">Description*</label>
                        <input type="text" id="inputDesc" class="form-control" placeholder="Description du stock" name="Description" required>
                      </div>

                    <a href="{{url('/admin/manage')}}" class="btn btn-secondary">Annulé</a>
                    <input type="submit" value="Ajouter" class="btn btn-success float-right">
                  </form>

                  </div>
                  <!-- /.tab-pane addStock-->

                  <div class="tab-pane" id="addShelf">
                  <div class="row">
                      *Champs requis
                    </div>
                    <form action="/admin/createShelf" method="post">
                    @csrf

                      <div class="form-group">
                        <label for="inputShelfStock">Créer étagère pour le stock :*</label>
                        <select id="inputShelfStock" class="form-control custom-select" name="Stock" required>
                          <option value="" selected disabled>Sélectionner un stock</option>
                            @foreach ($stockData as $stock)
                              @if($stock->Stock_Name == "noStock")
                              @else
                              <option value="{{$stock->id}}">{{$stock->Stock_Name}}</option>
                              @endif
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="inputShelfName">Nom*</label>
                        <input type="text" id="inputShelfName" class="form-control" placeholder="Nom de l'étagère" name="Shelf_Name" required>
                      </div>

                      <div class="form-group">
                        <label for="inputShelfDesc">Description*</label>
                        <input type="text" id="inputShelfDesc" class="form-control" placeholder="Description de l'étagère" name="Description" required>
                      </div>

                      <a href="{{url('/admin/manage')}}" class="btn btn-secondary">Annulé</a>
                      <input type="submit" value="Ajouter" class="btn btn-success float-right">
                    </form>

                  </div>
                  <!-- /.tab-pane addShelf-->

                  <div class="tab-pane" id="addLevel">
                  <div class="row">
                      *Champs requis
                    </div>
                    <form action="/admin/createLevel" method="post">
                    @csrf

                      <div class="form-group">
                        <label for="inputLevelShelf">Créer étage pour l'étagère :*</label>
                        <select id="inputLevelShelf" class="form-control custom-select" name="Shelf" required>
                          <option value="" selected disabled>Sélectionner une étagère</option>
                            @foreach ($shelfData as $shelf)
                              @if($shelf->Shelf_Name == "noShelf")
                              @else
                              <option value="{{$shelf->id}}">{{$shelf->Shelf_Name}}</option>
                              @endif
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="inputLevelName">Nom*</label>
                        <input type="text" id="inputLevelName" class="form-control" placeholder="Nom de l'étage" name="Level_Name" required>
                      </div>

                      <div class="form-group">
                        <label for="inputLevelDesc">Description*</label>
                        <input type="text" id="inputLevelDesc" class="form-control" placeholder="Description de l'étage" name="Description" required>
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
                        <div class="card card-dark collapsed-card">
                          <div class="card-header">
                            <div class="row justify-content-between">
                                <h3 class="card-title"><b>{{$stock->Stock_Name}}</b></h3>
                              <div class="row">
                                <div class="col">
                                  <a href="{{ url ('admin/editStock/'.$stock->id)}}" class="btn btn-success">Modifier</a>
                                </div>
                                <div class="col">
                                  <form action="{{ url ('admin/deleteStock/'.$stock->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Supprimer" class="btn btn-danger">
                                  </form>
                                </div>
                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <p><b><u>Description :</u></b> {{$stock->Description}}</p>
                            </div>
                            <table id="{{$stock->id}}" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th>Etagère</th>
                                    <th>Description de l'étagère</th>
                                    <th>Etage</th>
                                    <th>Description de l'étage</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($shelfData as $shelf)
                                @if($stock->id == $shelf->idStock)
                                  @foreach($levelData as $level)
                                  @if($shelf->id == $level->idShelf)  
                                  <tr>
                                    <td>
                                      <div class="row">
                                        <div class="col">
                                          {{$shelf->Shelf_Name}}
                                        </div>
                                        <div class="col">
                                          <div class="row">
                                            <a href="{{ url ('admin/editShelf/'.$shelf->id)}}" class="btn btn-success">Modifier</a>
                                          </div>
                                          <div class="row" style="margin-top:10px;">
                                            <form action="{{ url ('admin/deleteShelf/'.$shelf->id)}}" method="post">
                                              @csrf
                                              @method('DELETE')
                                              <input type="submit" value="Supprimer" class="btn btn-danger">
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td>{{$shelf->Description}}</td>
                                    <td>
                                      <div class="row">
                                        <div class="col">
                                          {{$level->Level_Name}}
                                        </div>
                                        <div class="col">
                                          <div class="col">
                                            <a href="{{ url ('admin/editLevel/'.$level->id)}}" class="btn btn-success">Modifier</a>
                                          </div>
                                          <div class="row" style="margin-top:10px;">
                                            <form action="{{ url ('admin/deleteLevel/'.$level->id)}}" method="post">
                                              @csrf
                                              @method('DELETE')
                                              <input type="submit" value="Supprimer" class="btn btn-danger">
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td>{{$level->Description}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @endforeach
                                @else
                                @endif
                                @endforeach
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th>Etagère</th>
                                    <th>Description de l'étagère</th>
                                    <th>Etage</th>
                                    <th>Description de l'étage</th>
                                  </tr>
                                </tfoot>
                            </table>
                          </div>
                          <!-- /.card-BODY -->
                        </div>
                        <!-- /.card -->
                      </div>
                    </div>
                    <!-- /.row -->
                    @endif
                    @endforeach
                  </div>
                  <!-- /.tab-pane displayStock-->
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