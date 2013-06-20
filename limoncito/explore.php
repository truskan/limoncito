<?php
require_once("php/function.php");

?>
<style>
	.explore-item {
		width: 300px;
		float:left;
		text-align: justify;
		margin-right: 50px;
		padding: 5px;
		margin-left:10px;
		background-color: #008000;
		border-radius: 10px;
		margin-bottom: 10px;
	}
	ul {
		list-style: none;
		margin: 0;
		}
	.explore-item img {
		width: 200px;
		margin-left: 30px;
	}
	.vacio {
		width: 600px;
		float:left;
	}
	#result-query {
		width:800px;
	}
	
</style>
<div id="explore">
	<span class="text-general">Search in Limoncito</span><br>
	<div class="input-img-text">
		<img id="explore-img" src="img/magnifyingglass.png">
		<input type="text" name="s" id="parameter"/>
		
	</div>
	<div id="result-query">
		<hr>
		<?php
		$sql_select_producto="select * from producto where categoria=1";
		$resultado_select_producto=mysql_query($sql_select_producto);
		while ($fila_select_producto=mysql_fetch_assoc($resultado_select_producto)) {
		?>
		<div class='explore-item'>
			<h2><?php print ucwords($fila_select_producto["producto"]);?></h2>
			<img src='<?php print $fila_select_producto["foto"];?>' title='<?php print ucwords($fila_select_producto["producto"]);?>'/>
			<p><?php
			$detalle_producto=split('[|]',$fila_select_producto["descripcion"]);
			print $detalle_producto[0];?></p>
			<ul>
				<?php $detalle_producto_lista=split('[,]',$detalle_producto[1]);
					foreach ($detalle_producto_lista as $item) {
						$sql_select_ingrediente="select * from ingrediente where id='".$item."'";
						$resultado_select_ingrediente=mysql_query($sql_select_ingrediente);
						while ($fila_select_ingrediente=mysql_fetch_assoc($resultado_select_ingrediente)){
							print "<li>".ucwords($fila_select_ingrediente["ingrediente"])."</li>";
						}
					}
				?>
			</ul>
		</div>
		<?php
		}
		?>
		<div class="vacio"><br>Hiola</div>
	</div>
</div>
