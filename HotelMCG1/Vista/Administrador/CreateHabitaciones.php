 
<?php
session_start();
require_once (__DIR__.'/../../Controlador/ReservasController.php');
if(empty($_SESSION['idPersona'])){
    header("Location:../index.php");
}else?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hotel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">



    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php require("snippers/menuizquierdo.php");?>



<?php require("snippers/menusuperior.php");?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


        <!-- Main content -->
        <section class="content">

            <?php if(!empty($_GET['respuesta'])){ ?>
                <?php if ($_GET['respuesta'] == "correcto"){ ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>La Persona!</strong> se ha creado correctamente.
                    </div>
                <?php }else {?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> No se pudo ingresar la persona intentalo nuevamente!!
                    </div>
                <?php } ?>
            <?php } ?>


            <form class="form-horizontal form-label-left" enctype="multipart/form-data"  data-toggle="validator" method="post" action="../../Controlador/HabitacionesController.php?action=crear" novalidate>
                <div class="box box">

                    <div class="box-header with-border">

                        <h3 class="box-title">Ingrese toda la informacion correspondiente de la persona</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">

                        <div class="box-body">

     <center><div class="form-group">
                                        <label class="col-sm-3 control-label" for="Foto">Foto</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="file" name="Foto" id="Foto" class="form-control col-md-7 col-xs-12" accept="images/*" required="required">

                                            <img src="Fotos/" width="100" height="100">

                                        </div> </center>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="Tipo_Habitacion">Tipo_Habitacion</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="Tipo_Habitacion" name="Tipo_Habitacion" class="form-control">
                                    <option value="">Seleccione</option>
                                        <option>Sencilla</option>
                                        <option>Doble</option>
                                        <option>Familiar</option>
                                    </select>
                                </div>
                                 <div class="help-block with-errors"></div>
                            </div>
                             <div class=" form-group">
                                <label class="col-sm-3 control-label" for="Estado">Estado
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="Estado" name="Estado" class="form-control">
                                    <option value="">Seleccione</option>
                                        <option>Activo</option>
                                        <option>Inactivo</option>
                                    </select>
                                </div>
                                 <div class="help-block with-errors"></div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label" for="Piso ">Piso
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input max="10" min="1" type="number" id="Piso " name="Piso " required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                 <div class="help-block with-errors"></div>
                            </div>
                            <div class=" form-group">
                                <label class="col-sm-3 control-label" for="Numero">No. Habitacion</label>
                                <div required="required" class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="Numero" name="Numero"  class="form-control">
                                    <option value="">Seleccione</option>
                                        <option>101</option>
                                        <option>102</option>
                                        <option>103</option>
                                        <option>104</option>
                                        <option>105</option>
                                        <option>106</option>

                                    </select>
                                </div>
                                 <div class="help-block with-errors"></div>
                            </div>
                             <div class=" form-group">
                                <label class="col-sm-3 control-label" for="Vista">Vista</label>
                                <div  required="required" class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="Vista" name="Vista" class="form-control">
                                        <option>Si</option>
                                        <option>No</option>
                                    </select>
                                </div>
                                 <div class="help-block with-errors"></div>
                            </div>

                             <div class="form-group">
                                <label class="col-sm-3 control-label" for="Valor">Valor
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="Valor" name="Valor"  required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                 <div class="help-block with-errors"></div>
                            </div>
                                <div class=" form-group">
                                    <label class="col-sm-3 control-label" for="Reserva">Reserva</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo ReservasController::selectReservas(true,"Reservas","Reservas","","Tipo_Reserva"); ?>
                                    </div>
                                </div>

                            <!-- /.box-body -->

                            <div class="box-footer">
                                <div class="col-md-3 col-md-offset-3">
                                    <button type="submit" class="btn btn-default">Cancelar</button>
                                    <button type="submit" class="btn btn-info pull-right">Guardar</button>
                                </div>
                            </div>
                        </form>


                                
                            

                           




                    <script src="bower_components/jquery/dist/jquery.min.js"></script>
                    <!-- jQuery UI 1.11.4 -->
                    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
                    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
                    <script>
                        $.widget.bridge('uibutton', $.ui.button);
                    </script>
                    <!-- Bootstrap 3.3.7 -->
                    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
                    <!-- Morris.js charts -->
                    <script src="bower_components/raphael/raphael.min.js"></script>
                    <script src="bower_components/morris.js/morris.min.js"></script>
                    <!-- Sparkline -->
                    <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
                    <!-- jvectormap -->
                    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
                    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
                    <!-- jQuery Knob Chart -->
                    <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
                    <!-- daterangepicker -->
                    <script src="bower_components/moment/min/moment.min.js"></script>
                    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
                    <!-- datepicker -->
                    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
                    <!-- Bootstrap WYSIHTML5 -->
                    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
                    <!-- Slimscroll -->
                    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
                    <!-- FastClick -->
                    <script src="bower_components/fastclick/lib/fastclick.js"></script>
                    <script src="bower_components/bootstrap-validator/js/validator.js"></script>
                    <!-- AdminLTE App -->
                    <script src="dist/js/adminlte.min.js"></script>
                    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                    <script src="dist/js/pages/dashboard.js"></script>
                    <!-- AdminLTE for demo purposes -->
                    <script src="dist/js/demo.js"></script>
</body>
</html>