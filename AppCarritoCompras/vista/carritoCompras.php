<?php
session_start();
if (!isset($_SESSION['carrito'])) {
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
        padding-top: 50px;
        padding-bottom: 85px;
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

                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="?c=vista&is=menuProduct"><i class="bi-shop me-1"></i> Ver Productos</a></li>


                    <?php
                    if (isset($_SESSION['carrito'])) {

                        if ($_SESSION['rol'] == 'ADMIN') {
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
                        echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="?c=vista&ca=carritocompras"><i class="bi-cart4 me-1"></i> Carrito de Compras<span class="badge bg-dark text-danger ms-1 rounded-pill"></span></a></li>';
                        echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="?c=vista&ca=perfil"><i class="bi-file-person me-1"></i>' . $_SESSION['name'] . '<span class="badge bg-dark text-danger ms-1 rounded-pill"></span></a></li>';
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

    <div class="container contenedor col-lg-10 col-md-8 col-sm-12">

        <div class="row">
            <h2>Productos que agregaste al carrito</h2>


            <br><br><br>
        </div>
        <div class=" table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">
                            <h4>Nombre</h4>
                        </th>
                        <th scope="col">
                            <h4>Precio($)</h4>
                        </th>
                        <th scope="col">
                            <h4>Imagen</h4>
                        </th>
                        <th scope="col">
                            <h4>Cant.(Kilo)</h4>
                        </th>
                        <th scope="col">
                            <h4>Valor($)</h4>
                        </th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    require 'modelo/clsCarritoCRUD.php';
                    $aux = new clsCarritoCRUD();
                    $totalPagar = 0;
                    foreach ($aux->Listar($_SESSION['id']) as $obj) {
                        echo '<tr>';
                        echo '<td scope="row">' . $obj->producto->name . '</td>';
                        echo '<td scope="row">' . $obj->producto->price . '</td>';
                        echo '<td><img class="img-responsive " width="50" height="50" src="data:image/jpg;base64,' . base64_encode($obj->producto->image) . '"/></td>';
                        echo '<td scope="row">' . $obj->cantidad . '</td>';
                        echo '<td scope="row">' . $obj->total . '</td>';
                        
                        echo '</tr>';
                        $totalPagar += $obj->total;
                    }
                    echo '</tbody>
            </table>      ';

                    ?>

        </div>
        <div class="row">
            <div class="col-lg-8">
                <h3>
                    Total a pagar ($): <?php echo '<pre style="display:inline">&#09;</pre>' . $totalPagar; ?>
                </h3>
            </div>
            <div class="col-lg-4">
                <a class="btn btn-success d-block" href="#">Realizar pago</a>
            </div>
        </div>
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