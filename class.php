<?php

class transacciones{

public $id;
public $monto;
public $fecha;
public $descripcion;
private $servicio;

public function __construct(){
    
    $this->servicio= new Servicio();
}


public function iniciodatos($id,$monto,$fecha,$descripcion){
    
    $this->id=$id;
    $this->monto=$monto;
    $this->fecha=$fecha;
     $this->descripcion=$descripcion;
       
}

public function set($data){
    foreach ($data as $key => $value)$this->{$key} = $value;
}

function gettransacciones(){

    if($this->idtransacciones !=0 && $this->idtransacciones != null){
        
        return $this->servicio->transacciones[$this->idtransacciones];
    }
}

}

?>