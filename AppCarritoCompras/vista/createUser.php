<!doctype html>
<html lang="en">

<head>
    <title> TIENDA DOÑA LUZ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/estilos.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/22a0b12f7b.js" crossorigin="anonymous"></script>

    <style>
    .fondoLogin {
        background-image: url("mision.png");
        background-size: cover;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container px-4 px-lg-5">

            <a class="navbar-brand" href="?">TIENDA DOÑA LUZ</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                    <li class="nav-item"><a class="nav-link" aria-current="page" href="?"><i class="bi-shop me-1"></i>
                            Ver Productos</a></li>

                    <?php
                    if (isset($_SESSION['carrito'])) {

                        if ($_SESSION['rol'] == 'ADMIN') {
                            echo '<li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi-menu-app me-1"></i> Menu Admin</a>
                                            <ul class="bg-dark dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item text-white active bg-success" href="?c=vista&p=menuProduct"><i class="bi-gear-fill me-1"></i> Gestionar Productos</a></li>
                                                <li><hr class="dropdown-divider bg-white" /></li>
                                                <li><a class="dropdown-item text-white" href="?"><i class="bi-gear-fill me-1"></i> Gestionar Usuarios</a></li>
                                                <li><hr class="dropdown-divider bg-white" /></li>
                                                <li><a class="dropdown-item text-white" href="?"><i class="bi-receipt me-1"></i> Inventarios</a></li>
                                            </ul>
                                        </li>';
                        }
                        echo '<li class="nav-item"><a class="nav-link" aria-current="page" href=""><i class="bi-file-person me-1"></i>' . $_SESSION['name'] . '<span class="badge bg-dark text-danger ms-1 rounded-pill"></span></a></li>';
                    }
                    ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php
                    if (empty($_SESSION['user'])) {
                        echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="?c=vista&is=login"><i class="bi-file-person-fill me-1"></i> Iniciar Sesion</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="?c=vista&cs=login"><i class="bi-box-arrow-right me-1"></i> Cerrar Sesion</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row m-5">
        <div class="col w-75 mt-3 mb-5 fondoLogin d-none d-md-block d-lg-block d-xl-block"></div>
        <div class="col mt-3 mb-5">
            <?php
                require_once 'modelo/clsUsuario.php';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

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



            <h1 class="px-5 pb-4" style="color: #94968E">Registrate</h1>

            <form action="" method="post">
                <div class="my-3 px-5">
                    <label for="name" class="pb-2" style="color: #94968E">Nombre de Usuario</label>
                    <input name="name" type="text" class="form-control" placeholder="Escriba su nombre">
                </div>

                <div class="my-3 px-5">
                    <label for="email" class="pb-2" style="color: #94968E">Correo Electronico</label>
                    <input name="email" type="text" class="form-control" placeholder="Escriba su correo electronico">
                </div>

                <div class="my-3 px-5">
                    <label for="password" class="pb-2" style="color: #94968E">Contraseña</label>
                    <input name="password" type="password" class="form-control" placeholder="Escriba su contraseña">
                </div>

                <div class="my-3 px-5 d-grid">
                    <input name="acceder" type="submit" value="Registrate" class="btn btn-dark pt-2">
                </div>
            </form>
        </div>
    </div>

</body>
<footer class="bg-dark text-center text-lg-start ">
    <!-- Grid container -->
    <div class=" container p-2 text-white  ">
        <!--Grid row-->
        <div class="row my-4">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <ul class="list-unstyled mb-0">
                    <li>
                        <img src="logo-h.png" alt="Logo" class="img-logo">
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">Acceso</h5>

                <ul class="list-unstyled">

                    <li>
                        <a href="?c=vista&is=sobreNosotros" class="text-reset">Más información</a>
                    </li>
                    <li>
                        <a href="?c=vista&is=contacto" class="text-reset">Contactanos</a>
                    </li>


                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">Tienda Doña Luz</h5>

                <ul class="list-unstyled">

                    <li><a href="?" class="text-reset">Politicas de privacidad</a></li>
                    <li><a href="?" class="text-reset">Condiciones de tienda Online</a></li>

                </ul>
            </div>

            <!--Grid column-->
            <div class="col-lg-3 col-md-3 mb-4 mb-md-0">
                <h5 class="text-uppercase">REDES SOCIALES</h5>

                <ul class="list-unstyled mb-0">
                    <li class="justify-content-between">
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
            </div>

        </div>

    </div>


    <!-- Copyright -->
    <div class="text-center text-muted  p-3" style="background-color: rgba(0, 0, 0, 0.2); ">
        © Copyright - 2022 | Página web Tienda Online Doña Luz | Todos los Derechos Reservados | AC
        CC
    </div>

</footer>

</html>