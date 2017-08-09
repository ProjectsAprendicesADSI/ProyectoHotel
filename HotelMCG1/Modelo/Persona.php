<?php
/**1
 * Created by PhpStorm.
 * User: pc
 * Date: 11/07/2017
 * Time: 18:57
 */
require_once('db_abstract_class.php');

class Persona extends db_abstract_class {
    private $idPersona;
    private $Tipo_Documento;
    private $Documento;
    private $Nombres;
    private $Apellidos;
    private $FechaNacimiento;
    private $Email;
    private $Telefono;
    private $Direccion;
    private $Estado;
    private $Usuario;
    private $Password;
    private $Tipo_Perfil;

    /**
     * Persona constructor.
     * @param $idPersona
     * @param $Tipo_Documento
     * @param $Documento
     * @param $Nombres
     * @param $Apellidos
     * @param $FechaNacimiento
     * @param $Email
     * @param $Telefono
     * @param $Direccion
     * @param $Estado
     * @param $Usuario
     * @param $Password
     * @param $Tipo_Perfil
     */
    public function __construct($persona_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($persona_data)>1){ //
            foreach ($persona_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idPersona = "";
            $this->Tipo_Documento = "";
            $this->Documento = "";
            $this->Nombres = "";
            $this->Apellidos = "";
            $this->FechaNacimiento = "";
            $this->Email = "";
            $this->Telefono = "";
            $this->Direccion = "";
            $this->Estado= "";
            $this->Usuario = "";
            $this->Password = "";
            $this->Tipo_Perfil = "";

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
        public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * @param string $idPersona
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    /**
     * @return string
     */
    public function getTipoDocumento()
    {
        return $this->Tipo_Documento;
    }

    /**
     * @param string $Tipo_Documento
     */
    public function setTipoDocumento($Tipo_Documento)
    {
        $this->Tipo_Documento = $Tipo_Documento;
    }

    /**
     * @return string
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * @param string $Documento
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;
    }

    /**
     * @return string
     */
    public function getNombres()
    {
        return $this->Nombres;
    }

    /**
     * @param string $Nombres
     */
    public function setNombres($Nombres)
    {
        $this->Nombres = $Nombres;
    }

    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->Apellidos;
    }

    /**
     * @param string $Apellidos
     */
    public function setApellidos($Apellidos)
    {
        $this->Apellidos = $Apellidos;
    }

    /**
     * @return string
     */
    public function getFechaNacimiento()
    {
        return $this->FechaNacimiento;
    }

    /**
     * @param string $FechaNacimiento
     */
    public function setFechaNacimiento($FechaNacimiento)
    {
        $this->FechaNacimiento = $FechaNacimiento;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
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
    public function getUsuario()
    {
        return $this->Usuario;
    }

    /**
     * @param string $Usuario
     */
    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param string $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }



    /**
     * @return string
     */
    public function getTipoPerfil()
    {
        return $this->Tipo_Perfil;
    }

    /**
     * @param string $Tipo_Perfil
     */
    public function setTipoPerfil($Tipo_Perfil)
    {
        $this->Tipo_Perfil = $Tipo_Perfil;
    }




   public function insertar()
    {
        $this->insertRow("INSERT INTO persona VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->Tipo_Documento,
                $this->Documento,
                $this->Nombres,
                $this->Apellidos,
                $this->FechaNacimiento,
                $this->Email,
                $this->Telefono,
                $this->Direccion,
                $this->Estado,
                $this->Usuario,
                $this->Password,
                $this->Tipo_Perfil,

            )
        );
        $this->Disconnect();

    }


    public static function buscarForId($id)
    {
        $Person = new Persona();
        if ($id > 0){
            $getrow = $Person->getRow("SELECT * FROM persona WHERE idPersona =?", array($id));
            $Person->idPersona = $getrow['idPersona'];
            $Person->Nombres = $getrow['Nombres'];
            $Person->Apellidos = $getrow['Apellidos'];
            $Person->Tipo_Documento = $getrow['Tipo_Documento'];
            $Person->Documento = $getrow['Documento'];
            $Person->Email = $getrow['Email'];
            $Person->Telefono = $getrow['Telefono'];
            $Person->Direccion = $getrow['Direccion'];
            $Person->Tipo_Perfil = $getrow['Tipo_Perfil'];
            $Person->Estado = $getrow['Estado'];


            $Person->Disconnect();
            return $Person;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrPersona = array();
        $tmp = new Persona();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $person = new Persona();
            $person->idPersona = $valor['idPersona'];
            $person->Nombres = $valor['Nombres'];
            $person->Apellidos = $valor['Apellidos'];
            $person->Tipo_Documento = $valor['Tipo_Documento'];
            $person->Documento = $valor['Documento'];
            $person->Email = $valor['Email'];
            $person->Telefono = $valor['Telefono'];
            $person->Direccion = $valor['Direccion'];
            $person->Tipo_Perfil = $valor['Tipo_Perfil'];
            $person->Estado = $valor['Estado'];

            array_push($arrPersona, $person);
        }
        $tmp->Disconnect();
        return $arrPersona;
    }

    public static function getAll()
    {
        return Persona::buscar("SELECT * FROM persona");
    }

    public function editar()
    {
        $this->updateRow("UPDATE hotel.persona SET Nombres = ?, Documento = ? WHERE idPersona = ?", array(
            $this->Tipo_Documento,
            $this->Documento,
            $this->Nombres,
            $this->Apellidos,
            $this->FechaNacimiento,
            $this->Email,
            $this->Telefono,
            $this->Direccion,
            $this->Estado,
            $this->Usuario,
            $this->Password,
            $this->Tipo_Perfil,
            $this->idPersona,
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        $this->deleteRow("DELETE hotel.persona SET Nombres = ?, Documento = ? WHERE idPersona = ?", array(
            $this->Tipo_Documento,
            $this->Documento,
            $this->Nombres,
            $this->Apellidos,
            $this->FechaNacimiento,
            $this->Email,
            $this->Telefono,
            $this->Direccion,
            $this->Estado,
            $this->Usuario,
            $this->Password,
            $this->Tipo_Perfil,
            $this->idPersona,
        ));
        $this->Disconnect();
    }
    public static function Login($Usuario, $Password){
        $arrUsuarios = array();
        $tmp = new Persona();
        $getTempUsuario = $tmp->getRows("SELECT * FROM persona WHERE Usuario = '$Usuario'");
        if(count($getTempUsuario) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM persona WHERE Usuario = '$Usuario' AND Password = '$Password'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                    return $valor;
                }
            }else{
                return "Password Incorrecto";
            }
        }else{
            return "No existe el usuario";
        }

        $tmp->Disconnect();
        return $arrUsuarios;
    }


}









































