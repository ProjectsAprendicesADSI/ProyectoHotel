<?php
session_start();


    if (!empty($_SESSION["Tipo_Perfil"])){
        if ($_SESSION["Tipo_Perfil"] == "Administrador"){
            header("Location: ../Administrador/index1.php");
        }else if($_SESSION["Tipo_Perfil"] == "Recepcion"){
            header("Location: ../Recepcionista/index2.php");
        }

}