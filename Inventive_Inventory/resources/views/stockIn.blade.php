@extends('/layout/home_layout')

@section('mainContent')

<div class="login-box justify-content-center" style="align-items:center; display:flex; width:90%; ">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h3><b>Formulaire d'entrée</b></h3>
    </div>
    <div class="card-body">
    <p class="login-box-msg">Veuillez entrer les informations de l'objet entré: (le badge, le numéro de série et la description sont obligatoires ainsi que les champs avec une *)!</p>
      <form action="/stockInCreate" method="post">
      @csrf
            <div class="row">
                <div class="col-6">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Badge utilisateur" name="Badge" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-id-badge"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Numéro de série" name="Serial" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-barcode"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Numéro de produit" name="Product">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-qrcode"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Description" name="Description" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-file"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Couleur" name="Couleur">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-dot-circle"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Prix HTVA" name="Prix">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fa fa-euro"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="file" class="form-control" placeholder="Image" name="Picture">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-image"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="Favori">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Toujours avoir en stock</label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                <label class="col-form-label">Marque*</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" aria-label="Default select example" name="Marque" required>
                            <option value="" selected>Marque</option>
                            @foreach($brandData as $brand)
                            <option value="{{$brand->id}}">{{$brand->Brand_Name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="col-form-label">Catégorie*</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" aria-label="Default select example" name="Category" required>
                            <option value="" selected>Catégorie</option>
                            @foreach($categoryData as $cat)
                            <option value="{{$cat->id}}">{{$cat->Category_Name}}</option>
                            @endforeach
                        </select>
                    </div>

                <label class="col-form-label">Emplacement*</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" aria-label="Default select example" name="Level" required>
                            <option value="" selected>Emplacement?</option>
                            @foreach($levelData as $level)
                            @if($level->Level_Name == "noLevel")
                            @else
                            <option value="{{$level->id}}">
                                @foreach($shelfData as $shelf)
                                    @if($shelf->id == $level->idShelf)
                                        @foreach($stockData as $stock)
                                            @if($stock->id == $shelf->idStock)
                                                {{$stock->Stock_Name}} - {{$shelf->Shelf_Name}} - {{$level->Level_Name}}
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <label for="PerishDate" class="col-form-label">Etat</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" aria-label="Default select example" name="Etat">
                            <option value='' selected>Etat</option>
                            @foreach($state as $i)
                            <option value="{{$i->id}}">{{$i->State_Name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="PerishDate" class="col-form-label">Date de péremption</label>
                    <div class="input-group mb-3">
                    <input type="date" class="form-control" id="PerishDate" placeholder="Date de 'péremption'" name="Peremption">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-calendar-check"></span>
                        </div>
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
