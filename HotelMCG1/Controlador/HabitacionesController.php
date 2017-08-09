

<?php

require_once (__DIR__.'/../Modelo/Habitaciones.php');

if(!empty($_GET['action'])){
    HabitacionesController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}


class HabitacionesController
{
    static function main($action){
        if ($action == "crear"){
            HabitacionesController::crear();
        }else if ($action == "editar"){
            HabitacionesController::editar();
        }else if ($action == "buscarID"){
            HabitacionesController::buscarID();
        }else if ($action == "ActivarHabitaciones"){
            HabitacionesController::ActivarHabitaciones();
        }else if ($action == "InactivarHabitaciones"){
            HabitacionesController::InactivarHabitaciones();
        }
    }
    static public function crear (){
        try {
            $arrayHabitaciones = array();
            $arrayHabitaciones ['Foto'] =$_POST['Foto'];
            $arrayHabitaciones ['Tipo_Habitacion'] = $_POST['Tipo_Habitacion'];
            $arrayHabitaciones ['Estado'] = $_POST['Estado'];
            $arrayHabitaciones ['Piso'] = $_POST['Piso'];
            $arrayHabitaciones ['Numero'] = $_POST['Numero'];
            $arrayHabitaciones ['Vista'] = $_POST['Vista'];
            $arrayHabitaciones ['Valor'] = $_POST['Valor'];
            $arrayHabitaciones [' Reservas'] = $_POST[' Reservas'];
            $arrayHabitaciones [' ServicioTelefonia'] = $_POST['ServicioTelefonia'];
            $Habitaciones = new Habitaciones ($arrayHabitaciones);
            $Habitaciones->insertar();
            header("Location: ../Vista/CreateHabitaciones.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/CreateHabitaciones.php?respuesta=error");
        }
    }

    static public function editar (){
        try {
            $arrayHabitaciones = array();
            $arrayHabitaciones ['Foto'] =$_POST['Foto'];
            $arrayHabitaciones ['Tipo_Habitacion'] = $_POST['Tipo_Habitacion'];
            $arrayHabitaciones ['Estado'] = $_POST['Estado'];
            $arrayHabitaciones ['Piso'] = $_POST['Piso'];
            $arrayHabitaciones ['Numero'] = $_POST['Numero'];
            $arrayHabitaciones ['Vista'] = $_POST['Vista'];
            $arrayHabitaciones ['Valor'] = $_POST['Valor'];
            $arrayHabitaciones [' Reservas'] = $_POST[' Reservas'];
            $arrayHabitaciones [' ServicioTelefonia'] = $_POST['ServicioTelefonia'];

            $habitaciones = new Habitaciones($arrayHabitaciones );
            $habitaciones->editar();
            header("Location: ../Vista/editarHabitaciones.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/editarHabitaciones.php?respuesta=error");
        }
    }
    static public function ActivarHabitaciones (){
        try {
            $ObjHabitaciones = Habitaciones::buscarForId($_GET['IdHabitaciones']);
            $ObjHabitaciones->setEstado("Activo");
            $ObjHabitaciones->editar();
            header("Location: ../Vista/gestionarHabitaciones.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarHabitaciones.php?respuesta=error");
        }
    }

    static public function InactivarHabitaciones (){
        try {
            $ObjHabitaciones = Habitaciones::buscarForId($_GET['IdHabitaciones']);
            $ObjHabitaciones->setEstado("Inactivo");
            $ObjHabitaciones->editar();
            header("Location: ../Vista/gestionarHabitaciones.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarHabitaciones.php?respuesta=error");
        }
    }


  static  public function tablaHabitaciones(){
        $arrPersona = Habitaciones::getAll();

        $htmlSelect = "";
        foreach ($arrPersona as $DataPersona) {
            $htmlSelect .= "<tr>";
            $htmlSelect .= ReservasController::DataPersona($DataPersona->getReservas());
            $htmlSelect .= ReservasController::tdTabla($DataPersona->getReservas());
            $htmlSelect .= "<td>".$DataPersona->getNumero()."</td>";
            $htmlSelect .= "<td>".$DataPersona->getValor()."</td>";
            $htmlSelect .= ServiciosController::tdServicios($DataPersona->getServcioTelefonia());
        }
        $htmlSelect .= "</tr>";
        return  $htmlSelect;
    }
}
?>