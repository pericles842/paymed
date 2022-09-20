<?php
session_start();
$usuario = $_SESSION['usuario'];
require('../../conexion.php');
if (isset($_POST['submit'])) {
   //datos 

   $idmed = $_POST['idmed'];
   $idaseg = $_POST['idaseg'];

   $apellido1 = $_POST['apellido1'];
   $apellido2 = $_POST['apellido2'];
   $nombre1 = $_POST['nombre1'];
   $nombre2 = $_POST['nombre2'];

   $nrodoc = $_POST['nrodoc'];

   $fnacimiento = $_POST['fnacimiento'];
   $edad = $_POST['edad'];
   $idsexo = $_POST['idsexo'];
   $idestcivil = $_POST['idestcivil'];


   $movil = $_POST['movil'];
   $telefono = $_POST['telefono'];
   $correo = $_POST['correo'];

   $idpais = $_POST['idpais'];
   $idestado = $_POST['idestado'];
   $idmunicipio = $_POST['idmunicipio'];
   $idparroquia = $_POST['idparroquia'];

   $urbanizacion = $_POST['urbanizacion'];
   $calleav = $_POST['calleav'];
   $casaedif = $_POST['casaedif'];
   $piso = $_POST['piso'];
   $codpostal = $_POST['codpostal'];
   /* Inserto en Login para luego leer el idlogin */
   $str = "INSERT INTO loginn (idlogin, correo, cargo, clave, privilegios) VALUES (NULL, '" . $correo . "', 'Paciente', '" . $nrodoc . "','4' );";
   $conexion = $mysqli->query($str);

   $sqllast = ("SELECT max(idlogin) from loginn;");
   $objlast = $mysqli->query($sqllast);
   $arrlast = $objlast->fetch_array();
   $idlogin = $arrlast[0];
   /* Fin */

   $str = "INSERT INTO pacientes (idpaci, idlogin, idaseg, idmed, apellido1, apellido2, nombre1, nombre2, cedula, fnacimiento, edad, idsexo, idestcivil, correo, telefono, movil, idpais, idestado, idmunicipio, idparroquia, calleav, casaedif, piso, urbanizacion, codpostal, estatus) 
		VALUES (NULL, '" . $idlogin . "','" . $idaseg . "', '" . $idmed . "','" . $apellido1 . "', '" . $apellido2 . "','" . $nombre1 . "', '" . $nombre2 . "', '" . $nrodoc . "','" . $fnacimiento . "', '" . $edad . "', '" . $idsexo . "', '" . $idestcivil . "', '" . $correo . "','" . $telefono . "', '" . $movil . "', 
		'" . $idpais . "', '" . $idestado . "', '" . $idmunicipio . "', '" . $idparroquia . "', '" . $calleav . "', '" . $casaedif . "', '" . $piso . "', '" . $urbanizacion . "', '" . $codpostal . "', '1');";

   $conexion = $mysqli->query($str);
   // Busco ultimo inserta para Insertar en tabla de auditoria(inmuebles_r)
   /*$sql="SELECT max(idinmueble) idinmueble FROM inmuebles";
		$query=$mysqli->query($sql);	
		$arridmax = mysqli_fetch_array($query);
		$idinmueble=$arridmax['idinmueble'];
		$str="INSERT INTO inmuebles_r(id, codinm, titulo, modulo, usuario, accion) VALUES ('".$idinmueble."','".$codinm."','".$titulo."','INMUEBLE','".$usuario."', 'I');";
		$conexion=$mysqli->query($str);*/
   echo '<script language="javascript">alert("¡Registro Exitoso!");window.location.href="rpt_pac.php"; </script>';
}
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>PAYMED GLOBAL, LLC</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <script src="jquery/jquery-3.2.1.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $("#idpais").change(function() {
            $.get("pais_js.php", "idpais=" + $("#idpais").val(), function(data) {
               $("#id_estado").html(data);
               console.log(data);
            });
         });

         $("#id_estado").change(function() {
            $.get("estados_js.php", "id_estado=" + $("#id_estado").val(), function(data) {
               $("#id_municipio").html(data);
               console.log(data);
            });
         });

         $("#id_municipio").change(function() {
            $.get("munic_js.php", "id_municipio=" + $("#id_municipio").val(), function(data) {
               $("#id_parroquia").html(data);
               console.log(data);
            });
         });


      });

      //*validacion de fecha
      function calcedad(fecha) {
         //alert(fecha);return false;
         jQuery.ajax({
            type: "POST",
            url: "caledad_js.php",
            data: {
               fecha: fecha
            },
            success: function(data) {
               var edad = parseInt(data);
               if (edad < 25 || edad > 80 || isNaN(edad)) {
                  document.getElementById("edad").value = 'Error';
                  return false;
               } else {
                  document.getElementById("edad").value = data;
               }
            },
            error: function() {}
         });
      }
   </script>
