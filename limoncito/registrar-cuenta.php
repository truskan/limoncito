<?php
require_once("php/function.php");
if (strlen($_POST["usuario"])>0){
	$nombre=$_POST["nombre"];
	$usuario=$_POST["usuario"];
	$clave=md5($_POST["clave"]);
	$email=$_POST["usuario"];
	$last_login=time();
	$date_update=time();
	$sql="insert into empleado values('','".$nombre."','".$usuario."','".$clave."','".$usuario."','','img/d_avatar.png')";
	$result=mysql_query($sql);
	setcookie("success","<strong>Felicidades, esta hecho!</strong><br>Hemos enviado un email verificando tu cuenta",time()+1);
	header("location:index.php");
} else {
	setcookie("error","<strong>Ups, ocurrio un error!</strong><br>Usuario o Clave incorrecta!!!",time()+1);
	header("location:index.php");
}
?>

