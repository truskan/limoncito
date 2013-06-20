<?php
require_once("php/function.php");
if ($_POST["usuario"] and $_POST["clave"]) {
	$sw=login($_POST["usuario"],md5($_POST["clave"]));
	if($sw) {
		setcookie("info","<strong>Bienvenido a Limoncito!</strong><br>Inicie configurando su informacion <a href='config_user.php?id=".$_SESSION["empleado"]["id"]."'>Config</a>",time()+1);
		header("location:index.php");
	}
	print $_POST["usuario"]." -> ".$_POST["clave"];
	print "--";
	print_r($_SESSION["empleado"]);
	
}
else {
	etcookie("error","<strong>Ups, ocurrio un error!</strong><br>Usuario o Clave incorrecta!!!",time()+1);
	header("location:index.php");
}
?>
