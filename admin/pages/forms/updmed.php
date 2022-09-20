<?php
	session_start();
	$usuario=$_SESSION['usuario'];
	$idlogin=$_SESSION['idlogin'];

	require('../../conexion.php');
	if(isset($_POST['submit'])){
		//datos 
		$idmed =$_POST['idmed'];
		$apellido1 =$_POST['apellido1'];
		$apellido2 =$_POST['apellido2'];
		$nombre1 =$_POST['nombre1'];
		$nombre2 =$_POST['nombre2'];

		$rif =$_POST['tprif'].$_POST['rif'];
		$nrodoc =$_POST['tpdoc'].$_POST['nrodoc'];

		$fnacimiento =$_POST['fnacimiento'];
		$edad =$_POST['edad'];
		$idsexo =$_POST['idsexo'];
		$idestcivil =$_POST['idestcivil'];


		$movil =$_POST['movil'];
		$telefono =$_POST['telefono'];
		$correo =$_POST['correo'];
		$correoalt =$_POST['correoalt'];

		$idpais =$_POST['idpais'];
		$idestado =$_POST['idestado'];
		$idmunicipio =$_POST['idmunicipio'];
		$idparroquia =$_POST['idparroquia'];

		$correoppal=''; // OJOOOOOO Por Aclarar

		$urbanizacion =$_POST['urbanizacion'];
		$calleav =$_POST['calleav'];
		$casaedif =$_POST['casaedif'];
		$piso =$_POST['piso'];
		$oficina =$_POST['oficina'];
		$codpostal =$_POST['codpostal'];
		$idestatus ='1'; // Por definir $_POST['idestatus'];
		/* Inserto en Login para luego leer el idlogin 
		$str="INSERT INTO loginn (idlogin, correo, cargo, clave, privilegios) VALUES (NULL, '".$correo."', 'Medico', '".$rif."','2' );";
		$conexion=$mysqli->query($str);

		$sqllast = ("SELECT max(idlogin) from loginn;");
	    $objlast=$mysqli->query($sqllast); $arrlast=$objlast->fetch_array();  
    	$idlogin=$arrlast[0];*/
		/* Fin */
		
		$str="UPDATE medicos SET nrodoc='".$nrodoc."',rif='".$rif."',nombre1='".$nombre1."',nombre2='".$nombre2."',apellido1='".$apellido1."',apellido2='".$apellido2."',fnacimiento='".$fnacimiento."',edad='".$edad."',idsexo='".$idsexo."',idestcivil='".$idestcivil."',movil='".$movil."',telefono='".$telefono."',correo='".$correo."',correoalt='".$correoalt."',idpais='".$idpais."',idestado='".$idestado."',idmunicipio='".$idmunicipio."',idparroquia='".$idparroquia."',correoppal='',calleav='".$calleav."',casaedif='".$casaedif."',piso='".$piso."',oficina='".$oficina."',urbanizacion='".$urbanizacion."',codpostal='".$codpostal."',idestatus='".$idestatus."'
		 WHERE idmed='".$idmed."' ;";

		$conexion=$mysqli->query($str);
		// Busco ultimo inserta para Insertar en tabla de auditoria(inmuebles_r)
		/*$sql="SELECT max(idinmueble) idinmueble FROM inmuebles";
		$query=$mysqli->query($sql);	
		$arridmax = mysqli_fetch_array($query);
		$idinmueble=$arridmax['idinmueble'];
		$str="INSERT INTO inmuebles_r(id, codinm, titulo, modulo, usuario, accion) VALUES ('".$idinmueble."','".$codinm."','".$titulo."','INMUEBLE','".$usuario."', 'I');";
		$conexion=$mysqli->query($str);*/
		echo '<script language="javascript">alert("¡Actualización Exitosa!");window.location.href="medctas.php?id='.$idmed.'"; </script>';
	}else{
		/*Respaldo de Consulta Tigre 
		$sqldatmed = ("SELECT a.idmed,a.idlogin, a.idcomp, a.nrodoc, a.rif, a.nombre1, a.nombre2, a.apellido1, a.apellido2, 
       	a.fnacimiento, a.edad, a.idsexo, b.sexo, a.idestcivil, c.estcivil, a.movil, a.telefono, a.correo, 
	   	a.correoalt, a.idpais, d.pais,
	   	a.idestado, e.estado, a.idmunicipio, f.municipio, a.idparroquia, g.parroquia, a.correoppal, a.calleav, a.casaedif, a.piso, a.oficina, 
	   	a.urbanizacion, a.codpostal, a.idestatus
		FROM medicos a, sexo b, estadocivil c, paises d, estado e, municipios f, parroquias g
		WHERE a.idlogin='".$idlogin."'AND a.idsexo=b.idsexo AND a.idestcivil=c.idestcivil
		AND a.idpais=d.idpais AND a.idestado=e.idestado AND a.idmunicipio=f.idmunicipio
		AND a.idparroquia=g.idparroquia");*/

		/*Busco Datos del Medico */
		/* $sqldatmed = ("SELECT  a.idmed, a.idcomp, a.nrodoc, a.codcolemed, a.mpss, a.rif, a.nombre1, a.nombre2, a.apellido1, a.apellido2, a.fnacimiento, a.edad, a.idsexo, a.idestcivil, a.movil, a.telefono, a.correo, a.correoalt, a.idpais, a.idestado, a.idmunicipio, a.idparroquia, a.correoppal, a.calleav, a.casaedif, a.piso, a.oficina, a.urbanizacion, a.codpostal, a.idestatus
			FROM medicos a, paises b, estado c, municipios d, parroquias e, estadocivil f, sexo g
			WHERE a.idlogin='".$idlogin."'
			AND a.idpais=b.idpais
			AND a.idestado=c.idestado
			AND a.idparroquia=e.parroquia
			AND a.idestcivil=f.idestcivil
			AND a.idsexo=g.idsexo;"); */
		$sqldatmed = ("SELECT  a.idmed, a.idcomp, a.nrodoc, a.codcolemed, a.mpss, a.rif, a.nombre1, a.nombre2, a.apellido1, a.apellido2, a.fnacimiento, a.edad, a.idsexo, a.idestcivil, a.movil, a.telefono, a.correo, a.correoalt, a.idpais, a.idestado, a.idmunicipio, a.idparroquia, a.correoppal, a.calleav, a.casaedif, a.piso, a.oficina, a.urbanizacion, a.codpostal, a.idestatus
			FROM medicos a
			WHERE a.idlogin='".$idlogin."';");

	    $objdatmed=$mysqli->query($sqldatmed); $arrdatmed=$objdatmed->fetch_array();  
    	$idmed=$arrdatmed['idmed'];
    	$rif=$arrdatmed['rif'];
    	$tprif = substr($arrdatmed['rif'], 0,1);
  		$rif = substr($arrdatmed['rif'], 1,9);
  		$nrodoc=$arrdatmed['nrodoc'];
  		$tpdoc = substr($arrdatmed['nrodoc'], 0,1);
  		$nrodoc = substr($arrdatmed['nrodoc'], 1,9);


    	$nombre1=$arrdatmed['nombre1'];
    	$nombre2=$arrdatmed['nombre2'];
    	$apellido1=$arrdatmed['apellido1'];
    	$apellido2=$arrdatmed['apellido2'];
    	$nombre=$apellido1.' '.$nombre1;

    	$fnacimiento=$arrdatmed['fnacimiento'];
    	$edad=$arrdatmed['edad'];
    	$idsexo=$arrdatmed['idsexo'];
    		$sql = ("SELECT sexo from sexo WHERE idsexo='".$idsexo."';");
	    	$obj=$mysqli->query($sql); $arr=$obj->fetch_array();  
    		$sexo=$arr[0];
    	$idestcivil=$arrdatmed['idestcivil'];
    		$sql = ("SELECT estcivil from estadocivil WHERE idestcivil='".$idestcivil."';");
	    	$obj=$mysqli->query($sql); $arr=$obj->fetch_array();  
    		$estcivil=$arr[0];
    	$movil=$arrdatmed['movil'];
    	$telefono=$arrdatmed['telefono'];
    
    	$correo=$arrdatmed['correo'];

    	$correoalt=$arrdatmed['correoalt'];
		$idpais=$arrdatmed['idpais'];
			$sql = ("SELECT pais from paises WHERE idpais='".$idpais."';");
	    	$obj=$mysqli->query($sql); $arr=$obj->fetch_array();  
    		$pais=$arr[0];
		$idestado=$arrdatmed['idestado'];
			$sql = ("SELECT estado from estado WHERE idestado='".$idestado."';");
	    	$obj=$mysqli->query($sql); $arr=$obj->fetch_array();  
    		$estado=$arr[0];
		$idmunicipio=$arrdatmed['idmunicipio'];
			$sql = ("SELECT municipio from municipios WHERE idmunicipio='".$idmunicipio."';");
	    	$obj=$mysqli->query($sql); $arr=$obj->fetch_array();  
    		$municipio=$arr[0];
		$idparroquia=$arrdatmed['idparroquia'];
			$sql = ("SELECT parroquia from parroquias WHERE idparroquia='".$idparroquia."';");
	    	$obj=$mysqli->query($sql); $arr=$obj->fetch_array();  
    		$parroquia=$arr[0];
		
		$correoppal=$arrdatmed['correoppal'];
		$calleav=$arrdatmed['calleav'];
		$casaedif=$arrdatmed['casaedif'];
		$piso=$arrdatmed['piso'];
		$oficina=$arrdatmed['oficina'];
		$urbanizacion=$arrdatmed['urbanizacion'];
		$codpostal=$arrdatmed['codpostal'];
		$idestatus='1'; // Por Definir   $arrdatmed['idestatus'];
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
	
		$(document).ready(function(){
			$("#idpais").change(function(){				
				$.get("pais_js.php","idpais="+$("#idpais").val(), function(data){
					$("#id_estado").html(data);
					console.log(data);
				});
			});

			$("#id_estado").change(function(){				
				$.get("estados_js.php","id_estado="+$("#id_estado").val(), function(data){
					$("#id_municipio").html(data);
					console.log(data);
				});
			});

			$("#id_municipio").change(function(){
				$.get("munic_js.php","id_municipio="+$("#id_municipio").val(), function(data){
					$("#id_parroquia").html(data);
					console.log(data);
				});
			});

			
		});
		function calcedad(fecha){
			//alert(fecha);return false;
		jQuery.ajax({
                 type: "POST",  
                 url: "caledad_js.php",
                  data: {fecha: fecha},
                 success:function(data){
                 	var edad = parseInt(data);
	                 	if (edad<25 || edad>80 || isNaN(edad) ) {
	                 		document.getElementById("edad").value = 'Error';
                 			return false;
                 		}else{
									  	document.getElementById("edad").value = data;
								  	}
                 },
                  error:function (){}
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
            <h1>Medicos </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php?usr=1">Home</a></li>
              <li class="breadcrumb-item active">Actualizar</li>
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
              <h3 class="card-title">Dr./Dra.: <?php echo $nombre; ?> <span><img width="799px" height="37" src="img/linea1.png"> </span></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
			<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return validacion()">
			<input type="hidden" name="idmed" value="<?php echo $idmed;?>">
			<div class="row">
				<!-- 1ra -->
				<div class="col-md-3">
					<div class="form-group">
						<label for="apellido1">1er Apellido </label>
						<input type="text" name="apellido1" id="apellido1" value="<?php echo $apellido1;?>"  class="form-control form-control-sm" style="text-transform:uppercase;" 
						 onKeypress="if (event.keyCode < 65 || event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122) event.returnValue = false;" required>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="apellido2">2do Apellido </label>
						<input type="text" name="apellido2" id="apellido2" value="<?php echo $apellido2;?>" class="form-control form-control-sm " style="text-transform:uppercase;"
						onKeypress="if (event.keyCode < 65 || event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122) event.returnValue = false;">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="nombre1">1er Nombre </label>
						<input type="text" name="nombre1" id="nombre1" value="<?php echo $nombre1;?>" class="form-control form-control-sm" style="text-transform:uppercase;"
						onKeypress="if (event.keyCode < 65 || event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122) event.returnValue = false;" required>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="mombre2">2do Nombre </label>
						<input type="text" name="nombre2" id="nombre2" value="<?php echo $nombre2;?>" class="form-control form-control-sm" style="text-transform:uppercase;" 
						onKeypress="if (event.keyCode < 65 || event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122) event.returnValue = false;">
					</div>
				</div>
				
				<!-- 2da  -->
				<div class="col-md-1">
					<div class="form-group">
						<label for="rif">RIF:</label>
						<select class="form-control form-control-sm" id="tprif" name="tprif">
                  			<option value="<?php echo $tprif;?>"><?php echo $tprif;?></option>
                  			<option value="N">N</option>
                  			<option value="J">J</option>
                  			<option value="G">G</option>
                		</select>
					</div>
				</div>
				<div class="col-md-2">
					<label for="rif">.</label>
					<div class="form-group">
						<input type="text" name="rif" id="rif" value="<?php echo $rif;?>" maxlength="9" minlength="9" class="form-control form-control-sm " 
						onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" required>
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<label for="tpdoc">.</label>
						<select class="form-control form-control-sm  form-control-sm" id="tpdoc" name="tpdoc">
							<option value="<?php echo $tprif;?>"><?php echo $tpdoc;?></option>
                  			<option value="V">V</option>
                  			<option value="E">E</option>
                		</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="nrodoc">Nro. Documento:</label>
						<input type="text" name="nrodoc" id="nrodoc" value="<?php echo $nrodoc;?>" maxlength="8" minlength="7" class="form-control form-control-sm" 
						onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" required>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="fnacimiento">Fec.Nacimiento:</label>
						<input type="date" name="fnacimiento" id="fnacimiento" value="<?php echo $fnacimiento;?>" class="form-control form-control-sm " onchange="calcedad(this.value)">
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<label for="edad">Edad:</label>
						<input type="text" name="edad" id="edad" value="<?php echo $edad;?>" class="form-control form-control-sm " readonly>
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<label for="idsexo">Sexo:</label>
						<select id="idsexo" class="form-control  form-control-sm" name="idsexo" required>
							<option value="<?php echo $idsexo ?>"><?php echo $sexo ?></option>
							<?php
							//require('admin/conexion.php');
							$query = $mysqli -> query ("select idsexo, sexo from sexo WHERE idestatus='1'; ");
							while ($valores = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores['idsexo'].'">'.$valores['sexo'].'</option>';
						} ?>
						
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="idestcivil">Est.Civil:</label>
						<select id="idestcivil" class="form-control  form-control-sm" name="idestcivil" required>
							<option value="<?php echo $idestcivil; ?>"><?php echo $estcivil; ?></option>
							<?php
							//require('admin/conexion.php');
							$query = $mysqli -> query ("select 	idestcivil, estcivil from estadocivil WHERE idestatus='1'; ");
							while ($valores = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores['idestcivil'].'">'.$valores['estcivil'].'</option>';
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
						<input type="text" name="movil" id="movil" value="<?php echo $movil;?>" maxlength="7" minlength="7" class="form-control form-control-sm"
						onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"  required>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="telefono">Teléfono:</label>
						<input type="text" name="telefono" id="telefono" minlength="11" maxlength="11" value="<?php echo $telefono;?>" class="form-control form-control-sm" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="correo">Correo:</label>
						<input type="email" name="correo" value="<?php echo $correo;?>" id="correo" class="form-control form-control-sm" readonly >
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="correoalt">Correo Alterno:</label>
						<input type="email" name="correoalt" value="<?php echo $correoalt;?>" id="correoalt" class="form-control form-control-sm"
						style="text-transform:lowercase;">
					</div>
				</div>
						
				<!-- 4ta -->
			
				<!-- Pais / Estado / Municipio / Parroquia -->
				<div class="col-md-3">
					<div class="form-group">
						<!--label for="cc-exp" class="control-label mb-1">Estado</label-->
						<select id="idpais" class="form-control mtitu" name="idpais" required>
							<option value="<?php echo $idpais; ?>"><?php echo $pais; ?></option>
							<?php
							//require('admin/conexion.php');
							$query = $mysqli -> query ("SELECT idpais, pais FROM paises WHERE idestatus='1';");
							while ($valores = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores['idpais'].'">'.$valores['pais'].'</option>';
							} ?>
						</select>
						<!--span class="help-block" data-valmsg-for="mtitu" data-valmsg-replace="true"></span-->
					</div>
				</div> 
				<div class="col-md-3">
					<div class="form-group">
						<!--label for="cc-exp" class="control-label mb-1">Estado</label-->
						<select id="id_estado" class="form-control mtitu" name="idestado" required>
							<option value="<?php echo $idestado; ?>"><?php echo $estado; ?></option>
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
						<select id="id_municipio" class="form-control" name="idmunicipio" required>
							<option value="<?php echo $idmunicipio; ?>"><?php echo $municipio; ?></option>
						</select>	
						<!--span class="help-block" data-valmsg-for="mtitu" data-valmsg-replace="true"></span-->
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<!--label for="cc-exp" class="control-label mb-1">Municipio</label-->
						<select id="id_parroquia" class="form-control" name="idparroquia" required>
							<option value="<?php echo $idparroquia; ?>"><?php echo $parroquia; ?></option>
						</select>	
						<!--span class="help-block" data-valmsg-for="mtitu" data-valmsg-replace="true"></span-->
					</div>
				</div>
				<!-- 7ta  -->
				<div class="col-md-4">
					<div class="form-group">
						<label for="urbanizacion">Urbanización:</label>
						<input type="text" name="urbanizacion" value="<?php echo $urbanizacion;?>" id="urbanizacion" class="form-control form-control-sm " 
						 style="text-transform:uppercase;" required>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="calleav">Calle/Avenida:</label>
						<input type="text" name="calleav" id="calleav" value="<?php echo $calleav;?>" class="form-control form-control-sm " 
						 style="text-transform:uppercase;" required>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="casaedif">Casa/Edif.:</label>
						<input type="text" name="casaedif" id="casaedif" value="<?php echo $casaedif;?>" class="form-control form-control-sm" 
						 style="text-transform:uppercase;">
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<label for="piso">Piso:</label>
						<input type="text" name="piso" id="piso" value="<?php echo $piso;?>" maxlength="2" class="form-control form-control-sm">
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<label for="oficina">Oficina:</label>
						<input type="text" name="oficina" id="oficina" value="<?php echo $oficina;?>" maxlength="8" class="form-control form-control-sm ">
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<label for="codpostal">Cod.Postal:</label>
						<input type="text" name="codpostal" id="codpostal" maxlength="4" minlength="4" value="<?php echo $codpostal;?>" class="form-control form-control-sm " onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" required>
					</div>
				</div>

				<!-- 8va  -->
			<div align="right" class="col-md-12">
				<input style="background: #F89921;border-color: #F89921" type="submit" name="submit" value="Siguiente" class="btn btn-main btn-primary btn-lg uppercase">
			</div>	
		</form> 
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
	  <div class="row">
        <div align="center" class="col-12">
          <a href="../../index.php?usr=1" class="btn btn-secondary">Atrás</a>
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
	function validacion(){
		var edad = document.getElementById("edad").value;
		//var codpostal = document.getElementById("codpostal").value;
		//let lencodpostal = codpostal.length;
		if (edad=='Error') {
			document.getElementById("edad").focus();
			return false;
		}
		
		/*
		if (lencodpostal!='4') {
			alert();
			document.getElementById("codpostal").focus()
			return false;
		}
		*/
		//if( isNaN(costo) ) {alert('Error Costo!!!');return false;}

	}
</script>

</body>
</html>
