<?php 

    include "controlador/plantilla.controlador.php";
    
    include "controlador/usuario.controlador.php";

    include "modelo/usuario.modelo.php";

    $plantilla = new ControladorPlantillla();

    $plantilla->ctrPlantilla();
    
?>