<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> TIENDA DOÑA LUZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="tienda.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <title>Inicio de sesión</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="recursos/icono-iniciar-sesion.png">

    <style>
    .fondoLogin {
        background-image: url("fondoLogin.jpg");
        background-size: cover;
    }
    </style>

</head>

<body>
    <div class="row m-5">
        <div class="col w-75 mt-3 mb-5 fondoLogin d-none d-md-block d-lg-block d-xl-block"></div>
        <div class="col mt-3 mb-5">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $bandera = validarInicioSesion($_POST['name'], $_POST['password']);

                    if ($bandera == 'vacio') {
                        echo '<div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Error!</strong> Hay Campos vacios.
                                    </div>';
                    } else if ($bandera == 'incorrecto') {
                        echo '<div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Error!</strong> No existen esas credenciales registradas.
                                    </div>';
                    }
                }

                ?>

            <h1 class="px-5 pb-4" style="color: #94968E">Iniciar Sesión</h1>

            <form action="" method="post">
                <div class="my-3 px-5">
                    <label for="name" class="pb-2" style="color: #94968E">Nombre de Usuario</label>
                    <input name="name" type="text" class="form-control hidden-xs" placeholder="Escriba su nombre">
                </div>

                <div class="my-3 px-5">
                    <label for="password" class="pb-2" style="color: #94968E">Contraseña</label>
                    <input name="password" type="password" class="form-control hidden-xs"
                        placeholder="Escriba su contraseña">
                </div>

                <div class="my-3 px-5 d-grid">
                    <input name="acceder" type="submit" value="Iniciar sesión" class="btn btn-dark pt-2">
                </div>
            </form>

            <div class="my-3 text-center">
                <p>¿No tienes cuenta?<a href="?c=vista&u=createuser"> Registrate</a></p>
            </div>

        </div>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/22a0b12f7b.js" crossorigin="anonymous"></script>

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