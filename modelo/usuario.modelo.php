<?php

require_once "conexion.php";

class mdlUsuarios
{

    static public function mdlMostrarUsuarios($tabla)
    {

        $stmtvar= Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmtvar->execute();

        return $stmtvar->fetchAll();

        $stmtvar->close();

        $stmtvar = null;

    }
}
