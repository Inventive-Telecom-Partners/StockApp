@extends('/layout/admin')

@section('mainContent')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Gestion utilisateurs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Ajout d'utilisateur</li>
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
              <h3 class="card-title">Modification d'utilisateur</h3>

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
                  <li class="nav-item"><a class="nav-link active" href="#addUser" data-toggle="tab">Ajouter utilisateur</a></li>
                  <li class="nav-item"><a class="nav-link" href="#changeUser" data-toggle="tab">Modifier utilisateur</a></li>
                  <li class="nav-item"><a class="nav-link" href="#deleteUser" data-toggle="tab">Supprimer utilisateur</a></li>
                  <li class="nav-item"><a class="nav-link" href="#displayUser" data-toggle="tab">Afficher utilisateurs</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="addUser">
                  <form>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputName">Nom</label>
                          <input type="text" id="inputName" class="form-control" placeholder="Nom de l'utilisateur">
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label for="inputSurename">Prénom</label>
                          <input type="text" id="inputSurename" class="form-control" placeholder="Prénom de l'utilisateur">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputEmail">Email</label>
                          <input type="email" class="form-control" id="inputEmail" placeholder="Insérez email utilisateur">
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label for="inputPwd">Mot de passe</label>
                          <input type="password" class="form-control" id="inputPwd" placeholder="Insérez nouveau mot de passe">
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputStatus">Photo de l'utilisateur</label>
                      <input type="file" class="form-control" placeholder="Image">
                    </div>

                    <a href="{{url('/adduser')}}" class="btn btn-secondary">Annulé</a>
                    <input type="submit" value="Ajouter" class="btn btn-success float-right">
                  </form>

                  </div>
                  <!-- /.tab-pane addUser-->

                  <div class="tab-pane" id="changeUser">
                    <form>
                      <div class="form-group">
                        <label for="inputChUser">Utilisateur à changer</label>
                        <select id="inputChUser" class="form-control custom-select">
                          <option selected disabled>Sélectionner un utilisateur</option>
                          <option>USER1</option>
                          <option>USER2</option>
                          <option>USER3</option>
                        </select>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="inputName">Nom</label>
                            <input type="text" id="inputName" class="form-control" placeholder="Nom de l'utilisateur">
                          </div>
                        </div>

                        <div class="col">
                          <div class="form-group">
                            <label for="inputSurename">Prénom</label>
                            <input type="text" id="inputSurename" class="form-control" placeholder="Prénom de l'utilisateur">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Insérez email utilisateur">
                          </div>
                        </div>

                        <div class="col">
                          <div class="form-group">
                            <label for="inputPwd">Mot de passe</label>
                            <input type="password" class="form-control" id="inputPwd" placeholder="Insérez nouveau mot de passe">
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputStatus">Photo de l'utilisateur</label>
                        <input type="file" class="form-control" placeholder="Image">
                      </div>

                      <a href="{{url('/adduser')}}" class="btn btn-secondary">Annulé</a>
                      <input type="submit" value="Modifier" class="btn btn-success float-right">
                    </form>
                  </div>
                  <!-- /.tab-pane changeUser -->

                  <div class="tab-pane" id="deleteUser">
                    <form>
                      <div class="form-group">
                        <label for="inputChUser">Utilisateur à supprimer</label>
                        <select id="inputChUser" class="form-control custom-select">
                          <option selected disabled>Sélectionner un utilisateur</option>
                          <option>USER1</option>
                          <option>USER2</option>
                          <option>USER3</option>
                        </select>
                      </div>
                      <a href="{{url('/adduser')}}" class="btn btn-secondary">Annulé</a>
                      <input type="submit" value="Supprimer" class="btn btn-success float-right">
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="displayUser">
                    <div class="row">
                      <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                          <div class="card-header text-muted border-bottom-0">
                            Type d'utilisateur(user/admin)
                          </div>
                          <div class="card-body pt-0">
                            <div class="row">
                              <div class="col-7">
                                <h2 class="lead"><b>Nom et prénom de l'utilisateur</b></h2>
                                <p class="text-muted text-sm"><b>Badge: </b> Numéro de badge </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                  <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></span> Email: Insérez email</li>
                                </ul>
                              </div>
                              <div class="col-5 text-center">
                                <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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