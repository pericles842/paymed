<?php
	session_start();
	$privilegios = $_SESSION['privilegios'];
	$usuario=$_SESSION['usuario'];
	require('../../conexion.php');
	if(isset($_GET['idasesor'])){
		$idasesorold=$_GET['idasesor'];
		/*Asigno variables*/
		$sql="SELECT apellido1, apellido2, nombre1, nombre2 FROM asesor where idasesor='".$idasesorold."' ";
		$query=$mysqli->query($sql);	
		$arr_asesor = mysqli_fetch_array($query);
		$asesor=$arr_asesor[0].' '.$arr_asesor[1].' '.$arr_asesor[2].' '.$arr_asesor[3];
		$apenom=$arr_asesor[2].' '.$arr_asesor[0];
		// Registro en bitacora
		// Busco datos del Asesor para q seran Insertado en tabla de auditoria(inmuebles_r)
		$str="INSERT INTO inmuebles_r(id, codinm, titulo, modulo, usuario, accion) VALUES ('".$idasesorold."','0','".$apenom."','ASESORES','".$usuario."', 'E');";
		$conexion=$mysqli->query($str);
	}
	/* ///////////////////////////////////////////////////////////////////////////   */
	if(isset($_POST['submit'])){
		$idasesorold=$_POST['idasesorold'];
		/*Asigno variables*/
		$idasesor      =$_POST['idasesor'];
		$sql="SELECT apellido1, apellido2, nombre1, nombre2 FROM asesor 
		where idasesor='".$idasesor."' ";
		$query=$mysqli->query($sql);	
		$arr_asesor = mysqli_fetch_array($query);
		$asesor=$arr_asesor[0].' '.$arr_asesor[1].' '.$arr_asesor[2].' '.$arr_asesor[3];

		//echo $categoria.'--'.$describelo; exit();
		$str="UPDATE inmuebles SET idasesor ='".$idasesor."',asesor ='".$asesor."'  
		WHERE idasesor ='".$idasesorold."';";
		$conexion=$mysqli->query($str);
		//echo $str.' '; //exit();
		$str="delete from asesor WHERE idasesor ='".$idasesorold."';";
		$conexion=$mysqli->query($str);
		
		//echo $str; exit();
		echo '<script language="javascript">alert("Asignación Ok !!!");
	    window.location.href="rpt_asesor.php"; </script>';
	}	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | Habita Inmueble</title>
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
<script src="../../../php/vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#id_estado").change(function(){
			$.get("estados_js.php","id_estado="+$("#id_estado").val(), function(data){
				$("#id_municipio").html(data);
				console.log(data);
			});
		});

		/*$("#id_municipio").change(function(){
			$.get("parro_js.php","id_municipio="+$("#id_municipio").val(), function(data){
				$("#id_parroquia").html(data);
				console.log(data);
			});
		})*/;
	});
</script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<!-- -->
		<?php	if($privilegios==1){include("menuppal.php");}				
				elseif($privilegios==3){include("menugte.php");}
				elseif($privilegios==6){include("menuase.php");} ?>
<!--  -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Asignar Asesor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Asignación</li>
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
            <div style="background: #F89921"  class="card-header">
              <h3 class="card-title">Asignar Asesor</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
			<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<input type="hidden" name="idasesorold" value="<?php echo $idasesorold;?>">
				<div class="row">
				  <div class="col-md-10">
					<h3>Asesor Actual  :<?php echo $asesor;?></h3>
					<hr>
				  </div>
				  <div class="col-md-10">
				    <div class="form-group">
						<label for="cc-exp" class="control-label mb-1">Seleccione Nuevo El Asesor Que Hereda Los Inmueble</label>
						<select id="id_estado" class="form-control mtitu" name="idasesor" required>
							<option value="">Seleccione...</option>
							<?php
							//require('admin/conexion.php');
							$query = $mysqli -> query ("select idasesor, apellido1, apellido2, nombre1, nombre2 from asesor where estatus='A' and idasesor<>'".$idasesorold."'; " );
							while ($valores = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores['idasesor'].'">'.$valores[1].' '.$valores[2].' '.$valores[3].' '.$valores[4].'</option>';
						} ?>
						</select>
						<!--span class="help-block" data-valmsg-for="mtitu" data-valmsg-replace="true"></span-->
					</div>
				  </div>
				  <div align="right" class="col-md-12">
					<input style="background: #F89921;border-color: #F89921" type="submit" name="submit" value="Reasignar" class="btn btn-main btn-primary btn-lg uppercase">
				  </div>	
		  </form> 
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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

</body>
</html>
