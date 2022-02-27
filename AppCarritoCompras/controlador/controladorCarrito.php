<?php
require_once 'modelo/clsCarrito.php';
require_once 'modelo/clsCarritoCRUD.php';

/**
 * Description of controladorCarrito
 *
 * @author Kevith
 */
class controladorCarrito {
    //put your code here
    private $crudCarrito;
    
    public function __construct(){
        $this->crudCarrito= new clsCarritoCRUD();
    }
    
    public function Agregar($id,$cod){
        $this->crudCarrito->Agregar($id,$cod);
    }
    
    public function Listar($id){
        return $this->crudCarrito->Listar($id); 
    }
}
