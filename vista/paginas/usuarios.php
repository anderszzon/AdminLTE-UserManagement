<div class="content-wrapper" style="min-height: 717px;">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>USUARIOS</h1>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card card-info card-outline">

                        <div class="card-header">

                            <button type="button" class="btn btn-success crear-perfil" data-toggle="modal"
                                    data-target="#modal-crear-perfil">   <!-- ID --->
                                    Crear nuevo usuario
                            </button> <br>

                        </div> <br>

                        <div class="card-body">

                            <table class="table table-bordered table-striped dt-responsive tablaperfil" width="100%">

                                <thead>

                                    <tr>

                                        <th style="width:10px;">#</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Rol</th>
                                        <th>Foto</th>
                                        <th>Acciones</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php  ?>

                                    <?php

                                        foreach($usuarios as $key => $value){

                                    ?>

                                        <tr>
                                            
                                            <td> <?php echo ($key+1) ?></td>
                                            <td> <?php echo $value["nombre"] ?></td>
                                            <td> <?php echo $value["usuario"] ?></td>
                                            <td> <?php echo $value["rol"] ?></td>
                                            <td> <?php echo $value["foto"] ?></td>
                                            <!--<td> <button class="btn btn-info btn-sm">Activo</button></td>-->
                                            <td></td>
                                            
                                        </tr>

                                    <?php

                                    
                                    }
                                                                        

                                    ?>

                                </tbody>


                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<div class="modal modal-default fade" id="modal-crear-perfil">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible">Agregar Nuevo Usuario</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_usuarios" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_user" placeholder="usuario">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="password" class="form-control" name="pass_user" placeholder="password">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de perfil
                        <input type="file" name="subirImgusuarios">
                    </div>
                    <img class="previsualizarImgPerfil img-fluid py-2" width="200" height="200">
                    <p class="help-block small">Dimensiones: 480px * 382px Peso Max. 2MB Formato: JPG o PNG</p>
                </div>

                <div class="form-group has-feedback">
                    <label>Rol</label>
                    <select class="form-control" name="cat_user" required>
                                    <option value="1">admin</option>
                                    <option value="2">vendedor</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

                <?php

                    $guardarusuarios = new ctrUsuarios();
                    $guardarusuarios->ctrGuardarusuarios();

                ?>
                
            </form>

        </div>

    </div>


</div>