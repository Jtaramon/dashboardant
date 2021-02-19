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
//--------------------------------------------GRAFICO 1------------------------------------------------------
// Filtro velocidad - VLiviano
$velocidad = $_POST['velocidad'];
$via = $_POST['exampleFormControlSelect1'];
$hora = $_POST['hora'];
$fecha1 = $_POST['fecha'];
$fecha = date("m/d/Y", strtotime($fecha1));

$ingreso = '';
$salida = '';
if ($via == 'Cuenca') {
  $ingreso = 'Cuenca - Loja';
  $salida = 'Loja - Cuenca';
} elseif ($via == 'Malacatos') {
  $ingreso = 'Malacatos - Loja';
  $salida = 'Loja - Malacatos';
} elseif ($via == 'Catamayo') {
  $ingreso = 'Catamayo - Loja';
  $salida = 'Loja - Catamayo';
} elseif ($via == 'Zamora') {
  $ingreso = 'Zamora - Loja';
  $salida = 'Loja - Zamora';
};

$sql = "SELECT id_vehiculo FROM vehiculos WHERE velocidad = '$velocidad km/h' AND tipo_vehiculo = 'Liviano' AND sentido_circulacion LIKE '%$via%' AND fecha = '$fecha' AND hora = '$hora'";
$total = $mysqli->query($sql);
$vl = mysqli_num_rows($total);

// FIN Filtro velocidad


// Filtro velocidad - VMediano
$sql1 = "SELECT id_vehiculo FROM vehiculos WHERE velocidad = '$velocidad km/h' AND tipo_vehiculo = 'Mediano' AND sentido_circulacion LIKE '%$via%' AND fecha = '$fecha' AND hora = '$hora'";
$total1 = $mysqli->query($sql1);
$vl1 = mysqli_num_rows($total1);

// FIN Filtro velocidad


// Filtro velocidad - VPesado
$sql2 = "SELECT id_vehiculo FROM vehiculos WHERE velocidad = '$velocidad km/h' AND tipo_vehiculo = 'Pesado' AND sentido_circulacion LIKE '%$via%' AND fecha = '$fecha' AND hora = '$hora'";
$total2 = $mysqli->query($sql2);
$vl2 = mysqli_num_rows($total2);


//---------------------------------------------------GRAFICA 2-----------------------------------------------------

// Filtro velocidad - VMediano
$sql3 = "SELECT id_vehiculo FROM vehiculos WHERE velocidad = '$velocidad km/h' AND sentido_circulacion = '$ingreso' AND fecha = '$fecha' AND hora = '$hora'";
$total3 = $mysqli->query($sql3);
$vl3 = mysqli_num_rows($total3);

// FIN Filtro velocidad


// Filtro velocidad - VPesado
$sql4 = "SELECT id_vehiculo FROM vehiculos WHERE velocidad = '$velocidad km/h' AND sentido_circulacion = '$salida' AND fecha = '$fecha' AND hora = '$hora'";
$total4 = $mysqli->query($sql4);
$vl4 = mysqli_num_rows($total4);

// FIN Filtro velocidad
include 'layouts/header.php'; ?>
<!--Fin Header-->

<body id="page-top">
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VLivvelocidad"> <?php echo $vl; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VMedvelocidad"> <?php echo $vl1; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VPesvelocidad"> <?php echo $vl2; ?> </div>

  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VPesvelocidadEVin"> <?php echo $vl3; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VPesvelocidadEVSal"> <?php echo $vl4; ?> </div>


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
          <h1 class="h3 mb-2 text-gray-800">Graficos Estadisticos</h1>
          <p class="mb-4">Controla el nro. de vehiculos</p>

          <!-- Grafica Fecha Hora Velocidad - Tipo y Evento-->
          <div class="row">
            <!-- FILTROS-->
            <div class="col-xl-12 col-lg-11">
              <form name="Filtro" method="post" action="chartVelocidad.php">
                <div class="input-group mb-3">
                  <select class="form-control" id="exampleFormControlSelect1" name="exampleFormControlSelect1">
                    <option>Seleccionar la vía......</option>
                    <option value="Cuenca">Cuenca</option>
                    <option value="Malacatos">Malacatos</option>
                    <option value="Catamayo">Catamayo</option>
                    <option value="Zamora">Zamora</option>
                  </select>
                  <input type="date" class="form-control" min="2019-12-01" max="2019-12-30" placeholder="DD/MM/AAAA" name="fecha" aria-label="Recipient's username" aria-describedby="basic-addon2" id="ejFecha" required>
                  <input required type="text" class="form-control" placeholder="HH:MM:SS" name="hora" aria-label="Recipient's username" aria-describedby="basic-addon2" id="ejHora" required>
                  <input type="text" class="form-control" placeholder="Ingrese la velocidad" name="velocidad" aria-label="Recipient's username" aria-describedby="basic-addon2" id="ejVelocidad">
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Graficar</button>
                    <button class="btn btn-primary" type="button" onClick="Ejemplovelocidad()">Cargar ejemplo</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- Fin FILTROS-->
            <div class="col-xl-6 col-lg-5">
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ingrese la Velocidad</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chartvelocidadArea"></canvas>
                  </div>
                  <hr>
                </div>
              </div>

            </div>
            <div class="col-xl-6 col-lg-5">
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ingrese la Velocidad</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chartvelocidadAreaEV"></canvas>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin Grafica Fecha Hora Velocidad - Tipo y Evento-->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!--Footer-->
      <?php include 'layouts/footer.php'; ?>
      <script src="js/chart/velocidad/filtroVelocidadArea.js"></script>
      <script src="js/chart/velocidad/filtroVelocidadPie.js"></script>

      <script src="js/chart/velocidad/filtroVelocidadAreaEV.js"></script>
      <script src="js/chart/velocidad/filtroVelocidadPieEV.js"></script>

      <script src="js/cargarEjemplos.js"></script>

      <!--Fin Footer-->