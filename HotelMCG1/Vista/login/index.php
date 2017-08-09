<?php require ("verificarSession.php") ?>

<html lang="en">
  <head>
   <!-- Custom Theme files -->
<title></title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Member Login Form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--Google Fonts-->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<link href="js/jquery-ui.min.css" rel="stylesheet">

</head>
<body >
	<h1>HotelMCG</h1>
        <div class="login">
            <div class="login-box1 box effect6">
                <div class="login-top">
                        <h2>Bienvenido </h2>
                    <div class="user">
                        <img src="images/user.png" alt="">
                    </div>
                   <div class="clear"> </div>
                </div>
                <form name="frmLogin" id="frmLogin" method="POST" action="verificarSession.php">
                    <div class="form-group">
                    <br>
                      <label for="Usuario"  ">Usuario</label>
                      <input type="text" name="Usuario" class="form-control" id="Usuario" placeholder="Username" required>
                    </br></div>
                    <div class="form-group">
                    <br>
                      <label for="Password">Contraseña</label>
                      <input type="password" name="Password" class="form-control" id="Password" placeholder="Password" required></br>
                    </div> <br>
                    <div class="send">
                        <input id="btnSalir" name="btnSalir" type="button" value="Salir" action="\HotelMCG\Vista\index.php"> <i> </i>
                        <input id="btnEnviar" name="btnEnviar" type="submit" value="Ingresar" >
                    </div> <br>
                </form>
                <div id="resultado" name="resultado"></div>
            </div>
        </div>
    </div>
  </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

   <<script>
        $(document).ready(function(){
            $("#frmLogin").submit(function(e) {
                e.preventDefault();
                var Usuario = $("#Usuario").val();
                var Password = $("#Password").val();

                $.ajax({
                    method: "POST",
                    url: "../../Controlador/PersonaController.php?action=Login",
                    data: { Usuario: Usuario, Password: Password}
                })
                .done(function( msg) {
                    if(msg == 1){
                        window.location.href = $("#frmLogin").attr('action');
                    }else{
                        $("#resultado").html(msg);
                    }
                });
            });
        });
    </script>
   <!-- <script type="text/javascript">
        $(document).ready(function() {
            $('#frmLogin').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()) {
                    var formData = $(this).serialize(); //Serializamos los campos del formulario
                    $.ajax({
                        type        : 'POST', // Metodo de Envio
                        url         : '../../Controlador/PersonaController.php?action=Login', // Ruta del envio
                        data        : formData, // our data object
                        //dataType    : 'json', // what type of data do we expect back from the server
                        encode      : true
                    })
                        .done(function(data) {
                            //console.log(data);
                            if (data == true){
                                window.location.href = "verificarSession";
                            }else{
                                $('#results').html(data);
                            }
                        });
                    event.preventDefault();
                }
            })
        });
    </script>-->

  </body>
</html>