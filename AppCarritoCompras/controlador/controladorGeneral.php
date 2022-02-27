<?php
if(isset($_GET['c'])){
    $page = $_GET['c'];
    if(isset($_GET['is'])){
        $page = $page.'/'.$_GET['is'].'.php';
        require $page;
    }else if(isset ($_GET['u'])) {
        $page = $page.'/'.$_GET['u'].'.php';
        require $page;
    }else if(isset ($_GET['cs'])){
        session_start();
        session_destroy();
        header("location: index.php");
        exit;
    }else if(isset ($_GET['ca'])){
        $page = $page.'/'.$_GET['ca'].'.php';
        require $page;
    }else if(isset ($_GET['p'])){
        $page = $page.'/'.$_GET['p'].'.php';
        require $page;
    }else if(isset ($_GET['de'])){
        eliminarProducto($_GET['cod']);
    }else if(isset ($_GET['cod'])){
        session_start();
        $id = $_SESSION['id'];
        $cod = $_GET['cod'];
        agregarCarrito($id, $cod);
    }
}else{
    require ('vista/menuprincipal.php');
}

function agregarCarrito($id,$cod){
    require_once 'controlador/controladorCarrito.php';
    $aux = new controladorCarrito();
    $aux->Agregar($id,$cod);
    header('location: index.php');
    exit();
}

function eliminarProducto($cod){
    require_once 'controlador/controladorProducto.php';
    $aux = new controladorProducto();
    $aux->Eliminar($cod);
    header('location: index.php?c=vista&p=menuProduct');
    exit();
}

function validarAgregarUsuario($obj){
    if ($obj->name=="" || $obj->user=="" || $obj->password=="" || $obj->rol=="") {
        return FALSE;
    }
    require_once 'controlador/controladorUsuario.php';
    $aux = new controladorUsuario();
    $aux->Crear($obj);
    validarInicioSesion($obj->user, $obj->password);
}

function validarInicioSesion($user,$password){
    
    if(empty($user) || empty($password)){
        return 'vacio';
    }
    
    require_once 'controlador/controladorUsuario.php';
    $aux = new controladorUsuario();
    $listUsers = $aux->Listar();
    
    foreach ($listUsers as $obj){
        if ($obj->user == $user && $obj->password==$password) {
            session_start();
            $_SESSION['id'] = $obj->id;
            $_SESSION['user'] = $obj->user;
            $_SESSION['name'] = $obj->name;
            $_SESSION['password'] = $obj->$password;
            $_SESSION['carrito'] = TRUE;
            $_SESSION['rol'] = $obj->rol;
            header('location: index.php');
        }
    }
    return 'incorrecto';
    
}

function validarAgregarProducto($obj){
    if ($obj->name=="" || $obj->price==0) {
        return FALSE;
    }
    require_once 'controlador/controladorProducto.php';
    $aux = new controladorProducto();
    $aux->Crear($obj);
    header('location: index.php?c=vista&p=menuProduct');
    exit();
}

function validarUpdateProducto($obj){
    if ($obj->name=="" || $obj->price==0) {
        return FALSE;
    }
    require_once 'controlador/controladorProducto.php';
    $aux = new controladorProducto();
    $aux->Editar($obj);
    header('location: index.php?c=vista&p=menuProduct');
    exit();
}



function validarFormatoImagen($file_name){
//    $file_name = $_FILES['image']['name'];
    $aux1 = explode('.', $file_name);
    $file_ext = strtolower(end($aux1));

    $expensions = array("jpeg", "jpg", "png", "mp4");

    if (in_array($file_ext, $expensions) === true) {
        return TRUE;
    }
    return FALSE;
}

function is_session_started() {

 // chequear que no esté ejecutándole 
 // desde la línea de comandos:
    if ( php_sapi_name() !== 'cli' ) {

        if ( version_compare(phpversion(), '5.4.0', '>=') ) {

            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;

        } else {

            return session_id() === '' ? FALSE : TRUE;
        }
    }

    return FALSE;
}