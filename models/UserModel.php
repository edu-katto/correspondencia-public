<?php

class UserModel{
    private $codUsuario;
    private $usuario;
    private $nombre;
    private $clave;
    private $codRol;
    private $conexion;

    /**
     * UserModel constructor.
     * @param $conexion
     */
    public function __construct()
    {
        $this->conexion = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }

    /**
     * @param mixed $codUsuario
     */
    public function setCodUsuario($codUsuario): void
    {
        $this->codUsuario = $codUsuario;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave): void
    {
        $this->clave = $clave;
    }

    /**
     * @return mixed
     */
    public function getCodRol()
    {
        return $this->codRol;
    }

    /**
     * @param mixed $codRol
     */
    public function setCodRol($codRol): void
    {
        $this->codRol = $codRol;
    }

    public function save(){

        $codUsuario = utils::protege($this->getCodUsuario());
        $usuario  = utils::protege($this->getUsuario());
        $nombre = utils::protege($this->getNombre());
        $codRol = utils::protege($this->getCodRol());
        $clave = $this->getClave();

        $sql = "INSERT INTO usuario VALUES('$codUsuario','$usuario','$nombre','$clave','$codRol')";
        $save = $this->conexion->query($sql);

        if ($save == false){
            return $this->conexion->error;
        }else{
            return TRUE;
        }

    }

    public function login(){
        $result = false;
        $user = utils::protege($this->getUsuario());
        $password = utils::protege($this->getClave());

        $sql = "SELECT * FROM usuario WHERE usuario = '$user'";
        $login = $this->conexion->query($sql);

        if ($login->num_rows == 1){
            $usuario = $login->fetch_object();
            //verifico la contraseña
            $verify = password_verify($password,$usuario->clave);

            if ($verify){
                $result = $usuario;
            }
        }
        return $result;
    }
}