@extends('/layout/admin')

@section('mainContent')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Objets dans l'inventaire</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title" data-card-widget="collapse">Tous les stocks <span class="badge badge-info right">$count Ici se retrouve le nombre d'item dans le stock (ex 459)</span></h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <table id="objet" class="table table-bordered table-striped display">
                  <thead>
                    <tr>
                      <th>Emplacement</th>
                      <th>Marque</th>
                      <th>Catégorie</th>
                      <th>Description</th>
                      <th>Numéro de produit</th>
                      <th>Numéro de série</th>
                      <th>Couleur</th>
                      <th>Etat</th>
                      <th>Show</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($stockData as $stock)
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
                                              <td>{{$stock->Stock_Name}} - {{$shelf->Shelf_Name}} - {{$level->Level_Name}}</td>
                                              <td>{{$cat->Category_Name}}</td>
                                              <td>{{$brand->Brand_Name}}</td>
                                              <td>{{$element->Description}}</td>
                                              <td>{{$element->Product_Number}}</td>
                                              <td>{{$element->Serial_Number}}</td>
                                              <td>{{$element->color}}</td>
                                              <td></td>
                                              <td>
                                              <div class="row" style="margin-top:10px;">
                                                <form action="{{ url ('/seeItem')}}" method="get">
                                                  @csrf
                                                  <input type="submit" value="Informations sur l'objet" class="btn btn-info">
                                                </form>
                                              </div>
                                              </td>
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
                  @endforeach       
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Emplacement</th>
                      <th>Marque</th>
                      <th>Catégorie</th>
                      <th>Description</th>
                      <th>Numéro de produit</th>
                      <th>Numéro de série</th>
                      <th>Couleur</th>
                      <th>Etat</th>
                      <th>Show</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection