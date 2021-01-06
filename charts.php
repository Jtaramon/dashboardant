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
$fecha = $_POST['fecha'];
$via = $_POST['exampleFormControlSelect1'];

$sql = "SELECT id_vehiculo FROM vehiculos WHERE fecha = '$fecha' AND tipo_vehiculo = 'Vehículo Liviano' AND via = '$via'";
$total = $mysqli->query($sql);
$vl = mysqli_num_rows($total);

// FIN Filtro fecha


// Filtro fecha - VMediano
$sql1 = "SELECT id_vehiculo FROM vehiculos WHERE fecha = '$fecha' AND tipo_vehiculo = 'Vehículo Mediano' AND via = '$via'";
$total1 = $mysqli->query($sql1);
$vl1 = mysqli_num_rows($total1);

// FIN Filtro fecha


// Filtro fecha - VPesado
$sql2 = "SELECT id_vehiculo FROM vehiculos WHERE fecha = '$fecha' AND tipo_vehiculo = 'Vehículo Pesado' AND via = '$via'";
$total2 = $mysqli->query($sql2);
$vl2 = mysqli_num_rows($total2);
//----------------------------------------------------------GRAFICO 2-----------------------------------------------

$sql3 = "SELECT * FROM vehiculos WHERE fecha = '$fecha' AND evento = 'Ingreso' AND via = '$via'";
$total3 = $mysqli->query($sql3);
$vl3 = mysqli_num_rows($total3);

$sql4 = "SELECT * FROM vehiculos WHERE fecha = '$fecha' AND evento = 'Salida' AND via = '$via'";
$total4 = $mysqli->query($sql4);
$vl4 = mysqli_num_rows($total4);

// FIN Filtro fecha
include 'layouts/header.php'; ?>
<!--Fin Header-->

<body id="page-top">
<div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VLivFecha" > <?php echo $vl; ?> </div> 
<div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VMedFecha" > <?php echo $vl1; ?> </div> 
<div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VPesFecha" > <?php echo $vl2; ?> </div> 

<div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VEvIngFecha" > <?php echo $vl3; ?> </div> 
<div class="h5 mb-0 font-weight-bold text-gray-800" style="display:none" id="VEvSalFecha" > <?php echo $vl4; ?> </div> 

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
  <a class="nav-link" href="tables.php" >
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
          <h1 class="h3 mb-2 text-gray-800">Gráficos Estadísticos</h1>
          <p class="mb-4">Controla el nro. de vehiculos</p>

          <!-- Content Row 1 -->
          <div class="row">
            <div class="col-xl-8 col-lg-7">
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ingrese la Fecha y la Vía: </h6>
                  
                  
                </div>
                <div class="card-body">
                  <form name="Filtro" method="post" action="charts.php">
                    <div class="form-group">
                      <select class="form-control" id="exampleFormControlSelect1" name="exampleFormControlSelect1">
                        <option>Seleccionar la vía......</option>
                        <option value="Saraguro">Saraguro</option>
                        <option value="Malacatos">Malacatos</option>
                        <option value="Catamayo">Catamayo</option>
                      </select>
                    </div>
                    <div class="input-group mb-3">
                      <input type="date" class="form-control" min="2019-03-01" max="2019-03-30"  placeholder="DD/MM/AAAA" name="fecha"
                      aria-label="Recipient's username" aria-describedby="basic-addon2" id="ejFecha" required>
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Graficar</button>
                        <button class="btn btn-primary" type="button" onClick="Ejemplofecha()">Cargar ejemplo</button>
                      </div>
                    </div>
                  </form>
                  <div class="chart-area">
                    <canvas id="chartFechaArea"></canvas>
                  </div>
                  <hr>
                </div>
              </div>

            </div>

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Grafica Segun Fecha</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="chartFechaPie"></canvas>
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
                  <hr>
                </div>
              </div>
            </div>
          </div>
          <!-- Content Row 2-->
          <div class="row">
            <div class="col-xl-8 col-lg-7">
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

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Grafica Segun Fecha</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="chartFechaPieEv"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> V. Ingresan
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> V. Salen
                    </span>
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
<script src="js/chart/fecha/filtroFechaArea.js"></script>
<script src="js/chart/fecha/filtroFechaPie.js"></script>

<script src="js/chart/fecha/filtroFechaAreaEv.js"></script>
<script src="js/chart/fecha/filtroFechaPieEv.js"></script>
<script src="js/cargarEjemplos.js"></script>

<!--Fin Footer-->