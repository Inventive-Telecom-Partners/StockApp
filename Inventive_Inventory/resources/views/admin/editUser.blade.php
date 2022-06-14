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
                  <li class="nav-item"><a class="nav-link active" href="#changeUser" data-toggle="tab">Modifier utilisateur</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-pane" id="changeUser">
                  <div class="row">
                      <h3><b>Modification de l'utilisateur :</b> {{$user->Name}}</h3>
                  </div>
                    <form action="{{url('admin/updateUser/'.$user->id)}}" method="post">
                      @csrf 
                      @method('PUT')
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="inputName">Nom*</label>
                            <input type="text" id="inputName" class="form-control" value="{{$user->Name}}" name="Name">
                          </div>
                        </div>

                        <div class="col">
                          <div class="form-group">
                            <label for="inputBadge">Badge*</label>
                            @if($user->Badge)
                              <input type="text" class="form-control" id="inputBadge" value="{{$user->Badge}}" name="Badge">  
                            @else
                              <input type="text" class="form-control" id="inputBadge" placeholder="Insérez nouveau numéro de badge/tag" name="Badge">
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="inputEmail">Email*</label>
                              <input type="email" class="form-control" id="inputEmail" value="{{$user->email}}" name="email">
                          </div>
                        </div>

                        <div class="col">
                          <div class="form-group">
                            <label for="inputPwd">Mot de passe*</label>
                            <input type="password" class="form-control" id="inputPwd" placeholder="Insérez nouveau mot de passe" name="password">
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputStatus">Photo de l'utilisateur</label>
                        <input type="file" class="form-control" placeholder="Image">
                      </div>

                      <div class="form-group">
                        <label for="inputRole">Rôle de l'utilisateur</label>
                        <select id="inputRole" class="form-control custom-select" name="RoleId">
                          @foreach ($roleData as $role)
                            @if($role->Role_Name == $user_role[0]->Role_Name)
                            <option value="{{$role->id}}" selected>{{$role->Role_Name}}</option>
                            @else
                            <option value="{{$role->id}}">{{$role->Role_Name}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="inputJob">Job de l'utilisateur</label>
                        <select id="inputJob" class="form-control custom-select" name="JobId">
                          @foreach ($jobData as $job)
                            @if($job->Job_Name == $user_job[0]->Job_Name)
                            <option value="{{$job->id}}" selected>{{$job->Job_Name}}</option>
                            @else
                            <option value="{{$job->id}}">{{$job->Job_Name}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>

                      <a href="{{url('admin/adduser')}}" class="btn btn-secondary">Annulé</a>
                      <input type="submit" value="Modifier" class="btn btn-success float-right">
                    </form>
                  </div>
                  <!-- /.tab-pane changeUser -->
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