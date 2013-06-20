<?php
require_once("php/function.php");
//$patron=$_POST["patron"];
$patron="1+comida+12312+12*comida*4.5+4.5+1234567890";
$campos=split('[+]',$patron);
print_r($campos);
$identificador_ingrediente=$campos[0]-1;
print "wl identificador es".$identificador_ingrediente;
$proveedor=$campos[1];
$ruc=$campos[2];
$ingredientes=$campos[3];
$total=$campos[4];
$cid=$campos[5];
$sql_verificacion="select * from proveedor where proveedor='".$proveedor."'";
$resultado_verificacion=mysql_query($sql_verificacion);
if (mysql_num_rows($resultado_verificacion)>0) {
	while ($fila_ver=mysql_fetch_assoc($resultado_verificacion)) {
		$id_producto=$fila_ver["id"];
	}
} else {
	$sql_insert="insert into proveedor values('','".$proveedor."','".$ruc."')";
	$resultado_insert=mysql_query($sql_insert);
	$sql_select="select * from proveedor where proveedor='".$proveedor."'";
	$resultdo_select=mysql_query($sql_select);
	while($fila_select=mysql_fetch_assoc($resultdo_select)) {
		$id_producto=$fila_select["id"];
	}
}
//estructura del campo ingredientes ingredientes[n] dependera de la n insercion
if ($identificador_ingrediente==0) {
	$fecha_compra=time();
	$sql_insert_compra="insert into compra values('','".$ingredientes."','".$total."','".$fecha_compra."','".$id_producto."')";
	$resultado_insert_compra=mysql_query($sql_insert_compra);
	//return $identificador_ingrediente;
} else {
	$sql_select_compra="select * from compra where cid='".$cid."'";
	$resultado_select_compra=mysql_query($sql_select_compra);
	while($fila_select_compra=mysql_fetch_assoc($resultado_select_compra)) {
		
	}
}

print "<br>";
print time();
print "---------";
print time()+$tiempo_disponibilidad;
print "---------";
print $sql_verificacion;
print $resultado_verificacion;
	
?>
