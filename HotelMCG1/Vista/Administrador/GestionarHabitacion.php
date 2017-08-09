<?php session_start();
require("../../Modelo/Habitaciones.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HotelMCG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../Administrador/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../Administrador/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../Administrador/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../Administrador/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../Administrador/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../Administrador/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../Administrador/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="../Administrador/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../Administrador/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../Administrador/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<body class="nav-md">
<div class="main_container">
    <?php require("snippers/menuizquierdo.php");?>

    <!-- top navigation -->
    <?php require("snippers/menusuperior.php");?>


    <div class="right_col" role="main">

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Table
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data tables</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Registros</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover">


                                    <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Tipo Habitacion</th>
                                        <th>Estado</th>
                                        <th>Piso</th>
                                        <th>Numero</th>
                                        <th>Vista</th>
                                        <th>Valor</th>
                                        <th>Reservas</th>
                                        <th>ServcioTelefoniaÍndice</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $arrHabitaciones = habitaciones::getAll();
                                    foreach ($arrHabitaciones as $habitaciones){
                                    ?>
                                    <tr>
                                        <td><?php echo $habitaciones->getFoto(); ?></td>
                                        <td><?php echo $habitaciones->getTipo_Habitacion(); ?></td>
                                        <td><?php echo $habitaciones->getEstado(); ?></td>
                                        <td><?php echo $habitaciones->getPiso(); ?></td>
                                        <td><?php echo $habitaciones->getNumero(); ?></td>
                                        <td><?php echo $habitaciones->getVista(); ?></td>
                                        <td><?php echo $habitaciones->getValor(); ?></td>
                                        <td><?php echo $habitaciones->getReservas(); ?></td>
                                        <td><?php echo $habitaciones->ServcioTelefoniaÍndice(); ?></td>
                                        <td>
                                            <a href="editarhabitacion.php?id=<?php echo $habitaciones->getidHabitaciones(); ?>"
                                               type="button" data-toggle="tooltip" title="Actualizar"
                                               class="btn docs-tooltip btn-primary btn-xs"><i
                                                class="fa fa-edit"></i></a>
                                            <?php if ($habitaciones->getEstado() != "Activo"){ ?>
                                            <a href="../../../Controlador/HabitacionesController.php?action=ActivarHabitaciones&idHabitaciones=<?php echo $habitaciones->getidHabitaciones(); ?>"
                                               type="button" data-toggle="tooltip" title="Activar"
                                               class="btn docs-tooltip btn-success btn-xs"><i
                                                class="fa fa-check-square-o"></i></a>
                                            <?php }else{ ?>
                                            <a type="button"
                                               href="../../../Controlador/HabitacionesController.php?action=InactivarHabitaciones&idHabitaciones=<?php echo $habitaciones->getidHabitaciones(); ?>"
                                               data-toggle="tooltip" title="Inactivar"
                                               class="btn docs-tooltip btn-danger btn-xs"><i
                                                class="fa fa-times-circle-o"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
</body>
<!-- jQuery 3 -->
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
<script src="Recepcionista/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
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
