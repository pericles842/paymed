<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    require('../../conexion.php');
    if (isset($_POST['submit'])) {
        $formapago = $_POST['formapago'];
        $conptopago = $_POST['conptopago'];
        $bnco = $_POST['bnco'];
        $nroref= $_POST['nroref'];
        $monto= $_POST['monto'];
        $fechabco= $_POST['fechabco'];
        $observacion =$_POST['observacion'];


        //echo $categoria.'--'.$describelo; exit();
        $str = "INSERT INTO regpagos(formapago,conptopago,bnco,nroref,monto,fechabco,observacion) VALUES ('".$formapago."',
        '".$conptopago."','".$bnco."','".$nroref."','".$monto."','".$fechabco."','".$observacion."')";
        $conexion = $mysqli->query($str);

        echo '<script language="javascript">alert(" Registro Exitoso !!!");window.location.href="#"; </script>';
    }
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | PayMed</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    .f {
        display: flex;
        margin: 25px 0;
    }
</style>
<section>
    <!-- BARRA DE AVANCE  -->
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="" aria-valuemax="100">50%</div>
    </div>
</section>
<section>
    <div class="container">
        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mt-5" style="text-align:center;">
                <h1>Registro de Pago</h1>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="f">
                        <div style="width: 200px;">
                            <label for="formapago">Forma de Pago</label>
                        </div>
                        <select class="form-control" name="formapago">
                            <option value="transferencia">Transferencia</option>
                            <option value="deposito">Deposito</option>
                        </select>
                    </div>
                    <div class="f">
                        <div style="width: 200px;">
                            <label for="formapago">Banco </label>
                        </div>
                        <select class="form-control" name="bnco">
                            <?php
                            $getEstado = ("SELECT * FROM bancos");
                            $getEstado2 = $mysqli->query($getEstado);
                            while ($row = mysqli_fetch_array($getEstado2)) {
                                $id = $row['idbnco'];
                                $banco = $row['banco'];
                            ?>
                                <option value="<?php echo $banco; ?>"><?php echo $banco; ?></option>
                            <?php
                            }
                            ?><option value="transferencia">Transferencia</option>
                            <option value="deposito">Deposito</option>
                        </select>
                    </div>
                    <div class="f">
                        <div style="width: 200px;">
                            <label for="formapago">Monto</label>
                        </div>
                        <input class="form-control" type="number" name="monto" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="f">
                        <div style="width: 200px;">
                        
                            <label for="formapago">Concepto de Pago</label >
                        </div>
                        <select class="form-control" name="conptopago">
                            <option value="transferencia">Afiliacion</option>
                        </select>
                    </div>
                    <div class="f">
                        <div style="width: 200px;">
                            <label for="nroref">Numero de Referencia</label>
                        </div>
                        <input class="form-control"  type="text" name="nroref">
                    </div>
                    <div class="f">
                        <div style="width: 200px;">
                            <label for="formapago">Fecha de Banco</label>
                        </div>
                        <input class="form-control" type="date" name="fechabco">
                    </div>
                </div>
                <div class="col-12">
                    <div class="f">
                        <div style="width: 200px;">
                            <label for="formapago">Observaciones</label>
                        </div>
                        <textarea name="observacion" class="form-control" cols="150" rows="5"></textarea>
                    </div>
                    <div align="right">
                        <!-- CAMBIAR RUTA DE BOTONES -->
                        <a class="btn btn-danger" href="#">Cancelar</a>
                        <input type="submit" name="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation new -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
</body>

</html>