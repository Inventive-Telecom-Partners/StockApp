@extends('/layout/home_layout')

@section('mainContent')

<div class="login-box" style="align-items:center; display:flex;">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h3"><b>Formulaire de sortie</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Veuillez entrer les informations de l'objet sortis:</p>

      <form action="/stockOutDel" method="post">
        @csrf
        @method('DELETE')
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Badge Utilisateur" name="Badge">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-id-badge"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Numéro de série" name="Serial">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-barcode"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-danger btn-block">Sortir l'objet</button>
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
