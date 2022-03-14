<?php 
    session_start();
    if (!isset($_SESSION['carrito'])){
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> TIENDA DOÑA LUZ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="tienda.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/22a0b12f7b.js" crossorigin="anonymous"></script>
    <style>
    .contenedor {
        padding-top: 60px;
        padding-bottom: 100px;

    }
    </style>
</head>

<body>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container px-4 px-lg-5">

            <a class="navbar-brand" href="?">TIENDA DOÑA LUZ</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">



                    <?php
                    if (isset($_SESSION['carrito'])) {

                        if ($_SESSION['rol'] == 'ADMIN') {
                            echo '<li class="nav-item dropdown">
                                           
                                                <li class="nav-item"><a class="nav-link" aria-current="page" href="?c=vista&is=mostrarProd"> Gestionar Productos</a></li>
                                                <li class="nav-item"><a class="nav-link" aria-current="page" href="?c=vista&is=listUser"> Gestionar Usuarios</a></li>                            
                                        </li>';
                        }
                        echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="?c=vista&ca=perfil"><i class="bi-file-person me-1"></i>' . $_SESSION['name'] . '<span class="badge bg-dark text-danger ms-1 rounded-pill"></span></a></li>';
                    }
                    ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php
                        if (empty($_SESSION['user'])){
                            echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="?c=vista&is=login"><i class="bi-file-person-fill me-1"></i> Iniciar Sesion</a></li>';
                        }else{
                            echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="?c=vista&cs=login"><i class="bi-box-arrow-right me-1"></i> Cerrar Sesion</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container contenedor">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Rol</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        require 'controlador/controladorUsuario.php';
                        $usuarios = new controladorUsuario();
                        foreach ($usuarios->Listar() as $obj){
                            echo '<tr>';
                            echo '<th scope="row">'.$obj->id.'</th>';
                            echo '<td colspan="1">'.$obj->name.'</td>';
                            echo '<td>'.$obj->user.'</td>';
                            echo '<td>'.$obj->password.'</td>';
                            echo '<td>'.$obj->rol.'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <nav class="row">

            <a class="col-3 text-reset text-uppercase d-flex align-items-center">
                <img src="logo-h.png" alt="Logo" class="img-logo">

                <!-- Menu -->
                <ul class="col-5 list-unstyled">
                    <br>

                    <li><a href="?c=vista&is=sobreNosotros" class="text-reset">Más información</a></li>
                    <li><a href="?c=vista&is=contacto" class="text-reset">Contactanos</a></li>
                    <li><a href="?" class="text-reset">Politicas de privacidad</a></li>
                    <li><a href="?" class="text-reset">Condiciones de tienda Online</a></li>

                </ul>


                <!-- Menu -->
                <ul class="col-2 list-unstyled text_center">
                    <li class="font-weight-bold text-uppercase ">Vísitanos</li>
                    <br>
                    <li class="d-flex justify-content-between">
                        <a href="#" class="text-reset">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-reset">
                            <i class="fab fa-twitter"></i>
                        </a>

                        <a href="#" class="text-reset">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-reset">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </li>


                </ul>
        </nav>
        <br>
        <h6 class="center">© Copyright - 2022 | Página web Tienda Online Doña Luz | Todos los Derechos Reservados | AC
            CC
        </h6>
    </div>

</footer>

</html>