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
                  <li class="nav-item"><a class="nav-link active" href="#addUser" data-toggle="tab">Ajouter stock</a></li>
                  <li class="nav-item"><a class="nav-link" href="#changeUser" data-toggle="tab">Modifier stock</a></li>
                  <li class="nav-item"><a class="nav-link" href="#deleteUser" data-toggle="tab">Supprimer stock</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="addUser">
                  <form>
                      <div class="form-group">
                        <label for="inputName">Nom</label>
                        <input type="text" id="inputName" class="form-control" placeholder="Nom du stock">
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

                    <a href="{{url('/adduser')}}" class="btn btn-secondary">Annulé</a>
                    <input type="submit" value="Ajouter" class="btn btn-success float-right">
                  </form>

                  </div>
                  <!-- /.tab-pane addUser-->

                  <div class="tab-pane" id="changeUser">
                    <form>
                      <div class="form-group">
                        <label for="inputChUser">Stock à modifier</label>
                        <select id="inputChUser" class="form-control custom-select">
                          <option selected disabled>Sélectionner un stock</option>
                          <option>Stock1</option>
                          <option>Stock2</option>
                          <option>Stock3</option>
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

                      <a href="{{url('/adduser')}}" class="btn btn-secondary">Annulé</a>
                      <input type="submit" value="Modifier" class="btn btn-success float-right">
                    </form>
                  </div>
                  <!-- /.tab-pane changeUser -->

                  <div class="tab-pane" id="deleteUser">
                    <form>
                      <div class="form-group">
                        <label for="inputChUser">Stock à supprimer</label>
                        <select id="inputChUser" class="form-control custom-select">
                          <option selected disabled>Sélectionner un stock</option>
                          <option>Stock1</option>
                          <option>Stock2</option>
                          <option>Stock3</option>
                        </select>
                        <p><i>*Les objets du stock supprimé se retrouveront dans le stock par défaut : "noStock"*</i></p>
                      </div>
                      <a href="{{url('/adduser')}}" class="btn btn-secondary">Annulé</a>
                      <input type="submit" value="Supprimer" class="btn btn-success float-right">
                    </form>
                  </div>
                  <!-- /.tab-pane -->


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