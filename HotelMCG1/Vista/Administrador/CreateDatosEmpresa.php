
<?php
session_start();
require_once (__DIR__.'/../../Controlador/AdministradorController.php'); 
if(empty($_SESSION['idPersona'])){
    header("Location:../index.php");
}else?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>hotel</title>
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


                <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data"  data-toggle="validator"  action="../../Controlador/DatosEmpresaController.php?action=crear" novalidate>
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ingrese toda la informacion con la empresa</h3>
                        </div>
                        <form class="form-horizontal">

                            <div class="box-body">


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Nombre">Nombre<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="Nombre" name="Nombre" data-validate-linked="Nombre" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Nit">Nit<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number"  id="Nit" name="Nit" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Direccion">Direccion<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="Direccion" name="Direccion" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Telefono">Telefono<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="Telefono" name="Telefono" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="NumDIAN">NumDIAN<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="NumDIAN" name="NumDIAN" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <label class="col-sm-3 control-label" for="Estado">Estado</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="Estado" name="Estado" class="form-control">
                                            <option>Activo</option>
                                            <option>Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class=" form-group">
                                    <label class="col-sm-3 control-label" for="Cliente">Cliente<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo AdministradorController::selectPersona(true,"Persona","Persona","","Cliente"); ?>
                                    </div>
                                </div>


                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <div class="col-md-3 col-md-offset-2">
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

                        <script src="bower_components/bootstrap-validator/js/validator.js"></script>
                        <script src="bower_components/jquery/dist/jquery.min.js"></script>
                        <!-- Bootstrap 3.3.7 -->
                        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
                        <!-- FastClick -->
                        <script src="bower_components/fastclick/lib/fastclick.js"></script>
                        <!-- AdminLTE App -->
                        <script src="dist/js/adminlte.min.js"></script>
                        <!-- Sparkline -->
                        <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
                        <!-- jvectormap  -->
                        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
                        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
                        <!-- SlimScroll -->
                        <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
                        <!-- ChartJS -->
                        <script src="bower_components/Chart.js/Chart.js"></script>
                        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                        <script src="dist/js/pages/dashboard2.js"></script>
                        <!-- AdminLTE for demo purposes -->
                        <script src="dist/js/demo.js"></script>
</body>
</html>

