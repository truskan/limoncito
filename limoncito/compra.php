<?php
require_once("php/function.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Nueva Compra</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
	<style>
		.compra_cabecera li , .compra_item li {
			display:inline;
		}
	</style>
</head>
<body>
	<!-- Lista de Compras realizadas segun proveedor -->
	<h1>Ranking de Compra de Productos</h1>
	<ul class="compra_cabecera">
		<li>Numero</li>
		<li>Compra Detalle</li>
		<li>Costo</li>
		<li>Proveedor</li>
	</ul>
	<?php
		$sql="select * from compra c inner join proveedor p on c.id_proveedor=p.id";
		$resultado=mysql_query($sql);
	?>
	<ul class="compra_item">
	<?php
	$i=1;
	while ($fila=mysql_fetch_assoc($resultado)) {
		print "<li>".$i."</li>";
		$compra_items=split('[/]',$fila["ingredientes"]);
		print "<li>";
		foreach($compra_items as $item) {
			$detalle_item=split('[*]',$item);
			$sql2="select ingrediente from ingrediente where id='".$detalle_item[1]."'";
			$resultado2=mysql_query($sql2);
			while($fila2=mysql_fetch_assoc($resultado2)) {
				$ingrediente=$fila2["ingrediente"];
			}
			print "<ul>";
				print "<li>".$detalle_item[0]." Unids. </li>";
				print "<li>".$ingrediente."</li>";
				print "<li>".$detalle_item[2]."</li>";
			print "</ul>";
		}
		print "</li>";
		print "<li>".$fila["total"]."</li>";
		print "<li>".$fila["proveedor"]."</li>";
	}
	?>
	</ul>
		
	<fieldset>
		<legend>Nueva Compra</legend>
		<label>Proveedor</label> <input type="text" name="proveedor"><br>
		<label>RUC Nº</label> <input type="text" name="ruc"><br>
		<label>Tipo de Entrada</label><br>
		<label>Manual</label><input type="radio" checked name="entrada" value="manual"> | <label>Archivo</label><input type="radio" name="entrada" value="archivo">
		<div class="archivo">
			<label>Archivo</label><input type="file" name="compra_archivo"/>
		</div>
		<div class="compra_productos">
			<ul class="cabecera_lista">
				<li>Numero</li>
				<li>Producto</li>
				<li>Costo</li>
				<li>Cantidad</li>
				<li>Importe</li>
			</ul>
			<div class="ajax_productos">
				<ul class="item_lista">
					<li>1</li>
					<li>blabla</li>
					<li>2.4</li>
					<li>3</li>
					<li>7.2</li>
				</ul>
			</div>
			<ul class="add_lista">
				<li><span class="numero"></span></li>
				<li><input type="text" name="nuevo_producto"/></li>
				<li><input type="text" name="nuevo_costo"/></li>
				<li><input type="text" name="nuevo_cantidad"/></li>
				<li><br></li>
			</ul>
		</div>
		<button>Registrar Compra</button>
	</fieldset>
</body>

</html>
