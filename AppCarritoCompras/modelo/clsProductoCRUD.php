<?php

require_once 'clsConexion.php';
require_once 'clsProducto.php';

/**
 * Description of clsUsuarioCRUD
 *
 * @author Kevith
 */
class clsProductoCRUD {
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
            $consulta = $this->auxPDO->prepare("SELECT * FROM PRODUCTO");
            $consulta->execute();
            $resultado = array();
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj) {
                $this->auxProducto = new clsProducto();
                $this->auxProducto->__SET('cod', $obj->COD);
                $this->auxProducto->__SET('name', $obj->NAME);
                $this->auxProducto->__SET('price', $obj->PRICE);
                $this->auxProducto->__SET('image', $obj->IMAGE);
                $resultado [] = $this->auxProducto;
            }
            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Crear($obj) {
        try {
            $consulta = "INSERT INTO PRODUCTO (cod,name,price,image) VALUES (null,?,?,'$obj->image')";
            $this->auxPDO->prepare($consulta)->execute(array(
                $obj->name,
                $obj->price
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Editar($obj) {
        try {
            $consulta = '';
            if ($obj->image=='') {
                $consulta = "UPDATE producto SET NAME=?, PRICE=? WHERE COD=?";
            }else{
                $consulta = "UPDATE producto SET NAME=?, PRICE=?, IMAGE='$obj->image' WHERE COD=?";
            }
            
            
            $this->auxPDO->prepare($consulta)->execute(array(
                $obj->name,
                $obj->price,
                $obj->cod
            ));
        } catch (Exception $e) {
            echo 'error aqui';
            die($e->getMessage());
        }
    }

    public function Eliminar($codigo) {
        try {
            $consulta = $this->auxPDO->prepare("DELETE FROM producto WHERE cod=?");
            $consulta->execute(array($codigo));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function obtener($cod){
        $consulta = $this->auxPDO->prepare ("SELECT * FROM PRODUCTO WHERE COD=?");
        $consulta->execute(array($cod));
        $auxProducto = new clsProducto();
        foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj) {
            $this->auxProducto = new clsProducto();
            $this->auxProducto->__SET('cod', $obj->COD);
            $this->auxProducto->__SET('name', $obj->NAME);
            $this->auxProducto->__SET('price', $obj->PRICE);
            $this->auxProducto->__SET('image', $obj->IMAGE);
            $auxProducto = $this->auxProducto;
        }
        return $auxProducto;
    }
}
