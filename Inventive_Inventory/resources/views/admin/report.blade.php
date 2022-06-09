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
              <form>
                <div class="form-group">
                <label for="inputDescription">Type de fichier désiré : </label>
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="radioType" id="WebRadio" checked>
                    <label class="form-check-label" for="WebRadio">
                      Version web
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="radioType" id="ExcelRadio">
                    <label class="form-check-label" for="ExcelRadio">
                      Excel
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="radioType" id="CSVRadio" >
                    <label class="form-check-label" for="CSVRadio">
                      CSV
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="radioType" id="flexRadioDefault3">
                    <label class="form-check-label" for="PDFRadio">
                      PDF
                    </label>
                  </div>

                </div>
                <div class="form-group">
                  <label for="inputStatus">Flux I/O</label>
                  <select id="inputStatus" class="form-control custom-select">
                    <option selected disabled>Selectionnez le type de flux</option>
                    <option>In</option>
                    <option>Out</option>
                  </select>
                </div>
                <div class="form-group">
                <label for="inputStatus">User</label>
                  <select id="inputStatus" class="form-control custom-select">
                    <option selected disabled>Séléctionnez un utilisateur (attention : mettre un seul de dispo quand c'est pas admin)</option>
                    <option>USER1</option>
                    <option>USER2</option>
                    <option>USER3</option>
                  </select>
                </div>
                  <div class="form-group">
                    <label>Période</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control float-right" id="reservation">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Type d'objet</label>
                      <select id="inputStatus" class="form-control custom-select">
                        <option selected disabled>Séléctionnez un type d'objet</option>
                        <option>Voiture</option>
                        <option>Moto</option>
                        <option>IPO</option>
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