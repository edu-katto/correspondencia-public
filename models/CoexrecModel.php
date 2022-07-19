<?php

class CoexrecModel{
    private $codCoexrec;
    private $entidad;
    private $nombreRemitente;
    private $cargo;
    private $codDependencia;
    private $nombreDirigido;
    private $codTipoPaquete;
    private $contenido;
    private $codRecorrido;
    private $codUsuario;
    private $fechaRecepcion;
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
    public function getCodCoexrec()
    {
        return $this->codCoexrec;
    }

    /**
     * @param mixed $codCoexrec
     */
    public function setCodCoexrec($codCoexrec): void
    {
        $this->codCoexrec = $codCoexrec;
    }

    /**
     * @return mixed
     */
    public function getEntidad()
    {
        return $this->entidad;
    }

    /**
     * @param mixed $entidad
     */
    public function setEntidad($entidad): void
    {
        $this->entidad = $entidad;
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
    public function getNombreDirigido()
    {
        return $this->nombreDirigido;
    }

    /**
     * @param mixed $nombreDirigido
     */
    public function setNombreDirigido($nombreDirigido): void
    {
        $this->nombreDirigido = $nombreDirigido;
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
    public function getCodRecorrido()
    {
        return $this->codRecorrido;
    }

    /**
     * @param mixed $codRecorrido
     */
    public function setCodRecorrido($codRecorrido): void
    {
        $this->codRecorrido = $codRecorrido;
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
    public function getFechaRecepcion()
    {
        return $this->fechaRecepcion;
    }

    /**
     * @param mixed $fechaRecepcion
     */
    public function setFechaRecepcion($fechaRecepcion): void
    {
        $this->fechaRecepcion = $fechaRecepcion;
    }

    public function save(){
        $entidad = utils::protege(utils::acentos($this->getEntidad()));
        $nombreRemitente = utils::protege(utils::acentos($this->getNombreRemitente()));
        $cargo = utils::protege(utils::acentos($this->getCargo()));
        $codDependencia = utils::protege($this->getCodDependencia());
        $nombreDirigido = utils::protege(utils::acentos($this->getNombreDirigido()));
        $codTipoPaquete = utils::protege($this->getCodTipoPaquete());
        $contenido = utils::protege(utils::acentos($this->getContenido()));
        $codRecorrido = utils::protege($this->getCodRecorrido());
        $codUsuario = utils::protege($this->getCodUsuario());
        $fechaRecepcion = utils::protege($this->getFechaRecepcion());

        $sql = "INSERT INTO coexrec VALUES(NULL,'$entidad','$nombreRemitente','$cargo',
                                            '$codDependencia','$nombreDirigido','$codTipoPaquete',
                                            '$contenido','$codRecorrido','$codUsuario','$fechaRecepcion')";

        $save = $this->conexion->query($sql);

        if ($save == false){
            return $this->conexion->error;
        }else{
            return TRUE;
        }
    }

    public function update(){

        $codCoexrec = utils::protege($this->getCodCoexrec());
        $entidad = utils::protege(utils::acentos($this->getEntidad()));
        $nombreRemitente = utils::protege(utils::acentos($this->getNombreRemitente()));
        $cargo = utils::protege(utils::acentos($this->getCargo()));
        $codDependencia = utils::protege($this->getCodDependencia());
        $nombreDirigido = utils::protege(utils::acentos($this->getNombreDirigido()));
        $codTipoPaquete = utils::protege($this->getCodTipoPaquete());
        $contenido = utils::protege(utils::acentos($this->getContenido()));
        $codRecorrido = utils::protege($this->getCodRecorrido());

        $sql = "UPDATE coexrec SET entidad = '$entidad', nombre_remitente = '$nombreRemitente', cargo = '$cargo',
                                    cod_dependencia = '$codDependencia', nombre_dirigido = '$nombreDirigido',
                                    cod_tipo_paquete = '$codTipoPaquete', contenido = '$contenido',
                                    cod_recorrido = '$codRecorrido' WHERE cod_coexrec = '$codCoexrec'";

        $update = $this->conexion->query($sql);

        if ($update == FALSE){
            return $this->conexion->error;
        }else{
            return TRUE;
        }
    }

    public function getReceive(){

        $entidad = utils::protege(utils::acentos($this->getEntidad()));
        $nombreRemitente = utils::protege(utils::acentos($this->getNombreRemitente()));
        $cargo = utils::protege(utils::acentos($this->getCargo()));
        $codDependencia = utils::protege($this->getCodDependencia());
        $nombreDirigido = utils::protege(utils::acentos($this->getNombreDirigido()));
        $codTipoPaquete = utils::protege($this->getCodTipoPaquete());
        $contenido = utils::protege(utils::acentos($this->getContenido()));
        $codRecorrido = utils::protege($this->getCodRecorrido());
        $codUsuario = utils::protege($this->getCodUsuario());
        $fechaRecepcion = utils::protege($this->getFechaRecepcion());

        $sql = "SELECT cod_coexrec FROM coexrec WHERE entidad = '$entidad' AND nombre_remitente = '$nombreRemitente' AND cargo = '$cargo' 
                                                        AND cod_dependencia = '$codDependencia' AND nombre_dirigido = '$nombreDirigido' 
                                                        AND cod_tipo_paquete = '$codTipoPaquete' AND contenido = '$contenido' 
                                                        AND cod_recorrido = '$codRecorrido' AND cod_usuario = '$codUsuario' AND fecha_recepcion = '$fechaRecepcion'";
        $search = $this->conexion->query($sql);

        if ($search->num_rows >= 1){
            return $search->fetch_object();
        }else{
            return FALSE;
        }
    }

    public function getAll(){
        $sql = 'SELECT * FROM vista_correspondecia_recibida ORDER BY cod_coexrec DESC';
        $result = $this->conexion->query($sql);
        return $result;
    }

    public function getOne(){
        $codCoexrec = utils::protege($this->getCodCoexrec());
        $sql = "SELECT * FROM vista_correspondecia_recibida WHERE cod_coexrec = '$codCoexrec'";
        $result = $this->conexion->query($sql);

        if ($result->num_rows >= 1){
            return $result->fetch_object();
        }else{
            return FALSE;
        }
    }

    public function getOneCod(){
        $codCoexrec = utils::protege($this->getCodCoexrec());
        $sql = "SELECT * FROM coexrec WHERE cod_coexrec = '$codCoexrec'";
        $result = $this->conexion->query($sql);

        if ($result->num_rows >= 1){
            return $result->fetch_object();
        }else{
            return FALSE;
        }
    }

    public function createReport(){
        $codCoexrecInicial = utils::protege($this->getCodCoexrec()[0]);
        $codCoexrecFinal = utils::protege($this->getCodCoexrec()[1]);
        $sql = "SELECT * FROM vista_correspondecia_recibida v WHERE v.cod_coexrec BETWEEN $codCoexrecInicial AND $codCoexrecFinal ORDER BY v.dependencia";
        $result = $this->conexion->query($sql);

        if ($result->num_rows >= 1){
            return $result;
        }else{
            return FALSE;
        }
    }

    public function consolidadoReport(){

        $codUsuario= utils::protege($this->getCodUsuario());
        $fechaInicio = utils::protege($this->getFechaRecepcion()[0] . ' 00:00:00');
        $fechaFin = utils::protege($this->getFechaRecepcion()[1] . ' 23:59:59');

        $sql = "SELECT * FROM vista_correspondecia_recibida WHERE cod_usuario = '$codUsuario' AND fecha_recepcion >= '$fechaInicio' AND fecha_recepcion <= '$fechaFin' ORDER BY cod_coexrec ASC";
        $result = $this->conexion->query($sql);
        return $result;
    }

}