@extends('/layout/admin')

@section('mainContent')

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$elementData->Description}}</h3>
              <div class="col-12">
                <img src="{{asset('assets/dist/img/item/ComingSoon.png')}}" class="product-image" alt="Product Image">
              </div>
              <!-- Ici on met qu'une image pour l'instant dans la base de donnée! -->
              <div class="col-12 product-image-thumbs"> 
                <div class="product-image-thumb active"><img src="{{asset('assets/dist/img/item/ComingSoon.png')}}" alt="Product Image"></div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$elementData->Description}}</h3>
              <hr>
              <h4>Etat de l'objet</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                  {{$State->State_Name}}
                  <br>
                  @if($State->id == 1)
                    <i class="fas fa-circle fa-2x text-green"></i>
                    @elseif($State->id == 2)
                    <i class="fas fa-circle fa-2x text-blue"></i>
                    @elseif($State->id == 3)
                    <i class="fas fa-circle fa-2x text-purple"></i>
                    @elseif($State->id == 4)
                    <i class="fas fa-circle fa-2x text-orange"></i>
                    @else
                    <i class="fas fa-circle fa-2x text-red"></i>
                  @endif
                  
                </label>
                
              </div>

              
              <div class="bg-gray py-2 px-3 mt-4">
              <h4>Prix d'achat de l'objet (HTVA)</h4>
                <h2 class="mb-0">
                {{$Price}} €
                </h2>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-date-tab" data-toggle="tab" href="#product-date" role="tab" aria-controls="product-date" aria-selected="false">Date</a>
                <a class="nav-item nav-link" id="product-infos-tab" data-toggle="tab" href="#product-infos" role="tab" aria-controls="product-infos" aria-selected="false">Informations</a>
                <a class="nav-item nav-link" id="product-actions-tab" data-toggle="tab" href="#product-actions" role="tab" aria-controls="product-actions" aria-selected="false">Actions</a>
              </div>
            </nav>
            <!-- Informations de l'objet -->
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
                <ul>
                  <li><b><u>Description :</b></u> {{$elementData->Description}}</li>
                  <li><b><u>Couleur :</b></u> {{$elementData->color}}</li>
                  <li><b><u>Emplacement :</b></u> {{$stockData->Stock_Name}} - {{$shelfData->Shelf_Name}} - {{$levelData->Level_Name}}</li>
                  <li><b><u>Marque :</b></u> {{$brandData->Brand_Name}}</li>
                  <li><b><u>Category :</b></u> {{$categoryData->Category_Name}}</li>
                </ul>
              </div>
              <div class="tab-pane fade" id="product-date" role="tabpanel" aria-labelledby="product-date-tab">
                <b><u>Date d'entrée dans le stock :</b></u> {{$changeLoca->created_at}}
              </div>
              <div class="tab-pane fade" id="product-infos" role="tabpanel" aria-labelledby="product-infos-tab">
                <ul>
                  <li><b><u>Numéro de série :</b></u> {{$elementData->Serial_Number}}</li>
                  <li><b><u>Numéro de produit :</b></u> {{$elementData->Product_Number}}</li>
                </ul>
              </div>
              <div class="tab-pane fade" id="product-actions" role="tabpanel" aria-labelledby="product-actions-tab">
                <div class="row justify-content-between">
                  <div class="col">
                    <a href="{{ url ('admin/editItem/'.$elementData->id)}}" class="btn btn-success">Modifier l'objet</a>
                  </div>
                  <div class="col">
                  <a href="{{ url ('admin/profil')}}" class="btn btn-info">Poster sur ebay (actuellement indisponible)</a>
                  </div>                          
                </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
</body>
</html>

@endsection