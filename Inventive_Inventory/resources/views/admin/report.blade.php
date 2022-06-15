@extends('/layout/admin')

@section('mainContent')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Générateur de rapports</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Génération de rapport</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12" style="padding: 35px">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Génération de rapport</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ url ('admin/reportTab')}}" method="get">
                <div class="form-group">

                <div class="form-group">
                  <label for="inputStatus">Flux I/O</label>
                  <select id="inputStatus" class="form-control custom-select" required name="Flow">
                    <option value='' selected disabled>Selectionnez le type de flux</option>
                    @foreach($flowData as $flow)
                    <option value='{{$flow->id}}'>{{$flow->Flow_Name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                <label for="inputStatus">User</label>
                  <select id="inputStatus" class="form-control custom-select" required name="User">
                    <option value='' selected disabled>Séléctionnez un utilisateur</option>
                    @foreach($userData as $user)
                    <option value='{{$user->id}}'>{{$user->Name}}</option>
                    @endforeach
                  </select>
                </div>
                  
                  
                  <a href="{{url('/report')}}" class="btn btn-secondary">Annulé</a>
                  <input type="submit" value="Générer rapport" class="btn btn-success float-right">
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection