<?php
require_once("php/function.php");
$patron=$_POST["patron"];
$valores=split('[-]',$patron);
$cliente=$valores[0];
$mesa=$valores[1];
$contenido=$valores[2];
$sql="insert into cliente values('','','".$cliente."','')";
$resultado=mysql_query($sql);
$sql1="insert into evento_mesa values('','".$mesa."','".$contenido."','1')";
$resultado1=mysql_query($sql1);
print "Mesa Registrada";

//modificar con lista de productos en stock... variable contenido...

?>
