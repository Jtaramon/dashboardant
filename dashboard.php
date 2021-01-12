<?php
//Iniciar Sesion nueva
session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
  echo 'Usted no tiene autorizacion';
  die();
}
require_once 'conexion.php';

$fecha_actual = date("Y-m-d");
$fecha_antes = date("Y-m-d", strtotime($fecha_actual . "- 7 days"));

require_once 'layouts/dashboard/cuenca.php';
require_once 'layouts/dashboard/malacatos.php';
require_once 'layouts/dashboard/catamayo.php';
require_once 'layouts/dashboard/zamora.php';

?>

<!--Header-->
<?php include 'layouts/header.php'; ?>
<!--Fin Header-->

<body id="page-top">
  <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />

  <!--Datos que se capturan para la gráfica de Ingreso y Salida-->
  <!--CUENCA-->
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VIngreso"> <?php echo $vl4; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VSalida"> <?php echo $vl5; ?> </div>
  <!--MALACATOS-->
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VIngresoMA"> <?php echo $vl4MA; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VSalidaMA"> <?php echo $vl5MA; ?> </div>
  <!--CATAMAYO-->
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VIngresoCA"> <?php echo $vl4CA; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VSalidaCA"> <?php echo $vl5CA; ?> </div>
  <!--ZAMORA-->
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VIngresoZA"> <?php echo $vl4ZA; ?> </div>
  <div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VSalidaZA"> <?php echo $vl5ZA; ?> </div>

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

        <!-- **************************************************************************************************************************************************************** -->

        <!-- Inicio de Reporte - Cuenca -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reporte Semanal Vía Cuenca</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="window.print()"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
          </div>
          <!-- Rango de Fecha-->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6>
              <?php
              echo "Fecha: Entre <strong>" . $fecha_antes . "</strong> al <strong>" . $fecha_actual . "</strong>";
              ?>
            </h6>
          </div>
          <!-- Fin Rango de Fecha-->
          <!-- Content Row Tarjets Via Cuenca -->
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
          <!--Finish Content Row Tarjets Via Cuenca-->

          <!-- Content Row graficas Via Cuenca-->
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase"> Tráfico según tipo de vehículo</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area ">
                    <canvas id="chart-Tipo-CU"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- Area Chart 2 -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase"> Tráfico según evento de Ingreso o Salida</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chart-Even-CU"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Finish Content Row graficas Via Cuenca-->
        </div>
        <!-- Fin de Reporte - Cuenca -->

        <!-- **************************************************************************************************************************************************************** -->

        <!-- Inicio de Reporte - Malacatos -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reporte Semanal Vía Malacatos</h1>
          </div>
          <!-- Content Row Tarjets Via Malacatos -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!--Target Total de vehículos-->
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de Vehículos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $vlMA; ?> </div>
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
                      <div id="vLivianoMA" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vl1MA; ?> </div>
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
                      <div id="vMedianoMA" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vl2MA; ?> </div>
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
                      <div id="vPesadoMA" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vl3MA; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-truck-moving fa-2x text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Finish Content Row Tarjets Via Malacatos-->

          <!-- Content Row graficas Via Malacatos-->
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase"> Tráfico según tipo de vehículo</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chart-Tipo-MA"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- Area Chart 2 -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase"> Tráfico según evento de Ingreso o Salida</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chart-Even-MA"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Finish Content Row graficas Via Malacatos-->
        </div>
        <!-- Fin de Reporte - Malacatos -->

        <!-- **************************************************************************************************************************************************************** -->

        <!-- Inicio de Reporte - Catamayo -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reporte Semanal Vía Catamayo</h1>
          </div>
          <!-- Content Row Tarjets Via Catamayo -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!--Target Total de vehículos-->
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de Vehículos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $vlCA; ?> </div>
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
                      <div id="vLivianoCA" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vl1CA; ?> </div>
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
                      <div id="vMedianoCA" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vl2CA; ?> </div>
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
                      <div id="vPesadoCA" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vl3CA; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-truck-moving fa-2x text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Finish Content Row Tarjets Via Catamayo-->

          <!-- Content Row graficas Via Catamayo-->
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase"> Tráfico según tipo de vehículo</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chart-Tipo-CA"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- Area Chart 2 -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase"> Tráfico según evento de Ingreso o Salida</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chart-Even-CA"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Finish Content Row graficas Via Catamayo-->
        </div>
        <!-- Fin de Reporte - Catamayo -->

        <!-- **************************************************************************************************************************************************************** -->

        <!-- Inicio de Reporte - Zamora -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reporte Semanal Vía Zamora</h1>
          </div>
          <!-- Content Row Tarjets Via Zamora -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!--Target Total de vehículos-->
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de Vehículos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $vlZA; ?> </div>
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
                      <div id="vLivianoZA" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vl1ZA; ?> </div>
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
                      <div id="vMedianoZA" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vl2ZA; ?> </div>
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
                      <div id="vPesadoZA" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vl3ZA; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-truck-moving fa-2x text-gray-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Finish Content Row Tarjets Via Zamora-->

          <!-- Content Row graficas Via Zamora-->
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase"> Tráfico según tipo de vehículo</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chart-Tipo-ZA"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- Area Chart 2 -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase"> Tráfico según evento de Ingreso o Salida</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chart-Even-ZA"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Finish Content Row graficas Via Zamora-->
        </div>
        <!-- Fin de Reporte - Zamora -->

        <!-- **************************************************************************************************************************************************************** -->

      </div>
      <!-- End of Main Content -->

      <!--Footer-->
      <?php include 'layouts/footer.php'; ?>
      <script src="js/chart/dashboard/cuenca/chart-home-cuenca-tipo.js"></script>
      <script src="js/chart/dashboard/cuenca/chart-home-cuenca-evento.js"></script>

      <script src="js/chart/dashboard/malacatos/chart-home-malacatos-tipo.js"></script>
      <script src="js/chart/dashboard/malacatos/chart-home-malacatos-evento.js"></script>

      <script src="js/chart/dashboard/catamayo/chart-home-catamayo-tipo.js"></script>
      <script src="js/chart/dashboard/catamayo/chart-home-catamayo-evento.js"></script>

      <script src="js/chart/dashboard/zamora/chart-home-zamora-tipo.js"></script>
      <script src="js/chart/dashboard/zamora/chart-home-zamora-evento.js"></script>
      <!--Fin Footer-->