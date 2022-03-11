<!DOCTYPE html>
<html lang="en">
<head>
    <title> CONTACTO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/22a0b12f7b.js" crossorigin="anonymous"></script>
</head>
<body>


    
    <!-- Navigation-->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container px-4 px-lg-5">
            
            <a class="navbar-brand" href="?">TIENDA DOÑA LUZ</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="?"><i class="bi-shop me-1"></i> Ver Productos</a></li>
                    
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
    
    <div class="card-header">
        <h3>TIENDA DOÑA LUZ, LES DA LA BIENVENIDA</h3>
    </div>         
    
    
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
    
<footer class="bg-dark text-white py-4">
    <div class="container">
        <nav class="row">

        <a href="#" class="col-3 text-reset text-uppercase d-flex align-items-center">
        <img src="logo-h.png" alt="Logo" class="img-logo">

        <!-- Menu -->
        <ul class="col-3 list-unstyled">
            <li class="font-weight-bold text-uppercase">Redes sociales</li>
            <li><a href="#" class="text-reset">Link1</a></li>
            <li><a href="#" class="text-reset">Link2</a></li>
            <li><a href="#" class="text-reset">Link3</a></li>
      

        </ul>

        <!-- Menu -->
        <ul class="col-3 list-unstyled">
            <li class="font-weight-bold text-uppercase">Redes sociales</li>
            <li><a href="#" class="text-reset">Link1</a></li>
            <li><a href="#" class="text-reset">Link2</a></li>
            <li><a href="#" class="text-reset">Link3</a></li>
        

        </ul>

        <!-- Menu -->
        <ul class="col-3 list-unstyled">
            <li class="font-weight-bold text-uppercase">Redes sociales</li>
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
    </div>
    
</footer>
</html>