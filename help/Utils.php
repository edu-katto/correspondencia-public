<?php
class utils{

    static function acentos($cadena){

        //Reemplazamos la A y a
        $cadena = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
            array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
            $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
            $cadena );

        //Reemplazamos la I y i
        $cadena = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $cadena );

        //Reemplazamos la O y o
        $cadena = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $cadena );

        //Reemplazamos la U y u
        $cadena = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $cadena );

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç'),
            array('N', 'n', 'C', 'c'),
            $cadena
        );

        return $cadena;
    }

    public static function protege($texto){
        $texto = str_replace("'", "\'", $texto);
        $texto = htmlspecialchars ($texto);
        $texto = htmlentities ($texto);
        $texto = trim ($texto);
        $texto = stripslashes($texto);
        return $texto;
    }

    public static function isAdmin(){
        if (!isset($_SESSION['rol']) && $_SESSION['rol'] != 1){
            header("location: ". base_url . "registerHistory/ListaRegistros");
        }else{
            return true;
        }
    }

    public static function isLoggedin(){
        if (isset($_SESSION['loggedin'])){
            header("location: ". base_url . "Coexenv/ListaEnviados");
            exit();
        }else{
            return true;
        }
    }

    public static function isSessionInit(){
        if (!isset($_SESSION['loggedin'])){
            header("location: ". base_url);
            exit();
        }else{
            return true;
        }
    }


    public static function existPOST($params){
        foreach ($params as $param) {
            if(empty($_POST[$param])){
                return false;
            }
        }
        return true;
    }

    public static function existGET($params){
        foreach ($params as $param) {
            if(!isset($_GET[$param])){
                return false;
            }
        }
        return true;
    }

    public static function verificarToken($token){
        # La API en donde verificamos el token
        $url = "https://www.google.com/recaptcha/api/siteverify";
        # Los datos que enviamos a Google
        $datos = [
            "secret" => clave_secreta,
            "response" => $token,
        ];
        // Crear opciones de la petición HTTP
        $opciones = array(
            "http" => array(
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => http_build_query($datos), # Agregar el contenido definido antes
            ),
        );
        # Preparar petición
        $contexto = stream_context_create($opciones);
        # Hacerla
        $resultado = file_get_contents($url, false, $contexto);
        # Si hay problemas con la petición (por ejemplo, que no hay internet o algo así)
        # entonces se regresa false. Este NO es un problema con el captcha, sino con la conexión
        # al servidor de Google
        if ($resultado === false) {
            # Error haciendo petición
            return false;
        }

        # En caso de que no haya regresado false, decodificamos con JSON

        $resultado = json_decode($resultado);
        # La variable que nos interesa para saber si el usuario pasó o no la prueba
        # está en success
        $pruebaPasada = $resultado->success;
        # Regresamos ese valor, y listo (sí, ya sé que se podría regresar $resultado->success)
        return $pruebaPasada;
    }

    public static function generateString($radicado){
        $r = "";
        for ($i = 0; $i < count($radicado) ; $i++){
            if (!empty($radicado[$i])){
                if (!is_numeric($radicado[$i])){
                    return FALSE;
                }
                $r .= "$radicado[$i],";
            }
        }


        return $radicado = rtrim($r,',');
    }

}
