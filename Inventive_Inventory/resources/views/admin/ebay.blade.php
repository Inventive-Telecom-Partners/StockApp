@extends('/layout/admin')

@section('mainContent')

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image">
              </div>
              <!-- Ici on met qu'une image pour l'instant dans la base de donnée! -->
              <div class="col-12 product-image-thumbs"> 
                <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Titre de l'objet</h3>
              <hr>
              <h4>Etat de l'objet</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                  Neuf
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                  Ouvert
                  <br>
                  <i class="fas fa-circle fa-2x text-blue"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                  Reconditionné
                  <br>
                  <i class="fas fa-circle fa-2x text-purple"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Occasion
                  <br>
                  <i class="fas fa-circle fa-2x text-orange"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                  Pour pièces
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
              </div>

              
              <div class="bg-gray py-2 px-3 mt-4">
              <h4>Quantité en stock</h4>
                <h2 class="mb-0">
                  100
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
              </div>
            </nav>
            <!-- Informations de l'objet -->
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
                Description
              </div>
              <div class="tab-pane fade" id="product-date" role="tabpanel" aria-labelledby="product-date-tab">
                Date d'entrée dans le stock
              </div>
              <div class="tab-pane fade" id="product-infos" role="tabpanel" aria-labelledby="product-infos-tab">
                 Serial Number & Product Number
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