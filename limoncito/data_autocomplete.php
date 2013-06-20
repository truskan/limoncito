<?php
require_once("php/function.php");
	$patron=$_POST["patron"];
	$sql="select * from producto where producto like '%".$patron."%'";
	$result=mysql_query($sql);
	$data=array();
	while ($row=mysql_fetch_assoc($result)) {
		$data[]=ucwords($row["producto"]);
	}
	print join("/",$data);
?>
