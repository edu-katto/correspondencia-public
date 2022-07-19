<?php

class CoexenvModel{
    private $codCoexenv;
    private $codDependencia;
    private $nombreRemitente;
    private $cargo;
    private $codTipoPaquete;
    private $contenido;
    private $entidadDestino;
    private $nombreDestinatario;
    private $ciudadDepartamento;
    private $codMetodoEnvio;
    private $otroMetodoEnvio;

    /**
     * @return mixed
     */
    public function getOtroMetodoEnvio()
    {
        return $this->otroMetodoEnvio;
    }

    /**
     * @param mixed $otroMetodoEnvio
     */
    public function setOtroMetodoEnvio($otroMetodoEnvio): void
    {
        $this->otroMetodoEnvio = $otroMetodoEnvio;
    }
    private $codUsuario;
    private $fechaEnvio;
    private $conexion;

    /**
     * BeneficiarioModel constructor.
     * @param $conexion
     */
    public function __construct()
    {
        $this->conexion = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getCodCoexenv()
    {
        return $this->codCoexenv;
    }

    /**
     * @param mixed $codCoexenv
     */
    public function setCodCoexenv($codCoexenv): void
    {
        $this->codCoexenv = $codCoexenv;
    }

    /**
     * @return mixed
     */
    public function getCodDependencia()
    {
        return $this->codDependencia;
    }

    /**
     * @param mixed $codDependencia
     */
    public function setCodDependencia($codDependencia): void
    {
        $this->codDependencia = $codDependencia;
    }

    /**
     * @return mixed
     */
    public function getNombreRemitente()
    {
        return $this->nombreRemitente;
    }

    /**
     * @param mixed $nombreRemitente
     */
    public function setNombreRemitente($nombreRemitente): void
    {
        $this->nombreRemitente = $nombreRemitente;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param mixed $cargo
     */
    public function setCargo($cargo): void
    {
        $this->cargo = $cargo;
    }

    /**
     * @return mixed
     */
    public function getCodTipoPaquete()
    {
        return $this->codTipoPaquete;
    }

    /**
     * @param mixed $codTipoPaquete
     */
    public function setCodTipoPaquete($codTipoPaquete): void
    {
        $this->codTipoPaquete = $codTipoPaquete;
    }

    /**
     * @return mixed
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * @param mixed $contenido
     */
    public function setContenido($contenido): void
    {
        $this->contenido = $contenido;
    }

    /**
     * @return mixed
     */
    public function getEntidadDestino()
    {
        return $this->entidadDestino;
    }

    /**
     * @param mixed $entidadDestino
     */
    public function setEntidadDestino($entidadDestino): void
    {
        $this->entidadDestino = $entidadDestino;
    }

    /**
     * @return mixed
     */
    public function getNombreDestinatario()
    {
        return $this->nombreDestinatario;
    }

    /**
     * @param mixed $nombreDestinatario
     */
    public function setNombreDestinatario($nombreDestinatario): void
    {
        $this->nombreDestinatario = $nombreDestinatario;
    }

    /**
     * @return mixed
     */
    public function getCiudadDepartamento()
    {
        return $this->ciudadDepartamento;
    }

    /**
     * @param mixed $ciudadDepartamento
     */
    public function setCiudadDepartamento($ciudadDepartamento): void
    {
        $this->ciudadDepartamento = $ciudadDepartamento;
    }

    /**
     * @return mixed
     */
    public function getCodMetodoEnvio()
    {
        return $this->codMetodoEnvio;
    }

    /**
     * @param mixed $codMetodoEnvio
     */
    public function setCodMetodoEnvio($codMetodoEnvio): void
    {
        $this->codMetodoEnvio = $codMetodoEnvio;
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
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    /**
     * @param mixed $fechaEnvio
     */
    public function setFechaEnvio($fechaEnvio): void
    {
        $this->fechaEnvio = $fechaEnvio;
    }

    public function save(){

        $codDependencia = utils::protege($this->getCodDependencia());
        $nombreRemitente = utils::protege(utils::acentos($this->getNombreRemitente()));
        $cargo = utils::protege(utils::acentos($this->getCargo()));
        $codTipoPaquete = utils::protege($this->getCodTipoPaquete());
        $contenido = utils::protege(utils::acentos($this->getContenido()));
        $entidadDestino = utils::protege(utils::acentos($this->getEntidadDestino()));
        $nombreDestinatario = utils::protege(utils::acentos($this->getNombreDestinatario()));
        $ciudadDepartamento = utils::protege(utils::acentos($this->getCiudadDepartamento()));
        $codMetodoEnvio = utils::protege($this->getCodMetodoEnvio());
        $otroMetodoEnvio = utils::protege($this->getOtroMetodoEnvio());
        $codUsuario = utils::protege($this->getCodUsuario());
        $fechaEnvio = utils::protege($this->getFechaEnvio());

        $sql = "INSERT INTO coexenv VALUES(NULL,'$codDependencia','$nombreRemitente','$cargo','$codTipoPaquete',
                                                '$contenido','$entidadDestino','$nombreDestinatario','$ciudadDepartamento',
                                                '$codMetodoEnvio','$otroMetodoEnvio','$codUsuario','$fechaEnvio')";

        $save = $this->conexion->query($sql);

        if ($save == false){
            return $this->conexion->error;
        }else{
            return TRUE;
        }
    }

    public function update(){
        $codCoexenv = utils::protege($this->getCodCoexenv());
        $nombreRemitente = utils::protege(utils::acentos($this->getNombreRemitente()));
        $codDependencia = utils::protege($this->getCodDependencia());
        $cargo = utils::protege(utils::acentos($this->getCargo()));
        $codTipoPaquete = utils::protege($this->getCodTipoPaquete());
        $contenido = utils::protege(utils::acentos($this->getContenido()));
        $nombreDestinatario = utils::protege(utils::acentos($this->getNombreDestinatario()));
        $entidadDestino = utils::protege(utils::acentos($this->getEntidadDestino()));
        $ciudadDepartamento = utils::protege(utils::acentos($this->getCiudadDepartamento()));
        $codMetodoEnvio = utils::protege($this->getCodMetodoEnvio());
        $otroMetodoEnvio = utils::protege($this->getOtroMetodoEnvio());

        $sql = "UPDATE coexenv SET cod_dependencia = '$codDependencia', nombre_remitente = '$nombreRemitente', cargo = '$cargo', cod_tipo_paquete = '$codTipoPaquete',
                                    contenido = '$contenido', entidad_destino = '$entidadDestino', nombre_destinatario = '$nombreDestinatario', ciudad_departamento = '$ciudadDepartamento', 
                                        cod_metodo_envio = '$codMetodoEnvio', otro_metodo_envio = '$otroMetodoEnvio' WHERE cod_coexenv = '$codCoexenv'";

        $update = $this->conexion->query($sql);

        if ($update == false){
            return $this->conexion->error;
        }else{
            return TRUE;
        }
    }

    public function getOne(){

        $codigoEnvio = utils::protege($this->getCodCoexenv());

        $sql = "SELECT * FROM vista_correspondencia_envio WHERE cod_coexenv = '$codigoEnvio'";
        $searchRegister = $this->conexion->query($sql);

        if ($searchRegister->num_rows >= 1){
            return $searchRegister->fetch_object();

        }else{
            return FALSE;
        }
    }

    public function getOneCod(){

        $codigoEnvio = utils::protege($this->getCodCoexenv());

        $sql = "SELECT * FROM coexenv WHERE cod_coexenv = '$codigoEnvio'";
        $searchRegister = $this->conexion->query($sql);

        if ($searchRegister->num_rows >= 1){
            return $searchRegister->fetch_object();

        }else{
            return FALSE;
        }
    }

    public function getAll(){
        $sql = 'SELECT * FROM vista_correspondencia_envio ORDER BY cod_coexenv DESC';
        $result = $this->conexion->query($sql);
        return $result;
    }

    public function consolidadoReport(){

        $codUsuario= utils::protege($this->getCodUsuario());
        $fechaInicio = utils::protege($this->getFechaEnvio()[0] . ' 00:00:00');
        $fechaFin = utils::protege($this->getFechaEnvio()[1] . ' 23:59:59');

        $sql = "SELECT * FROM vista_correspondencia_envio WHERE cod_usuario = '$codUsuario' AND fecha_envio >= '$fechaInicio' AND fecha_envio <= '$fechaFin' ORDER BY cod_coexenv ASC";
        $result = $this->conexion->query($sql);
        return $result;
    }
}