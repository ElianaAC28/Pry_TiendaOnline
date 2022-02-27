<?php
require_once 'modelo/clsUsuario.php';
require_once 'modelo/clsUsuarioCRUD.php';
/**
 * Description of controladorUsuario
 *
 * @author Kevith
 */
class controladorUsuario {
    //put your code here
    private $crudUsuario;
    
    public function __construct(){
        $this->crudUsuario= new clsUsuarioCRUD();
    }
    
    public function Crear($obj){
        $this->crudUsuario->Crear($obj);
    }
    
    public function Listar(){
        return $this->crudUsuario->Listar(); 
    }
}
