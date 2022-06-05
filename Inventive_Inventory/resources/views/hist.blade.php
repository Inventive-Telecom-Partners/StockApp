<!-- Page montrant l'historique demandé -->
@extends('/layout/user')

@section('mainContent')
use SimpleSoftwareIO\QrCode\Facades\QrCode;
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Historique</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Accueil</a></li>
          <li class="breadcrumb-item active">Historique des transactions</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
       
      <div class="col-12">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Historique des transactions</a></li>
              <li class="nav-item"><a class="nav-link" href="#qr" data-toggle="tab">Générer QR code</a></li>
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
              <!-- /.tab-pane timeline-->

              <div class="tab-pane" id="qr">
                <div class="visible-print text-center">
                    {!! QrCode::size(200)->generate(Request::url()); !!}
                    <p>Scannez moi afin de voir l'historique de "insérez ici user,dates, etc"</p>
                    <input type="button" value="Imprimer" class="btn btn-success">   
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
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection