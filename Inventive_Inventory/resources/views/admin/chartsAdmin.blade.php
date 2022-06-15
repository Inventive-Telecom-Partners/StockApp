@extends('/layout/admin')

@section('javascript')
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var barChartCanvas = $('#barChart').get(0).getContext('2d')

    var barChartData = {
      labels  : ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
      datasets: [
        {
          label               : 'Stock IN',
          backgroundColor     : 'rgba(100,220,100,0.9)',
          borderColor         : 'rgba(100,100,100,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [0, 0, 0, 0, 0, {{$countIn}}, 0, 0, 0, 0, 0, 0]
        },
        {
          label               : 'Stock OUT',
          backgroundColor     : 'rgba(220, 100, 100, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [0, 0, 0, 0, 0, {{$countOut}}, 0, 0, 0, 0, 0, 0]
        },
      ]
    }

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

 
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#Pie-StockIn').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Téléphone',
          'Serveur',
          'Firewall',
          'Routeur',
          'Swicth',
          'IPOs',
      ],
      datasets: [
        {
          data: [7,5,4,6,3,1],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or doughnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'pie',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#Pie-StockOut').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Téléphone',
          'Serveur',
          'Firewall',
          'Routeur',
          'Swicth',
          'IPOs',
      ],
      datasets: [
        {
          data: [4,1,0,0,3,1],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    };
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- LINE CHART Maintenance -
    //--------------
    var lineChartCanvas = $('#lineChartMaintenance').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, barChartOptions)
    var lineChartData = $.extend(true, {}, barChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })
    //-------------
    //- LINE CHART Vente -
    //--------------
    var lineChartCanvas = $('#lineChartVente').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, barChartOptions)
    var lineChartData = $.extend(true, {}, barChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })
    //-------------
    //- LINE CHART Alibaba -
    //--------------
    var lineChartCanvas = $('#lineChartAlibaba').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, barChartOptions)
    var lineChartData = $.extend(true, {}, barChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })
  })
</script>
@endsection

@section('mainContent')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Graphiques</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Graphiques</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <!-- Balance In | Out Annuelle-->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Balance In | Out Annuelle</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
        </div>
        <div class ="row">
          <div class="col-md-6">

            <!-- Stock In - Devices -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Stock In - Types d'objets</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="Pie-StockIn" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card Stock In - Devices -->
          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
              <!-- Stock Out - Devices -->
              <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Stock Out - Types d'objets</h3>
                

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="Pie-StockOut" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card Stock Out - Devices -->
          <!-- /.col (RIGHT) -->
          </div>
        </div>
        <!-- /.row -->
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
