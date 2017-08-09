<?php

require_once (__DIR__.'/../Modelo/Facturas.php');

if(!empty($_GET['action'])){
    FacturasController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
class FacturasController
{
    static function main($action){
        if ($action == "crear"){
            FacturasController::crear();
        }else if ($action == "editar"){
            FacturasController::editar();
        }else if ($action == "buscarID"){
            FacturasController::buscarID();
        }
    }
    static public function crear (){
        try {
            $arrayFacturas = array();
            $arrayFacturas ['Habitacion'] = $_POST['Habitacion'];
            $arrayFacturas ['Fecha_ingreso'] = $_POST['Fecha_ingreso'];
            $arrayFacturas ['Fecha_Salida'] = $_POST['Fecha_Salida'];
            $arrayFacturas ['Numero_Dias'] = $_POST['Numero_Dias'];
            $arrayFacturas ['Recargo_Llamadas'] = $_POST['Recargo_Llamadas'];
            $arrayFacturas ['Persona'] = $_POST['Persona'];
            $Facturas = new Facturas ($arrayFacturas);
            $Facturas->insertar();
            header("Location: ../Vista/CreateFacturas.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/CreateFacturas.php?respuesta=error");
        }
    }
    /*
        static public function selectReservas ($isRequired=true, $id="idEspecialista", $nombre="idHabitaciones", $class=""){
            $arrHabitaciones = Persona::getAll(); /*  */
    /*$htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombre."' class='".$class."'>";
    $htmlSelect .= "<option >Seleccione</option>";
    if(count($arrEHabitaciones) > 0){
        foreach ($arrHabitaciones as $habitaciones)
            $htmlSelect .= "<option value='".$habitaciones->getIdPersona()."'>".$habitaciones->getNombre()." ".$habitaciones->getApellido()."</option>";
    }
    $htmlSelect .= "</select>";
    return $htmlSelect;
}*/
    static public function editar (){
        try {
            $arrayFacturas = array();
            $arrayFacturas ['Habitacion'] = $_POST['Habitacion'];
            $arrayFacturas ['Fecha_ingreso'] = $_POST['Fecha_ingreso'];
            $arrayFacturas ['Fecha_Salida'] = $_POST['Fecha_Salida'];
            $arrayFacturas ['Numero_Dias'] = $_POST['Numero_Dias'];
            $arrayFacturas ['Recargo_Llamadas'] = $_POST['Recargo_Llamadas'];
            $facturas = new Facturas($arrayFacturas );
            $arrayFacturas ['Persona'] = $_POST['Persona'];
            $facturas->editar();
            header("Location: ../Vista/editarFacturas.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/editarFacturas.php?respuesta=error");
        }
    }


}
?>