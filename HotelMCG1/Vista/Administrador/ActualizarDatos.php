<?php
session_start();
require "../../Modelo/DatosEmpresa.php";
?>

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
    <link rel="stylesheet" href="bower_components/jquery/css/juery.min.css">
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

                <div id="alertas">
                    <?php if(!empty($_GET["respuesta"]) && $_GET["respuesta"] == "correcto"){ ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            La informacion del paciente se ha actualizado correctamente. Puede administrar los pacientes desde <a href="GestionarDatos.php" class="alert-link">Aqui</a> .
                        </div>
                    <?php } ?>
                    <?php if(!empty($_GET["respuesta"]) && $_GET["respuesta"] == "error"){ ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            No se pudo actualizar al persona. <a href="#" class="alert-link">Error: <?php echo $_GET["Mensaje"] ?></a> .
                        </div>
                    <?php } ?>
                </div>
                <?php if(!isset($_GET["IdDatosEmpresa"])){ ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        No se pudo actualizar al persona.<strong>Error: no se encontro informacion del persona.</strong> Puede administrar los pacientes desde <a href="GestionarDatos.php" class="alert-link">Aqui</a>.
                    </div>
                <?php }else{
                $IdDatosEmpresa = $_GET["IdDatosEmpresa"];
                $_SESSION["IdDatosEmpresa"] = $IdDatosEmpresa;
                $ObjeDatosEmpresa = DatosEmpresa::buscarForId($IdDatosEmpresa);
                ?>


                <form class="form-horizontal form-label-left" data-toggle="validator" method="post" action="../../Controlador/DatosEmpresaController.php?action=crear" novalidate>
                    <div class="box box">

                        <div class="box-header with-border">

                            <h3 class="box-title">Actualizar los datos de la empresa</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal">

                            <div class="box-body">


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Nombre">Nombre<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input required value="<?php echo $ObjeDatosEmpresa->getNombre(); ?>" type="text" id="Nombre" name="Nombre" data-validate-linked="Nombre" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Nit">Nit<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input required value="<?php echo $ObjeDatosEmpresa->getNit(); ?>" type="number"min="10" max="10" id="Nit" name="Nit" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Direccion">Direccion<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input required value="<?php echo $ObjeDatosEmpresa->getDireccion(); ?>" maxlength="60" type="text" id="Direccion" name="Direccion" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Telefono">Telefono<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input required value="<?php echo $ObjeDatosEmpresa->getTelefono(); ?>" type="number" min="10" max="10" id="Telefono" name="Telefono" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="NumDIAN">NumDIAN<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input required value="<?php echo $ObjeDatosEmpresa->getNumDian(); ?>" type="number" min="10" max="10" id="NumDIAN" name="NumDIAN" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <label class="col-sm-3 control-label" for="Estado">Estado</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="Estado" name="Estado" class="form-control">
                                            <option value="">Seleccione</option>
                                            <option <?php echo ($ObjeDatosEmpresa->getEstado() == "Activo") ? "selected" : ""; ?> value="Activo">Activo</option>
                                            <option <?php echo ($ObjeDatosEmpresa->getEstado() == "Inactivo") ? "selected" : ""; ?> value="Inactivo">Inactivo</option>
                                        </select>
                                    </div>
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
                                <!-- /.box-footer -->
                        </form>
                        <?php }?>


                        <?php include ("snippers/includes-footer.php"); ?>

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
                        <!-- AdminLTE App -->
                        <script src="dist/js/adminlte.min.js"></script>
                        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                        <script src="dist/js/pages/dashboard.js"></script>
                        <!-- AdminLTE for demo purposes -->
                        <script src="dist/js/demo.js"></script>
</body>
</html>
