<?php

class clsProducto {
    //atributos
    private $cod;
    private $name;
    private $price;
    private $image;
    
    //metodos 
    public function __construct() {}
    
    public function __get($atr) {return $this->$atr;}
    public function __set($atr, $val) {return $this->$atr = $val;}
    public function toString(){
        return 'codigo: '.$this->cod.'<br>name: '.$this->name.'<br>price: '.$this->price;
    }
}