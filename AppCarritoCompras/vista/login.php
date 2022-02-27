<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Inicio de sesión</title>
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
            .fondologin2{
                background-image:   url("recursos/bg.png");  
            }
        </style>

    </head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card col-lg-4 col-md-7 col-sm-12 fondologin2">
                
                <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        
                        $bandera = validarInicioSesion($_POST['name'], $_POST['password']); 
                        
                        if ($bandera == 'vacio') {
                            echo '<div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Error!</strong> Hay Campos vacios.
                                </div>';
                        }else if($bandera == 'incorrecto'){
                            echo '<div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Error!</strong> No existen esas credenciales registradas.
                                </div>';
                        }
                    }
                    
                ?> 
                
                <div class="card-header">
                    <h1 class="text-center text-white"><b>Bienvenid@</b></h1>
                    <div class="d-flex justify-content-center">
                        <img src="recursos/imagen1.png" alt="Responsive image" class="img-fluid bg-opacity-100" width="100" height="100"/>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img src="recursos/usuarioLogin.png" alt="Responsive image" width="30" height="30"/>
                                    </span>
                            </div>
                            <input name="name" type="text" class="form-control" placeholder="Escriba su nombre">
                        </div>
                        
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <img src="recursos/usuarioPassword.png" alt="Responsive image" width="30" height="30"/>
                                </span>
                            </div>
                            <input name="password" type="password" class="form-control" placeholder="Escriba su contraseña">
                        </div>
                        
                  
                        
                        <div class="form-group d-flex justify-content-center">
                            <input name="acceder" type="submit" value="Iniciar sesión" class="btn btn-white btn-block">
                        </div>
                    </form>
                    
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links text-white">
                        <p>¿No tienes cuenta? </p> <a href="?c=vista&u=createuser"><p> Registrate</p></a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
