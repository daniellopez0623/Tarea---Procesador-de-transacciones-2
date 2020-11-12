<?php

class Servicio{

public function getLastElement($lista){
    $contarlista=count($lista);
    $lastelement=$lista[$contarlista - 1];

    return $lastelement;
}

public function buscar($lista,$propiedad,$valor){

$filtrar=[];

foreach ($lista as $articulo) {
  
  if($articulo->$propiedad==$valor){

    array_push($filtrar,$articulo);
  }

}
return $filtrar;
}
public function cookietime(){
  return time() + 60*60*24;
  
}
public function getelemento($lista,$propiedad,$valor){

$inicio=0;

foreach ($lista as $key => $articulo) {
  
  if($articulo->$propiedad==$valor){

    $inicio=$key;
  }

}
return $inicio;
}
 
public function uploadImage($directory,$name,$tmpfile,$type,$size){

$isSuccess = false;

if(($type=="image/gif") 
|| ($type=="image/jpeg")
|| ($type=="image/png")
|| ($type=="image/jpg")
|| ($type=="image/JPG")
|| ($type=="image/pjpeg") && ($size < 1000000)){

if(!file_exists($directory)){
  
  mkdir($directory,0777,true);

  if(file_exists($directory)){

   $this->uploadfile($directory . $name,$tmpfile);
    $isSuccess = true;
    
  }
  
}else{

 $this->uploadfile($directory . $name,$tmpfile);
    $isSuccess = true;
    
      }
   }else{
    $isSuccess = false;

   }
   return $isSuccess;
} 

private function uploadfile($name,$tmpfile){
 
   if(file_exists($name)){
     unlink($name);
    }
    move_uploaded_file($tmpfile,$name);
     
  
}

}

?>