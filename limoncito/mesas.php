<?php
require_once("php/function.php");
?>
<link rel="stylesheet" media="screen" href="css/style.css" type="text/css"/>
<div id="mesas">
						
<div class="titulo-div">
	<span class="titulo-actividad">Administracion de Mesas</span><br>
</div>
<div class="ultimos-pedidos">
	<ul>
		<span class="titulo">Ultimos Pedidos</span>
		<li>Ceviche Mixto | <a href="#">Ver</a></li>
		<li>Ceviche Especial | <a href="#">Ver</a></li>
		<li>Leche de Tigre | <a href="#">Ver</a></li>
		<li>Leche de Tigre | <a href="#">Ver</a></li>
	</ul>
	<span class="leyenda-activo">activo</span> |
	<span class="leyenda-inactivo">inactivo</span>
</div>
<div class="orden-mesas">
	<!-- Usar un bucle para aumentar numero de mesas xD -->
	<?php 
	$sql="select * from evento_mesa where estado=1";
	$resultado=mysql_query($sql);
	while ($filas=mysql_fetch_assoc($resultado)) { 
	?>
	<div class="mesa">
		<div class="activo">
		<div class="etiqueta">
		<span>Mesa <br><span class="mesa-numero"><?php print $filas["mesa"]; ?></span></span><br>
		</div>
		<ul>
		<?php
			$descripcion=split("/",$filas["contenido"]);
			print "<li>".count($descripcion)." producto";
			if (count($descripcion)>1) {
				print "s</li>";
			}
			print "<li><a class='fancy' href='#' cod='".$filas["id"]."'>Ver Detalle</a></li>";
		?>
		</ul>
		<div class="blanco"><br></div>
		</div>
	</div>
	<?php } ?>
	</div>
	</div>			
</div>
