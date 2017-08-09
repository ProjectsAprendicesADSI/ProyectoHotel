<?php

require_once (__DIR__.'/../Modelo/DatosEmpresa.php');

if(!empty($_GET['action'])){
    DatosEmpresaController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class DatosEmpresaController
{
    static function main($action){
        if ($action == "crear"){
            DatosEmpresaController::crear();
        }else if ($action == "editar"){
            DatosEmpresaController::editar();
        }else if ($action == "buscarID"){
            DatosEmpresaController::buscarID();
        }else if ($action == "ActivarDatosEmpresa"){
            DatosEmpresaController::ActivarDatosEmpresa();
        }else if ($action == "InactivarDatosEmpresa"){
            DatosEmpresaController::InactivarDatosEmpresa();
        }
    }
    static public function crear (){
        try {
            $arrayDatosEmpresa = array();
            $arrayDatosEmpresa ['Nombre'] = $_POST['Nombre'];
            $arrayDatosEmpresa ['Nit'] = $_POST['Nit'];
            $arrayDatosEmpresa ['Direccion'] = $_POST['Direccion'];
            $arrayDatosEmpresa ['Telefono'] = $_POST['Telefono'];
            $arrayDatosEmpresa ['NumDIAN'] = $_POST['NumDIAN'];
            $arrayDatosEmpresa ['Persona'] = $_POST['Persona'];
            $DatosEmpresa  = new DatosEmpresa ($arrayDatosEmpresa);
            $DatosEmpresa ->insertar();
            header("Location: ../Vista/Administrador/CreateDatosEmpresa.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/Administrador/CreateDatosEmpresa.php?respuesta=error");
        }
    }
     static public function editar()
    {
        try {
            $TmpObject = DatosEmpresa::buscarForId($_SESSION["IdDatosEmpresa"]);
            $Estado = $TmpObject->getEstado();
            $arrayDatosEmpresa = array();
            $arrayDatosEmpresa ['Nombre'] = $_POST['Nombre'];
            $arrayDatosEmpresa ['Nit'] = $_POST['Nit'];
            $arrayDatosEmpresa ['Direccion'] = $_POST['Direccion'];
            $arrayDatosEmpresa ['Telefono'] = $_POST['Telefono'];
            $arrayDatosEmpresa ['NumDIAN'] = $_POST['NumDIAN'];
            $arrayDatosEmpresa ['Estado'] =  $Estado;
            $arrayDatosEmpresa ['Persona'] = $_POST['Persona'];
            $DatosEmpresa = new DatosEmpresa($arrayDatosEmpresa);
            $DatosEmpresa->editar();
            header("Location: ../Vista/Administrador/CreatePersona.php?respuesta=correcto".$arrayDatosEmpresa['idDatosEmpresa']);
        } catch (Exception $e) {
            header("Location: ../Vista/Administrador/CreatePersona.php?respuesta=error");
        }
    }



     static public function CambiarEstado ($Estado){
        try {
            $idDatosEmpresa = $_GET["IdPersona"];
            $ObjDatosEmpresa = DatosEmpresa::buscarForId($idDatosEmpresa);
            $ObjDatosEmpresa->setEstado($Estado);
            var_dump($ObjDatosEmpresa);
            $ObjDatosEmpresa->editar();
            header("Location: ../Vista/Administrador/GestionarDatos.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Administrador/GestionarDatos.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }

    static public function adminTableDatos (){
        $arrDatosEmpresa = DatosEmpresa::getAll(); /*  */
        $tmpDatosEmpresa = new DatosEmpresa();
        $arrColumnas = [/*"idDatosEmpresa",*/"Nombre","Nit","Direccion","Telefono","NumDIAN","Estado"];
        $htmlTable = "<thead>";
        $htmlTable .= "<tr>";
        foreach ($arrColumnas as $NameColumna){
            $htmlTable .= "<th>".$NameColumna."</th>";
        }
        $htmlTable .= "<th>Acciones</th>";
        $htmlTable .= "</tr>";
        $htmlTable .= "</thead>";

        $htmlTable .= "<tbody>";
        foreach ($arrDatosEmpresa as $ObjDatosEmpresa){
            $htmlTable .= "<tr>";
            //$htmlTable .= "<td>".$ObjPaciente->getIdPaciente()."</td>";
            $htmlTable .= "<td>".$ObjDatosEmpresa->getNombre()."</td>";
            $htmlTable .= "<td>".$ObjDatosEmpresa->getNit()."</td>";
            $htmlTable .= "<td>".$ObjDatosEmpresa->getDireccion()."</td>";
            $htmlTable .= "<td>".$ObjDatosEmpresa->getTelefono()."</td>";
            $htmlTable .= "<td>".$ObjDatosEmpresa->getNumDIAN()."</td>";
            $htmlTable .= "<td>".$ObjDatosEmpresa->getEstado()."</td>";


            $icons = "";
            if($ObjDatosEmpresa->getEstado() == "Activo"){
                $icons .= "<a data-toggle='tooltip' title='Inactivar Usuario' data-placement='top' class='btn btn-social-icon btn-danger newTooltip' href='../../Controlador/DatosEmpresaController.php?action=InactivarDatosEmpresa&IdDatosEmpresa=".$ObjDatosEmpresa->getIdDatosEmpresa()."'><i class='fa fa-times'></i></a>";
            }else{
                $icons .= "<a data-toggle='tooltip' title='Activar Usuario' data-placement='top' class='btn btn-social-icon btn-success newTooltip' href='../../Controlador/DatosEmpresaController.php?action=ActivarDatosEmpresa&IdDatosEmpresa=".$ObjDatosEmpresa->getIdDatosEmpresa()."'><i class='fa fa-check'></i></a>";
            }
            $icons .= "<a data-toggle='tooltip' title='Actualizar Usuario' data-placement='top' class='btn btn-social-icon btn-primary newTooltip' href='ActualizarDatos.php?IdDatosEmpresa=".$ObjDatosEmpresa->getIdDatosEmpresa()."'><i class='fa fa-pencil'></i></a>";
           

            $htmlTable .= "<td>".$icons."</td>";
            $htmlTable .= "</tr>";
        }
        $htmlTable .= "</tbody>";
        return $htmlTable;
    }
}
?>