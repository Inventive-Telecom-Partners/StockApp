@extends('layout/admin')

@section('mainContent')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Déconnexion</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Déconnexion</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Déconnexion de l'utilisateur</h3>

        </div>
        <div class="card-body">
            <form style="text-align:center">
              <div class="form-group">
              <label for="inputDescription">Êtes-vous sûr de vouloir vous déconnecter?</label>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="radioType" id="DecoNRadio" checked>
                  <label class="form-check-label" for="DecoNRadio">
                    Non
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radioType" id="DecoORadio">
                  <label class="form-check-label" for="DecoORadio">
                    Oui
                  </label>
                </div>
                <input type="submit" value="Déconnexion" class="btn btn-danger ">
              </div>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
