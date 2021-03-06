    @extends('/layout/user')

    @section('mainContent')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Profil utilisateur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('assets/dist/img/user4-128x128.jpg')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <!-- Insérez ici son niveau d'accès (admin ou user voir même si y a le temps par groupe : techos, sales, etc) depuis la base de donnée -->
                <p class="text-muted text-center">Utilisateur</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">A recup de la bdd</a>
                  </li>
                  <li class="list-group-item">
                    <b>Tag</b> <a class="float-right">A recup de la bdd</a>
                  </li>
                  <li class="list-group-item">
                    <b>I/O du jour</b> <a class="float-right">A recup de la bdd</a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Historique des transactions</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Paramètres de profil</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-primary">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-box-open bg-danger"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Stock 'untel' Out</a></h3>

                          <div class="timeline-body">
                            L'objet 'untel' a été enlevé du stock 'untel' par 'untel'.
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-box bg-success"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Stock 'untel' In</a> 
                          </h3>
                          <div class="timeline-body">
                            L'objet 'untel' a été ajouté dans le stock 'untel' par 'untel'.
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                    <!-- timeline item -->
                      <div>
                        <i class="fas fa-shipping-fast bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Stock 'untel' In - Nouveau Colis</a> 
                          </h3>
                          <div class="timeline-body">
                            L'objet 'untel' a été ajouté dans le stock 'untel' par 'untel'.
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                       <!-- timeline item -->
                       <div>
                        <i class="fas fa-arrow-alt-circle-right bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Stock 'untel' In & 'untel' Out - Déplacement</a> 
                          </h3>
                          <div class="timeline-body">
                            L'objet 'untel' a été ajouté dans le stock 'untel' par 'untel'.
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-primary">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Insérez votre nom de famille">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Prénom</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Insérez votre prénom">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Insérez votre email">
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Tag</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Scannez ou insérez manuellement votre numéro d'identification tag"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPwd" class="col-sm-2 col-form-label">Mot de passe</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPwd" placeholder="Insérez nouveau mot de passe">
                        </div>
                      </div> 
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Envoyer</button>
                        </div>
                      </div>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection