<?php

    class ctrUsuarios{

        static public $tabla = "usuarios"; // Propiedad estática

        static public function ctrMostrarUsuarios(){
            //$tabla="usuarios";
            $respuesta=mdlUsuarios::mdlMostrarUsuarios(self::$tabla);
            return $respuesta;
        }

        static public function ctrGuardarusuarios(){
            if(isset($_POST["nom_usuarios"])){

                if(isset($_FILES["subirImgusuarios"]["tmp_name"]) && !empty($_FILES["subirImgusuarios"]["tmp_name"])){  

                    list($ancho, $alto) = getimagesize($_FILES["subirImgusuarios"]["tmp_name"]);

                    $nuevoAncho = 480;
                    $nuevoAlto = 382;

                    // SE CREA LA RUTA DONDE SE VA ALOJAR LAS IMAGENES
                    $directorio = "vista/imagenes/usuarios";

                        if($_FILES["subirImgusuario"]["type"] = "image/jpeg"){

                            $aleatorio = mt_rand(100,999);  // GENERA NUMEROS ALEATORIOS PARA RENOMBRAR LA IMAGEN
 
                            $ruta = $directorio."/".$aleatorio.".jpg";  //CONCATENAR

                            $origen = imagecreatefromjpeg($_FILES["subirImgusuarios"]["tmp_name"]);

                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);  // AJUSTAR EL TAMAÑO

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);   //RECORTAR TODA LA IMAGEN

                            imagejpeg($destino, $ruta);

                        }

                        if($_FILES["subirImgusuario"]["type"] = "image/png"){

                            $aleatorio = mt_rand(100,999);  // GENERA NUMEROS ALEATORIOS PARA RENOMBRAR LA IMAGEN
 
                            $ruta = $directorio."/".$aleatorio.".jpg";  //CONCATENAR

                            $origen = imagecreatefrompng($_FILES["subirImgusuarios"]["tmp_name"]);

                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);  // AJUSTAR EL TAMAÑO

                            imagealphablending($destino, FALSE);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);   //RECORTAR TODA LA IMAGEN

                            imagepng($destino, $ruta);

                        } else {


                            echo'<script>
                            
                                swal({
                                    type:"error",
                                    title: "Corregir",
                                    text: "Solo se pueden cargar formatos JPG y/o PNG",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){
                                
                                    if(result.value){
                                        history.back();
                                    }
                                
                                });
                                
                            </script>';

                            return;

                        }

                        $encriptarPassword = crypt($_POST["pass_user"],'$2a$07$usesomesillystringforsalt$');  //ENCRIPTAR CONTRASEÑA

                        $datos = array("nom_usuarios"=>$_POST["nom_usuarios"],
                                        "nom_user"=>$_POST["nom_user"],
                                        "pass_user"=> $encriptarPassword,
                                        "rol_user"=> $_POST["rol_user"],
                                        "foto"=>$ruta);


                        var_dump($datos);
                        echo "</pre>"; print_r($datos); echo "</pre";

                        $respuesta=mdlUsuarios::mdlGuardarUsuarios(self::$tabla,$datos);


                }
            }
        }
    }


?>