<?php

class clsCarrito {
    //atributos
    private $usuario;
    private $producto;
    private $cantidad;
    private $total;
    
    //métodos
    public function __construct() {}
    
    public function __GET($atr){return $this->$atr;}
    public function __SET($atr,$val){return $this->$atr = $val;}

}