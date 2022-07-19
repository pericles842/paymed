<?php
 		require('../admin/conexion.php');

$usuario = $_POST['usuario'];
$pass = $_POST['clave'];

if(empty($usuario) || empty($pass)){
header("Location: index.html"); exit(); }

  $sql=("SELECT * from login WHERE usuario='$usuario' ");
  $conexion1=$mysqli->query($sql);
  $datos=$conexion1->fetch_array();

  if($datos['usuario'] == $usuario & $datos['clave'] == $pass){	  

		session_start();
		@$_SESSION['usuario'] = $usuario;
		@$_SESSION['id'] = $datos[id];
		@$_SESSION['privilegios'] = $datos[privilegios];
		@$_SESSION['imagen'] = $datos[imagen];

		$permisos=$datos['privilegios'];


				if($permisos == 1){ }
					
				elseif($permisos == 2){
					echo '<script language="javascript">window.location.href="../admin/index.php";</script>'; }
		  
				elseif($permisos == 3){ }					 		 
	  
	  			elseif($permisos == 4){ }


  } else{
	  echo '<script language="javascript">alert("USUARIO ó CLAVE INCORRECTO, VERIFIQUE SUS DATOS");window.location.href="index.html";</script>'; exit(); }
  
	   	
?>