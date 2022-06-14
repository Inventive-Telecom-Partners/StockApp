@extends('/layout/home_layout')

@section('mainContent')

<div class="" style="align-items:center; display:flex;">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h3><b>Inventive-Inventory</b></h3>
    </div>
    <div class="card-body" >
      <table id="objet" class="table table-bordered table-striped">
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
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>      
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
