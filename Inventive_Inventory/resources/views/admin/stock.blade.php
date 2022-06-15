@extends('/layout/admin')

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

    @foreach($stockData as $stock)
    @if($stock->Stock_Name == "noStock")
    @else
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card collapsed-card">
              <div class="card-header">
                <h5 class="card-title" data-card-widget="collapse">{{$stock->Stock_Name}} 
                </h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: none;">
                <table id="stock{{$stock->id}}" class="table table-bordered table-striped display">
                  <thead>
                    <tr>
                      <th>Etagère</th>
                      <th>Etage</th>
                      <th>Marque</th>
                      <th>Catégorie</th>
                      <th>Description</th>
                      <th>Numéro de produit</th>
                      <th>Numéro de série</th>
                      <th>Couleur</th>
                      <th>Etat</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($shelfData as $shelf)
                      @if($stock->id == $shelf->idStock)
                        @foreach($levelData as $level)
                          @if($shelf->id == $level->idShelf) 
                            @foreach($changeLoca as $change)
                              @if($level->id == $change->idLevel)
                                @foreach($elementData as $element)
                                  @if($change->idElement == $element->id)
                                    @foreach($categoryData as $cat)
                                      @if($cat->id == $element->idCategory)
                                        @foreach($brandData as $brand)
                                          @if($brand->id == $element->idBrand)
                                            <tr>
                                              <td>{{$shelf->Shelf_Name}}</td>
                                              <td>{{$level->Level_Name}}</td>
                                              <td>{{$cat->Category_Name}}</td>
                                              <td>{{$brand->Brand_Name}}</td>
                                              <td>{{$element->Description}}</td>
                                              <td>{{$element->Product_Number}}</td>
                                              <td>{{$element->Serial_Number}}</td>
                                              <td>{{$element->color}}</td>
                                              <td></td>
                                            </tr>
                                            @endif
                                        @endforeach
                                      @endif
                                    @endforeach
                                  @endif
                                @endforeach
                              @endif
                            @endforeach
                          @endif 
                        @endforeach
                      @endif 
                    @endforeach      
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Etagère</th>
                      <th>Etage</th>
                      <th>Marque</th>
                      <th>Catégorie</th>
                      <th>Description</th>
                      <th>Numéro de produit</th>
                      <th>Numéro de série</th>
                      <th>Couleur</th>
                      <th>Etat</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif
    @endforeach
                     
@endsection    