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
                                $DataDatosEmpresa = DatosEmpresaController::buscarID($_GET["id"]);

                                ?>
                                <form class="form-horizontal form-label-left" method="post" action="../../Controlador/DatosEmpresaController.php?action=editar" novalidate>

                                    <p>Ingrese toda la informacion relacionada con los <code>datos de la empresa</code>
                                    </p>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="idDatosEmpresa" value="<?php echo $DataDatosEmpresa->getIdDatosEmpresa(); ?>" name="idDatosEmpresa" hidden required="required" type="text">
                                            <input id="Nombre" value="<?php echo $DataDatosEmpresa->getNombre(); ?>" class="form-control col-md-7 col-xs-12" name="Nombre"  required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nit">Nit</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="idDatosEmpresa" value="<?php echo $DataDatosEmpresa->getIdDatosEmpresa(); ?>" name="idDatosEmpresa" hidden required="required" type="text">
                                            <input id="Nit" value="<?php echo $DataDatosEmpresa->getNit(); ?>" class="form-control col-md-7 col-xs-12" name="Nit"  required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Direccion">Direccion</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="idDatosEmpresa" value="<?php echo $DataDatosEmpresa->getIdDatosEmpresa(); ?>" name="idDatosEmpresa" hidden required="required" type="text">
                                            <input id="Direccion" value="<?php echo $DataDatosEmpresa->getDireccion(); ?>" class="form-control col-md-7 col-xs-12" name="Direccion"  required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Telefono">Telefono</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="idDatosEmpresa" value="<?php echo $DataDatosEmpresa->getIdDatosEmpresa(); ?>" name="idDatosEmpresa" hidden required="required" type="text">
                                            <input id="Telefono" value="<?php echo $DataDatosEmpresa->getTelefono(); ?>" class="form-control col-md-7 col-xs-12" name="Telefono"  required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="NumDIAN">NumDIAN</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="idDatosEmpresa" value="<?php echo $DataDatosEmpresa->getIdDatosEmpresa(); ?>" name="idDatosEmpresa" hidden required="required" type="text">
                                            <input id="NumDIAN" value="<?php echo $DataDatosEmpresa->getNumDIAN(); ?>" class="form-control col-md-7 col-xs-12" name="NumDIAN"  required="required" type="text">
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

