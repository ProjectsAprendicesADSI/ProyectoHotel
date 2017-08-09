<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 17/07/2017
 * Time: 8:57
 */
require_once('db_abstract_class.php');
require_once ('Persona.php');

class Reservas extends db_abstract_class {

    private $idReservas;
    private $Fecha_Inicio;
    private $Fecha_Final;
    private $Estado;
    private $Tipo_Reserva;
    private $Observacion;
    private $Numero;
    private $Persona;

    /**
     * Reservas constructor.
     * @param $idReservas
     * @param $Fecha_Inicio
     * @param $Fecha_Final
     * @param $Estado
     * @param $Tipo_Reserva

     */
    public function __construct($reservas_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($reservas_data)>1){ //
            foreach ($reservas_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
        $this->idReservas = "";
        $this->Fecha_Inicio = "";
        $this->Fecha_Final = "";
        $this->Estado = "";
        $this->Tipo_Reserva = "";
        $this->Observacion = "";
        $this->Numero = "";
        $this->Persona = "";

    }



    }
    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }
    /**
     * @return string
     */
    public function getIdReservas()
    {
        return $this->idReservas;
    }

    /**
     * @param string $idReservas
     */
    public function setIdReservas($idReservas)
    {
        $this->idReservas = $idReservas;
    }

    /**
     * @return string
     */
    public function getFechaInicio()
    {
        return $this->Fecha_Inicio;
    }

    /**
     * @param string $Fecha_Inicio
     */
    public function setFechaInicio($Fecha_Inicio)
    {
        $this->Fecha_Inicio = $Fecha_Inicio;
    }

    /**
     * @return string
     */
    public function getFechaFinal()
    {
        return $this->Fecha_Final;
    }

    /**
     * @param string $Fecha_Final
     */
    public function setFechaFinal($Fecha_Final)
    {
        $this->Fecha_Final = $Fecha_Final;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param string $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    /**
 * @return mixed
 */
    public function getPersona()
    {
        return $this->Persona;
    }

    /**
     * @param mixed $Persona
     */
    public function setPersona($Persona)
    {
        $this->Persona = $Persona;
    }

    /**
     * @return string
     */
    public function getTipoReserva()
    {
        return $this->Tipo_Reserva;
    }

    /**
     * @param string $Tipo_Reserva
     */
    public function setTipoReserva($Tipo_Reserva)
    {
        $this->Tipo_Reserva = $Tipo_Reserva;
    }

    /**
     * @return mixed
     */
    public function getObservacion()
    {
        return $this->Observacion;
    }

    /**
     * @param mixed $Observacion
     */
    public function setObservacion($Observacion)
    {
        $this->Observacion = $Observacion;
    }

 /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->Numero;
    }

    /**
     * @param mixed $Numero
     */
    public function setNumero($Numero)
    {
        $this->Numero = $Numero;
    }


    public function insertar()
    {
        $this->insertRow("INSERT INTO reservas VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)", array(

                $this->Fecha_Inicio,
                $this->Fecha_Final,
                $this->Estado,
                $this->Tipo_Reserva,
                $this->Observacion,
                 $this->Numero,
                $this->Persona,

            )
        );
        $this->Disconnect();

    }


    public static function buscarForId($id)
    {
        $reserva = new Reservas();
        if ($id > 0){
            $getrow = $reserva->getRow("SELECT * FROM reservas WHERE idReservas =?", array($id));
            $reserva->idReservas = $getrow['idReservas'];
            $reserva->Fecha_Inicio = $getrow['Fecha_Inicio'];
            $reserva->Fecha_Final = $getrow['Fecha_Final'];
            $reserva->Estado = $getrow['Estado'];
            $reserva->Tipo_Reserva = $getrow['Tipo_Reserva'];
            $reserva->Observacion = $getrow['Observacion'];
             $reserva->Numero = $getrow['Numero'];
            $reserva->Persona = $getrow['Persona'];

            $reserva->Disconnect();
            return $reserva;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrReservas = array();
        $tmp = new Reservas();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $reserva = new Reservas();
            $reserva->idReservas = $valor['idReservas'];
            $reserva->Fecha_Inicio = $valor['Fecha_Inicio'];
            $reserva->Fecha_Final = $valor['Fecha_Final'];
            $reserva->Estado = $valor['Estado'];
            $reserva->Tipo_Reserva = $valor['Tipo_Reserva'];
            $reserva->Observacion = $valor['Observacion'];
               $reserva->Numero = $valor['Numero'];
            $reserva->Persona = $valor['Persona'];
            array_push($arrReservas, $reserva);
        }
        $tmp->Disconnect();
        return $arrReservas;
    }

    public static function getAll()
    {
        return Reservas::buscar("SELECT * FROM reservas");
    }

    public function editar()
    {
        $this->updateRow("UPDATE hotel.reservas SET Fecha_Inicio = ?, Fecha_Final = ?, Tipo_Reserva = ? WHERE idReservas = ?", array(
            $this->Fecha_Inicio,
            $this->Fecha_Final,
            $this->Estado,
            $this->Tipo_Reserva,
            $this->Observacion,
             $this->Numero,
            $this->Persona,
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}

?>

