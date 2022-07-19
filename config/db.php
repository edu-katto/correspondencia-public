<?php

class Database{
    public static function connect(){
        $host = 'localhost';
        $userName = '';
        $password = '';
        $dataBase = '';
        $port = '3306';

        $conexion = new mysqli($host,$userName,$password,$dataBase,$port);
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}