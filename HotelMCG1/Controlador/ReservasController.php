<?php require_once (__DIR__.'../../Modelo/Reservas.php');?>
<?php
session_start();

//require "PersonaController.php";
if(!empty($_GET['action'])){
    ReservasController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class ReservasController
{
    static function main($action){
        if ($action == "crear"){
            ReservasController::crear();
        }else if ($action == "editar"){
            ReservasController::editar();
        }else if ($action == "buscarID"){
            ReservasController::buscarID();
        }else if ($action == "ActivarReservas"){
            ReservasController::ActivarReservas();
        }else if ($action == "InactivarReservas"){
            ReservasController::InactivarReservas();
        }
    }
    static public function crear ()
    {
        try {
            $arrayReservas = array();
            $arrayReservas ['Fecha_Inicio'] = $_POST['Fecha_Inicio'];
            $arrayReservas ['Fecha_Final'] = $_POST['Fecha_Final'];
            $arrayReservas ['Estado'] = $_POST['Estado'];
            $arrayReservas ['Tipo_Reserva'] = $_POST['Tipo_Reserva'];
            $arrayReservas ['Observacion'] = $_POST['Observacion'];
             $arrayReservas ['Numero'] = $_POST['Numero'];
            $Reservas = new Reservas($arrayReservas);
            $Reservas->insertar();
            header("Location:  ../Vista/Recepcionista/CreateReservas.php?respuesta=correcto");
          // var_dump($arrayReservas);

        } catch (Exception $e) {
            var_dump(e);
            //header("Location:  ../Vista/Recepcionista/CreateReservas.php?respuesta=error");
        }
    }
    static public function tdTabla($id){
        $arrarReservas = Reservas::buscarForId($id);
        $htmlSelect ="<td>".$arrarReservas->getFechaInicio()."</td>";
        $htmlSelect .="<td>".$arrarReservas->getFechaFinal()."</td>";
        return $htmlSelect;
    }
    static public function DataPersona($id){
        $arrayReservas = Reservas::buscarForId($id);
        $htmltd =PersonaController::tdTabla($arrayReservas->getPersona());
        return $htmltd;
    }
    static public function selectReservas ($isRequired=true, $idReservas="idReservas", $Personal="idReservas", $class="", $tipoUser="Reserva"){
        $arrReservas = Reservas::buscar("SELECT * FROM reservas WHERE Tipo_Reserva = '".$tipoUser."'"); /*  */
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$idReservas."' name='".$Personal."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count($arrReservas) > 0){
            foreach ($arrReservas as $reserva)
                $htmlSelect .= "<option value='".$reserva->getidReservas()."'>".$reserva->getPersonal()." ".$reserva->getEstado()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function editar (){
        try {
            $arrayReservas = array();
            $arrayReservas ['Fecha_Inicio'] = $_POST['Fecha_Inicio'];
            $arrayReservas ['Fecha_Final'] = $_POST['Fecha_Final'];
            $arrayReservas ['Estado'] = $_POST['Estado'];
            $arrayReservas ['Tipo_Reserva'] = $_POST['Tipo_Reserva'];
            $arrayReservas ['Observacion'] = $_POST['Observacion'];
             $arrayReservas ['Numero'] = $_POST['Numero'];
            $arrayReservas ['idPersona'] = $_POST['idPersona'];

            $reservas = new Reservas($arrayReservas );
            $reservas->editar();
            header("Location: ../Vista/editarReserva.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/editarReserva.php?respuesta=error");
        }
    }
    static public function ActivarReservas (){
        try {
            $ObjReservas = Reservas::buscarForId($_GET['IdReservas']);
            $ObjReservas->setEstado("Activo");
            $ObjReservas->editar();
            header("Location: ../Vista/GestionarReservas.php");
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarReservas.php?respuesta=error");
        }
    }

    static public function InactivarReservas (){
        try {
            $ObjReservas = Reservas::buscarForId($_GET['IdReservas']);
            $ObjReservas->setEstado("Inactivo");
            $ObjReservas->editar();
            header("Location: ../Vista/GestionarReservas.php");
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarReservas.php?respuesta=error");
        }
    }
    static public function buscarID($id)
    {
        try {
            return Reservas::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/Recepcionista/GestionarReservas.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Reservas::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/Recepcionista/GestionarReservas.php?respuesta=error");
        }
    }

    public function buscar($Query)
    {
        try {
            return Reservas::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/Recepcionista/GestionarReservas.php?respuesta=error");
        }
    }

}
?>