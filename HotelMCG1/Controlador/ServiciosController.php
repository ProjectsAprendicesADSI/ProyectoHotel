<?php
require_once (__DIR__.'/../Modelo/Servicios.php');

if(!empty($_GET['action'])){
    ServiciosController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class ServiciosController
{
    static function main($action)
    {
        if ($action == "crear") {
            ServiciosController::crear();
        } else if ($action == "editar") {
            ServiciosController::editar();
        } else if ($action == "buscarID") {
            ServiciosController::buscarID();

        }

    }
    static public function crear()
    {
        try {
            $arrayServicios = array();
            $arrayServicios ['Duracion'] = $_POST['Duracion'];
            $arrayServicios ['Habitacion'] = $_POST['Habitacion'];
            $arrayServicios ['Tipo_Llamada'] = $_POST['Tipo_Llamada'];
            $arrayServicios ['Valor'] = $_POST['Valor'];
            $Servicios = new Servicios ($arrayServicios);
            $Servicios->insertar();
            header("Location: ../Vista/Administrador/CreateServicios.php?respuesta=correcto");
            //var_dump($e);
        } catch (Exception $e) {
            var_dump($e);
           // header("Location: ../Vista/Administrador/CreateServicios.php?respuesta=error");
        }
    }
    static public function selectServicioTelefonia ($isRequired=true, $idServicioTelefonia="idServicioTelefonia", $Local="idServicioTelefonia", $class="", $tipoUser="Servicio"){
        $arrayServicios = Servicios::buscar("SELECT * FROM servciotelefonia WHERE Tipo_Llamada = '".$tipoUser."'"); /*  */
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$idServicioTelefonia."' name='".$Local."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count($arrayServicios) > 0){
            foreach ($arrayServicios as $servicio)
                $htmlSelect .= "<option value='".$servicio->getIdServicioTelefonia()."'>".$servicio->getLocal()." ".$servicio->getNacional()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }
    static public function editar()
    {
        try {
            $arrayServicios = array();
            $arrayServicios ['Duracion'] = $_POST['Duracion'];
            $arrayServicios ['Habitacion'] = $_POST['Habitacion'];
            $arrayServicios ['Tipo_Llamada'] = $_POST['Tipo_Llamada'];
            $arrayServicios ['Valor'] = $_POST['Valor'];
            $arrayPersona ['idTelefonia'] = $_POST['idTelefonia'];
            $servicios = new Servicios($arrayServicios);
            $servicios->editar();
            header("Location: ../Vista/Administrador/CreateServicios.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/Administrador/CreateServicios.php?respuesta=error");
        }
    }

    static public function buscarID($id)
    {
        try {
            return Servicios::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/Administrador/GestionarServicios.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Servicios::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/Administrador/GestionarServicios.php?respuesta=error");
        }
    }
  static  public function tdServicios($id){
        $arrayServicios = Servicios::buscarForId($id);
        $htmlSelect ="<td>".$arrayServicios->getValor()."</td>";
        return $htmlSelect;
    }

    public function buscar($Query)
    {
        try {
            return Servicios::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/Administrador/GestionarServicios.php?respuesta=error");
        }
    }

}
?>