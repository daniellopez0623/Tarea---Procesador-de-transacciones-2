<?php

interface Iserviceprim{

    public function GetByid($id);
    public function Getlista();
    public function añadir($entidad);
    public function editar($id,$endidad);
    public function eliminar($id);
}

?>