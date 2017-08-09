<?php
session_start();
require_once (__DIR__.'/../Modelo/Persona.php');

if(!empty($_GET['action'])){
    PersonaController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class PersonaController
{


    static function main($action)
    {
        if ($action == "crear") {
            PersonaController::crear();
        } else if ($action == "editar") {
            PersonaController::editar();
        } else if ($action == "buscarID") {
            PersonaController::buscarID();
        }else if ($action == "InactivarPaciente"){
            PersonaController::CambiarEstado("Inactivo");
        }else if ($action == "ActivarPaciente"){
            PersonaController::CambiarEstado("Activo");
        } else if ($action == "Login") {
            PersonaController::Login();
        } else if ($action == "CerrarSession") {
            PersonaController::CerrarSession();
}
    }

    static public function crear()
    {
        try {
            $arrayPersona = array();
            $arrayPersona ['Tipo_Documento'] = $_POST['Tipo_Documento'];
            $arrayPersona ['Documento'] = $_POST['Documento'];
            $arrayPersona ['Nombres'] = $_POST['Nombres'];
            $arrayPersona ['Apellidos'] = $_POST['Apellidos'];
            $arrayPersona ['FechaNacimiento'] = $_POST['FechaNacimiento'];
            $arrayPersona ['Email'] = $_POST['Email'];
            $arrayPersona ['Telefono'] = $_POST['Telefono'];
            $arrayPersona ['Direccion'] = $_POST['Direccion'];
            $arrayPersona ['Estado'] = $_POST['Estado'];
            $arrayPersona ['Usuario'] = $_POST['Usuario'];
            $arrayPersona ['Password'] = $_POST['Password'];
            $arrayPersona ['Tipo_Perfil'] = $_POST['Tipo_Perfil'];
            $Persona = new Persona($arrayPersona);
            $Persona->insertar();
            header("Location: ../Vista/Recepcionista/CreatePersona.php?respuesta=correcto");
        } catch (Exception $e) {
            //var_dump($e);
            header("Location: ../Vista/Recepcionista/CreatePersona.php?respuesta=error");
        }
    }

    static public function selectPersona ($isRequired=true, $idPersona="idPersona", $Nombres="idPersona", $class="", $tipoUser="Cliente"){
        $arrPersona = Persona::buscar("SELECT * FROM persona WHERE Tipo_Perfil = '".$tipoUser."'"); /*  */
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$idPersona."' name='".$Nombres."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count($arrPersona) > 0){
            foreach ($arrPersona as $persona)
                $htmlSelect .= "<option value='".$persona->getIdPersona()."'>".$persona->getNombres()." ".$persona->getApellidos()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }
    static public function tdTabla($id){
        $arrarReservas = Persona::buscarForId($id);
        $htmlSelect ="<td>".$arrarReservas->getNombres()." ".$arrarReservas->getApellidos()."</td>";
        $htmlSelect .="<td>".$arrarReservas->getDocumento()."</td>";
        return $htmlSelect;
    }
    /*
    static public function selectPersona ($isRequired=true, $id="idPersona", $nombre="idPersona", $class=""){
        $arrPersona = Persona::getAll(); /*  */
    /*$htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombre."' class='".$class."'>";
    $htmlSelect .= "<option >Seleccione</option>";
    if(count($arrEPersona) > 0){
        foreach ($arrPersona as $persona)
            $htmlSelect .= "<option value='".$persona->getIdPersona()."'>".$persona->getNombre()." ".$persona->getApellido()."</option>";
    }
    $htmlSelect .= "</select>";
    return $htmlSelect;
}*/


    static public function editar()
    {
        try {
            $arrayPersona = array();
            $arrayPersona ['Tipo_Documento'] = $_POST['Tipo_Documento'];
            $arrayPersona ['Documento'] = $_POST['Documento'];
            $arrayPersona ['Nombres'] = $_POST['Nombres'];
            $arrayPersona ['Apellidos'] = $_POST['Apellidos'];
            $arrayPersona ['FechaNacimiento'] = $_POST['FechaNacimiento'];
            $arrayPersona ['Email'] = $_POST['Email'];
            $arrayPersona ['Telefono'] = $_POST['Telefono'];
            $arrayPersona ['Direccion'] = $_POST['Direccion'];
            $arrayPersona ['Estado'] = $_POST['Estado'];
            $arrayPersona ['Usuario'] = $_POST['Usuario'];
            $arrayPersona ['password'] = $_POST['password'];
            $arrayPersona ['Tipo_Perfil'] = $_POST['Tipo_Perfil'];
            $arrayPersona ['idPersona'] = $_POST['idPersona'];
            $persona = new Persona($arrayPersona);
            $persona->editar();
            header("Location: ../Vista/Recepcionista/CreatePersona.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/Recepcionista/CreatePersona.php?respuesta=error");
        }
    }

    static public function buscarID($id)
    {
        try {
            return Persona::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/Recepcionista/GestionarPersona.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Persona::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/Recepcionista/GestionarPersona.php?respuesta=error");
        }
    }

    public function buscar($Query)
    {
        try {
        return Persona::buscar($Query);
    } catch (Exception $e) {
           header("Location: ../Vista/Recepcionista/GestionarPersona.php?respuesta=error");
}
    }

    public function Login()
    {
        try {
            $Usuario = $_POST['Usuario'];
            $Password = $_POST['Password'];
            if (!empty($Usuario) && !empty($Password)) {
                $respuesta = Persona::Login($Usuario, $Password);
                if (is_array($respuesta)) {
                    $_SESSION['idPersona'] = $respuesta['idPersona'];
                    $_SESSION["Tipo_Perfil"] = $respuesta['Tipo_Perfil'];
                    echo TRUE;
                } else if ($respuesta == "Password Incorrecto") {
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> La Contraseña No Coincide Con El Usuario</p>";
                    echo "</div>";
                } else if ($respuesta == "No existe el usuario") {
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> No Existe Un Usuario Con Estos Datos</p>";
                    echo "</div>";
                }
            } else {
                echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                echo "<strong>Error!</strong> Datos Vacios</p>";
                echo "</div>";
            }
        } catch (Exception $e) {
            header("Location: ../login.php?respuesta=error");
        }
    }

    public function CerrarSession()
    {
        session_destroy();
        header("Location: ../Vista/index.php");
    }

     /*  static public function ActivarPersona (){
        try {
            $ObjPersona = Persona::buscarForId($_GET['IdPersona']);
            $ObjPersona->setEstado("Activo");
            $ObjPersona->editar();
            header("Location: ../Vista/Recepcionista/GestionarPersona.php");
        } catch (Exception $e) {
            header("Location: ../Vista/Recepcionista/GestionarPersona.php?respuesta=error");
        }
    }

    static public function InactivarPersona (){
        try {
            $ObjPersona = Persona::buscarForId($_GET['IdPersona']);
            $ObjPersona->setEstado("Inactivo");
            $ObjPersona->editar();
            header("Location: ../Vista/Recepcionista/GestionarPersona.php");
        } catch (Exception $e) {
            header("Location: ../Vista/Recepcionista/GestionarPersona.php?respuesta=error");
        }
    }*/
     static public function CambiarEstado ($Estado){
        try {
            $ObjPersona = $_GET["IdPersona"];
            $ObjPersona = Persona::buscarForId($idPersona);
            $ObjPersona->setEstado($Estado);
            var_dump($ObjPersona);
            $ObjPersona->editar();
            header("Location: ../Vista/Recepcionista/GestionarPersona.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Recepcionista/GestionarPersona.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }

}
?>



