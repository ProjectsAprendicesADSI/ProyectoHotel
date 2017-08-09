<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 17/07/2017
 * Time: 9:32
 */
require_once('db_abstract_class.php');
require_once ('Administrador.php');

class DatosEmpresa extends db_abstract_class {

    private $idDatosEmpresa;
    private $Nombre;
    private $Nit;
    private $Direccion;
    private $Telefono;
    private $NumDIAN;
    private $Estado;
    private $Persona;

    /**
     * DatosEmpresa constructor.
     * @param $idDatosEmpresa
     * @param $Nombre
     * @param $Nit
     * @param $Direccion
     * @param $Telefono
     * @param $NumDIAN
     */
    public function __construct($DatosEmpresa_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($DatosEmpresa_data)>1){ //
            foreach ($DatosEmpresa_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
        $this->idDatosEmpresa= "";
        $this->Nombre= "";
        $this->Nit= "";
        $this->Direccion = "";
        $this->Telefono = "";
        $this->NumDIAN = "";
            $this->Estado = "";
            $this->Persona = "";
    } }
        /* Metodo destructor cierra la conexion. */
        function __destruct() {
            $this->Disconnect();
            unset($this);
        }

    /**
     * @return string
     */
    public function getIdDatosEmpresa()
    {
        return $this->idDatosEmpresa;
    }

    /**
     * @param string $idDatosEmpresa
     */
    public function setIdDatosEmpresa($idDatosEmpresa)
    {
        $this->idDatosEmpresa = $idDatosEmpresa;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param string $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return string
     */
    public function getNit()
    {
        return $this->Nit;
    }

    /**
     * @param string $Nit
     */
    public function setNit($Nit)
    {
        $this->Nit = $Nit;
    }

    /**
     * @return string
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param string $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    /**
     * @return string
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * @param string $Telefono
     */
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;
    }

    /**
     * @return string
     */
    public function getNumDIAN()
    {
        return $this->NumDIAN;
    }

    /**
     * @param string $NumDIAN
     */
    public function setNumDIAN($NumDIAN)
    {
        $this->NumDIAN = $NumDIAN;
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
    public function insertar()
    {
        $this->insertRow("INSERT INTO DatosEmpresa VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)", array(

            $this->Nombre,
        $this->Nit,
        $this->Direccion,
        $this->Telefono,
        $this->NumDIAN,
                $this->Estado,
                $this->Persona,

            )
        );
        $this->Disconnect();
    }


    public static function buscarForId($id)
    {
        $datosempresa = new DatosEmpresa();
        if ($id > 0){
            $getrow = $datosempresa->getRow("SELECT * FROM datosempresa WHERE idDatosEmpresa =?", array($id));
            $datosempresa->idDatosEmpresa = $getrow['idDatosEmpresa'];
            $datosempresa->Nombre = $getrow['Nombre'];
            $datosempresa->Nit = $getrow['Nit'];
            $datosempresa->Direccion = $getrow['Direccion'];
            $datosempresa->Telefono = $getrow['Telefono'];
            $datosempresa->NumDIAN = $getrow['NumDIAN'];
            $datosempresa->Estado = $getrow['Estado'];


            $datosempresa->Disconnect();
            return $datosempresa;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayDatosEmpresa = array();
        $tmp = new DatosEmpresa();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $datosempresa = new DatosEmpresa();
            $datosempresa->idDatosEmpresa = $valor['idDatosEmpresa'];
            $datosempresa->Nombre = $valor['Nombre'];
            $datosempresa->Nit = $valor['Nit'];
            $datosempresa->Direccion = $valor['Direccion'];
            $datosempresa->Telefono = $valor['Telefono'];
            $datosempresa->NumDIAN = $valor['NumDIAN'];
            $datosempresa->Estado = $valor['Estado'];

            array_push($arrayDatosEmpresa, $datosempresa);
        }
        $tmp->Disconnect();
        return $arrayDatosEmpresa;
    }

    public static function getAll()
    {
        return DatosEmpresa::buscar("SELECT * FROM datosempresa");
    }

    public function editar()
    {
        $this->updateRow("UPDATE hotel.datosempresa SET Nombre = ?, Nit = ? WHERE idDatosEmpresa = ?", array(
            $this->idDatosEmpresa,
        $this->Nombre,
        $this->Nit,
        $this->Direccion,
        $this->Telefono,
        $this->NumDIAN,
            $this->Estado,
        $this->Persona,
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}
