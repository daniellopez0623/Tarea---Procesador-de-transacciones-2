<?php 

require_once 'services.php';
require_once 'class.php';
require_once 'Iserviceprim.php';
require_once 'servercookie.php';
require_once 'IfileHandler.php';
require_once 'JsonFile.php';
require_once 'serverfile.php';
require_once 'serializationFile.php';
require_once 'JsonFilecsv.php';
include 'log.php'; 

$service = new serverfile();


$id=isset($_GET['id']);

if($id){
$log="Trasaccion Eliminada ($id)";
logger($log);
    $idtransacciones=$_GET['id'];
    $service->eliminar($idtransacciones);  
}

header("location: index.php");
exist();

?>