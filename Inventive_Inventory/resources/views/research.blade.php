@extends('/layout/home_layout')

@section('mainContent')

<div class="" style="align-items:center; display:flex;">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h3><b>Inventive-Inventory</b></h3>
    </div>
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
            <th>Stock Out</th>
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
                                          <form action="{{ url ('/stockOut/'.$element->Serial_Number)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Sortir du stock" class="btn btn-danger">
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
            <th>Stock Out</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection
