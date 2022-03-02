<!DOCTYPE html>
<html lang="en">
<head>
    <title> TIENDA VIRTUAL</title>
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
            
            <a class="navbar-brand" href="?">TIENDA ONLINE</a>
            
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

    <div>
		<section id="informacion">
			<h3>Informacion</h3>
			<article class="articulos">
				<h4>¿Quienes somos?</h4>
				<p>En enero del 2000 nace Tienda Doña Luz, es una mercado que brinda alimentos donde los clientes pueden
                    comodamente tener una gran variedad para escoger. Tienda Doña Luz tiene como meta ser una gran
                    empresa de la ciudad de Popayán, buscando permanentemente prductos nuevos dando oportunidad a 
                    productores locales e internacionales de comercializar y hacer conocer su marca.

                    Somos un grupo de personas emprendesoras, apasionadas por el emprendimiento y decididos a llevar los 
                    mejores priductos a los hogares de todos los patojos.
                </p>
			</article>

            <article class="articulos">
				<h4>Mision</h4>
				<p>Ser el mejor proveedor y surtidor de mercancia. Para lograrlo, hemos establecido una 
                    cultura que apoya a los miembros de nuestro equipo para que ellos puedan dar un servicio
                    excepcional a nuestros clientes.
                </p>
			</article>

            <article class="articulos">
				<h4>Vision</h4>
				<p>Ser la mejor tienda online y la preferida por los colombianos a la hora de realizar
                    compras por internet de todas las categorías de productos, siempre destacándose por
                    su rapidez en los envíos, confiabilidad y precios bajos.
                </p>
			</article>

            <article class="articulos">
				<h4>Valores que nos caracterizan</h4>
				<p>Honradez, cumplimiento, honestidad y compromiso
                </p>
			</article>
		</section>
    </div>

    <div>
        <li id="slider1">
            <img src="foto1.jpg" width="200" height="200">
            <div class="textosobreimg1">descripcion......</div>
        </li>
    </div>                    


    
    <section class="py-5">
        <div class="container px-4 px-lg-4 mt-5">
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
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?c=agregar&cod='.$obj->cod.'">Agregar Producto</a></div>
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
    
<footer>
    <div class="container__foter">

        <div class="box__footer">
            <div class="logo">
                <img src="" alt="">
            </div>
            <div class="terms">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id laboriosam illo tempora
                    praesentium ipsam, reiciendis quasi corporis. Dolorem cumque ut ipsum soluta. 
                    Distinctio molestias aspernatur amet, similique repudiandae saepe eaque?
                </p>
            </div>
        </div>

        <div class="box__footer">
            <h4>Soluciones</h4>
            <a href="#">App Desarrollo</a>
            <a href="#">App Marketing</a>
            <a href="#">IOS Desarrollo</a>
            <a href="#">Android Desarrollo</a>
        </div>

        <div class="box__footer">
            <h4>Compañia</h4>
            <a href="#">Acerca de</a>
            <a href="#">Trabajos</a>
            <a href="#">Proceso</a>
            <a href="#">Servicios</a>
        </div>

        <div class="box__footer">
            <h4>Redes Sociales</h4>
            <a href="#"><i class="fa-brands fa-facebook"></i> Facebook</a>
            <a href="#"><i class="fa-brands fa-instagram-square"></i> Intagram</a>
            <a href="#"><i class="fa-brands fa-twitter"></i> Twitter</a>
            <a href="#"><i class="fa-brands fa-linkedin"></i> Linkedin</a>
        </div>

    </div>

    <div class="box_copyright">
        <hr>
        <p>2022 &copy; Tiena Doña Luz
        <b>MagtimusPro</b></p>
    </div>
</footer>
</html>