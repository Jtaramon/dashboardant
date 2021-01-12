<!--Header-->
<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
  echo 'Usted no tiene autorizacion';
  die();
}

require_once 'conexion.php';
//----------------------------------------------------------GRAFICO 1-----------------------------------------------
// Filtro fecha - VLiviano
$fecha_antes = $_POST['fecha1'];
$fecha_actual = $_POST['fecha2'];
$via = $_POST['exampleFormControlSelect1'];

$sql = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND tipo_vehiculo = 'Vehículo Liviano' AND via = '$via'";
$total = $mysqli->query($sql);
$vl = mysqli_num_rows($total);

// FIN Filtro fecha


// Filtro fecha - VMediano
$sql1 = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND tipo_vehiculo = 'Vehículo Mediano' AND via = '$via'";
$total1 = $mysqli->query($sql1);
$vl1 = mysqli_num_rows($total1);

// FIN Filtro fecha


// Filtro fecha - VPesado
$sql2 = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND tipo_vehiculo = 'Vehículo Pesado' AND via = '$via'";
$total2 = $mysqli->query($sql2);
$vl2 = mysqli_num_rows($total2);
//----------------------------------------------------------GRAFICO 2-----------------------------------------------

$sql3 = "SELECT * FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND evento = 'Ingreso' AND via = '$via'";
$total3 = $mysqli->query($sql3);
$vl3 = mysqli_num_rows($total3);

$sql4 = "SELECT * FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND evento = 'Salida' AND via = '$via'";
$total4 = $mysqli->query($sql4);
$vl4 = mysqli_num_rows($total4);

// FIN Filtro fecha
include 'layouts/header.php'; ?>
<!--Fin Header-->

<body id="page-top">
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VLivFecha"> <?php echo $vl; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VMedFecha"> <?php echo $vl1; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VPesFecha"> <?php echo $vl2; ?> </div>

  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VEvIngFecha"> <?php echo $vl3; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VEvSalFecha"> <?php echo $vl4; ?> </div>

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
      <li class="nav-item" id="navInd">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">

      <!-- Nav Item - Graficas específicas -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-chart-bar"></i>
          <span>Gráficas específicas</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tráfico Según:</h6>
            <a class="collapse-item" href="chartFecha.php">Fecha</a>
            <a class="collapse-item" href="chartHora.php">Fecha - Hora</a>
            <a class="collapse-item" href="chartVelocidad.php">Fecha - Hora - Velocidad</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Graficas Comparativas -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-chart-pie"></i>
          <span>Gráficas Comparativas</span>
        </a>
        <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tráfico Según:</h6>
            <a class="collapse-item" href="chartTraficoTV.php">Tipo de Vehiculo</a>
            <a class="collapse-item" href="chartTraficoEV.php">Tipo de Evento</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Graficas de rangos -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-chart-line"></i>
          <span>Gráficas entre rangos</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Medir trafico:</h6>
            <a class="collapse-item" href="chartFechaRg.php">Fecha</a>
            <a class="collapse-item" href="chartHoraRg.php">Fecha - Hora</a>
            <a class="collapse-item" href="chartVelocidadRg.php">Fecha - Hora - Velocidad</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tablas</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Subir Datos -->
      <li class="nav-item">
        <a class="nav-link" href="ingresodatos.php">
        <i class="fas fa-file-csv"></i>
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
          <h1 class="h3 mb-2 text-gray-800">Gráficos Estadísticos</h1>
          <p class="mb-4">Controla el nro. de vehiculos</p>

          <!-- Grafico 1 Fecha Tipo Vehiculo y Evento -->
          <div class="row">
            <div class="col-xl-12 col-lg-11">
              <form name="Filtro" method="post" action="chartFechaRg.php">
                <div class="input-group mb-3">
                  <select class="form-control" id="exampleFormControlSelect1" name="exampleFormControlSelect1">
                    <option>Seleccionar la vía......</option>
                    <option value="Cuenca">Cuenca</option>
                    <option value="Malacatos">Malacatos</option>
                    <option value="Catamayo">Catamayo</option>
                    <option value="Zamora">Zamora</option>
                  </select>
                  <input type="date" class="form-control" placeholder="DD/MM/AAAA" name="fecha1" aria-label="Recipient's username" aria-describedby="basic-addon2" id="ejFecha" required>
                  <input type="date" class="form-control" placeholder="DD/MM/AAAA" name="fecha2" aria-label="Recipient's username" aria-describedby="basic-addon2" id="ejFecha" required>
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Graficar</button>
                    <button class="btn btn-primary" type="button" onClick="Ejemplofecha()">Cargar ejemplo</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-xl-6 col-lg-5">
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ingrese la Fecha y la Vía: </h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chartFechaArea"></canvas>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-5">
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Gráfica de los vehiculos que ingresan y salen en la fecha seleccionada:</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chartFechaAreaEv"></canvas>
                  </div>
                  <hr>
                </div>
              </div>

            </div>
          </div>
          <!-- Fin Grafico 1 Fecha Tipo Vehiculo y Evento -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!--Footer-->
      <?php include 'layouts/footer.php'; ?>
      <script src="js/chart/fecha/filtroFechaArea.js"></script>
      <script src="js/chart/fecha/filtroFechaPie.js"></script>

      <script src="js/chart/fecha/filtroFechaAreaEv.js"></script>
      <script src="js/chart/fecha/filtroFechaPieEv.js"></script>
      <script src="js/cargarEjemplos.js"></script>

      <!--Fin Footer-->