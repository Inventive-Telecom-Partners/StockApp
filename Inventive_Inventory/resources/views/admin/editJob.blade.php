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
              <h3 class="card-title">Modification de job</h3>

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
                  <li class="nav-item"><a class="nav-link active" href="#changeUser" data-toggle="tab">Modifier job</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-pane" id="changeUser">
                  <div class="row">
                      <h3><b>Modification du job :</b> {{$job->Job_Name}}</h3>
                  </div>
                  <div class="row">
                      *Champs requis
                    </div>
                    <form action="{{url('admin/updateJob/'.$job->id)}}" method="post">
                      @csrf 
                      @method('PUT')
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="inputJobName">Nom*</label>
                            <input type="text" id="inputJobName" class="form-control" value="{{$job->Job_Name}}" name="JobName" required>
                          </div>
                        </div>

                        <div class="col">
                          <div class="form-group">
                            <label for="inputJobDesc">Description*</label>
                              <input type="text" class="form-control" id="inputJobDesc" value="{{$job->Description}}" name="JobDesc" required>  
                          </div>
                        </div>
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