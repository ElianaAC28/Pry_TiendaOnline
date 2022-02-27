<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Creacion de un portal con PHP</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="shortcut icon" href="recursos/icono-iniciar-sesion.png">
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style>
            body{
                padding-top: 50px; 
                padding-bottom: 85px;
                background-image: url("recursos/fondologin.png");
            }
        </style>

    </head>
<body>      
        <div class="container col-lg-4 col-md-8 col-sm-12">
            <?php 
                require_once 'modelo/clsUsuario.php';
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    
                    $obj = new clsUsuario();
                    $obj->__SET('name', $_POST['name']);
                    $obj->__SET('password', $_POST['password']);
                    $obj->__SET('user', $_POST['user']);
                    $obj->__SET('rol', $_POST['rol']);
                    
                    
                    if (!validarAgregarUsuario($obj)) {
                        echo '<div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Error!</strong> Hay campos vacios.
                            </div>';
                    }
                }

            ?> 
            <h1 class="text-primary text-center">Crea una cuenta </h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputName">Nombre</label>
                    <input name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Escriba su nombre">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo Electrónico</label>
                    <input name="user" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escriba su correo electrónico">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Seleccione Rol</label>
                    <select name="rol" class="form-control" id="exampleFormControlSelect1">
                        <option>ADMIN</option>
                        <option>NO-ADMIN</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Escriba su contraseña">
                </div>
               <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">¿Recordar?</label>
                </div>-->
                <button type="submit" class="btn btn-primary btn-block">Crear cuenta</button>
            </form>
        </div>
</body>
</html>