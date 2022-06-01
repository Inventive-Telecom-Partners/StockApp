@extends('/layout/home_layout')

@section('mainContent')

<div class="login-box justify-content-center" style="align-items:center; display:flex; width:90%; ">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h3"><b>Formulaire d'entrée</b></a>
    </div>
    <div class="card-body">
    <p class="login-box-msg">Veuillez entrer les informations de l'objet entré: (le badge, le numéro de série et la description sont obligatoires)!</p>
      <form action="../../index3.html" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Badge utilisateur">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-id-badge"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Numéro de série">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-barcode"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Numéro de produit">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-qrcode"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Description">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-file"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Couleur">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-dot-circle"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="file" class="form-control" placeholder="Image">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-image"></span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-6">
                <label class="col-form-label">Emplacement</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" aria-label="Default select example">
                            <option selected>Stock?</option>
                            <option value="1">Vente</option>
                            <option value="2">Maintenance</option>
                            <option value="3">Alibaba</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <select class="custom-select" aria-label="Default select example">
                            <option selected>Etagère?</option>
                            <option value="1">M1</option>
                            <option value="2">M2</option>
                            <option value="3">M3</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <select class="custom-select" aria-label="Default select example">
                            <option selected>Etage?</option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                        </select>
                    </div>
                    <label for="PerishDate" class="col-form-label">Date de péremption (optionnel)</label>
                    <div class="input-group mb-3">
                    <input type="date" class="form-control" id="PerishDate" placeholder="Date de 'péremption'">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-calendar-check"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Toujours avoir en stock</label>
                        </div>
                    </div>
                </div>
            </div>
        
        
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Entrer l'objet</button>
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
