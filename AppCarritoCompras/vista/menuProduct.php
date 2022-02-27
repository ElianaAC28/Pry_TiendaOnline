<?php 
    session_start();
    if (!isset($_SESSION['carrito'])){
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> TIENDA VIRTUAL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        .contenedor{
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
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="?"><i class="bi-shop me-1"></i> Ver Productos</a></li>
                    
                    <?php
                        if (isset($_SESSION['carrito'])){
                            
                            if ($_SESSION['rol']=='ADMIN'){
                                echo '<li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi-menu-app me-1"></i> Menu Admin</a>
                                            <ul class="bg-dark dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item text-white active bg-success" href="?c=vista&p=menuProduct"><i class="bi-gear-fill me-1"></i> Gestionar Productos</a></li>
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
    
    
    
    
    <div class="container contenedor col-lg-10 col-md-8 col-sm-12">
        
        <div class="row">
            <div class="col-sm-6">
                <h3>
                    Lista de Producto 
                </h3>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-success d-block" href="?c=vista&p=createProduct">Agregar Nuevo Producto</a>
            </div>
            <br><br><br>
        </div>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr class="table-warning">
                        <th scope="col"><h4>NAME</h4></th>
                        <th scope="col"><h4>PRICE</h4></th>
                        <th scope="col"><h4>IMAGE</h4></th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                        
                        require 'modelo/clsProductoCRUD.php';
                        $productos = new clsProductoCRUD();
                        foreach ($productos->Listar() as $obj){
                            echo '<tr>';
                            echo '<td scope="row">'.$obj->name.'</td>';
                            echo '<td colspan="1">'.$obj->price.'</td>';
                            echo '<td><img class="img-responsive " width="50" height="50" src="data:image/jpg;base64,'.base64_encode($obj->image).'"/></td>';
                            echo '<td>'
                            .'<ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                                <a class="nav-link" aria-current="page" href="?c=vista&p=updateProduct&cod='.$obj->cod.'">
                                    <i class="bi-pencil-square me-1"></i>
                                </a>
                             </ul>'
                            .'</td>';
                            
                            echo '<td>
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                                <a class="nav-link" aria-current="page" data-bs-toggle="modal" data-bs-target="#miModal'.$obj->cod.'" href="#miModal">
                                    <i class="bi-trash me-1"></i>
                                </a>
                                </ul>
                                <div id="miModal'.$obj->cod.'" class="modal fade" tabindex="-1" role="dialog" data-bs-backdrop="static">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Eliminar Producto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <p>¿Realmente quiere eliminar el producto?.<br>
                                                ***Informacion del producto a eliminar***<br>
                                                    '.$obj->toString().'
                                              </p>
                                            </div>
                                            <div class="modal-footer">
                                              <a class="btn btn-primary" href="?c=vista&de=deleteProduct&cod='.$obj->cod.'"> Si</a>
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div></td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>        
        </div>
            
    </div>
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>