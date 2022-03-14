<!DOCTYPE html>
<html lang="en">

<head>
    <title> TIENDA VIRTUAL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <link rel="shortcut icon" href="tienda.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/22a0b12f7b.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container px-4 px-lg-5">

            <a class="navbar-brand" href="?">TIENDA ONLINE</a>

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



    <section class="py-5">
        <div class="container px-4 px-lg-4 mt-2">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 justify-content-center">


                <?php 
                    require 'controlador/controladorProducto.php';
                    $aux = new controladorProducto();
                    foreach ($aux->Listar() as $obj){
                        $sentencia = '
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <div class="card h-100" >
                                        <img class="img-responsive card-img-top" width="100" height="180" src="data:image/jpg;base64,'.base64_encode($obj->image).'" alt="..." />
                                    </div>
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">'.$obj->name.'</h5>
                                            <!-- Product price-->
                                            $'.$obj->price.'
                                        </div>
                                    </div>
                                ';
                        
                        if (!empty($_SESSION['user'])){
                            $sentencia = $sentencia.'
                                <!-- Product actions-->
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="btn-add" class="text-center"><a class="btn btn-dark" href="?c=agregar&cod='.$obj->cod.'">Agregar al carrito</a></div>
                                        </div>
                                    </div>
                                </div>';
                        }else{
                            $sentencia = $sentencia.'</div></div>';
                        }
                        
                        echo $sentencia;
                    }
                ?>


            </div>
        </div>
    </section>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>