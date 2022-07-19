<?php

		require('../../../conexion.php');

			$str="DELETE FROM inmuebles;";
		$conexion=$mysqli->query($str);

			$str="DELETE FROM inmueble_img;";
		$conexion=$mysqli->query($str);

			$str="DELETE FROM asesor;";
		$conexion=$mysqli->query($str);

			$str="DELETE FROM loginn;";
		$conexion=$mysqli->query($str);


		echo '<script language="javascript">alert("INMUEBLE AÑADIDO A SUS FAVORITOS");</script>';

?>