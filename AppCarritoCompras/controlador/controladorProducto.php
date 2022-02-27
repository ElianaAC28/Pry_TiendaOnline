<?php

require_once 'modelo/clsProductoCRUD.php';
/**
 * Description of controladorProducto
 *
 * @author Kevith
 */
class controladorProducto {
    private $crudProducto;
    
    public function __construct(){
        $this->crudProducto = new clsProductoCRUD();
    }
    
    public function Listar(){
        return $this->crudProducto->Listar(); 
    }
    
    public function Eliminar($codigo){
        return $this->crudProducto->Eliminar($codigo);
    }
    
    public function Crear($obj){
        $this->crudProducto->Crear($obj);
    }
    
    public function Editar($obj){
        $this->crudProducto->Editar($obj);
    }
}
