<?php
require_once("php/function.php");
	$patron=$_POST["patron"];
	$sql="select * from producto where producto='".$patron."'";
	$result=mysql_query($sql);
	$data="";
	while ($row=mysql_fetch_assoc($result)) {
		$data=$row["precio_venta"];
	}
	print $data;
?>
