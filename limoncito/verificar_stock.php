<?php
require_once("php/function.php");
//datos para probar la admision de nuevos platos y 
$patron="1*Ceviche Napolitano";
$mesa="1";
//$mesa=$_SESSION["mesa"];
//$patron=$_POST["patron"];
$otro=split('[*]',$patron);
$cantidad=$otro[0];
print_r($otro);
$sql2="select id,stock from producto where producto='".$otro[1]."'";
$resultado2=mysql_query($sql2);
while($fila2=mysql_fetch_assoc($resultado2)){
	$stock=$fila2["stock"];
	$id_producto=$fila2["id"];
}
$producto=$id_producto;
$sql="select * from evento_mesa where id='".$mesa."'";
$resultado=mysql_query($sql);
while ($fila=mysql_fetch_assoc($resultado)) {
	$contenido=$fila["contenido"];
}

$contenido1=split('[/]',$contenido);
$suma=0;
foreach($contenido1 as $detalle) {
	list($cantidad_stock,$producto_stock)=split('[*]',$detalle);
	if ($producto_stock==$id_producto) {
		$suma=$suma+$cantidad_stock;
	}
}
$stock_final=$cantidad;

$sw="hola";
//print $stock_final;
if ($stock_final>$stock) {
	$sw="no hay comida";
	//Excede el stock
}
else {
	$stock_residuo=$stock-$stock_final;
	$sql3="update producto set stock=".$stock_residuo." where id='".$producto."'";
	$resultado3=mysql_query($sql3);
	//Modificando el contenido de la table evento_mesa... por mesa
	$sql4="select contenido from evento_mesa where mesa='".$mesa."'";
	$resultado4=mysql_query($sql4);
	while ($fila4=mysql_fetch_assoc($resultado4)) {
		$contenido_mesa=$fila4["contenido"];
	}
	print $contenido_mesa;
	//Otra solucion
	$nuevo_contenido=array();
	$conte=split('[/]',$contenido_mesa);
	print_r($conte);
	$sw=true;
	foreach($conte as $item) {
		$lista=split('[*]',$item);
		//complicado si los caracteres del final hasta el * son similares al valor buscado
		print_r($lista);
		if ($lista[1]==$producto) {
			$lista[0]=int($lista[0]);
			$lista[0]+=$cantidad;
			$sw=false;
		}
		$nuevo_contenido[]=join("*",$lista);
	}
	if ($sw) {
		$nuevo_contenido[]=$cantidad."*".$producto;
	}
	$sql5="update evento_mesa set contenido='".join("/",$nuevo_contenido)."' where mesa='".$mesa."'";
	$resultado5=mysql_query($sql5);
	
	/*
	$contenido_mesa1=split('[/]',$contenido_mesa);
	$nuevo_contenido=array();
	$nueva_cantidad=0;
	$val=0;
	foreach($contenido_mesa1 as $detalle1) {
		list($cantidad1,$producto1)=split("[*]",$detalle1);
		if ($producto1==$id_producto) {
			$nueva_cantidad+=$cantidad1;
			$val=1;
		} else { 
			$nuevo_contenido[]=$cantidad1."*".$producto1;
			print $cantidad1."*".$producto1;
			$val=0;
		}
		print "<br>";
		print $nueva_cantidad;
	}
	if ($val==1) {
		$nuevo_contenido[]=($nueva_cantidad+$cantidad)."*".$id_producto;
	} else {
		$nuevo_contenido[]=$cantidad."*".$id_producto;
	}
	
	print_r($nuevo_contenido);
	$sql5="update evento_mesa set contenido='".join("/",$nuevo_contenido)."' where mesa='".$mesa."'";
	$resultado5=mysql_query($sql5);
	* 
	*/
	$sw="comida lista";
	//No excede el Stock y se disminuye el mismo
	
}

print $sw;

?>
