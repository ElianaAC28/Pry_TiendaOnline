<?php

require_once 'clsConexion.php';
require_once 'clsCarrito.php';
require_once 'clsProducto.php';
require_once 'clsUsuario.php';


class clsCarritoCRUD {
    
    //atributos
    private $conexion;
    private $auxPDO;
    
    //metodos
    public function __construct() {
        $this->conexion = new clsConexion('localhost', 'bdtienda', 'root', '');
        $this->conexion->conectar();
        $this->auxPDO = $this->conexion->conexionPDO;
    }
    
    public function Agregar($id, $cod) {
        try {
            $consulta = "INSERT INTO carrocompra (ID,COD,FECHA) VALUES (?,?,now())";
            $this->auxPDO->prepare($consulta)->execute(array(
                $id,
                $cod
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Listar($id) {
        try {
            $consulta = $this->auxPDO->prepare("SELECT producto.COD,producto.NAME as NAME1,producto.PRICE,producto.IMAGE,COUNT(producto.COD) as cant,
                                                usuario.NAME as NAME2,usuario.USER,usuario.ROL
                                                FROM carrocompra INNER JOIN producto ON carrocompra.COD = producto.COD
                                                INNER JOIN usuario ON carrocompra.ID = usuario.ID
                                                WHERE carrocompra.ID = ?
                                                GROUP BY producto.COD;");
            $consulta->execute(array($id));
            $resultado = array();
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj) {
                $this->auxCarrito = new clsCarrito();
                
                $this->auxProducto = new clsProducto();
                $this->auxProducto->__SET('cod',$obj->COD);
                $this->auxProducto->__SET('name',$obj->NAME1);
                $this->auxProducto->__SET('price',$obj->PRICE);
                $this->auxProducto->__SET('image',$obj->IMAGE);
                
                $this->auxUsuario = new clsUsuario();
                $this->auxUsuario->__SET('name', $obj->NAME2);
                $this->auxUsuario->__SET('user', $obj->USER);
                $this->auxUsuario->__SET('rol', $obj->ROL);
                
                $this->auxCarrito->__SET('usuario', $this->auxUsuario);
                $this->auxCarrito->__SET('producto', $this->auxProducto);
                $this->auxCarrito->__SET('cantidad', $obj->cant);
                $this->auxCarrito->__SET('total', ($obj->PRICE*$obj->cant));
                $resultado [] = $this->auxCarrito;
            }
            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}