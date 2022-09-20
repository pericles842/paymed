<?php
	require('../../conexion.php');
	if(isset($_GET['idfpgo'])){
		$idfpgo=$_GET['idfpgo'];
		$sql="DELETE FROM formpago WHERE idforpag='".$idfpgo."'";
		//echo $sql;exit();
		$query=$mysqli->query($sql);	
		echo '<script language="javascript">alert("¡Registro Eliminado!");window.location.href="rpt_formapago.php"; </script>';
	} 
?>