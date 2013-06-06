<?php
require_once("php/function.php");
//$patron="11*3";
//$mesa="1";
$mesa=$_SESSION["mesa"];
$patron=$_POST["patron"];
list($cantidad,$producto)=split('[*]',$patron);
$sql="select * from evento_mesa where id='".$mesa."'";
$resultado=mysql_query($sql);
while ($fila=mysql_fetch_assoc($resultado)) {
	$contenido=$fila["contenido"];
}
$contenido=split('[/]',$contenido);
$suma=0;
foreach($contenido as $detalle) {
	$venta=split('[*]',$detalle);
	if ($venta[1]==$producto) {
		$suma=$venta[0];
	}
}

$stock_final=$suma+$cantidad;
$sql2="select stock from producto where id='".$producto."'";
$resultado2=mysql_query($sql2);
while($fila2=mysql_fetch_assoc($resultado2)){
	$stock=$fila2["stock"];
}
$sw=0;
if ($stock_final>$stock) {
	$sw=0;
}
else {
	$sw=1;
}
print $sw;
?>
