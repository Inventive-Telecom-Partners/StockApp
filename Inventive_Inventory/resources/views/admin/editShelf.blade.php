@extends('/layout/admin')

@section('mainContent')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Gestion des stock</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Modification de stock</li>
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
              <h3 class="card-title">Modification de stock</h3>

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
                  <li class="nav-item"><a class="nav-link active" href="#changeUser" data-toggle="tab">Modifier étagère</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-pane" id="changeUser">
                  <div class="row">
                      <h3><b>Modification de l'étagère :</b> {{$shelf->Shelf_Name}} du stock {{$stock->Stock_Name}}</h3>
                  </div>
                  <div class="row">
                      *Champs requis
                    </div>
                    <form action="{{url('admin/updateShelf/'.$shelf->id)}}" method="post">
                      @csrf 
                      @method('PUT')
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="inputShelfName">Nom*</label>
                            <input type="text" id="inputShelfName" class="form-control" value="{{$shelf->Shelf_Name}}" name="ShelfName" required>
                          </div>
                        </div>

                        <div class="col">
                          <div class="form-group">
                            <label for="inputShelfDesc">Description*</label>
                              <input type="text" class="form-control" id="inputShelfDesc" value="{{$shelf->Description}}" name="ShelfDesc" required>  
                          </div>
                        </div>
                      </div>

                      <a href="{{url('admin/manage')}}" class="btn btn-secondary">Annulé</a>
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