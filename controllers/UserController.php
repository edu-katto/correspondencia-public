<?php
require_once 'models/UserModel.php';

class UserController{
    public function Login(){
        utils::isLoggedin();
        require_once 'views/user/login.php';
    }

    public function CheckLogin(){
        utils::isLoggedin();
        header('Content-Type: application/json');
        if (utils::existPOST(['usuario','clave','g-recaptcha-response'])){

            $token = $_POST["g-recaptcha-response"];
            if (utils::verificarToken($token)){
                $usuario = $_POST['usuario'];
                $clave = $_POST['clave'];

                $user = new UserModel();
                $user->setUsuario($usuario);
                $user->setClave($clave);
                $userData = $user->login();

                if ($userData){
                    $_SESSION['loggedin'] = true;
                    $_SESSION['codUsuario'] = $userData->cod_usuario;
                    $_SESSION['usuario'] = $userData->usuario;
                    $_SESSION['nombre'] = $userData->nombre;
                    $_SESSION['rol'] = $userData->cod_rol;

                    $resultado = array(
                        "message" => "exito al iniciar sesion",
                        "url" => base_url . "Coexenv/ListaEnviados"
                    );
                    return print(json_encode($resultado));

                }else{
                    $resultado = array(
                        "message" => "Usuario o clave incorrectas",
                        "option" => "error"
                    );
                    return print(json_encode($resultado));
                }

            }else{
                $resultado = array(
                    "message" => "Error al realizar reCAPTCHA",
                    "option" => "error"
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

    public function Logout(){

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        header("location: ". base_url . "User/Login");
    }
}