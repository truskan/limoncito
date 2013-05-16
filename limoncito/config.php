<?php
require_once("php/function.php");
if ($_POST["usuario"] and $_POST["clave"]) {
	$sw=login($_POST["usuario"],md5($_POST["clave"]));
	if($sw) {
		$mensaje="Bienvenido a la Aplicacion de Limoncito... Verifique sus datos <a href='#'>Aqui</a>";
		setcookie("info",$mensaje,time()+2);
		header("location:admin.php");
	}
	print $_POST["usuario"]." -> ".$_POST["clave"];
	print "--";
	print_r($_SESSION["empleado"]);
	
}
else {
	$mensaje="Error al iniciar sesión - Usuario o Clave incorrecta!!!";
	setcookie("error",$mensaje,time()+2);
	header("location:index.php");
}
?>
