<?php require_once (__DIR__.'/../../Controlador/PersonaController.php'); ?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hotel</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    
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
                            <strong>La reserva!</strong> se ha creado correctamente.
                        </div>
                    <?php }else {?>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Error!</strong> No se pudo ingresar la reserva intentalo nuevamente!!
                        </div>
                    <?php } ?>
                <?php } ?>


                <form class="form-horizontal form-label-left" enctype="multipart/form-data"  data-toggle="validator" method="post" action="../../Controlador/ReservasController.php?action=crear" novalidate>
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ingrese toda la informacion de la reserva</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal">

                            <div class="box-body">


                                <div class="form-group">
                                    <label for="Fecha_Inicio" class="col-sm-3 control-label" >Fecha Inicio<span class="required"></span></label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="Fecha_Inicio" type="date" min="2016-01-01" max="2020-12-31"  class="form-control" required="required" class="form-control col-md-7 col-xs-12" id="datepicker">
                                    </div>
                                     <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label for="Fecha_Final" class="col-sm-3 control-label" >Fecha Final<span class="required"></span></label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="Fecha_Final" type="date" min="2016-01-01" max="2020-12-31" class="form-control" required="required" class="form-control col-md-7 col-xs-12" id="datepicker">
                                    </div>
                                     <div class="help-block with-errors"></div>
                                </div>

                                <!-- /.form group -->


                                <div class=" form-group">
                                    <label class="col-sm-3 control-label" for="Estado">Estado <span class="required"></span>
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


                                <div class=" form-group">
                                    <label class="col-sm-3 control-label" for="Tipo_Reserva">Tipo Reserva<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="Tipo_Reserva" name="Tipo_Reserva" class="form-control">
                                        <option value="">Seleccione</option>
                                            <option>Telefonica</option>
                                            <option>Personal</option>
                                        </select>
                                    </div>
                                     <div class="help-block with-errors"></div>
                                </div>

                                <!-- textarea -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Observacion">Observacion<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="Observacion" name="Observacion" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
                                    <label class="col-sm-3 control-label" for="Cliente">Cliente</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo PersonaController::selectPersona(true,"Persona","Persona","","Cliente"); ?>
                                    </div>
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




                        
                        <script>
                            $.widget.bridge('uibutton', $.ui.button);
                        </script>
                        <script>
                            fuction validar
                        </script>
           <!-- jQuery 3 -->
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

