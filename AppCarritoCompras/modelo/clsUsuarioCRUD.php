<?php

require_once 'clsConexion.php';
require_once 'clsUsuario.php';

/**
 * Description of clsUsuarioCRUD
 *
 * @author Kevith
 */
class clsUsuarioCRUD {
    //atributos
    private $conexion;
    private $auxPDO;

    //metodos
    public function __construct() {
        $this->conexion = new clsConexion('localhost', 'bdtienda', 'root', '');
        $this->conexion->conectar();
        $this->auxPDO = $this->conexion->conexionPDO;
    }

    public function Listar() {
        try {
            $consulta = $this->auxPDO->prepare("SELECT * FROM USUARIO");
            $consulta->execute();
            $resultado = array();
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj) {
                $this->auxUsuario = new clsUsuario();
                $this->auxUsuario->__SET('id', $obj->ID);
                $this->auxUsuario->__SET('name', $obj->NAME);
                $this->auxUsuario->__SET('password', $obj->PASSWORD);
                $this->auxUsuario->__SET('user', $obj->USER);
                $this->auxUsuario->__SET('rol', $obj->ROL);
                $resultado [] = $this->auxUsuario;
            }
            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Crear($obj) {
        try {
            $consulta = "INSERT INTO USUARIO (id,name,user,password,rol) VALUES (null,?,?,?,?)";
            $this->auxPDO->prepare($consulta)->execute(array(
                $obj->name,
                $obj->user,
                $obj->password,
                $obj->rol
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Editar(clsProducto $obj) {
        try {
            $consulta = "UPDATE producto SET nombre=?, precio=? WHERE codigo=?";
            $this->auxPDO->prepare($consulta)->execute(array(
                $obj->nombre,
                $obj->precio,
                $obj->codigo
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($codigo) {
        try {
            $consulta = $this->auxPDO->prepare("DELETE FROM producto WHERE codigo=?");
            $consulta->execute(array($codigo));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function obtener($id){
        $consulta = $this->auxPDO->prepare ("SELECT * FROM USUARIO WHERE ID=?");
        $consulta->execute(array($id));
        $auxUsuario = new clsUsuario();
        foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj) {
            $this->auxUsuario = new clsUsuario();
            $this->auxUsuario->__SET('id', $obj->ID);
            $this->auxUsuario->__SET('name', $obj->NAME);
            $this->auxUsuario->__SET('password', $obj->PASSWORD);
            $this->auxUsuario->__SET('user', $obj->USER);
            $this->auxUsuario->__SET('rol', $obj->ROL);
        }
        return $auxUsuario;
    }
}
