<!DOCTYPE html>
<html lang="en">

<head>
    <title> TIENDA DOÑA LUZ</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="shortcut icon" href="tienda.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/22a0b12f7b.js" crossorigin="anonymous"></script>

    <style>
    .fondoLogin {
        background-image: url("imgContact.png");
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

                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="?c=vista&is=menuProduct"><i class="bi-shop me-1"></i> Ver Productos</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="?c=vista&is=sobreNosotros"><i class="bi bi-house-door"></i> Sobre Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="?c=vista&is=contacto"><i
                                class="bi bi-telephone"></i> Contacto </a></li>

                    <?php
                        session_start();
                        if (isset($_SESSION['carrito'])){
                            
                            if ($_SESSION['rol']=='ADMIN'){
                                echo '<li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi-menu-app me-1"></i> Menu Admin</a>
                                            <ul class="bg-dark dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item text-white" href="?c=vista&p=menuProduct"><i class="bi-gear-fill me-1"></i> Gestionar Productos</a></li>
                                                <li><hr class="dropdown-divider bg-white" /></li>
                                                <li><a class="dropdown-item text-white" href="?c=vista&p=listUser"><i class="bi-gear-fill me-1"></i> Gestionar Usuarios</a></li>
                                                <li><hr class="dropdown-divider bg-white" /></li>
                                                <li><a class="dropdown-item text-white" href="?"><i class="bi-receipt me-1"></i> Inventarios</a></li>
                                            </ul>
                                        </li>';
                            }
                            echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="?c=vista&ca=carritocompras"><i class="bi-cart4 me-1"></i> Carrito de Compras<span class="badge bg-dark text-danger ms-1 rounded-pill"></span></a></li>';
                            echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="?c=vista&ca=perfil"><i class="bi-file-person me-1"></i>'.$_SESSION['name'].'<span class="badge bg-dark text-danger ms-1 rounded-pill"></span></a></li>';
                        
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



    <div class="row m-5">
        <div class="col w-75 mt-3 mb-5 fondoLogin d-none d-md-block d-lg-block d-xl-block"></div>
        <div class="col mt-3 mb-2">

            <h1 class=" px-5 pb-1 style=color: #94968E">Contactanos</h1>
            <h3 class=" px-5 pb-1 style=color: #94968E">Envianos tus datos y nosotros te contactaremos</h3>

            <form action="https://formspree.io/f/mqknbrng" method="POST">

                <div class="my-3 px-5">
                    <label for="name" class="pb-2" style="color: #94968E">Nombre de Usuario</label>
                    <input type="text" class="form-control" placeholder="Escriba su nombre " name="name">
                </div>

                <div class="my-3 px-5">
                    <label for="password" class="pb-2" style="color: #94968E">Correo electronico</label>
                    <input type="email" class="form-control" placeholder="Escriba su correo electronico:" name="email">
                </div>

                <div class="my-3 px-5 d-grid">
                    <label for="password" class="pb-2" style="color: #94968E">Mensaje: </label>
                    <textarea class="form_input form__input--message" placeholder="Escriba aquí su mensaje"
                        name="message"></textarea>
                </div>

                <div class="my-3 px-5 d-grid">


                    <input name="acceder" type="submit" value="Enviar" class="btn btn-dark pt-2">
                </div>


            </form>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

<footer class="bg-dark text-center text-lg-start ">
    <!-- Grid container -->
    <div class=" container p-2 text-white">
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