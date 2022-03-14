<?php

class clsUsuario {
    //atributos
    private $id;
    private $name;
    private $user;
    private $password;
    private $rol;
    
    //metodos 
    public function __construct() {}
    
    public function __get($atr) {return $this->$atr;}
    public function __set($atr, $val) {return $this->$atr = $val;}
    public function toString(){
        return 'id: '.$this->id.'<br>name: '.$this->name.'<br>user: '.$this->user.'<br>passowrd: '.$this->password.'<br>rol: '.$this->rol;
    }
}