@extends('/layout/admin')

@section('mainContent')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Gestion objets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Modification d'objets</li>
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
              <h3 class="card-title">Modification de l'objet "{{$elementData->Description}}"</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <p class="login-box-msg">Veuillez entrer les informations de l'objet entré: (le badge, le numéro de série et la description sont obligatoires ainsi que les champs avec une *)!</p>
        <form action="{{ url ('admin/updateItem/'.$elementData->id)}}" method="post">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{$user}}" name="Badge" readonly="readonly" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-id-badge"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{$elementData->Serial_Number}}" name="Serial" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-barcode"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{$elementData->Product_Number}}" placeholder="Numéro de produit" name="Product">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-qrcode"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{$elementData->Description}}" placeholder="Description" name="Description" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-file"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{$elementData->color}}" placeholder="Couleur" name="Couleur">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-dot-circle"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{$Price}}" placeholder="Prix HTVA" name="Prix">
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
                            <option value="{{$brandSelected->id}}" selected>{{$brandSelected->Brand_Name}}</option>
                            @foreach($brandData as $brand)
                            <option value="{{$brand->id}}">{{$brand->Brand_Name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="col-form-label">Catégorie*</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" aria-label="Default select example" name="Category" required>
                            <option value="{{$categorySelected->id}}" selected>{{$categorySelected->Category_Name}}</option>
                            @foreach($categoryData as $cat)
                            <option value="{{$cat->id}}">{{$cat->Category_Name}}</option>
                            @endforeach
                        </select>
                    </div>

                <label class="col-form-label">Emplacement*</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" aria-label="Default select example" name="Level" required>
                            @foreach($levelData as $level)
                                @if($level->Level_Name == "noLevel")
                                @else
                                    @if($levelData2->id == $level->id)
                                    <option value="{{$levelData2->id}}" selected>
                                        {{$stockData2->Stock_Name}} - {{$shelfData2->Shelf_Name}} - {{$levelData2->Level_Name}}                   
                                    </option>
                                    @else
                                    <option value="{{$level->id}}">
                                        @foreach($shelfData as $shelf)
                                            @if($shelf->id == $level->idShelf)
                                                @if($shelf->Shelf_Name == "noShelf")
                                                @else
                                                    @foreach($stockData as $stock)
                                                        @if($stock->id == $shelf->idStock)
                                                            @if($stock->Stock_Name == "noStock")
                                                            @else
                                                                {{$stock->Stock_Name}} - {{$shelf->Shelf_Name}} - {{$level->Level_Name}}
                                                            @endif    
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endforeach
                                    </option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <label for="PerishDate" class="col-form-label">Etat*</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" aria-label="Default select example" name="Etat" required>
                            <option value='{{$State2->id}}' selected>{{$State2->State_Name}}</option>
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
      </div>
      
    </section>
    <!-- /.content -->
@endsection