</head>

<body class="hold-transition sidebar-mini">
   <!-- Site wrapper -->
   <div class="wrapper">
      <!-- -->
      <?php include("menuppal.php"); ?>
      <!--  -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1>Pacientes</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../../index.php?usr=1">Home</a></li>
                        <li class="breadcrumb-item active">Registro</li>
                     </ol>
                  </div>
               </div>
            </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">
            <!--div class="row">
        <div class="col-md-12"-->
            <div class="card card-primary">
               <div style="background: #F89921" class="card-header">
                  <h3 class="card-title">Registro</h3>

                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                  </div>
               </div>
               <div class="card-body">
                  <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return validacion()">
                     <div class="row">
                        <!-- antes de 1ra -->
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="idmedico">Medico: </label>
                              <select name="idmed" id="idmed" class="form-control form-control-sm" required>
                                 <option value="">-- Seleccione --</option>
                                 <?php
                                 //require('admin/conexion.php');
                                 $query = $mysqli->query("SELECT idmed, idlogin, idcomp, CONCAT(apellido1,' ', nombre1) AS nombremedico from medicos");
                                 while ($arr_med = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $arr_med['idmed'] . '">' . $arr_med['nombremedico'] . '</option>';
                                 } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="apellido1">Seguro:</label>
                              <select name="idaseg" id="idaseg" class="form-control form-control-sm" required>
                                 <option value="">-- Seleccione --</option>
                                 <?php
                                 //require('admin/conexion.php');
                                 $query = $mysqli->query("SELECT idaseg, razsocial from aseguradores");
                                 while ($valores = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $valores['idaseg'] . '">' . $valores['razsocial'] . '</option>';
                                 } ?>
                              </select>
                           </div>
                        </div>
                        <!-- 1ra -->
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="apellido1">1er Apellido </label>
                              <input type="text" name="apellido1" id="apellido1" style="text-transform:uppercase;" onKeypress="if (event.keyCode < 65 || event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122) event.returnValue = false;" required class="form-control form-control-sm " required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="apellido2">2do Apellido </label>
                              <input type="text" name="apellido2" id="apellido2" style="text-transform:uppercase;" onKeypress="if (event.keyCode < 65 || event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122) event.returnValue = false;" required class="form-control form-control-sm ">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="nombre1">1er Nombre </label>
                              <input type="text" name="nombre1" id="nombre1" style="text-transform:uppercase;" onKeypress="if (event.keyCode < 65 || event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122) event.returnValue = false;" required class="form-control form-control-sm " required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="mombre2">2do Nombre </label>
                              <input type="text" name="nombre2" id="nombre2" style="text-transform:uppercase;" onKeypress="if (event.keyCode < 65 || event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122) event.returnValue = false;" required class="form-control form-control-sm ">
                           </div>
                        </div>

                        <!-- 2da  -->

                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="nrodoc">N# Documento/Cedula:</label>
                              <input type="text" name="nrodoc" id="nrodoc" maxlength="8" minlength="7" class="form-control form-control-sm " required>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="fnacimiento">Fec.Nacimiento:</label>
                              <input type="date" name="fnacimiento" id="fnacimiento" class="form-control form-control-sm " onchange="calcedad(this.value)">
                           </div>
                        </div>
                        <div class="col-md-1">
                           <div class="form-group">
                              <label for="edad">Edad:</label>
                              <input type="text" name="edad" id="edad" class="form-control form-control-sm " readonly>
                           </div>
                        </div>
                        <div class="col-md-1">
                           <div class="form-group">
                              <label for="idsexo">Sexo:</label>
                              <select id="idsexo" class="form-control form-control-sm" name="idsexo" required>
                                 <option value="">-- Sel. --</option>
                                 <?php
                                 //require('admin/conexion.php');
                                 $query = $mysqli->query("select idsexo, sexo from sexo WHERE idestatus='1'; ");
                                 while ($valores = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $valores['idsexo'] . '">' . $valores['sexo'] . '</option>';
                                 } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label for="idestcivil">Est.Civil:</label>
                              <select id="idestcivil" class="form-control form-control-sm" name="idestcivil" required>
                                 <option value="">-- Seleccione --</option>
                                 <?php
                                 //require('admin/conexion.php');
                                 $query = $mysqli->query("select idecivil, estado from estadocivil WHERE idestatus='1'; ");
                                 while ($valores = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $valores['idecivil'] . '">' . $valores['estado'] . '</option>';
                                 } ?>
                              </select>
                           </div>
                        </div>
                        <!-- 3ra -->
                        <div class="col-md-1">
                           <div class="form-group">
                              <label for="movil">Movil:</label>
                              <select class="form-control form-control-sm" id="operadora" name="operadora">
                                 <option value="0412">0412</option>
                                 <option value="0414">0414</option>
                                 <option value="0424">0424</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-1">
                           <div class="form-group">
                              <label for="movil" style="visibility: hidden;">.</label>
                              <input type="text" name="movil" id="movil" maxlength="7" minlength="7" class="form-control form-control-sm" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" required>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label for="telefono">Teléfono:</label>
                              <input type="text" name="telefono" id="telefono" minlength="11" maxlength="11" class="form-control form-control-sm" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                           </div>
                        </div>
                        <div class="col-md-8">
                           <div class="form-group">
                              <label for="correo">Correo:</label>
                              <input type="email" name="correo" id="correo" class="form-control form-control-sm " required>
                           </div>
                        </div>
                        <!-- 4ta -->

                        <!-- Pais / Estado / Municipio / Parroquia -->
                        <div class="col-md-3">
                           <div class="form-group">
                              <!--label for="cc-exp" class="control-label mb-1">Estado</label-->
                              <select id="idpais" class="form-control form-control-sm" name="idpais" required>
                                 <option value="">-- pais --</option>
                                 <?php
                                 //require('admin/conexion.php');
                                 $query = $mysqli->query("SELECT idpais, pais FROM paises WHERE idestatus='1';");
                                 while ($valores = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $valores['idpais'] . '">' . $valores['pais'] . '</option>';
                                 } ?>
                              </select>
                              <!--span class="help-block" data-valmsg-for="mtitu" data-valmsg-replace="true"></span-->
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <!--label for="cc-exp" class="control-label mb-1">Estado</label-->
                              <select id="id_estado" class="form-control form-control-sm" name="idestado" required>
                                 <option value="">-- Seleccione --</option>
                                 <!--	
							< ?php
							//require('admin/conexion.php');
							$query = $mysqli -> query ("select idestado, estado from estado");
							while ($valores = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores['idestado'].'">'.$valores['estado'].'</option>';
						} ?>
						-->
                              </select>
                              <!--span class="help-block" data-valmsg-for="mtitu" data-valmsg-replace="true"></span-->
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <!--label for="cc-exp" class="control-label mb-1">Municipio</label-->
                              <select id="id_municipio" class="form-control form-control-sm" name="idmunicipio" required>
                                 <option value="">-- Municipio --</option>
                              </select>
                              <!--span class="help-block" data-valmsg-for="mtitu" data-valmsg-replace="true"></span-->
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <!--label for="cc-exp" class="control-label mb-1">Municipio</label-->
                              <select id="id_parroquia" class="form-control form-control-sm " name="idparroquia" required>
                                 <option value="">-- Parroquia --</option>
                              </select>
                              <!--span class="help-block" data-valmsg-for="mtitu" data-valmsg-replace="true"></span-->
                           </div>
                        </div>
                        <!-- 7ta  -->
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="urbanizacion">Urbanización:</label>
                              <input type="text" name="urbanizacion" id="urbanizacion" style="text-transform:uppercase;" class=" form-control form-control-sm" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="calleav">Calle/Avenida:</label>
                              <input type="text" name="calleav" style="text-transform:uppercase;" id="calleav" style="text-transform:uppercase;" class="form-control form-control-sm " required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="casaedif">Casa/Edif.:</label>
                              <input type="text" maxlength="8" name="casaedif" id="casaedif" style="text-transform:uppercase;" class="form-control form-control-sm ">
                           </div>
                        </div>
                        <div class="col-md-1">
                           <div class="form-group">
                              <label for="piso">Piso:</label>
                              <input type="text" maxlength="2" name="piso" id="piso" class="form-control form-control-sm ">
                           </div>
                        </div>

                        <div class="col-md-1">
                           <div class="form-group">
                              <label for="codpostal">Cod.Postal:</label>
                              <input type="text" maxlength="4" minlength="4" name="codpostal" id="codpostal" class="form-control form-control-sm " required>
                           </div>
                        </div>

                        <!-- 8va  -->
                        <div align="right" class="col-md-12">
                           <input style="background: #F89921;border-color: #F89921" type="submit" name="submit" value="Registrar..." class="btn btn-main btn-primary btn-lg uppercase">
                        </div>
                  </form>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
      </div>
      <div class="row">
         <div align="center" class="col-12">
            <a href="rpt_pac.php" class="btn btn-secondary">Atrás</a>
         </div>
      </div>
      </section>
      <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->

   <?php include("foo_admin.php"); ?>

   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
   </aside>
   <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->

   <!-- jQuery -->
   <script src="../../plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- AdminLTE App -->
   <script src="../../dist/js/adminlte.min.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="../../dist/js/demo.js"></script>
   <script>
      function validacion() {
         costo = document.getElementById("costo").value;
         if (isNaN(costo)) {
            alert('Error Costo!!!');
            return false;
         }
      }
   </script>

</body>

</html>