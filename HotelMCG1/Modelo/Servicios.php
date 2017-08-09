<?php

require_once('db_abstract_class.php');

class Servicios extends db_abstract_class
{
    private $idTelefonia;
    private $Duracion;
    private $Habitacion;
    private $Tipo_Llamada;

    private $Valor;


    /**
     * Servicios constructor.
     * @param $idTelefonia
     * @param $Duracion
     * @param $Habitacion
     * @param $Tipo_Llamada
     * @param $Valor
     */
    public function __construct($servciotelefonia_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($servciotelefonia_data)>1){ //
            foreach ($servciotelefonia_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
        $this->idTelefonia = "";
        $this->Duracion = "";
        $this->Habitacion = "";
        $this->Tipo_Llamada = "";

        $this->Valor = "";

    }


}

    /**
     * @return string
     */
    public function getIdTelefonia()
    {
        return $this->idTelefonia;
    }

    /**
     * @param string $idTelefonica
     */
    public function setIdTelefonia($idTelefonia)
    {
        $this->idTelefonia = $idTelefonia;
    }

    /**
     * @return string
     */
    public function getDuracion()
    {
        return $this->Duracion;
    }

    /**
     * @param string $Duracion
     */
    public function setDuracion($Duracion)
    {
        $this->Duracion = $Duracion;
    }

    /**
     * @return string
     */
    public function getHabitacion()
    {
        return $this->Habitacion;
    }

    /**
     * @param string $Habitacion
     */
    public function setHabitacion($Habitacion)
    {
        $this->Habitacion = $Habitacion;
    }

    /**
     * @return string
     */
    public function getTipoLlamada()
    {
        return $this->Tipo_Llamada;
    }

    /**
     * @param string $Tipo_Llamada
     */
    public function setTipoLlamada($Tipo_Llamada)
    {
        $this->Tipo_Llamada = $Tipo_Llamada;
    }


    /**
     * @return string
     */
    public function getValor()
    {
        return $this->Valor;
    }

    /**
     * @param string $Valor
     */
    public function setValor($Valor)
    {
        $this->Valor = $Valor;
    }
    /**
     * @return mixed
     */


    public function insertar()
    {
        $this->insertRow("INSERT INTO servciotelefonia VALUES (NULL, ?, ?, ?, ?)", array(
            $this->Duracion,
            $this->Habitacion,
            $this->Tipo_Llamada,

            $this->Valor,

            )
        );
        $this->Disconnect();
    }

    public static function buscarForId($id)
    {
        $Servi = new Servicios();
        if ($id > 0){
            $getrow = $Servi->getRow("SELECT * FROM servciotelefonia WHERE idTelefonia =?", array($id));
            $Servi->idTelefonia = $getrow['idTelefonia'];
            $Servi->Duracion = $getrow['Duracion'];
            $Servi->Habitacion = $getrow['Habitacion'];
            $Servi->Tipo_Llamada = $getrow['Tipo_Llamada'];
            $Servi->Valor = $getrow['Valor'];


            $Servi->Disconnect();
            return $Servi;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrServicios = array();
        $tmp = new Servicios();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Servi = new Servicios();
            $Servi->idTelefonia = $valor['idTelefonia'];
            $Servi->Duracion = $valor['Duracion'];
            $Servi->Habitacion = $valor['Habitacion'];
            $Servi->Tipo_Llamada = $valor['Tipo_Llamada'];
            $Servi->Valor = $valor['Valor'];


            array_push($arrServicios, $Servi);
        }
        $tmp->Disconnect();
        return $arrServicios;
    }

    public static function getAll()
    {
        return Servicios::buscar("SELECT * FROM servicios");
    }


    public function editar()
    {
        $this->updateRow("UPDATE hotel.servciotelefonia SET Habitacion = ? WHERE idTelefonia = ?", array(
            $this->Duracion,
            $this->Habitacion,
            $this->Tipo_Llamada,
            $this->Valor,
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}