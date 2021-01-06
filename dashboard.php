<?php
//Iniciar Sesion nueva
session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
  echo 'Usted no tiene autorizacion';
  die();
}
require_once 'conexion.php';
$fecha_actual='';

//-------------------------------------------------TIPO VEHICULO------------------------------------------
// total de vehiculos
$sql = "SELECT id_vehiculo FROM vehiculos";
$sql = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '4/1/2021' AND '6/1/2021' AND via = 'Cuenca'";
$total = $mysqli->query($sql);
$vl = mysqli_num_rows($total);
// FIN total de vehiculos

// Vehiculos Livianos
$sql1 = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '4/1/2021' AND '6/1/2021' AND via = 'Cuenca' AND tipo_vehiculo = 'Vehículo Liviano'";
$total1 = $mysqli->query($sql1);
$vl1 = mysqli_num_rows($total1);
// FIN vehiculos Ingresan

// Vehiculos Medianos
$sql2 = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '4/1/2021' AND '6/1/2021' AND via = 'Cuenca' AND tipo_vehiculo = 'Vehículo Mediano'";
$total2 = $mysqli->query($sql2);
$vl2 = mysqli_num_rows($total2);
// FIN vehiculos Salida

// Vehiculos Medianos
$sql3 = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '4/1/2021' AND '6/1/2021' AND via = 'Cuenca' AND tipo_vehiculo = 'Vehículo Pesado'";
$total3 = $mysqli->query($sql3);
$vl3 = mysqli_num_rows($total3);
// FIN vehiculos Salida
//-------------------------------------------------Evento VEHICULO------------------------------------------
// total de vehiculos INGRESA
$sql4 = "SELECT id_vehiculo FROM vehiculos WHERE evento = 'Ingreso'";
$total4 = $mysqli->query($sql4);
$vl4 = mysqli_num_rows($total4);
// FIN total de vehiculos
// total de vehiculos Salen
$sql5 = "SELECT id_vehiculo FROM vehiculos WHERE evento = 'Salida'";
$total5 = $mysqli->query($sql5);
$vl5 = mysqli_num_rows($total5);
// FIN total de vehiculos

?>

<!--Header-->
<?php include 'layouts/header.php'; ?>
<!--Fin Header-->

<body id="page-top">
  <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VIngreso"> <?php echo $vl4; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VSalida"> <?php echo $vl5; ?> </div>
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
      <li class="nav-item active">
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
            <a class="collapse-item" href="chartTraficoTV.php">Trafico Tipo de Vehiculo</a>
            <a class="collapse-item" href="chartTraficoEV.php">Trafico Tipo de Evento</a>
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reporte Semanal Via Cuenca</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="window.print()"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
          </div>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6>
              <?php
              echo "Fecha: " . $fecha_actual = date("d-m-Y") . " y " . date("d-m-Y", strtotime($fecha_actual . "- 7 days"));
              ?>
            </h6>
          </div>
          <!--Inicio Targets-->
          <!-- Content Row Tarjets -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!--Target Total de vehículos-->
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de Vehículos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $vl; ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-car fa-2x text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!--Target Total de Livianos-->
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Livianos</div>
                      <div id="vLiviano" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vl1; ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-car-side fa-2x text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!--Target Total de Medianos-->
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Medianos</div>
                      <div id="vMediano" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vl2; ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-truck-pickup fa-2x text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!--Target Total de Pesados-->
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pesados</div>
                      <div id="vPesado" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vl3; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-truck-moving fa-2x text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Finish Targets-->
          <!-- Content Row graficas 1-->
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase"> Filtro Por Tipo de Vehiculo</h6>
                  <div class="dropdown no-arrow">
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Vehículos</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> V. Liviano
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> V. Mediano
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> V. Pesado
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Content Row graficas 2-->
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase"> Filtro por Evento</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChartE"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Vehículos</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChartE"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> V. Ingresan
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> V. Salen
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!--Footer-->
      <?php include 'layouts/footer.php'; ?>
      <script src="js/chart/dashboard/chart-area.js"></script>
      <script src="js/chart/dashboard/chart-area-evento.js"></script>
      <script src="js/chart/dashboard/chart-pie.js"></script>
      <script src="js/chart/dashboard/chart-pie-evento.js"></script>
      <!--Fin Footer-->