<?php
//Funciones en PHP
require_once("php/config.php");
//Conexion a la base de datos 

$conexion=mysql_connect($servidor,$usuariodb,$clavedb) or die("No hay conexion");
$selecciona_bd=mysql_select_db($bd) or die("No hay bd");

function login($usuario,$clave) {
	$sql="select * from empleado where usuario='".$usuario."' and clave='".$clave."'";
	$resultado=mysql_query($sql);
	while ($filas=mysql_fetch_assoc($resultado)) {
		$_SESSION["empleado"]["id"]=$filas["id"];
		$_SESSION["empleado"]["usuario"]=$filas["usuario"];
		$_SESSION["empleado"]["clave"]=$filas["clave"];
		$_SESSION["empleado"]["nombre"]=$filas["nombre"];
		$_SESSION["empleado"]["dni"]=$filas["dni"];
		$_SESSION["empleado"]["email"]=$filas["email"];
	}
	return $sw=true;
}

function ejecutarConsulta($resultado=null) {
	if (strlen($resultado)>0) {
		$mensaje="Se ha realizado el evento";
		setcookie("success",$mensaje,time()+2);
		$sw=true;
	}
	else {
		$mensaje="Hubo un error en la insercion de Datos";
		setcookie("error",$mensaje,time()+2);
		foreach(array_keys($campos) as $llave){
			setcookie($llave,$campos[$llave],time()+2);
		}
		$sw=false;
	}
	return $sw;
}

//mysql_fetch_assoc solo es utilizado para mostrar datos, select
function insertar($campos,$tabla){
	$sql="INSERT INTO ".$tabla."(".join(", ",array_keys($campos)).") VALUES('".join("', '",$campos)."')";
	$resultado=mysql_query($sql);
	return ejecutarConsulta($resultado);
}

// Funcion que solo se utiliza para los empleados, ya que son los unicos que se autentifican con el sistema
/*
class Empleado{
	$tabla="empleado";
	function desactivar($campos){
		//campos esta conformado de id y su valor
		$sql="update empleado set estado='0' where ".array_keys($campos)[0]."='".$campos[array_keys($campos)[0]]."'";
		$resultado=mysql_query($sql);
		return ejecutarConsulta($resultado);
	}
	function nuevoEmpleado($campos,$tabla){
		return insertar($campos,$tabla);
	}
}
*/




/*
function insertar($campos,$tabla){
	$sql="insert into ".$tabla."(";
	foreach (llave as array_keys($campos){
		
	}
	
	
}
*/



?>
