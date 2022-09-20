<?php
require('../../conexion.php');
if (isset($_GET['idtes'])) {
    $idtes = $_GET['idtes'];
    $sql = "DELETE FROM pacientes WHERE idpacientes ='".$idtes."'";
    //echo $sql;exit();
    $query = $mysqli->query($sql);
    echo '<script language="javascript">alert("¡Registro Eliminado!");window.location.href="rpt_datospersonales.php"; </script>';
}
