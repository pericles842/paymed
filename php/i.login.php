<?php
 		require('../admin/conexion.php');

$usuario = $_POST['usuario'];
$pass = $_POST['clave'];

if(empty($usuario) || empty($pass)){
header("Location: ../login/"); exit(); }

  $sql=("SELECT * from loginn WHERE usuario='".strtolower($usuario)."' ");
  $conexion1=$mysqli->query($sql);
  $datos=$conexion1->fetch_array();

  if($datos['usuario'] == $usuario & $datos['clave'] == $pass){	  

		session_start();
		@$_SESSION['usuario'] 		= $usuario;
		@$_SESSION['privilegios'] 	= $datos[privilegios];
	    @$_SESSION['correouso'] 	= $datos[correo];
		@$_SESSION['imagen'] 		= $datos[imagen];

		$permisos=$datos['privilegios'];

				if($permisos == 1){ echo '<script language="javascript">window.location.href="../admin/index.php?usr=1";</script>'; }
					
				elseif($permisos == 2){ echo '<script language="javascript">window.location.href="../user_panel.php?usr=ON";</script>'; }
		  
				elseif($permisos == 3){ echo '<script language="javascript">window.location.href="../admin/index.php?usr=1";</script>'; }
	  
	  			elseif($permisos == 6){ echo '<script language="javascript">window.location.href="../admin/index.php?usr=1";</script>'; }

  } else{
	  echo '<script language="javascript">alert("USUARIO ó CLAVE INCORRECTO, VERIFIQUE SUS DATOS");window.location.href="../login/";</script>'; exit(); }

?>