<?php
require_once 'conexion.php';

    //TABLAS
    $sql = "SELECT * FROM vehiculos";
    $resultado = $mysqli->query($sql);
    
?>


<!--Iso Lenguaje-->
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!--Fin Iso Lenguaje-->

<!--Header-->
<?php include 'layouts/header.php'; ?>
<!--Fin Header-->

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!--Slide bar-->
    <?php include 'layouts/nav.php'; ?>
    <!--Fin Slide bar-->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'layouts/topbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Id</th>
                          <th>Evento</th>
                          <th>Tipo Vehiculo</th>
                          <th>Velocidad</th>
                          <th>Fecha</th>
                          <th>Hora</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>Id</th>
                          <th>Evento</th>
                          <th>Tipo Vehiculo</th>
                          <th>Velocidad</th>
                          <th>Fecha</th>
                          <th>Hora</th>
                      </tr>
                  </tfoot>
                  <tbody>
                      <?php while($row = $resultado->fetch_assoc()) { ?>
                          
                          <tr>
                              <td><?php echo $row['id_vehiculo']; ?></td>
                              <td><?php echo $row['evento']; ?></td>
                              <td><?php echo $row['tipo_vehiculo']; ?></td>
                              <td><?php echo $row['velocidad']; ?></td>
                              <td><?php echo $row['fecha']; ?></td>
                              <td><?php echo $row['hora']; ?></td>
                          </tr>
                      <?php } ?>
                      
                  </tbody>
              </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!--Footer-->
<?php include 'layouts/footer.php'; ?>
<!--Fin Footer-->