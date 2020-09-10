<?php
session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
  echo 'Usted no tiene autorizacion';
  die();
}
require_once 'conexion.php';

    //TABLAS
    $sql = "SELECT * FROM vehiculos";
    $resultado = $mysqli->query($sql);
    
?>




<!--Header-->
<?php include 'layouts/header.php'; ?>
<!--Fin Header-->


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!--Slide bar-->
    
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
  <!--<div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>-->
  <div class="sidebar-brand-text mx-3">Sistema Web ANT</div> 
</a>

<!-- Nav Item - Dashboard -->
<li class="nav-item" >
  <a class="nav-link" href="dashboard.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Graficas</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Filtros</h6>
      <a class="collapse-item" href="charts.php">Fecha</a>
      <a class="collapse-item" href="chartHora.php">Hora</a>      
      <a class="collapse-item" href="chartVelocidad.php">Velocidad</a>
      <a class="collapse-item" href="chartTrafico.php">Trafico</a>
    </div>
  </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Tables -->
<li class="nav-item active" >
  <a class="nav-link" href="tables.php" >
    <i class="fas fa-fw fa-table"></i>
    <span>Tablas</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Subir Datos -->
<li class="nav-item" >
  <a class="nav-link" href="ingresodatos.php">
    <i class="fas fa-fw fa-table"></i>
    <span>Subir Datos</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
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
          <h1 class="h3 mb-2 text-gray-800">Tablas Automatizadas con Filtros</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Vehiculos</h6>
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