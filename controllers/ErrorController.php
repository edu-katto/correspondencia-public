<?php

class errorController{

    public function error404(){
        //invocamos la vista
        require_once 'views/error/404.php';
    }

    public function error403(){
        //invocamos la vista
        require_once 'views/error/403.php';
    }
}