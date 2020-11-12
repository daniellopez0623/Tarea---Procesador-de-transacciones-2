<?php

class serverfile implements Iserviceprim{
 
    private $utilities;
    public $filehandler;
    public $directory;
    public $filename;

    
    public function __construct(){
        
        $this->servicio = new Servicio();
        $this->directory="data";
        $this->filename="trans";
           $this->filehandler = new serializationFile($this->directory,$this->filename);
     
    }
public function Getlista(){

$listtransaccionescode=$this->filehandler->ReadFile();
    
$listtransacciones = array();

if($listtransaccionescode == false){
 $this->filehandler->SaveFile($listtransacciones);

    
}else{
  
   
foreach ($listtransaccionescode as $elementoT) {
    $element=new transacciones();
$element->set($elementoT);
    
        array_push($listtransacciones,$element);
}
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

 $this->filehandler->SaveFile($listtransacciones);
    
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
 $this->filehandler->SaveFile($listtransacciones);
    
}


    public function eliminar($id){

        
        $listtransacciones=$this->Getlista();
        $elementoindex=$this->servicio->getelemento($listtransacciones,'id',$id);

unset($listtransacciones[$elementoindex]);
$listtransacciones=array_values($listtransacciones);
 $this->filehandler->SaveFile($listtransacciones);

}

}

?>