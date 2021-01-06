<?php
session_start();
ini_set('MAX_EXECUTION_TIME', '-1');
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
  echo 'Usted no tiene autorizacion';
  die();
}

require_once 'conexion.php';

    //  Csv
    if (isset($_POST["enviar"])) {

      require_once 'addcsv.php';
  
      $archivo = $_FILES["archivo"]["name"];
      $archivo_copiado = $_FILES["archivo"]["tmp_name"];
      $archivo_guardado = "copia_".$archivo;
      $varoption = $_POST['exampleRadios'];
          //Copia Archivo
      if (copy($archivo_copiado ,$archivo_guardado )) {
          echo "Se copio correctamente";
          
          if ($varoption == "option1") {
            $via = "Cuenca";
          }elseif ($varoption == "option2"){
            $via = "Malacatos";
          }elseif ($varoption == "option3"){
            $via = "Catamayo";
          }elseif ($varoption == "option4"){
            $via = "Zamora";
          }else{
            echo "Ocurrio un error, vuelve a intentarlo";
          }
          
      }else{
          echo "Hubo un error";
      }
          //Fin Copia Archivo
  
          //Verificar Copia
      if (file_exists($archivo_guardado)) {
          $fp = fopen($archivo_guardado,"r");
  
          while ($datos = fgetcsv($fp, 1000, ";")) {
                  //echo $datos[0] ." ".$datos[1] ." ".$datos[2]." ".$datos[3]." ".$datos[4]."</br>";
              $res = insertar_datos($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$via);
              if ($res) {
                  
                  
              }else{
                  
              }
          }
      } else {
          echo "No existe una copia";
      }
          //Verificar Copia
  
  }
// Fin csv

//Tablas
    $sql = "SELECT * FROM vehiculos";
    $resultado = $mysqli->query($sql);

//Fin Tables
    
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
      <a class="collapse-item" href="chartTraficoTV.php">Trafico Tipo de Vehiculo</a>
      <a class="collapse-item" href="chartTraficoEV.php">Trafico Tipo de Evento</a>
    </div>
  </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Tables -->
<li class="nav-item" >
  <a class="nav-link" href="tables.php" >
    <i class="fas fa-fw fa-table"></i>
    <span>Tablas</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Subir Datos -->
<li class="nav-item active" >
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
          <h1 class="h3 mb-2 text-gray-800">Ingreso de datos:</h1><br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-file-csv mr-1"></i>Cargar Archivo CSV</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="card-body formulario">
                    <form action="ingresodatos.php" method="post" class="formulariocompleto" enctype="multipart/form-data">
                        <input type="file" name="archivo" class="form-control-file"/>
                        <small id="emailHelp" class="form-text text-muted">Seleccionar solo archivos con extension .CSV</small>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                          <label class="form-check-label" for="exampleRadios1">
                            Via Cuenca
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                          <label class="form-check-label" for="exampleRadios2">
                            Via Malacatos
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                          <label class="form-check-label" for="exampleRadios3">
                            Via Catamayo
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option4">
                          <label class="form-check-label" for="exampleRadios3">
                            Via Zamora
                          </label>
                        </div><br>
                        <input type="submit" value="Subir Archivo" class="form-control btn btn-primary" name="enviar" >
                    </form> 
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
<!--Fin Footer-->
