<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HotelMCG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<body class="nav-md">
<div class="main_container">
    <?php require("snippers/menuizquierdo.php");?>

    <!-- top navigation -->
    <?php require("snippers/menusuperior.php");?>

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>xxxxxxx</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

                <div class="x_content">



                    <?php if(!empty($_GET['respuesta'])){ ?>
                        <?php if ($_GET['respuesta'] == "correcto"){ ?>
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>La Persona!</strong> se ha actualizado correctamente.
                            </div>
                        <?php }else {?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> No se pudo ingresar la Persona intentalo nuevamente!!
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
                        <?php
                        $DataReservas = ReservasController::buscarID($_GET["id"]);

                        ?>
                        <form class="form-horizontal form-label-left" method="post" action="../../Controlador/ReservasController.php?action=editar" novalidate>

                            <p>Ingrese toda la informacion relacionada con la <code>reserva</code>
                            </p>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Fecha_Inicio">Fecha_Inicio</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="idReservas" value="<?php echo $DataReservas->getIdReservas(); ?>" name="idReservas" hidden required="required" type="text">
                                    <input id="Fecha_Inicio" value="<?php echo $DataReservas->getFecha_Inicio(); ?>" class="form-control col-md-7 col-xs-12" name="Fecha_Inicio"  required="required" type="text">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Fecha_Final">Fecha_Final</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="idReservas" value="<?php echo $DataReservas->getIdReservas(); ?>" name="idReservas" hidden required="required" type="text">
                                    <input id="Fecha_Final" value="<?php echo $DataReservas->getFecha_Final(); ?>" class="form-control col-md-7 col-xs-12" name="Fecha_Final"  required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Estado</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="Estado" name="Estado" class="form-control">
                                        <option <?php if($DataReservas->getEstado() == "Activo"){ echo "selected"; } ?>>Activo</option>
                                        <option <?php if($DataReservas->getEstado() == "Inactivo"){ echo "selected"; } ?>>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Tipo_Reserva">Tipo_Reserva</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="Tipo_Reserva" name="Tipo_Reserva" class="form-control">
                                        <option <?php if($DataReservas->getTipo_Reserva() == "Telefonica"){ echo "selected"; } ?>>Telefonica</option>
                                        <option <?php if($DataReservas->getTipo_Reserva() == "Personal"){ echo "selected"; } ?>>Personal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Observacion">Observacion</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="idReservas" value="<?php echo $DataReservas->getIdReservas(); ?>" name="idReservas" hidden required="required" type="text">
                                    <input id="Observacion" value="<?php echo $DataReservas->getObservacion(); ?>" class="form-control col-md-7 col-xs-12" name="Observacion"  required="required" type="text">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancelar</button>
                                    <button id="send" type="submit" class="btn btn-success">Enviar</button>
                                </div>
                            </div>
                        </form>

                    <?php }else{ ?>
                        <?php if (empty($_GET["respuesta"])){ ?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> No se encontro ninguna persona con el parametro de busqueda.
                            </div>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

