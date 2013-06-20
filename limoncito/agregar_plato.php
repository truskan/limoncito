<?php
require_once("php/function.php");
	$patron=$_POST["patron"];
	list($cantidad,$producto)=split("[*]",$patron);
	$sql_2="select id from producto where producto='".$producto."'";
	$result_2=mysql_query($sql_2);
	while ($filas_2=mysql_fetch_assoc($result_2)){
		$id_producto=$filas_2["id"];
	}
	$nuevo_patron=$cantidad."*".$id_producto;
	$sql="select contenido from evento_mesa where mesa='".$_SESSION["mesa"]."'";
	$result=mysql_query($sql);
	$data=array();
	while ($row=mysql_fetch_assoc($result)) {
		$contenido=$row["contenido"];
	}
	$nuevo_contenido=$contenido."/".$nuevo_patron;
	$sql_aux="update evento_mesa set contenido='".$nuevo_contenido."' where mesa='".$_SESSION["mesa"]."'";
	$result_aux=mysql_query($sql_aux);
	print true;
?>
