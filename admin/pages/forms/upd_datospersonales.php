<?php
session_start();
$usuario = $_SESSION['usuario'];
require('../../conexion.php');

$idtes = $_GET['idtes'];
$sql = ("SELECT * FROM pacientes  WHERE idpacientes='".$idtes."'");
$result = $mysqli->query($sql);
$roww = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
    /*Asigno variables*/
    $idtes= $_POST['idtes'];

    //echo $idtesss; exit();
    $nacionalidad = $_POST['nacionalidad'];
    $nroDocumento = $_POST['nrodocumento'];
    $tipo  = $_POST['tipo'];
    $nameUno = $_POST['nameuno'];
    $nameDos = $_POST['namedos'];
    $lastNameUno = $_POST['lastnameuno'];
    $lastNameDos = $_POST['lastnamedos'];
    $pais = $_POST['pais'];
    $dateBirth = $_POST['datebirth'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $edoCivil = $_POST['edocivil'];
    $nroMovil = $_POST['nromovil'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $ocupacion = $_POST['ocupacion'];
    $calle = $_POST['calle'];
    $casa = $_POST['casa'];
    $piso = $_POST['piso'];
    $apto = $_POST['apto'];
    $urbanizacion = $_POST['urbanizacion'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $ciudad = $_POST['ciudad'];
    $codPostal = $_POST['codpostal'];
    $seguro = $_POST['seguro'];
    $nroPoliza = $_POST['nropoliza'];

    $str = "UPDATE pacientes SET nacionalidad='".$nacionalidad."',nrodocumento='".$nroDocumento."',
    tipo='".$tipo."',nameuno='".ucfirst($nameUno)."',namedos='".ucfirst($nameDos)."',lastnameuno='".ucfirst($lastNameUno)."',
    lastnamedos='".ucfirst($lastNameDos)."',pais='".$pais."',datebirth='".$dateBirth."',edad='".$edad."',
    sexo='".$sexo."',edocivil='".$edoCivil."',nromovil='".$nroMovil."',telefono='".$telefono."',
    correo='".$correo."',ocupacion='".$ocupacion."',calle='".$calle."',casa='".$casa."',piso='".$piso."',
    apto='".$apto."',urbanizacion='".$urbanizacion."',estado='".$estado."',municipio='".$municipio."',
    ciudad='".$ciudad."',codpostal='".$codPostal."',seguro='".$seguro."',nropoliza='".$nroPoliza."'
    WHERE idpacientes='".$idtes."'";
    $conexion = $mysqli->query($str);

    //echo $str;exit();

    echo '<script language="javascript">alert("Actualizacion Exitosa!!!");
                                        window.location.href="rpt_datospersonales.php"; </script>';
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

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Main Sidebar Container -->
        <!-- -->
        <?php include("menuppal.php"); ?>
        <!-- -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Actualizacion Datos Personales</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../../index.php?usr=1">Home</a></li>
                                <li class="breadcrumb-item active">Actualizacion Datos Personales</li>
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
                        <h3 class="card-title">Actualizacion Datos </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inputName">Nro Documento</label>
                                    <div class="form-group d-flex">
                                        <div class="w-25">
                                            <select readonly name="nacionalidad" class=" form-control custom-select">
                                                <option value="V">V</option>
                                                <option value="E">E</option>
                                            </select>
                                        </div>
                                        <div>
                                            <input type="text" value="<?php echo $idtes; ?>" name="idtes">
                                            <input required type="number" value="<?php echo $roww['nrodocumento']; ?>" class="form-control" name="nrodocumento">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Tipo</label>
                                    <div class="form-group">
                                        <select name="tipo" class="form-control custom-select">
                                            <!-- Cambiar datos de prueba -->
                                            <option value="<?php echo $roww['tipo']; ?>" selected></option>
                                            <option value="dato1">Dato 1</option>
                                            <option value="dato2">Dato 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inputName">Primer nombre</label>
                                    <input required type="text" value="<?php echo $roww['nameuno']; ?>" class="form-control" name="nameuno">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Segundo nombre</label>
                                    <input required type="text" value="<?php echo $roww['namedos']; ?>" class="form-control" name="namedos">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Primer apellido</label>
                                    <input required type="text" value="<?php echo $roww['lastnameuno']; ?>" class="form-control" name="lastnameuno">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Segundo apellido</label>
                                    <input required value="<?php echo $roww['lastnamedos']; ?>" type="text" class="form-control" name="lastnamedos">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inputName">Pais</label>
                                    <div class="form-group">
                                        <select name="pais" class="form-control custom-select">
                                            <?php
                                            $getPais = ("SELECT * FROM pais ");
                                            $getPais2 = $mysqli->query($getPais);
                                            while ($row = mysqli_fetch_array($getPais2)) {
                                                $id = $row['idpais'];
                                                $pais = $row['pais'];
                                            ?>
                                                <option value="<?php echo $id; ?>"><?php echo $pais; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex">
                                    <div>
                                        <label for="inputName">Fecha de nacimiento</label>
                                        <input required type="date" value="<?php echo $roww['datebirth']; ?>" class="form-control " name="datebirth">
                                    </div>
                                    <div>
                                        <label for="inputName">Edad</label>
                                        <input readonly value="<?php echo $roww['edad']; ?>" type="number" class="form-control " name="edad">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Sexo</label>
                                    <div class="form-group">
                                        <select name="sexo" class="form-control custom-select">
                                            <?php
                                            $getSexo = ("SELECT * FROM sexo ");
                                            $getSexo2 = $mysqli->query($getSexo);
                                            while ($row = mysqli_fetch_array($getSexo2)) {
                                                $id = $row['idsexo'];
                                                $sexo = $row['sexo'];
                                            ?>
                                                <option value="<?php echo $id; ?>"><?php echo $sexo; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Edo Civil</label>
                                    <div class="form-group">
                                        <select name="edocivil" class="form-control custom-select">
                                            <?php
                                            $getCivil = ("SELECT * FROM estadocivil ");
                                            $getCivil2 = $mysqli->query($getCivil);
                                            while ($row = mysqli_fetch_array($getCivil2)) {
                                                $id = $row['idcivil'];
                                                $estado = $row['estado'];
                                            ?>
                                                <option value="<?php echo $id; ?>"><?php echo $estado; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inputName">Nro movil</label>
                                    <input require onchange="validationTel(this.value)" type="number" value="<?php echo $roww['nromovil']; ?>" name="nromovil" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <label for="inputName">Telefono Hab</label>
                                        <input require onchange="validationTel(this.value)" type="number" value="<?php echo $roww['telefono']; ?>" name="telefono" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Correo</label>
                                    <input required type="email" value="<?php echo $roww['correo']; ?>" name="correo" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Ocupación</label>
                                    <input required type="text" value="<?php echo $roww['ocupacion']; ?>" name="ocupacion" class="form-control">
                                </div>
                            </div>
                            <h2 class="mt-3 mb-3">Direccion de habitación</h2>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inputName">Calle/Av</label>
                                    <input required type="text" value="<?php echo $roww['calle']; ?>" name="calle" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Casa/Edfi</label>
                                    <input type="text" required value="<?php echo $roww['casa']; ?>" name="casa" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Piso</label>
                                    <input required type="text" value="<?php echo $roww['piso']; ?>" name="piso" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Apto</label>
                                    <input required type="text" value="<?php echo $roww['apto']; ?>" name="apto" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inputName">Urbanización</label>
                                    <input required type="text" value="<?php echo $roww['urbanizacion']; ?>" name="urbanizacion" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Estado</label>
                                    <div class="form-group">
                                        <select name="estado" class="form-control custom-select">
                                            <?php
                                            $getEstado = ("SELECT * FROM estado");
                                            $getEstado2 = $mysqli->query($getEstado);
                                            while ($row = mysqli_fetch_array($getEstado2)) {
                                                $id = $row['idedo'];
                                                $estado = $row['estado'];
                                            ?>
                                                <option value="<?php echo $id; ?>"><?php echo $estado; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Municipio</label>
                                    <div class="form-group">
                                        <select name="municipio" class="form-control custom-select">
                                            <?php
                                            $getmpo = ("SELECT * FROM municipio");
                                            $getmpo2 = $mysqli->query($getmpo);
                                            while ($row = mysqli_fetch_array($getmpo2)) {
                                                $id = $row['idmpo'];
                                                $mpo = $row['municipio'];
                                            ?>
                                                <option value="<?php echo $id; ?>"><?php echo $mpo; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex">
                                    <div>
                                        <label for="inputName">Ciudad</label>
                                        <div class="form-group">
                                            <select name="ciudad" class="form-control custom-select">
                                                <?php
                                                $getmpo = ("SELECT * FROM municipio");
                                                $getmpo2 = $mysqli->query($getmpo);
                                                while ($row = mysqli_fetch_array($getmpo2)) {
                                                    $id = $row['idmpo'];
                                                    $mpo = $row['municipio'];
                                                ?>
                                                    <option value="<?php echo $id; ?>"><?php echo $mpo; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="inputName">Cod Postal</label>
                                        <input required type="number" value="<?php echo $roww['codpostal']; ?>" class="form-control  " name="codpostal">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputName">Seguro</label>
                                    <div class="form-group">
                                        <select name="seguro" class="form-control custom-select">
                                            <option value="dato1">Dato 1</option>
                                            <option value="dato2">Dato 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">Nro poliza</label>
                                    <input required type="number" value="<?php echo $roww['nropoliza']; ?>" class="form-control" name="nropoliza">
                                </div>
                            </div>
                            <div align="right" class="col-md-12">
                                <input style="background: #F89921;border-color: #F89921" type="submit" name="submit" value="Actualizar" class="btn btn-main btn-primary btn-lg uppercase">
                            </div>
                    </div>
                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
        </div>

    </div>
    <div class="row">
        <div align="center" class="col-12">
            <a href="rpt_datospersonales.php" class="btn btn-secondary">Atras</a>
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
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
    </script>
    /* viene de Pag validation.html */
    <script type="text/javascript">
        //VALIDACION LOUIS
        function validateDocument(ci) {
            var select = document.getElementById('select');
            V = select.value = "V";
            E = select.value = "E";
            if (ci.length == 8 || ci.length == 7) {
                if (ci < 79999999 && E) {
                    select.value = "V"
                } else if (ci > 80999999 && V) {
                    select.value = "E";
                }
            } else {
                alert('Este no es un documento valido');
            }
        }

        const fechaNacimiento = document.getElementById("fechaNacimiento");
        const edad = document.getElementById("edad");

        const calcularEdad = (fechaNacimiento) => {
            const fechaActual = new Date();
            const anoActual = parseInt(fechaActual.getFullYear());
            const mesActual = parseInt(fechaActual.getMonth()) + 1;
            const diaActual = parseInt(fechaActual.getDate());

            const anoNacimiento = parseInt(String(fechaNacimiento).substring(0, 4));
            const mesNacimiento = parseInt(String(fechaNacimiento).substring(5, 7));
            const diaNacimiento = parseInt(String(fechaNacimiento).substring(8, 10));

            let edad = anoActual - anoNacimiento;
            if (mesActual < mesNacimiento) {
                edad--;
            } else if (mesActual === mesNacimiento) {
                if (diaActual < diaNacimiento) {
                    edad--;
                }
            }
            return edad;
        };

        window.addEventListener('load', function() {

            fechaNacimiento.addEventListener('change', function() {
                if (this.value) {
                    edad.value = calcularEdad(this.value);
                }
            });

        });

        function validationTel(tel) {
            if (tel.length <= 10) {
                alert('Formato invalido');
            }
        }

        $(document).ready(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    alert("Form successful submitted!");
                }
            });
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>

</html>