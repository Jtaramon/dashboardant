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

//--------------------------------------------GRAFICO 1-----------------------------------------------------------
//Total de Vehiculos 1
$hora = $_POST['hora'];
$fecha2 = $_POST['fecha'];
$fecha = date("m/d/Y", strtotime($fecha2));
$via = $_POST['exampleFormControlSelect1'];

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

$sqlT = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$hora' AND fecha = '$fecha' AND sentido_circulacion LIKE '%$via%'";
$totalT = $mysqli->query($sqlT);
$vlT = mysqli_num_rows($totalT);
//Total de Vehiculos 1


// Filtro hora - VLiviano
$sql = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$hora' AND fecha = '$fecha' AND tipo_vehiculo = 'Liviano' AND sentido_circulacion LIKE '%$via%'";
$total = $mysqli->query($sql);
$vl = mysqli_num_rows($total);


// FIN Filtro hora


// Filtro hora - VMediano
$sql1 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$hora' AND fecha = '$fecha' AND tipo_vehiculo = 'Mediano' AND sentido_circulacion LIKE '%$via%'";
$total1 = $mysqli->query($sql1);
$vl1 = mysqli_num_rows($total1);

// FIN Filtro hora


// Filtro hora - VPesado
$sql2 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$hora' AND fecha = '$fecha' AND tipo_vehiculo = 'Pesado' AND sentido_circulacion LIKE '%$via%'";
$total2 = $mysqli->query($sql2);
$vl2 = mysqli_num_rows($total2);

//--------------------------------------------GRAFICO 2-----------------------------------------------------------

//Total de Vehiculos 2
$hora1 = $_POST['hora1'];
$fecha3 = $_POST['fecha1'];
$fecha1 = date("m/d/Y", strtotime($fecha3));
$sqlT1 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$hora1' AND fecha = '$fecha1' AND sentido_circulacion LIKE '%$via%'";
$totalT1 = $mysqli->query($sqlT1);
$vlT1 = mysqli_num_rows($totalT1);
//Total de Vehiculos 2

// Filtro hora - VLiviano
$sql3 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$hora1' AND fecha = '$fecha1' AND tipo_vehiculo = 'Liviano' AND sentido_circulacion LIKE '%$via%'";
$total3 = $mysqli->query($sql3);
$vl3 = mysqli_num_rows($total3);
// FIN Filtro hora


// Filtro hora - VMediano
$sql4 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$hora1' AND fecha = '$fecha1' AND tipo_vehiculo = 'Mediano' AND sentido_circulacion LIKE '%$via%'";
$total4 = $mysqli->query($sql4);
$vl4 = mysqli_num_rows($total4);
// FIN Filtro hora


// Filtro hora - VPesado
$sql5 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$hora1' AND fecha = '$fecha1' AND tipo_vehiculo = 'Pesado' AND sentido_circulacion LIKE '%$via%'";
$total5 = $mysqli->query($sql5);
$vl5 = mysqli_num_rows($total5);
// FIN Filtro hora


//--------------------------------------------GRAFICO 3-----------------------------------------------------------

//Total de Vehiculos 2
$horaV = $_POST['horaV'];
$fechaV = $_POST['fechaV'];
$velocidad = $_POST['velo'];

$horaV1 = $_POST['horaV1'];
$fechaV1 = $_POST['fechaV1'];
$velocidad1 = $_POST['velo1'];

$sqlV = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$horaV' AND fecha = '$fechaV' AND velocidad = '$velocidad km/h' AND sentido_circulacion LIKE '%$via%'";
$totalV = $mysqli->query($sqlV);
$vlV = mysqli_num_rows($totalV);

$sqlV1 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$horaV1' AND fecha = '$fechaV1' AND  km/h = '$velocidad1 km/h' AND sentido_circulacion LIKE '%$via%'";
$totalV1 = $mysqli->query($sqlV1);
$vlV1 = mysqli_num_rows($totalV1);
//Total de Vehiculos 2

// Filtro hora - VLiviano
$sqlV2 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$horaV' AND fecha = '$fechaV' AND tipo_vehiculo = 'Liviano' AND velocidad = '$velocidad km/h' AND sentido_circulacion LIKE '%$via%'";
$totalV2 = $mysqli->query($sqlV2);
$vlV2 = mysqli_num_rows($totalV2);

$sqlV21 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$horaV1' AND fecha = '$fechaV1' AND tipo_vehiculo = 'Liviano' AND velocidad = '$velocidad1 km/h' AND sentido_circulacion LIKE '%$via%'";
$totalV21 = $mysqli->query($sqlV21);
$vlV21 = mysqli_num_rows($totalV21);
// FIN Filtro hora


// Filtro hora - VMediano
$sqlV3 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$horaV' AND fecha = '$fechaV' AND tipo_vehiculo = 'Mediano' AND velocidad = '$velocidad km/h' AND sentido_circulacion LIKE '%$via%'";
$totalV3 = $mysqli->query($sqlV3);
$vlV3 = mysqli_num_rows($totalV3);

$sqlV31 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$horaV1' AND fecha = '$fechaV1' AND tipo_vehiculo = 'Mediano' AND velocidad = '$velocidad1 km/h' AND sentido_circulacion LIKE '%$via%'";
$totalV31 = $mysqli->query($sqlV31);
$vlV31 = mysqli_num_rows($totalV31);
// FIN Filtro hora


