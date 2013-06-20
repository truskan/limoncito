<?php
//Archivo de Configuracion de Variables, Constantes y otros usados}
session_start();
$usuariodb="root";
$clavedb="toor";
$servidor="localhost";
$bd="limoncito";

$unidades=array("Kg","Lt","Unid","Porc");

$mesas=15;
$estado=array("Inactivo","Activo");
$categoria=array("No perecible","Perecible");

$tiempo_disponibilidad=3600*24*15; // 15 dias : para modificar los dias solo cambiar el ultimo factor

/*
 * Los campos combinados son destinados para almacenar varios datos
 * 
 * Compra: cantidad*producto*precio/cantidad*producto*precio/... etc
 * 
 * 
 */

?>
