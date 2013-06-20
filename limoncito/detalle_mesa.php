<?php
require_once("php/function.php");
//print_r(array_keys($_GET));
$mesa_numero=array_keys($_GET);
$mesa_numero=$mesa_numero[0];
$_SESSION["mesa"]=$mesa_numero;

?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type='text/javascript' src='js/jquery.autocomplete.js'></script>
<script type='text/javascript' src='js/jquery.autocomplete.min.js'></script>
<script type='text/javascript' src='js/jquery.autocomplete.pack.js'></script>
<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="js/proceso.js"></script>
<div class="detalle-mesa-plato">
	<span class="titulo_mesa">Pedidos en la Mesa <?php print $mesa_numero; ?></span>
	<div class="pedido-actual">
		<ul class="cabecera-pedidos">
			<li>Numero</li>
			<li class='producto'>Producto</li>
			<li>Precio</li>
			<li>Cantidad</li>
			<li>Importe</li>
		</ul>
		<?php
		$cantidad_platos=1;
		$sql="select * from evento_mesa where id='".$mesa_numero."'";
		$resultado=mysql_query($sql);
		while ($filas=mysql_fetch_assoc($resultado)) { 
			$descripcion=split("/",$filas["contenido"]);
			$total=0;
			for ($i=0; $i<count($descripcion); $i++) {
			?>
			<ul class="platos-pedidos">
			<?php
				list($cantidad,$producto)=split('[*]',$descripcion[$i]);
				$sql_aux="select * from producto where id='".$producto."'";
				$resultado_aux=mysql_query($sql_aux);
				while ($filas_aux=mysql_fetch_assoc($resultado_aux)) {
					$total=$total+($cantidad*$filas_aux["precio_venta"]);
					print "<li>".($i+1)."</li>";
					print "<li class='producto' >".ucwords($filas_aux["producto"])."</li>";
					print "<li>".$filas_aux["precio_venta"]."</li>";
					print "<li>".$cantidad."</li>";
					print "<li>".($cantidad*$filas_aux["precio_venta"])."</li>";
				}
			?>
			</ul>
			<?php
			}	
		}
		?>
		<ul class="platos-pedidos" id="nuevo-plato">
			<li><?php print $i+1; ?></li>
			<li class='producto'><input type='text' name='nuevo_plato'/></li>
			<li><span class="precio-plato"></span><br></li>
			<li><input type='text' name='nuevo_plato_cantidad'/></li>
			<li><span class='importe'></span><a class="add-plato" href="#"><img src="img/add.png"/></a></li>
		</ul>
	</div>
	<a class="agregar-plato" contador="<?php print $i+1;?>" href="#">+ platos</a>
</div>
<div class="detalle-mesa-cliente">
	<?php
		$sql="select * from venta inner join cliente where venta.id_mesa='".$mesa_numero."'";
		$resultado=mysql_query($sql);
		while ($filas=mysql_fetch_assoc($resultado)) {
	?>
	<div class="detalle-mesa-basico">
		<label>Cliente:</label><br>
		<input type="text" name="cliente" value="<?php print ucwords($filas["nombre"]);?>"><br>
		<label>Tipo de Venta</label><br>
		<?php 
		if ($filas["tipo_documento"]==1) {
		?>
		<span>Boleta</span><input type="radio" checked name="venta" value="boleta"><span>Factura</span><input type="radio" name="venta" value="factura"><br>
		<?php } 
		else { ?>
		<span>Boleta</span><input type="radio" name="venta" value="boleta"><span>Factura</span><input type="radio" checked name="venta" value="factura"><br>
		<?php }
		?>
		<label>Numero</label><span><?php print $filas["numero_documento"];?></span><br>
		<div class="no-boleta">
		<label>RUC</label><br><input type="text" value="<?php print $filas["ruc"];?>" name="ruc">
		</div>
	</div>
	<div class="detalle-mesa-fecha">
		<label class="fecha">Fecha </label><br>
		<span class="actual"><?php print date("d/m/Y",$filas["fecha"]); ?></span><br>
		<span class="detalle-mesa-numero"><?php print $mesa_numero;?></span><br>
		<label>Mesa</label><br>
	</div>
	<?php
		}
	?>
	<div class="detalle-importe">
		<ul class="cabecera-importe">
			<li>Sub Total</li>
			<li class="monto"><?php print $total; ?></li>
			<li>IGV (19%)</li>
			<li class="monto"><?php print ($total*0.19);?></li>
			<li>Neto</li>
			<li class="monto"><?php print ($total+$total*0.19);?></li>
		</ul>
	</div>	
	<div class="detalle-pedido-admin">
		<button class="terminar">Terminar</button>
		<button class="guardar">Guardar</button>
		<button class="imprimir">Imprimir</button>
		<button class="cancelar">Cancelar</button>
	</div>
</div>
