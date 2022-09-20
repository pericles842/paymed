<?php
session_start();
$usuario = $_SESSION['usuario'];
require('../../conexion.php');

$idter = $_GET['idter'];
$sql = ("SELECT * FROM terminos WHERE idterminos ='".$idter."'");
$result = $mysqli->query($sql);
$roww = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
   /*Asigno variables*/
   $idter        = $_POST['idter'];
   $termino= $_POST['termino'];

   $str = "UPDATE terminos SET termino='".$termino."' 
          WHERE idterminos= '" . $idter . "'";
   $conexion = $mysqli->query($str);

   echo '<script language="javascript">alert("Actualizacion Exitosa!!!");
                                        window.location.href="rpt_terminos.php"; </script>';
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
                     <h1>Actualizacion de Terminos y Condiciones</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../../index.php?usr=1">Home</a></li>
                        <li class="breadcrumb-item active">Actualizacion de Terminos y Condiciones</li>
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
                  <h3 class="card-title">Actualizacion de Terminos y Condiciones</h3>

                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                  </div>
               </div>
               <div class="card-body">
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="inputName ">Terminos y Condiciones</label>
                              <input type="hidden" value="<?php echo $idter; ?>" name="idter">
                              <textarea class="form-control" name="termino"  cols="130" rows="10"><?php echo $roww['termino']; ?></textarea>
                           </div>
                        </div>
                        <div align="right" class="col-md-12">
                           <input style="background: #F89921;border-color: #F89921" type="submit" name="submit" value="Actualizar" class="btn btn-main btn-primary btn-lg uppercase">
                        </div>
                  </form>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>

      </div>
      <div class="row">
         <div align="center" class="col-12">
            <a href="rpt_terminos.php" class="btn btn-secondary">Atras</a>
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