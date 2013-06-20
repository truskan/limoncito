<?php
require_once("php/function.php");
$patron=$_POST["patron"];
//$patron="1+comida+12312+12*comida*4.5+4.5+1234567890";
$campos=split('[+]',$patron);
print_r($campos);
$identificador_ingrediente=$campos[0]-1;
print "wl identificador es".$identificador_ingrediente;
$proveedor=$campos[1];
$ruc=$campos[2];
$ingredientes=$campos[3];
$detalle_ingrediente=split('[*]',$ingredientes);
$sql_select_ingrediente="select * from ingrediente where ingrediente='".$detalle_ingrediente[1]."'";
$resultado_select_ingrediente=mysql_query($sql_select_ingrediente);
if (mysql_num_rows($resultado_select_ingrediente)>0) {
	while($fila_select_ingrediente=mysql_fetch_assoc($resultado_select_ingrediente)) {
		$detalle_ingrediente[1]=$fila_select_ingrediente["id"];
		$stock_ingrediente=$fila_select_ingrediente["stock"];
		$costo_ingrediente=$fila_select_ingrediente["costo"];
	}
	$detalle_ingrediente[0]+=$stock_ingrediente;
	$detalle_ingrediente[2]=$costo_ingrediente;
	$sql_update_ingrediente="update ingrediente set stock='".$detalle_ingrediente[0]."', costo='".$detalle_ingrediente[2]."', fecha_compra='".time()."', fecha_vencimiento='".time()+$tiempo_disponibilidad."', estado=1 where id='".$detalle_ingrediente[1]."'";
	$resultado_update_ingrediente=mysql_query($sql_update_ingrediente);
	$ingredientes=join("*",$detalle_ingrediente);
} else {
	$sql_insert_ingrediente="insert into ingrediente values('','".$detalle_ingrediente[1]."','".$detalle_ingrediente[0]."','".$detalle_ingrediente[2]."','3','".time()."','".time()+$tiempo_disponibilidad."','1')";
	$resultado_insert_ingrediente=mysql_query($sql_insert_ingrediente);
	$sql_select_ingrediente_nuevo="select * from ingrediente where ingrediente='"$detalle_ingrediente[1]"'";
	$resultado_select_ingrediente_nuevo=mysql_query($sql_select_ingrediente_nuevo);
	while ($fila_select_ingrediente_nuevo=mysql_fetch_assoc($resultado_select_ingrediente_nuevo)){
		$detalle_ingrediente[0]=$fila_select_ingrediente_nuevo["stock"];
		$detalle_ingrediente[1]=$fila_select_ingrediente_nuevo["id"];
		$detalle_ingrediente[2]=$fila_select_ingrediente_nuevo["costo"];
	}
	$ingredientes=join("*",$detalle_ingrediente);
}
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
	print $identificador_ingrediente;
} else {
	$sql_select_compra="select * from compra where cid='".$cid."'";
	$resultado_select_compra=mysql_query($sql_select_compra);
	while($fila_select_compra=mysql_fetch_assoc($resultado_select_compra)) {
		$ingredientes_compra=$fila_select_compra["ingredientes"];
		$total_compra=$fila_select_compra["total"];
	}
	$ingredientes_compra.="/".$ingredientes;
	$total_compra+=$total;
	$sql_update_compra="update compra set ingredientes='".$ingredientes_compra."', total=".$total." where id='".$cid."'";
	$resultado_update_compra=mysql_query($sql_update_compra);
	print $identificador_ingrediente;
}

/*
print "<br>";
print time();
print "---------";
print time()+$tiempo_disponibilidad;
print "---------";
print $sql_verificacion;
print $resultado_verificacion;
*/

?>
