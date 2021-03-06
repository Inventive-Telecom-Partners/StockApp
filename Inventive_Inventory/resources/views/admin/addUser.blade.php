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
              <li class="breadcrumb-item active">Modification d'utilisateurs</li>
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
                  <li class="nav-item"><a class="nav-link" href="#displayUser" data-toggle="tab">Afficher utilisateurs</a></li>
                  <li class="nav-item"><a class="nav-link" href="#addJob" data-toggle="tab">Ajouter job</a></li>
                  <li class="nav-item"><a class="nav-link" href="#displayJob" data-toggle="tab">Afficher jobs</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="addUser">
                    <div class="row">
                      *Champs requis
                    </div>
                  <form action="/admin/create" method="post">
                  @csrf
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputName">Nom*</label>
                          <input type="text" id="inputName" class="form-control" placeholder="Nom de l'utilisateur" name="Name" required>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputBadge">Badge*</label>
                          <input type="text" id="inputBadge" class="form-control" placeholder="Badge/Tag de l'utilisateur" name="Badge" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputEmail">Email*</label>
                          <input type="email" class="form-control" id="inputEmail" placeholder="Ins??rez email utilisateur" name="email" required>
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label for="inputPwd">Mot de passe*</label>
                          <input type="password" class="form-control" id="inputPwd" placeholder="Ins??rez nouveau mot de passe" name="password" required>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputPicture">Photo de l'utilisateur</label>
                      <input type="file" id="inputPicture" class="form-control" placeholder="Image">
                    </div>

                    <div class="form-group">
                      <label for="inputRole">R??le de l'utilisateur*</label>
                      <select id="inputRole" class="form-control custom-select" name="role" required>
                          <option value="" selected disabled>S??lectionner un r??le</option>
                          @foreach ($roleData as $role)
                            <option value="{{$role->id}}">{{$role->Role_Name}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="inputJob">Job de l'utilisateur*</label>
                      <select id="inputJob" class="form-control custom-select" name="Job" required>
                          <option value="" selected disabled>S??lectionner un job</option>
                          @foreach ($jobData as $job)
                            <option value="{{$job->id}}">{{$job->Job_Name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <a href="{{url('/admin/adduser')}}" class="btn btn-secondary">Annul??</a>
                    <input type="submit" value="Ajouter" class="btn btn-success float-right">
                  </form>

                  </div>
                  <!-- /.tab-pane addUser-->

                  <div class="tab-pane" id="displayUser">
                    <div class="row">
                    @foreach($usersData as $index => $i)
                      <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                          <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                              @foreach($user_role as $j)
                              @if($j->idUser == $i->id)
                                {{$j->Role_Name}}
                              @endif
                              @endforeach 
                              - 
                              @foreach($user_job as $k)
                              @if($k->idUser == $i->id)
                                {{$k->Job_Name}}
                              @endif
                              @endforeach
                            </div>
                            <div class="card-body pt-0">
                              <div class="row">
                                <div class="col-7">
                                  <h2 class="lead"><b>{{$i->Name}}</b></h2>
                                  @if($i->Badge) 
                                    <p class="text-muted text-sm"><b>Badge: </b>{{$i->Badge}}</p>
                                  @else
                                    <p class="text-muted text-sm"><b>Badge: </b>Aucun badge pour le moment</p>
                                  @endif
                                  <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></span> {{$i->email}}</li>
                                  </ul>
                                </div>
                                <div class="col-5 text-center">
                                  @if($i->picture)
                                  <img src="{{asset('assets/dist/img/user4-128x128.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                                  @else
                                  <img src="{{asset('assets/dist/img/users/blank_profile.png')}}" alt="user-avatar" class="img-circle img-fluid">
                                  @endif
                                </div>
                              </div>
                              <div class="row justify-content-between" style="margin-top :2em;">
                                  <a href="{{ url ('admin/edit/'.$i->id)}}" class="btn btn-success">Modifier</a>
                                  <form action="{{ url ('admin/delete/'.$i->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Supprimer" class="btn btn-danger">
                                  </form>
                              </div>
                            </div>
                          </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="addJob">
                  <form action="/admin/createJob" method="post">
                  @csrf
                    <div class="row">
                      *Champs requis
                    </div>
                        <div class="form-group">
                          <label for="inputJobName">Intitul??*</label>
                          <input type="text" id="inputJobName" class="form-control" placeholder="Intitul?? du job" name="JobName" required>
                        </div>

                        <div class="form-group">
                          <label for="inputJobDesc">Description*</label>
                          <input type="text" id="inputJobDesc" class="form-control" placeholder="Description du job" name="JobDescription" required>
                        </div>

                    <a href="{{url('/admin/adduser')}}" class="btn btn-secondary">Annul??</a>
                    <input type="submit" value="Ajouter" class="btn btn-success float-right">
                  </form>

                  </div>
                  <!-- /.tab-pane addJob-->

                  <div class="tab-pane" id="displayJob">
                  @foreach($jobData as $job)
                  @if($job->Job_Name == "noJob")
                  @else
                    <div class="row">
                      <div class="col-12">
                        <div class="card  collapsed-card">
                          <div class="card-header">
                            <div class="row justify-content-between">
                                <h3 class="card-title"><b>{{$job->Job_Name}}</b></h3>
                              <div class="row">
                                <div class="col">
                                  <a href="{{ url ('admin/editJob/'.$job->id)}}" class="btn btn-success">Modifier</a>
                                </div>
                                <div class="col">
                                  <form action="{{ url ('admin/deleteJob/'.$job->id)}}" method="post">
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
                              <p><b><u>Description :</u></b> {{$job->Description}}</p>
                            </div>         
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
                  <!-- /.tab-pane displayJob-->

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