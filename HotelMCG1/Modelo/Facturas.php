<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 17/07/2017
 * Time: 9:20
 */
require_once('db_abstract_class.php');

class Facturas extends db_abstract_class {

    private $idFacturas;
    private $Habitacion;
    private $Fecha_ingreso;
    private $Fecha_Salida;
    private $Numero_Dias;
    private $Recargo_Llamadas;

    /**
     * Facturas constructor.
     * @param $idFacturas
     * @param $Habitacion
     * @param $Fecha_ingreso
     * @param $Fecha_Salida
     * @param $Numero_Dias
     * @param $Recargo_Llamadas
     */
    public function __construct($facturas_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($facturas_data)>1){ //
            foreach ($facturas_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
        $this->idFacturas = "";
        $this->Habitacion = "";
        $this->Fecha_ingreso = "";
        $this->Fecha_Salida = "";
        $this->Numero_Dias = "";
        $this->Recargo_Llamadas = "";

        }}
    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    /**
     * @return string
     */
    public function getIdFacturas()
    {
        return $this->idFacturas;
    }

    /**
     * @param string $idFacturas
     */
    public function setIdFacturas($idFacturas)
    {
        $this->idFacturas = $idFacturas;
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
    public function getFechaingreso()
    {
        return $this->Fecha_ingreso;
    }

    /**
     * @param string $Fecha_Ingreso
     */
    public function setFechaingreso($Fecha_ingreso)
    {
        $this->Fecha_ingreso = $Fecha_ingreso;
    }

    /**
     * @return string
     */
    public function getFechaSalida()
    {
        return $this->Fecha_Salida;
    }

    /**
     * @param string $Fecha_Salida
     */
    public function setFechaSalida($Fecha_Salida)
    {
        $this->Fecha_Salida = $Fecha_Salida;
    }

    /**
     * @return string
     */
    public function getNumeroDias()
    {
        return $this->Numero_Dias;
    }

    /**
     * @param string $Numero_Dias
     */
    public function setNumeroDias($Numero_Dias)
    {
        $this->Numero_Dias = $Numero_Dias;
    }

    /**
     * @return string
     */
    public function getRecargoLlamadas()
    {
        return $this->Recargo_Llamadas;
    }

    /**
     * @param string $Recargo_Llamadas
     */
    public function setRecargoLlamadas($Recargo_Llamadas)
    {
        $this->Recargo_Llamadas = $Recargo_Llamadas;
    }
    public function insertar()
    {
        $this->insertRow("INSERT INTO facturas VALUES (NULL, ?, ?, ?, ?, ?, ?)", array(

                $this->Habitacion,
                $this->Fecha_ingreso,
                $this->Fecha_Salida,
                $this->Numero_Dias,
                $this->Recargo_Llamadas,

            )
        );
        $this->Disconnect();

    }

    public static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    public static function buscar($query)
    {
        // TODO: Implement buscar() method.
    }

    public static function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function editar()
    {
        // TODO: Implement editar() method.
    }

public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}
