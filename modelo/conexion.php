<?php

    class Conexion{

        static public function conectar(){

            $link = new PDO("mysql:host=localhost;dbname=Adminlte","root","");

            $link->exec("set names utf8mb4");

            return $link; // Devuelve la conexión

        }
    }

?>