<?php

require_once 'conexion.php';

    //  Csv
    if (isset($_POST["enviar"])) {

      require_once 'addcsv.php';
  
      $archivo = $_FILES["archivo"]["name"];
      $archivo_copiado = $_FILES["archivo"]["tmp_name"];
      $archivo_guardado = "copia_".$archivo;
  
          //Copia Archivo
      if (copy($archivo_copiado ,$archivo_guardado )) {
          echo "Se copio correctamente";
      }else{
          echo "Hubo un error";
      }
          //Fin Copia Archivo
  
          //Verificar Copia
      if (file_exists($archivo_guardado)) {
          $fp = fopen($archivo_guardado,"r");
  
          while ($datos = fgetcsv($fp, 1000, ";")) {
                  //echo $datos[0] ." ".$datos[1] ." ".$datos[2]." ".$datos[3]." ".$datos[4]."</br>";
              $res = insertar_datos($datos[0],$datos[1],$datos[2],$datos[3],$datos[4]);
              if ($res) {
                  echo "Se inserto los datos correctamente";
                  
              }else{
                  echo "No se inserto, Error";
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
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-file-csv mr-1"></i>Cargar Archivo CSV</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="card-body formulario">
                    <form action="ingresodatos.php" method="post" class="formulariocompleto" enctype="multipart/form-data">
                        <input type="file" name="archivo" class="form-control-file"/>
                        <small id="emailHelp" class="form-text text-muted">Seleccionar solo archivos con extension .CSV</small><br>
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