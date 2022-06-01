@extends('/layout/home_layout')

@section('mainContent')

<div class="login-box" style="align-items:center; display:flex;">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h3"><b>Inventive-Inventory</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Veuillez entrer les informations de recherche</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
            <select class="custom-select" aria-label="Default select example">
                <option value="parGlobal" selected>Type de recherche</option>
                <option value="parDesc">Description</option>
                <option value="parSN">Numéro de série</option>
                <option value="parPN">Numéro de produit</option>
                <option value="parType">Type d'objet</option>
            </select>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Données de la recherche">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-search"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Rechercher</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection
