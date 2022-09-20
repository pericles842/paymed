<?php
require('../../conexion.php');

//*fILTRO DE BUSQUEDA


if (isset($_POST['submit'])) {
     $rif = $_POST['xrif'];
     $rzo = $_POST['xrzo'];
     $ctro = $_POST['xctro'];
     $estado=$_POST['xestado'];
     $pais=$_POST['xpais'];
     $estatus = $_POST['xestatus'];


     //values
     $val = "";
     $valrz = "";
     $valrf = "";
     $valts = ""; //estatus
     //where
     $where = "";

     if (!empty($_POST['xrzo'])) {
          $where = "where rzon_scal like '" . $rzo . "%'";
               
     }
     else if (!empty($_POST['xctro'])) {
          $where = "where nme_cntro like '" . $ctro . "%'";
     
     }
      else if (!empty($_POST['xrif'])) {
          $where = "where rif like '" . $rif . "%'";
          
     }else if ((!empty($_POST['xestatus']))) {
          $where = "where estatus='" . $estatus . "'";
     }
      else if ((!empty($_POST['xestado']))) {
          $where = "where estado='" . $estado . "'";
     }
     else if((!empty($_POST['xpais']))){
          $where = "where pais='" . $pais . "'";
     }
     


}else if (isset($_POST['cancel'])) {
     $where = "limit 100";
}
$sql = ("SELECT * FROM prueba $where");
$result = $mysqli->query($sql);
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
     <link rel="stylesheet" href="../../plugins/bootstrap-col orpicker/css/bootstrap-colorpicker.min.css">
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
     <style>
          .buttonr {
               background-color: #F89921;
               /* Orange */
               border: #F89921;
               color: white;
               padding: 15px 32px;
               text-align: center;
               text-decoration: none;
               display: inline-block;
               font-size: 16px;
               margin: 5px 2px;
               cursor: pointer;
               border-radius: 2px;
          }

          .btns {
               border: none;
               background-color: #F89921;
               color: #FFF;
               border-radius: 3px;
               padding: 10px;
               margin: 0 10px 15px 10px;
          }
     </style>
</head>

<body class="hold-transition sidebar-mini">
     <!-- Site wrapper -->
     <div class="wrapper">

          <!--  -->
          <?php include("menuppal.php"); ?>
          <!-- -->
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
               <!-- Content Header (Page header) -->
               <section class="content-header">
                    <div class="container-fluid">
                         <div class="row mb-2">
                              <div class="col-sm-6">
                                   <h1>Listado de contactos</h1>
                              </div>
                              <div class="col-sm-6">
                                   <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="../../index.php?usr=1">Home</a></li>
                                        <li class="breadcrumb-item active">Listado de Contactos</li>
                                   </ol>
                              </div>
                         </div>
                    </div><!-- /.container-fluid -->
               </section>

               <!-- Main content -->
               <section class="content">
                    <!-- //*FILTRO -->
                    <div class="cotainer" style="display: flex;">
                         <label>Filtro Clinicas </label>
                         <button class="fa fa-filter btns" onclick="view()"></button>
                    </div>
                    <div style="visibility:visible;">
                         <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                              <table class="table table-striped projects" id="windows">
                                   <thead>
                                        <tr>
                                             <th style="width:12% ;">
                                                  Rif
                                             </th>
                                             <th style="width:12% ;">
                                                  Razon Social
                                             </th>
                                             <th style="width:15% ;">
                                                  Nombre del Centro
                                             </th>
                                             <th style="width:15% ;">
                                                  Pais
                                             </th>
                                             <th style="width:15% ;">
                                                  Estado
                                             </th>
                                             <th>
                                                  Estatus
                                             </th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <tr>
                                             <td> <input value="<?php echo $rif; ?>" name="xrif" class="form-control" type="text"></td>
                                             <td> <input value="<?php echo $rzo; ?>" name="xrzo" class="form-control" type="text"></td>
                                             <td><input value="<?php echo $ctro; ?>" name="xctro" class="form-control" type="text"></td>
                                             <td>
                                                  <select name="xpais" class="form-control">
                                                       <option >Pais</option>
                                                       <?php
                                                       $sqlpais = ("SELECT * FROM paises");
                                                       $respais = $mysqli->query($sqlpais);
                                                       while ($row = mysqli_fetch_array($respais)) {
                                                       ?>
                                                            <option value="<?php echo $row['pais'] ?>"><?php echo $row['pais'] ?></option>
                                                       <?php } ?>
                                                  </select>
                                             </td>
                                             <td>
                                                  <select name="xestado" class="form-control">
                                                       <option value="">Estado</option>
                                                       <?php
                                                       $sqlstado = ("SELECT * FROM estado");
                                                       $resstado = $mysqli->query($sqlstado);
                                                       while ($row = mysqli_fetch_array($resstado)) {
                                                       ?>
                                                            <option value="<?php echo $row['estado'] ?>"><?php echo $row['estado'] ?></option>
                                                       <?php } ?>
                                                  </select>
                                             </td>
                                             <td>
                                                  <select name="xestatus" class="form-control">
                                                       <option >Estatus</option>
                                                       <?php
                                                       $sqlstatus = ("SELECT * FROM estatus");
                                                       $resstatus = $mysqli->query($sqlstatus);
                                                       while ($row = mysqli_fetch_array($resstatus)) {
                                                       ?>
                                                            <option value="<?php echo $row['estatus'] ?>"><?php echo $row['estatus'] ?></option>
                                                       <?php } ?>
                                                  </select>
                                             </td>
                                        </tr>
                                   </tbody>
                              </table>
                              <div align="right" id="btns">
                                   <input value="Buscar" class="btns" type="submit" name="submit">
                                   <input value="Restablecer" class="btn btn-primary" type="submit" name="cancel">
                              </form>

                              </div>
                         </div>


          <div align="center">
               <button class="buttonr"><a style="color: #FFFFFF;font-family: 'Lato', sans-serif;font-size: 18px;font-weight: bold;" href="regtipocontacto.php">Añadir</a></button>
          </div>
          <br>
          <!-- Default box -->
          <div class="card">
               <div style="background: #F89921" class="card-header">
                    <h3 class="card-title">Tipo de Contactos</h3>

                    <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fas fa-minus"></i></button>
                         <!--button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button-->
                    </div>
               </div>
               <div class="card-body p-0">
                    <table class="table table-striped projects">
                         <thead>
                              <tr>
                                   <th>id</th>
                                   <th>
                                        Rif
                                   </th>
                                   <th>
                                        Razon Social
                                   </th>
                                   <th>
                                        Nombre del Centro
                                   </th>
                                   <th>
                                        Pais
                                   </th>
                                   <th>
                                        Estado
                                   </th>
                                   <th>
                                        Estatus
                                   </th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php while ($row = mysqli_fetch_array($result)) { ?>
                                   <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['rif']; ?></td>
                                        <td><?php echo $row['rzon_scal']; ?></td>
                                        <td><?php echo $row['nme_cntro']; ?></td>
                                        <td><?php echo $row['pais']; ?></td>
                                        <td><?php echo $row['estado']; ?></td>
                                        <td><?php echo $row['estatus']; ?></td>
                                        <td class="project-actions text-right">
                                             <a class="btn btn-info btn-sm" href="upd_tipocontacto.php?idcontacto=<?php echo $row['idtipocontacto']; ?>"><i class="fas fa-pencil-alt"></i> Editar</a>
                                             <a class="btn btn-danger btn-sm" href="src_del_tipocontacto.php?idcontacto=<?php echo $row['idtipocontacto']; ?>"><i class="fas fa-trash"></i> Eliminar</a>
                                        </td>

                                   </tr>

                              <?php
                              }
                              ?>
                         </tbody>
                    </table>
               </div>
               <!-- /.card-body  -->
          </div>
          <!-- /.card -->

          <div align="center" class="col-md-12">
               <a class="btn btn-danger btn-sm" href="../../index.php?usr=1"><i class="fas fa-backward"></i> Regresar</a>
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
          //*SCRIP DEL FILTRO
          var clic = 1;

          function view() {
               if (clic == 1) {
                    document.getElementById("windows").style.visibility = "hidden";
                    document.getElementById("btns").style.visibility = "hidden";
                    clic = clic + 1;
               } else {
                    document.getElementById("windows").style.visibility = "visible";
                    document.getElementById("btns").style.visibility = "visible";
                    clic = 1;
               }
          }


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