    @extends('/layout/admin')

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
                       src="{{asset('assets/dist/img/users/blank_profile.png')}}"
                       alt="User profile picture">
                </div>
                <!-- <ul>
                  @foreach ($roleData as $role)
                    <li>{{$role->Role_Name}} : {{$role->Description}}</li>
                  @endforeach
                </ul> -->

                <h3 class="profile-username text-center">{{auth()->user()->Name}}</h3>

                <p class="text-muted text-center">{{$user_role[0]->Role_Name}} - {{$user_job[0]->Job_Name}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{auth()->user()->email}}</a>
                  </li>
                  <li class="list-group-item">
                    @if (auth()->user()->Badge)
                      <b>Badge/Tag</b> <a class="float-right">{{auth()->user()->Badge}}</a>
                    @else
                      <b>Badge/Tag</b> <a class="float-right">Aucun</a>
                    @endif
                  </li>
                  <li class="list-group-item">
                    <b>In/Out</b> <a class="float-right">{{$countIn}}/{{$countOut}}</a>
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
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Notifications</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Paramètres de profil</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      
                      @foreach($notifData as $notif)
                      @if($notif->idNotifType == 8)
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-box-open bg-danger"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i>{{$notif->created_at}}</span>

                            <h3 class="timeline-header"><a href="#">Stock Out</a></h3>

                            <div class="timeline-body">
                              {{$notif->Description}}
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        @elseif($notif->idNotifType == 9)
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-arrow-alt-circle-right bg-info"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i>{{$notif->created_at}}</span>

                            <h3 class="timeline-header"><a href="#">Stock Déplacement</a></h3>

                            <div class="timeline-body">
                              {{$notif->Description}}
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        @else
                        <!-- timeline item -->
                        <div>
                          <i class="fas fas fa-box bg-success"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i>{{$notif->created_at}}</span>

                            <h3 class="timeline-header"><a href="#">Stock In</a></h3>

                            <div class="timeline-body">
                              {{$notif->Description}}
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        @endif
                       @endforeach
                      
            
                
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  <div class="row">
                      *Champs requis
                    </div>
                    <form action="{{url('admin/updateMe/'.auth()->user()->id)}}" method="post">
                      @csrf 
                      @method('PUT')
                      <div class="form-group">
                        <label for="inputName">Nom actuel :*</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" value="{{auth()->user()->Name}}" name="Name" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail">Email actuel :*</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" value="{{auth()->user()->email}}" name="email" required>
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label for="inputExperience">Badge/Tag actuel :*</label>
                        <div class="col-sm-10">
                          @if(auth()->user()->Badge)
                            <input class="form-control" id="inputExperience" value="{{auth()->user()->Badge}}" name="Badge" required>
                          @else
                            <input class="form-control" id="inputExperience" placeholder="Scannez ou insérez manuellement votre numéro d'identification tag" name="Badge">
                          @endif
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPwd">Mot de passe*</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPwd" placeholder="Insérez nouveau mot de passe" name="password" required>
                        </div>
                      </div> 
                      <div class="form-group">
                        <div>
                          <button type="submit" class="btn btn-success">Modifier</button>
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