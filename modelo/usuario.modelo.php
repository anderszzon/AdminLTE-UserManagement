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

    static public function mdlGuardarUsuarios($tabla,$datos)
    {

        $stmtvar= Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, rol, nombre, foto) VALUES(:NOMBRE, :USUARIO, :PASS, :ROL, :FOTO)");

        $stmtvar->bindParam(":NOMBRE". $datos["nom_usuarios"], PDO::PARAM_STR);
        $stmtvar->bindParam(":USUARIO". $datos["nom_user"], PDO::PARAM_STR);
        $stmtvar->bindParam(":PASS". $datos["pass_user"], PDO::PARAM_STR);
        $stmtvar->bindParam(":ROL". $datos["rol_user"], PDO::PARAM_INT);
        $stmtvar->bindParam(":FOTO". $datos["foto"], PDO::PARAM_STR);


        if($stmtvar->execute()){

            return "ok";
        } else {
            echo "error";
        }

        //$stmtvar->close();
        $stmtvar = null;
    }
    
}
