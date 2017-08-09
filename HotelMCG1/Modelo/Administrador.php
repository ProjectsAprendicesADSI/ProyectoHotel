<?php
require_once('db_abstract_class.php');

class Administrador extends db_abstract_class
{
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
     * Administrador constructor.
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
    public function __construct( $administrador_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($administrador_data)>1){ //
            foreach ($administrador_data as $campo => $valor){
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
        $Admin = new Administrador();
        if ($id > 0){
            $getrow = $Admin->getRow("SELECT * FROM persona WHERE idPersona =?", array($id));
            $Admin->idPersona = $getrow['idPersona'];
            $Admin->Nombres = $getrow['Nombres'];
            $Admin->Apellidos = $getrow['Apellidos'];
            $Admin->Tipo_Documento = $getrow['Tipo_Documento'];
            $Admin->Documento = $getrow['Documento'];
            $Admin->Email = $getrow['Email'];
            $Admin->Telefono = $getrow['Telefono'];
            $Admin->Direccion = $getrow['Direccion'];
            $Admin->Tipo_Perfil = $getrow['Tipo_Perfil'];
            $Admin->Estado = $getrow['Estado'];


            $Admin->Disconnect();
            return $Admin;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrAdministrador = array();
        $tmp = new Administrador();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Admin = new Administrador();
            $Admin->idPersona = $valor['idPersona'];
            $Admin->Nombres = $valor['Nombres'];
            $Admin->Apellidos = $valor['Apellidos'];
            $Admin->Tipo_Documento = $valor['Tipo_Documento'];
            $Admin->Documento = $valor['Documento'];
            $Admin->Email = $valor['Email'];
            $Admin->Telefono = $valor['Telefono'];
            $Admin->Direccion = $valor['Direccion'];
            $Admin->Tipo_Perfil = $valor['Tipo_Perfil'];
            $Admin->Estado = $valor['Estado'];

            array_push($arrAdministrador, $Admin);
        }
        $tmp->Disconnect();
        return $arrAdministrador;
    }
    public static function getAll()
    {
        return Administrador::buscar("SELECT * FROM persona");
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
        // TODO: Implement eliminar() method.
    }
    public static function Login($Usuario, $Password){
        $arrUsuarios = array();
        $tmp = new Administrador();
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