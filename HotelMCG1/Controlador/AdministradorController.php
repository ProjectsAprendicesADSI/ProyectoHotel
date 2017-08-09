<?php

require_once (__DIR__.'/../Modelo/Administrador.php');

if(!empty($_GET['action'])){
    AdministradorController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class AdministradorController
{
    static function main($action){
        if ($action == "crear"){
            AdministradorController::crear();
        }else if ($action == "editar"){
            AdministradorController::editar();
        }else if ($action == "buscarID"){
            AdministradorController::buscarID();
        }else if ($action == "ActivarAdministrador"){
            AdministradorController::ActivarAdministrador();
        }else if ($action == "InactivarAdministrador"){
            AdministradorController::InactivarAdministrador();
        }
    }
    static public function crear (){
        try {
            $arrayAdministrador = array();
            $arrayAdministrador ['Tipo_Documento'] = $_POST['Tipo_Documento'];
            $arrayAdministrador ['Documento'] = $_POST['Documento'];
            $arrayAdministrador ['Nombres'] = $_POST['Nombres'];
            $arrayAdministrador ['Apellidos'] = $_POST['Apellidos'];
            $arrayAdministrador ['FechaNacimiento'] = $_POST['FechaNacimiento'];
            $arrayAdministrador ['Email'] = $_POST['Email'];
            $arrayAdministrador ['Telefono'] = $_POST['Telefono'];
            $arrayAdministrador ['Direccion'] = $_POST['Direccion'];
            $arrayAdministrador ['Estado'] = $_POST['Estado'];
            $arrayAdministrador ['Usuario'] = $_POST['Usuario'];
            $arrayAdministrador ['Password'] = $_POST['Password'];
            $arrayAdministrador ['Tipo_Perfil'] = $_POST['Tipo_Perfil'];
            $Administrador  = new Administrador ($arrayAdministrador);
            $Administrador ->insertar();
            header("Location: ../Vista/Administrador/CreateRegistroemp.php?respuesta=correcto");
        } catch (Exception $e) {
            //var_dump($e);
            header("Location: ../Vista/Administrador/CreateRegistroemp.php?respuesta=error");
        }
    }
    static public function selectPersona ($isRequired=true, $idPersona="idPersona", $Nombres="idPersona", $class="", $tipoUser="Cliente"){
        $arrayAdministrador = Administrador::buscar("SELECT * FROM persona WHERE Tipo_Perfil = '".$tipoUser."'"); /*  */
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$idPersona."' name='".$Nombres."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count($arrayAdministrador) > 0){
            foreach ($arrayAdministrador as $persona)
                $htmlSelect .= "<option value='".$persona->getIdPersona()."'>".$persona->getNombres()." ".$persona->getApellidos()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function editar()
    {
        try {
            $arrayAdministrador = array();
            $arrayAdministrador ['Tipo_Documento'] = $_POST['Tipo_Documento'];
            $arrayAdministrador ['Documento'] = $_POST['Documento'];
            $arrayAdministrador ['Nombres'] = $_POST['Nombres'];
            $arrayAdministrador ['Apellidos'] = $_POST['Apellidos'];
            $arrayAdministrador ['FechaNacimiento'] = $_POST['FechaNacimiento'];
            $arrayAdministrador['Email'] = $_POST['Email'];
            $arrayAdministrador ['Telefono'] = $_POST['Telefono'];
            $arrayAdministrador ['Direccion'] = $_POST['Direccion'];
            $arrayAdministrador ['Estado'] = $_POST['Estado'];
            $arrayAdministrador ['Usuario'] = $_POST['Usuario'];
            $arrayAdministrador ['password'] = $_POST['password'];
            $arrayAdministrador ['Tipo_Perfil'] = $_POST['Tipo_Perfil'];
            $arrayAdministrador ['idPersona'] = $_POST['idPersona'];
            $administrador = new Administrador($arrayAdministrador);
            $administrador->editar();
            header("Location: ../Vista/Administrador/CreateRegistroemp.php?respuesta=correcto");
        } catch (Exception $e) {
           var_dump($e);

            //header("Location: ../Vista/Administrador/CreateRegistroemp.php?respuesta=error");
        }
    }
    static public function buscarID($id)
    {
        try {
            return Administrador::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/Administrador/gestionarRecepcion.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Administrador::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/Administrador/gestionarRecepcion.php?respuesta=error");
        }
    }
    public function buscar($Query)
    {
        try {
            return Administrador::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/Administrador/gestionarRecepcion.php?respuesta=error");
        }
    }
    static public function ActivarPersona()
    {
        try {
            $ObjAdministrador = Administrador::buscarForId($_GET['IdPersona']);
            $ObjAdministrador->setEstado("Activo");
            $ObjAdministrador->editar();
            header("Location: ../Vista/Administrador/gestionarRecepcion.php");
        } catch (Exception $e) {
            header("Location: ../Vista/v/gestionarRecepcion.php?respuesta=error");
        }
    }

    static public function InactivarPersona()
    {
        try {
            $ObjAdministrador = Administrador::buscarForId($_GET['IdPersona']);
            $ObjAdministrador->setEstado("Inactivo");
            $ObjAdministrador->editar();
            header("Location: ../Vista/Administrador/gestionarRecepcion.php");
        } catch (Exception $e) {
            header("Location: ../Vista/Administrador/gestionarRecepcion.php?respuesta=error");
        }
    }
}
?>