// Filtro hora - VPesado
$sqlV4 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$horaV' AND fecha = '$fechaV' AND tipo_vehiculo = 'Pesado' AND velocidad = '$velocidad km/h' AND sentido_circulacion LIKE '%$via%'";
$totalV4 = $mysqli->query($sqlV4);
$vlV4 = mysqli_num_rows($totalV4);

$sqlV41 = "SELECT id_vehiculo FROM vehiculos WHERE hora = '$horaV1' AND fecha = '$fechaV1' AND tipo_vehiculo = 'Pesado' AND velocidad = '$velocidad1 km/h' AND sentido_circulacion LIKE '%$via%'";
$totalV41 = $mysqli->query($sqlV41);
$vlV41 = mysqli_num_rows($totalV41);
// FIN Filtro hora


include 'layouts/header.php'; ?>
<!--Fin Header-->

<body id="page-top">
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VLivhoraT"> <?php echo $vlT; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VLivhora"> <?php echo $vl; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VMedhora"> <?php echo $vl1; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VPeshora"> <?php echo $vl2; ?> </div>

  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VLivhoraT1"> <?php echo $vlT1; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VLivhora1"> <?php echo $vl3; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VMedhora1"> <?php echo $vl4; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VPeshora1"> <?php echo $vl5; ?> </div>

  <!-- GRAFICA VELOCIDAD -->

  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VLivhoraVT"> <?php echo $vlV; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VLivhoraV"> <?php echo $vlV2; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VMedhoraV"> <?php echo $vlV3; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VPeshoraV"> <?php echo $vlV4; ?> </div>

  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VLivhoraVT1"> <?php echo $vlV1; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VLivhoraV1"> <?php echo $vlV21; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VMedhoraV1"> <?php echo $vlV31; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VPeshoraV1"> <?php echo $vlV41; ?> </div>

  <!-- FIN GRAFICA VELOCIDAD -->
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
          <!-- Content Row 2 FECHA Y HORA COMPARACION 2 -->
          <div class="row">
            <div class="col-xl-6 col-lg-5">
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Comparacion de tráfico segun la Fecha y Hora </h6>
                </div>
                <div class="card-body">
                  <form name="Filtro" method="post" action="chartTraficoTV.php">
                    <div class="form-group">
                      <select class="form-control" id="exampleFormControlSelect1" name="exampleFormControlSelect1">
                        <option>Seleccionar la vía......</option>
                        <option value="Cuenca">Cuenca</option>
                        <option value="Malacatos">Malacatos</option>
                        <option value="Catamayo">Catamayo</option>
                        <option value="Zamora">Zamora</option>
                      </select>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="">Grafico 1</span>
                      </div>
                      <input type="date" min="2019-03-01" max="2019-03-30" class="form-control" placeholder="DD/MM/AAAA" name="fecha" required>
                      <input type="text" class="form-control" placeholder="HH:MM:SS" name="hora" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="">Grafico 2</span>
                      </div>
                      <input type="date" min="2019-03-01" max="2019-03-30" class="form-control" placeholder="DD/MM/AAAA" name="fecha1" required>
                      <input type="text" class="form-control" placeholder="HH:MM:SS" name="hora1" required>
                    </div>
                    <input type="submit" value="Graficar" class="form-control btn btn-primary" name="enviar">
                  </form>
                  <div class="chart-area">
                    <canvas id="trafhorafechaLinear"></canvas>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-5">
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Comparacion de tráfico segun la Fecha, Hora y Velocidad </h6>
                </div>
                <div class="card-body">
                  <form name="Filtro" method="post" action="chartTraficoTV.php">
                    <div class="form-group">
                      <select class="form-control" id="exampleFormControlSelect1" name="exampleFormControlSelect1">
                        <option>Seleccionar la vía......</option>
                        <option value="Cuenca">Cuenca</option>
                        <option value="Malacatos">Malacatos</option>
                        <option value="Catamayo">Catamayo</option>
                        <option value="Zamora">Zamora</option>
                      </select>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="">Grafico 1</span>
                      </div>
                      <input type="date" min="2019-03-01" max="2019-03-30" class="form-control" placeholder="DD/MM/AAAA" name="fechaV" required>
                      <input type="text" class="form-control" placeholder="HH:MM:SS" name="horaV" required>
                      <input type="text" class="form-control" placeholder="Km/s" name="velo" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="">Grafico 2</span>
                      </div>
                      <input type="date" min="2019-03-01" max="2019-03-30" class="form-control" placeholder="DD/MM/AAAA" name="fechaV1" required>
                      <input type="text" class="form-control" placeholder="HH:MM:SS" name="horaV1" required>
                      <input type="text" class="form-control" placeholder="Km/s" name="velo1" required>
                    </div>
                    <input type="submit" value="Graficar" class="form-control btn btn-primary" name="enviar">
                  </form>
                  <div class="chart-area">
                    <canvas id="trafhorafechaLinearV"></canvas>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!--Footer-->
      <?php include 'layouts/footer.php'; ?>
      <script src="js/chart/traficoTipoVh/filtroHoraFechaArea.js"></script>
      <script src="js/chart/traficoTipoVh/filtroHoraFechaPie.js"></script>

      <script src="js/chart/traficoTipoVh/comparacionLinear.js"></script>
      <script src="js/chart/traficoTipoVh/comparacionPie.js"></script>

      <script src="js/chart/traficoTipoVh/comparacionLinearV.js"></script>
      <script src="js/chart/traficoTipoVh/comparacionPieV.js"></script>
      <script src="js/cargarEjemplos.js"></script>
      <!--Fin Footer-->