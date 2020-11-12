<?php

class servercookie implements Iserviceprim{
 
    private $utilities;
    private $cookienombre;
    
    public function __construct(){
        
        $this->servicio = new Servicio();
        $this->cookienombre = "transaction";
    }
public function Getlista(){

$listtransacciones = array();

if(isset($_COOKIE[$this->cookienombre])){

$listtransaccionescode= json_decode ($_COOKIE[$this->cookienombre],false);
 
foreach ($listtransaccionescode as $elementoT) {
    $element=new transacciones();
$element->set($elementoT);
    
        array_push($listtransacciones,$element);
    }

}
 else
{  
    setcookie($this->cookienombre,json_encode($listtransacciones),$this->servicio->cookietime(),"/");
}
return $listtransacciones;

}

public function GetByid($id){
    
    $listtransacciones = $this->Getlista();
    $transaction = $this->servicio->buscar($listtransacciones,'id',$id)[0];
    return $transaction;
}

public function añadir($entidad)
{
    $listtransacciones=$this->Getlista();
    $idtransacciones=1;
    
    if(!empty($listtransacciones)){
        $lasttransacciones=$this->servicio->getLastElement($listtransacciones);
        $idtransacciones=$lasttransacciones->id+1;
    }
$entidad->id=$idtransacciones;
$entidad->profilePhoto = "";

if(isset($_FILES['profilePhoto'])){
    
    $photofile=$_FILES['profilePhoto'];

    if($photofile['error']==4){
    
    $entidad->profilePhoto = "";
    
   }else{

$typeReplace = str_replace("image/", "", $_FILES['profilePhoto']['type']);
 $type= $photofile['type'];
 $size= $photofile['size'];
 $name= $idtransacciones . '.' . $typeReplace;
 $tmpname= $photofile['tmp_name'];
 
 $success=$this->servicio->uploadImage('imagenes/transaction/',$name,$tmpname,$type,$size);
 
 if($success){
     $entidad->profilePhoto= $name;
 }
}
}

array_push($listtransacciones,$entidad);

 setcookie($this->cookienombre,json_encode($listtransacciones),$this->servicio->cookietime(),"/");
    
}

public function editar($id,$entidad){
    
$elemento=$this->GetByid($id);
    $listtransacciones = $this->Getlista();

    $elementoindex=$this->servicio->getelemento($listtransacciones,'id',$id);

if(isset($_FILES['profilePhoto'])){
    
    $photofile=$_FILES['profilePhoto'];
    
if($photofile['error']==4){
    
    $entidad->profilePhoto = $elemento->profilePhoto;
    
}else{
    
$typeReplace = str_replace("image/", "", $_FILES['profilePhoto']['type']);
 $type= $photofile['type'];
 $size=$photofile['size'];
 $name=$id . '.' . $typeReplace;
 $tmpname=$photofile['tmp_name'];
 
 $success=$this->servicio->uploadImage('imagenes/transaction/',$name,$tmpname,$type,$size);
 
 if($success){
     $entidad->profilePhoto= $name;
 }
    
}
}
 
$listtransacciones[$elementoindex]=$entidad;
setcookie($this->cookienombre,json_encode($listtransacciones),$this->servicio->cookietime(),"/");
    
}


    public function eliminar($id){

        
        $listtransacciones=$this->Getlista();
        $elementoindex=$this->servicio->getelemento($listtransacciones,'id',$id);

unset($listtransacciones[$elementoindex]);
$listtransacciones=array_values($listtransacciones);
setcookie($this->cookienombre,json_encode($listtransacciones),$this->servicio->cookietime(),"/");

}

}

?>