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
            <table class="table table-bordered table-striped display">
                                <thead>
                                  <tr>
                                    <th>Utilisateur</th>
                                    <th>Description de l'objet</th>
                                    <th>Numéro de série</th>
                                    <th>Flux</th>
                                    <th>Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($changeLoca as $change)
                                    @foreach($elementData as $element)
                                        @if($change->idElement == $element->id)
                                            <tr>
                                                <td>{{$UserName}}</td>
                                                <td>{{$element->Description}}</td>
                                                <td>{{$element->Serial_Number}}</td>
                                                <td>{{$Flux}}</td>
                                                <td>{{$change->created_at}}</td>
                                            </tr>
                                        @endif
                                  @endforeach
                                @endforeach
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th>Utilisateur</th>
                                    <th>Description de l'objet</th>
                                    <th>Numéro de série</th>
                                    <th>Flux</th>
                                    <th>Date</th>
                                  </tr>
                                </tfoot>
                            </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection
