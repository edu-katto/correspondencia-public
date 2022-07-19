<?php
require_once 'models/CoexrecModel.php';
require_once 'models/BaseModel.php';

class CoexrecController{

    public function Recibir(){
        utils::isSessionInit();
        //invocamos el modelo BaseModels para hacer el llenado de las select
        $select = new BaseModel();

        $cargo = $select->getAll('cargo');
        $dependencia = $select->getAll('dependencia');
        $tipoPaquete = $select->getAll('tipo_paquete');
        $recorrido = $select->getAll('recorrido');

        //Vista
        require_once 'views/coexrec/receive.php';
    }

    public function Save(){
        utils::isSessionInit();
        header('Content-Type: application/json');

        if (utils::existPOST([
            'entidad','nombre_remitente','cargo_remitente','nombre_dirigido',
            'dependencia','tipo_paquete','contenido','recorrido'
        ])){

            $save = new CoexrecModel();

            $save->setEntidad($_POST['entidad']);
            $save->setNombreRemitente($_POST['nombre_remitente']);
            $save->setCargo($_POST['cargo_remitente']);
            $save->setCodDependencia($_POST['dependencia']);
            $save->setNombreDirigido($_POST['nombre_dirigido']);
            $save->setCodTipoPaquete($_POST['tipo_paquete']);
            $save->setContenido($_POST['contenido']);
            $save->setCodRecorrido($_POST['recorrido']);
            $save->setCodUsuario($_SESSION['codUsuario']);
            $save->setFechaRecepcion(date('Y-m-d H:i:s'));

            $consulta = $save->save();

            if ($consulta){
                $codRecibido = $save->getReceive();
                $resultado = array(
                    "message" => "Envio recibido con exito",
                    "option" => "success",
                    "text" => "Radicado: $codRecibido->cod_coexrec"
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
                "message" => "Todos los datos son obligatorios",
                "option" => "error"
            );
            return print(json_encode($resultado));
        }
    }

    public function ListaRecibidos(){
        utils::isSessionInit();
        $all = new CoexrecModel();
        $recibidos = $all->getAll();
        require_once 'views/coexrec/listaRecibidos.php';
    }

    public function CreateReport(){
        utils::isSessionInit();
        $message = [];

        if (utils::existPOST(['radicado_inicial'])) {

            $radicadoInicial = $_POST['radicado_inicial'];
            $radicadoFinal = empty($_POST['radicado_final']) ? $radicadoInicial : $_POST['radicado_final'];
            $radicado = array($radicadoInicial, $radicadoFinal);

            $getAll = new CoexrecModel();
            $getAll->setCodCoexrec($radicado);
            $reportData = $getAll->createReport();

            if ($reportData){
                require_once 'views/coexrec/report/report.php';

            }else{
                //1)Titulo 2)Mensaje 3)Tipo
                array_push($message,'Error','Por favor verificar los radicados','error');
                $_SESSION['message'] = $message;
                header("location: ". base_url . "Coexrec/ListaRecibidos");
            }

        }else{
            //1)Titulo 2)Mensaje 3)Tipo
            array_push($message,'Error','Por favor verificar los radicados','error');
            $_SESSION['message'] = $message;
            header("location: ". base_url . "Coexrec/ListaRecibidos");
        }
    }

    public function Detalle(){
        utils::isSessionInit();
        $message = [];

        if (utils::existGET(['cod_coexrec'])){

            $detailOne = new CoexrecModel();
            $detailOne->setCodCoexrec($_GET['cod_coexrec']);
            $result = $detailOne->getOne();

            if ($result){
                require_once 'views/coexrec/detail.php';
            }else{
                //1)Titulo 2)Mensaje 3)Tipo
                array_push($message,'Error','Por favor verificar el radicado','error');
                $_SESSION['message'] = $message;
                header("location: ". base_url . "Coexrec/ListaRecibidos");
            }

        }else{
            //1)Titulo 2)Mensaje 3)Tipo
            array_push($message,'Error','Por favor verificar el radicado','error');
            $_SESSION['message'] = $message;
            header("location: ". base_url . "Coexrec/ListaRecibidos");
        }
    }

    public function Update(){
        utils::isSessionInit();
        $message = [];

        if (utils::existGET(['cod_coexrec'])){

            $detalleOne = new CoexrecModel();
            $detalleOne->setCodCoexrec($_GET['cod_coexrec']);
            $result = $detalleOne->getOneCod();

            //invocamos el modelo BaseModels para hacer el llenado de las select
            $select = new BaseModel();

            $cargo = $select->getAll('cargo');
            $dependencia = $select->getAll('dependencia');
            $tipoPaquete = $select->getAll('tipo_paquete');
            $recorrido = $select->getAll('recorrido');

            if ($result){
                require_once  'views/coexrec/update.php';
            }else{
                //1)Titulo 2)Mensaje 3)Tipo
                array_push($message,'Error','Por favor verificar el radicado','error');
                $_SESSION['message'] = $message;
                header("location: ". base_url . "Coexrec/ListaRecibidos");
            }

        }else{
            //1)Titulo 2)Mensaje 3)Tipo
            array_push($message,'Error','Por favor verificar el radicado','error');
            $_SESSION['message'] = $message;
            header("location: ". base_url . "Coexrec/ListaRecibidos");
        }
    }

    public function SaveUpdate(){
        utils::isSessionInit();
        $message = [];

        if (utils::existPOST([
            'entidad','nombre_remitente','cargo_remitente','nombre_dirigido',
            'dependencia','tipo_paquete','contenido','recorrido','cod_coexrec'
        ])){

            $update = new CoexrecModel();

            $update->setCodCoexrec($_POST['cod_coexrec']);
            $update->setEntidad($_POST['entidad']);
            $update->setNombreRemitente($_POST['nombre_remitente']);
            $update->setCargo($_POST['cargo_remitente']);
            $update->setCodDependencia($_POST['dependencia']);
            $update->setNombreDirigido($_POST['nombre_dirigido']);
            $update->setCodTipoPaquete($_POST['tipo_paquete']);
            $update->setContenido($_POST['contenido']);
            $update->setCodRecorrido($_POST['recorrido']);

            $consulta = $update->update();

            if ($consulta){
                //1)Titulo 2)Mensaje 3)Tipo
                array_push($message,'Buen Trabajo','Exito al actualizar registro','success');
                $_SESSION['message'] = $message;
                header("Location: " . base_url . "Coexrec/Update&cod_coexrec={$update->getCodCoexrec()}");
            }else{
                //1)Titulo 2)Mensaje 3)Tipo
                array_push($message,'Error','Error al actualizar registro','error');
                $_SESSION['message'] = $message;
                header("Location: " . base_url . "Coexenv/Update&cod_coexenv={$update->getCodCoexenv()}");
            }

        }else{

        }
    }

    public function RadicadoReport(){
        utils::isSessionInit();
        $message = [];

        if (utils::existGET(['cod_coexrec'])){

            $detailOne = new CoexrecModel();
            $detailOne->setCodCoexrec($_GET['cod_coexrec']);
            $result = $detailOne->getOne();

            if ($result){

                $template = file_get_contents('views/coexrec/report/radicado.php');
                $template = str_replace("{{ radicado }}", $result->cod_coexrec, $template);
                $template = str_replace("{{ fechaRecibido }}", date("Y-m-d", strtotime($result->fecha_recepcion)), $template);
                $template = str_replace("{{ horaRecibido }}", date("H:i", strtotime($result->fecha_recepcion)), $template);
                $template = str_replace("{{ recibe }}", $result->dependencia, $template);

                $mpdf = new \Mpdf\Mpdf(['default_font_size' => 10]);
                $mpdf->WriteHTML($template);
                $mpdf->Output();

            }else{
                //1)Titulo 2)Mensaje 3)Tipo
                array_push($message,'Error','Por favor verificar el radicado','error');
                $_SESSION['message'] = $message;
                header("location: ". base_url . "Coexrec/ListaRecibidos");
            }

        }else{
            //1)Titulo 2)Mensaje 3)Tipo
            array_push($message,'Error','Por favor verificar el radicado','error');
            $_SESSION['message'] = $message;
            header("location: ". base_url . "Coexrec/ListaRecibidos");
        }

    }

    public function ConsolidadoReport(){
        utils::isSessionInit();
        $message = [];

        if (utils::existPOST(['fecha_inicio'])){

            $dataReport = new CoexrecModel();

            $fechaInicio = $_POST['fecha_inicio'];
            $fechaFin = empty($_POST['fecha_fin']) ? $fechaInicio : $_POST['fecha_fin'];

            //eviamos las fechas en el array para que se convierta en una sola variable y respetar el modelo PDO
            $fechas = array($fechaInicio,$fechaFin);

            $dataReport->setCodUsuario($_SESSION['codUsuario']);
            $dataReport->setFechaRecepcion($fechas);

            $data = $dataReport->consolidadoReport();

            //con estas lineas facilitamos la creacion del archivo excel sin ayuda de una libreria
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename= ConsolidadoRecibido $fechaInicio - $fechaFin.xls");

            $templateConsolidado = "
            <table>
              <tr>
                <th>Consecutivo</th>
                <th>Entidad</th>
                <th>Nombre Remitente</th>
                <th>Cargo</th>
                <th>Dependencia</th>
                <th>Nombre Dirigido</th>
                <th>Tipo Paquete</th>
                <th>Contenido</th>
                <th>Recorrido</th>
                <th>Usuario</th>
                <th>Fecha Recepcion</th>
              </tr>";

            while ($registro = $data->fetch_object()){

                $templateConsolidado .= "
                  <tr>
                    <td>$registro->cod_coexrec</td>
                    <td>$registro->entidad</td>
                    <td>$registro->nombre_remitente</td>
                    <td>$registro->cargo</td>
                    <td>$registro->dependencia</td>
                    <td>$registro->nombre_dirigido</td>
                    <td>$registro->tipo_paquete</td>
                    <td>$registro->contenido</td>
                    <td>$registro->recorrido</td>
                    <td>$registro->usuario</td>
                    <td>$registro->fecha_recepcion</td>
                  </tr>
                ";
            }

            $templateConsolidado .= "</table>";
            echo $templateConsolidado; //renderizamos la tabla con los datos

        }else{
            //1)Titulo 2)Mensaje 3)Tipo
            array_push($message,'Error','Por favor verificar las fechas','error');
            $_SESSION['message'] = $message;
            header("location: ". base_url . "Coexrec/ListaRecibidos");
        }
    }
}