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
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-4">
                <img src="logo-negro.png">

                <h3 class="mt-3">Estamos felices de que estés aquí</h3>

                <div class="justificar-text py-4">
                    <h5>En enero del 2000 nace Tienda Doña Luz, es una mercado que brinda alimentos donde los clientes
                        pueden
                        comodamente tener una gran variedad para escoger. Tienda Doña Luz tiene como meta ser una gran
                        empresa de la ciudad de Popayán, buscando permanentemente prductos nuevos dando oportunidad a
                        productores locales e internacionales de comercializar y hacer conocer su marca.

                        Somos un grupo de personas emprendesoras, apasionadas por el emprendimiento y decididos a llevar
                        los
                        mejores priductos a los hogares de todos los patojos.</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <article class="card-effect">
                    <div class="card">
                        <img src="mision.png" class="card-img card-img-filter" />
                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center text-center">
                            <h4>Misión</h4>
                            <p>Ser el mejor proveedor y surtidor de mercancia. Para lograrlo, hemos establecido una
                                cultura que apoya a los miembros de nuestro equipo para que ellos puedan dar un servicio
                                excepcional a nuestros clientes.
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4 mb-md-0">
                <article class="card-effect">
                    <div class="card">
                        <img src="vision.png" class="card-img card-img-filter" />
                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center text-center">
                            <h4>Visión</h4>
                            <p>Ser la mejor tienda online y la preferida por los colombianos a la hora de realizar
                                compras por internet de todas las categorías de productos, siempre destacándose por
                                su rapidez en los envíos, confiabilidad y precios bajos.
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <article class="card-effect">
                    <div class="card">
                        <img src="ubicacion.png" alt="Ubicación" class="card-img card-img-filter" />
                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center text-center">
                            <h4>Ubicación</h4>
                            <p><iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1453.2946123650993!2d-76.59920534225094!3d2.4472249995541824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xee0983651fab4147!2zMsKwMjYnNTAuMCJOIDc2wrAzNSc1My4yIlc!5e1!3m2!1ses!2sco!4v1646342213651!5m2!1ses!2sco"
                                    width="100" height="150" style="border:0;" allowfullscreen=""
                                    loading="lazy"></iframe>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <p>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>




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