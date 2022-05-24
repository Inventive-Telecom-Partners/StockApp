@extends('user')

@section('mainContent')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ITP STOCK</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
              <div class="col-md-12">
                <div class="card collapsed-card">
                  <div class="card-header">
                    <h5 class="card-title" data-card-widget="collapse">Stock Vente <span class="badge badge-info right">156</span></h5>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body" style="display: none;">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Numéro</th>
                      <th>Client</th>
                      <th>Date Reservation</th>
                      <th>Montant</th>
                      <th>Status</th>
                      <th></th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>

                  

                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
              <div class="col-md-12">
                <div class="card collapsed-card">
                  <div class="card-header">
                    <h5 class="card-title" data-card-widget="collapse">Stock Maintenance <span class="badge badge-info right">Ici se retrouve le nombre d'item dans le stock (ex 459)</span></h5>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body" style="display: none;">
                  <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Numéro</th>
                      <th>Client</th>
                      <th>Date Reservation</th>
                      <th>Montant</th>
                      <th>Status</th>
                      <th></th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>

                   

                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title" data-card-widget="collapse">TOUS LES STOCK</h5>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body" style="display: block;">
                  <table id="example6" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Numéro</th>
                      <th>Client</th>
                      <th>Date Reservation</th>
                      <th>Montant</th>
                      <th>Status</th>
                      <th></th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    

                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
                    
@endsection    