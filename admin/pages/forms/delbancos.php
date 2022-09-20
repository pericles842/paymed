<?php
require('../../conexion.php');
if (isset($_GET['idbc'])) {
    $idbc = $_GET['idbc'];
    $sql = "DELETE FROM bancos WHERE idbco ='".$idbc."'";
    //echo $sql;exit();
    $query = $mysqli->query($sql);
    echo '<script language="javascript">alert("¡Registro Eliminado!");window.location.href="rpt_bancos.php"; </script>';
}
