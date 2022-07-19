<?php

require_once 'models/BaseModel.php';
require_once 'models/CoexenvModel.php';

class CoexenvController{

    public function Envio(){
        utils::isSessionInit();

        $select = new BaseModel();
        $dependencia = $select->getAll('dependencia');
        $tipoPaquete = $select->getAll('tipo_paquete');
        $metodoEnvio = $select->getAll('metodo_envio');
        $cargo = $select->getAll('cargo');

        require_once 'views/coexenv/send.php';
    }

    public function Save(){
        utils::isSessionInit();
        header('Content-Type: application/json');

        if (utils::existPOST([
            'nombre_remitente','dependencia','cargo','tipo_paquete','contenido',
            'nombre_destino','entidad_destino','ciudad_departamento','metodo_envio'
        ])){

            $send = new CoexenvModel();

            $otroMetodoEnvio = empty($_POST['otro_metodo_envio']) ? '' : $_POST['otro_metodo_envio'];

            $send->setCodDependencia($_POST['dependencia']);
            $send->setNombreRemitente($_POST['nombre_remitente']);
            $send->setCargo($_POST['cargo']);
            $send->setCodTipoPaquete($_POST['tipo_paquete']);
            $send->setContenido($_POST['contenido']);
            $send->setEntidadDestino($_POST['entidad_destino']);
            $send->setNombreDestinatario($_POST['nombre_destino']);
            $send->setCiudadDepartamento($_POST['ciudad_departamento']);
            $send->setCodMetodoEnvio($_POST['metodo_envio']);
            $send->setOtroMetodoEnvio($otroMetodoEnvio);
            $send->setCodUsuario($_SESSION['codUsuario']);
            $send->setFechaEnvio(date('Y-m-d H:i:s'));

            $consulta = $send->save();

            if ($consulta){
                $resultado = array(
                    "message" => "Exito al registrar datos",
                    "option" => "success"
                );
                return print(json_encode($resultado));

            }else{
                $resultado = array(
                    "message" => "Error al insertar datos",
                    "option" => "error",
                    "mysql" => $consulta
                );
                return print(json_encode($resultado));
            }

        }else{
            $resultado = array(
                "message" => "Todos los campos son obligatorios",
                "option" => "error"
            );
            return print(json_encode($resultado));
        }
    }

    public function ListaEnviados(){
        utils::isSessionInit();
        $all = new CoexenvModel();
        $enviados = $all->getAll();
        require_once 'views/coexenv/listaEnvios.php';
    }

    public function Detalle(){
        utils::isSessionInit();
        //array para guardar mensajes que se mostrar en la vista
        $message = [];

        if (utils::existGET(['cod_coexenv'])){

            $detaelOne = new CoexenvModel();
            $detaelOne->setCodCoexenv($_GET['cod_coexenv']);
            $result = $detaelOne->getOne();

            if ($result){
                require_once 'views/coexenv/detail.php';
            }else{
                //1)Titulo 2)Mensaje 3)Tipo
                array_push($message,'Error','Por favor verificar el radicado','error');
                $_SESSION['message'] = $message;
                header("Location: " . base_url . "Coexenv/ListaEnviados");
            }

        }else{
            //1)Titulo 2)Mensaje 3)Tipo
            array_push($message,'Error','Por favor verificar el radicado','error');
            $_SESSION['message'] = $message;
            header("Location: " . base_url . "Coexenv/ListaEnviados");
        }
    }

    public function Update(){
        utils::isSessionInit();
        //array para guardar mensajes que se mostrar en la vista
        $message = [];

        if (utils::existGET(['cod_coexenv'])){

            $select = new BaseModel();
            $dependencia = $select->getAll('dependencia');
            $tipoPaquete = $select->getAll('tipo_paquete');
            $metodoEnvio = $select->getAll('metodo_envio');
            $cargo = $select->getAll('cargo');

            $detalleOne = new CoexenvModel();
            $detalleOne->setCodCoexenv($_GET['cod_coexenv']);
            $result = $detalleOne->getOneCod();

            if ($result){
                require_once 'views/coexenv/update.php';
            }else{
                //1)Titulo 2)Mensaje 3)Tipo
                array_push($message,'Error','Por favor verificar el radicado','error');
                $_SESSION['message'] = $message;
                header("Location: " . base_url . "Coexenv/ListaEnviados");
            }

        }else{
            //1)Titulo 2)Mensaje 3)Tipo
            array_push($message,'Error','Por favor verificar el radicado','error');
            $_SESSION['message'] = $message;
            header("Location: " . base_url . "Coexenv/ListaEnviados");
        }
    }

    public function SaveUpdate(){
        utils::isSessionInit();
        //array para guardar mensajes que se mostrar en la vista
        $message = [];

        if (utils::existPOST([
            'cod_coexenv','dependencia','nombre_remitente','cargo','tipo_paquete',
            'contenido','entidad_destino','nombre_destino','ciudad_departamento',
            'metodo_envio']
        )){

            $update = new CoexenvModel();

            $otroMetodoEnvio = empty($_POST['otro_metodo_envio']) ? '' : $_POST['otro_metodo_envio'];

            $update->setCodCoexenv($_POST['cod_coexenv']);
            $update->setCodDependencia($_POST['dependencia']);
            $update->setNombreRemitente($_POST['nombre_remitente']);
            $update->setCargo($_POST['cargo']);
            $update->setCodTipoPaquete($_POST['tipo_paquete']);
            $update->setContenido($_POST['contenido']);
            $update->setEntidadDestino($_POST['entidad_destino']);
            $update->setNombreDestinatario($_POST['nombre_destino']);
            $update->setCiudadDepartamento($_POST['ciudad_departamento']);
            $update->setCodMetodoEnvio($_POST['metodo_envio']);
            $update->setOtroMetodoEnvio($otroMetodoEnvio);

            $consulta = $update->update();

            if ($consulta){
                //1)Titulo 2)Mensaje 3)Tipo
                array_push($message,'Buen Trabajo','Exito al actualizar registro','success');
                $_SESSION['message'] = $message;
                header("Location: " . base_url . "Coexenv/Update&cod_coexenv={$update->getCodCoexenv()}");

            }else{
                //1)Titulo 2)Mensaje 3)Tipo
                array_push($message,'Error','Error al actualizar registro','error');
                $_SESSION['message'] = $message;
                header("Location: " . base_url . "Coexenv/Update&cod_coexenv={$update->getCodCoexenv()}");
            }

        }else{
            //1)Titulo 2)Mensaje 3)Tipo
            array_push($message,'Error','Todos los datos son obligatorios','error');
            $_SESSION['message'] = $message;
            header("Location: " . base_url . "Coexenv/ListaEnviados");
        }
    }

    public function RadicadoReport(){
        utils::isSessionInit();
        $message = [];
        if (utils::existGET(['cod_coexenv'])){

            $detailOne = new CoexenvModel();
            $detailOne->setCodCoexenv($_GET['cod_coexenv']);
            $result = $detailOne->getOne();

            if ($result){

                $template = file_get_contents('views/coexenv/report/radicado.php');
                $template = str_replace("{{ radicado }}", $result->cod_coexenv, $template);
                $template = str_replace("{{ remitente }}", $result->nombre_remitente, $template);
                $template = str_replace("{{ dependencia }}", $result->dependencia, $template);
                $template = str_replace("{{ destino }}", $result->entidad_destino, $template);
                $template = str_replace("{{ nombreDestinatario }}", $result->nombre_destinatario, $template);
                $template = str_replace("{{ fechaRecibido }}", date("Y-m-d", strtotime($result->fecha_envio)), $template);
                $template = str_replace("{{ horaRecibido }}", date("H:i", strtotime($result->fecha_envio)), $template);

                $mpdf = new \Mpdf\Mpdf(['default_font_size' => 10]);
                $mpdf->WriteHTML($template);
                $mpdf->Output();

            }else{
                //1)Titulo 2)Mensaje 3)Tipo
                array_push($message,'Error','Por favor verificar el radicado','error');
                $_SESSION['message'] = $message;
                header("Location: " . base_url . "Coexenv/ListaEnviados");
            }

        }else{
            //1)Titulo 2)Mensaje 3)Tipo
            array_push($message,'Error','Por favor verificar el radicado','error');
            $_SESSION['message'] = $message;
            header("Location: " . base_url . "Coexenv/ListaEnviados");
        }

    }

    public function ConsolidadoReport(){
        utils::isSessionInit();
        $message = [];
       if (utils::existPOST(['fecha_inicio'])){

           $dataReport = new CoexenvModel();

           $fechaInicio = $_POST['fecha_inicio'];
           $fechaFin = empty($_POST['fecha_fin']) ? $fechaInicio : $_POST['fecha_fin'];

           //eviamos las fechas en el array para que se convierta en una sola variable y respetar el modelo PDO
           $fechas = array($fechaInicio,$fechaFin);

           $dataReport->setCodUsuario($_SESSION['codUsuario']);
           $dataReport->setFechaEnvio($fechas);

           $data = $dataReport->consolidadoReport();

           //con estas lineas facilitamos la creacion del archivo excel sin ayuda de una libreria
           header("Content-Type: application/xls");
           header("Content-Disposition: attachment; filename= ConsolidadoEnvio $fechaInicio - $fechaFin.xls");

           $templateConsolidado = "
           <table>
              <tr>
                <th>Consecutivo</th>
                <th>Dependencia</th>
                <th>Nombre Remitente</th>
                <th>Cargo</th>
                <th>Tipo Paquete</th>
                <th>Contenido</th>
                <th>Entidad Destino</th>
                <th>Nombre Destinatario</th>
                <th>Ciudad</th>
                <th>Metodo Envio</th>
                <th>Usuario</th>
                <th>Fecha Envio</th>
              </tr>";

            while ($registro = $data->fetch_object()){

                $metodoEnvio = $registro->metodo_envio == 'OTROS' ? 'OTRO - ' . $registro->otro_metodo_envio : $registro->metodo_envio;

                $templateConsolidado .= "
                  <tr>
                    <td>$registro->cod_coexenv</td>
                    <td>$registro->dependencia</td>
                    <td>$registro->nombre_remitente</td>
                    <td>$registro->cargo</td>
                    <td>$registro->tipo_paquete</td>
                    <td>$registro->contenido</td>
                    <td>$registro->entidad_destino</td>
                    <td>$registro->nombre_destinatario</td>
                    <td>$registro->ciudad_departamento</td>
                    <td>$metodoEnvio</td>
                    <td>$registro->usuario</td>
                    <td>$registro->fecha_envio</td>
                  </tr>
                ";
            }

           $templateConsolidado .= "</table>";
           echo $templateConsolidado; //renderizamos la tabla con los datos

       }else{
           //1)Titulo 2)Mensaje 3)Tipo
           array_push($message,'Error','Por favor verificar las fechas','error');
           $_SESSION['message'] = $message;
           header("Location: " . base_url . "Coexenv/ListaEnviados");
        }
    }
}