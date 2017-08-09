<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 17/07/2017
 * Time: 8:38
 */
require_once('db_abstract_class.php');
require_once ('Reservas.php');
require_once ('Servicios.php');

class Habitaciones extends db_abstract_class {

    private $idHabitaciones;
    private $Foto;
    private $Tipo_Habitacion;
    private $Estado;
    private $Piso;
    private $Numero;
    private $Vista;
    private $Valor;
    private $Reservas;
    private $ServcioTelefonia;

    /**
     * Habitaciones constructor.
     *
     * @param $idHabitaciones
     * @param $Foto
     * @param $Tipo_Habitacion
     * @param $Estado
     * @param $Piso
     * @param $Numero
     * @param $Vista
     * @param $Valor
     * @param $Reservas
     * @param $ServicioTelefonia
     */
    public function __construct($habitacion_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($habitacion_data)>1){ //
            foreach ($habitacion_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
        $this->idHabitaciones = "";
            $this->Foto= "";
            $this->Tipo_Habitacion = "";
        $this->Estado = "";
        $this->Piso = "";
        $this->Numero = "";
        $this->Vista = "";
        $this->Valor = "";
        $this->Reservas = "";
        $this->ServcioTelefonia = "";
    }
    }
    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }
    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->Foto;
    }

    /**
     * @param mixed $Foto
     */
    public function setFoto($Foto)
    {
        $this->Foto = $Foto;
    }



    /**
     * @return string
     */
    public function getIdHabitaciones()
    {
        return $this->idHabitaciones;
    }

    /**
     * @param string $idHabitaciones
     */
    public function setIdHabitaciones($idHabitaciones)
    {
        $this->idHabitaciones = $idHabitaciones;
    }

    /**
     * @return string
     */
    public function getTipoHabitacion()
    {
        return $this->Tipo_Habitacion;
    }

    /**
     * @param string $Tipo_Habitacion
     */
    public function setTipoHabitacion($Tipo_Habitacion)
    {
        $this->Tipo_Habitacion = $Tipo_Habitacion;
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
     * @return string
     */
    public function getPiso()
    {
        return $this->Piso;
    }

    /**
     * @param string $Piso
     */
    public function setPiso($Piso)
    {
        $this->Piso = $Piso;
    }

    /**
     * @return string
     */
    public function getNumero()
    {
        return $this->Numero;
    }

    /**
     * @param string $Numero
     */
    public function setNumero($Numero)
    {
        $this->Numero = $Numero;
    }

    /**
     * @return string
     */
    public function getVista()
    {
        return $this->Vista;
    }

    /**
     * @param string $Vista
     */
    public function setVista($Vista)
    {
        $this->Vista = $Vista;
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
    public function getReservas()
    {
        return $this->Reservas;
    }

    /**
     * @param mixed $Reservas
     */
    public function setReservas($Reservas)
    {
        $this->Reservas = $Reservas;
    }

    /**
     * @return mixed
     */
    public function getServcioTelefonia()
    {
        return $this->ServcioTelefonia;
    }

    /**
     * @param mixed $ServcioTelefonia
     */
    public function setServcioTelefonia($ServcioTelefonia)
    {
        $this->ServcioTelefonia = $ServcioTelefonia;
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO habitacion VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ? )", array(
                $this->Foto,
                $this->Tipo_Habitacion,
                $this->Estado,
                $this->Piso,
                $this->Numero,
                $this->Vista,
                $this->Valor,
                $this->Reservas,
                $this->ServcioTelefonia,

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
        $arrReservas = array();
        $tmp = new Habitaciones();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $reserva = new Habitaciones();
            $reserva->idHabitaciones = $valor['idHabitaciones'];
            $reserva->Foto = $valor['Foto'];
            $reserva->Tipo_Habitacion = $valor['Tipo_Habitacion'];
            $reserva->Estado = $valor['Estado'];
            $reserva->Piso = $valor['Piso'];
            $reserva->Numero = $valor['Numero'];
            $reserva->Vista = $valor['Vista'];
            $reserva->Valor = $valor['Valor'];
            $reserva->Reservas = $valor['Reservas'];
            $reserva->ServcioTelefonia = $valor['ServcioTelefonia'];
            array_push($arrReservas, $reserva);
        }
        $tmp->Disconnect();
        return $arrReservas;
    }
    public static function getAll()
    {
       return Habitaciones::buscar("SELECT * FROM hotel.habitaciones");
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
?>