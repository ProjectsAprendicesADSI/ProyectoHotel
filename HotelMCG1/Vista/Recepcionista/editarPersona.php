<?php require "../../Controlador/PersonaController.php"; ?>
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
                                <strong>La persona!</strong> se ha actualizado correctamente.
                            </div>
                        <?php }else {?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> No se pudo ingresar la persona intentalo nuevamente!!
                            </div>
                        <?php } ?>
                    <?php } ?>

                      <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
                          <?php
                                $DataPersona = PersonaController::buscarID($_GET["id"]);

                          ?>
                          <form class="form-horizontal form-label-left" enctype="multipart/form-data"  data-toggle="validator" method="post" action="../Controlador/PersonaController.php?action=crear" novalidate>
                <div class="box box">

                    <div class="box-header with-border">

                        <h3 class="box-title">Actualize la informacion de la persona</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">

                        <div class="box-body">

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="Tipo_Documento">Tipo_Documento</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required id="Tipo_Documento" name="Tipo_Documento" class="form-control">
                                        <option value="">Seleccione</option>
                                        <option <?php if($DataPersona->getTipoDocumento() == "C.C"){ echo "selected"; } ?>>C.C</option>
                                        <option <?php if($DataPersona->getTipoDocumento() == "T.L"){ echo "selected"; } ?>>T.L</option>
                                        <option <?php if($DataPersona->getTipoDocumento() == "C.E"){ echo "selected"; } ?>>C.E</option>
                                        <option <?php if($DataPersona->getTipoDocumento() == "R.C"){ echo "selected"; } ?>>R.C</option>
                                        <option <?php if($DataPersona->getTipoDocumento() == "Otros"){ echo "selected"; } ?>>Otros</option>

                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="Documento">Documento<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  id="idPersona" value="<?php echo $DataPersona->getIdPersona(); ?>" name="idPersona" hidden required="required" type="text">
                                    <input id="Documento" value="<?php echo $DataPersona->getDocumento(); ?>" class="form-control col-md-7 col-xs-12" name="Documento"  required="required" type="text">
                                  </div>
                                </div>
                                
                          
                           <div class="item form-group">
                                  <label class="col-sm-3 control-label" for="name">Nombres <span class="required"></span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="idPersona" value="<?php echo $DataPersona->getIdPersona(); ?>" name="idPersona" hidden required="required" type="text">
                                      <input id="Nombres" value="<?php echo $DataPersona->getNombres(); ?>" class="form-control col-md-7 col-xs-12" name="Nombres"  required="required" type="text">
                                  </div>
                              </div>
                             <div class="item form-group">
                                  <label class="col-sm-3 control-label" for="name">Apellidos <span class="required"></span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="idPersona" value="<?php echo $DataPersona->getIdPersona(); ?>" name="idPersona" hidden required="required" type="text">
                                      <input id="Apellidos" value="<?php echo $DataPersona->getApellidos(); ?>" class="form-control col-md-7 col-xs-12" name="Apellidos"  required="required" type="text">
                                  </div>
                              </div>
                            <div class="form-group">
                                <label for="FechaNacimiento" class="col-sm-3 control-label" >Fecha Nacimiento<span class="required"></span></label>
                                <input  id="idPersona" value="<?php echo $DataPersona->getIdPersona(); ?>" name="idPersona" hidden required="required" type="text">

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="FechaNacimiento" type="date" class="form-control" value="<?php echo $DataPersona->getFechaNacimiento(); ?>" step="1" min="1940-01-01" max="2015-12-31" value="2015-12-31"  class="form-control col-md-7 col-xs-12" id="datepicker">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="Email" class="col-sm-3 control-label" >Email<span class="required"></span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  id="idPersona" value="<?php echo $DataPersona->getIdPersona(); ?>" name="idPersona" hidden required="required" type="text">
                                    <input id="Email"  value="<?php echo $DataPersona->getEmail(); ?>" name="Email" type="email" class="form-control" required maxlength="45"  placeholder="Email">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="Telefono">Telefono<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  id="idPersona" value="<?php echo $DataPersona->getIdPersona(); ?>" name="idPersona" hidden required="required" type="text">
                                    <input id="Telefono" value="<?php echo $DataPersona->getTelefono(); ?>" class="form-control col-md-7 col-xs-12" name="Telefono"  required="required" type="text">
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="Direccion">Direccion<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  id="idPersona" value="<?php echo $DataPersona->getIdPersona(); ?>" name="idPersona" hidden required="required" type="text">
                                    <input id="Direccion" maxlength="60" type="text"  name="Direccion" value="<?php echo $DataPersona->getDireccion(); ?>" required="required"  class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>

                             <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Estado <span class="required"></span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select id="Estado" name="Estado" class="form-control">
                                          <option <?php if($DataPersona->getEstado() == "Activo"){ echo "selected"; } ?>>Activo</option>
                                          <option <?php if($DataPersona->getEstado() == "Inactivo"){ echo "selected"; } ?>>Inactivo</option>
                                      </select>
                                  </div>
                              </div>
                            

                            <div class=" form-group has-feedback">
                                <label class="col-sm-3 control-label" for="Password">Contraseña<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="Password" name="Password" type="password" required="required" class="form-control" placeholder="Password">
                                    <span class="glyphicon glyphicon-lock form-control-feedback "></span>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class=" form-group">
                                <label class="col-sm-3 control-label" for="Tipo_Perfil">Tipo_Perfil</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required id="Tipo_Perfil" name="Tipo_Perfil" class="form-control">
                                        <option>Seleccione</option>
                                        <option <?php if($DataPersona->getTipoPerfil() == "Cliente"){ echo "selected"; } ?>>Cliente</option></select>
                                </div>
                                  </div>


                            <!-- /.box-body -->
                            <div class="ln_solid"></div>
                            <div class="box-footer">
                                <div class="col-md-3 col-md-offset-3">
                                    <button type="submit" class="btn btn-default">Cancelar</button>
                                    <button type="submit" class="btn btn-info pull-right">Guardar</button>
                                </div>
                            </div>
                            <!-- /.box-footer -->
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
        </div>
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




