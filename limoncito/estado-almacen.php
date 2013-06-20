<?php 
require_once("php/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Estado de Almacen</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css"/>	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/after_efects.js"></script>
		
</head>

<body>
	<div class="error message"><?php if ($_COOKIE) { print $_COOKIE["error"];	}?></div>
	<div class="success message"><?php if ($_COOKIE) { print $_COOKIE["success"];	}?></div>
	<div class="info message"><?php if ($_COOKIE) { print $_COOKIE["info"];	}?></div>
	<div class="cabecera-logo">
		<div class="contenedor-cabecera">
			<img src="img/logo.png" alt="Limoncito Borracho" title="limoncitoborracho.pe">
		</div>	
	</div>
	<div class="contenedor">
		<div class="cuerpo">
			<div class="titulo-div">
				<span class="titulo-actividad">Estado de Almacen (No Perecibles)</span><br>
			</div>
			<div class="estado">
				<ul class="estado-cabecera">
					<li>N°</li>
					<li class="producto">Descripcion</li>
					<li>Stock</li>
					<li>Unid. Medida</li>
					<li>Estado</li>
					<li class="img-link"><br></li>
				</ul>
				<?php 
				$sql="select * from producto p inner join unidad u where id_unidad=u.id and p.categoria=0";
				$resultado=mysql_query($sql);
				$contador=1;
				while ($filas=mysql_fetch_assoc($resultado)) {
				?>
				<ul <?php
				if ($filas["estado"]==0){
				 ?> id="inactivo" <?php } ?>class="estado-item">
					<li><?php print $contador; ?></li>
					<li class="producto"><?php print $filas["producto"];?></li>
					<li><?php print $filas["stock"];?></li>
					<li><?php print $filas["prefijo"];?></li>
					<li><?php print $estado[$filas["estado"]];?></li>
					<li class="img-link"><a href="#" class="editar"><img src="img/editar.png"/></a><a href="#"><?php if ($filas["estado"]==0) {?><img class="editar" src="img/eliminar.png"/><?php } ?></a></li>
				</ul>
				<?php
				$contador+=1;
				}
				?>
			</div>
			<div class="titulo-div">
				<span class="titulo-actividad">Estado de Almacen (Perecibles)</span><br>
			</div>
			<div class="estado">
				<ul class="estado-cabecera">
					<li>N°</li>
					<li class="producto">Descripcion</li>
					<li>Stock</li>
					<li>Unid. Medida</li>
					<li>Estado</li>
					<li class="img-link"><br></li>
				</ul>
				<?php 
				$sql="select * from producto p inner join unidad u where id_unidad=u.id and p.categoria=1";
				$resultado=mysql_query($sql);
				$contador=1;
				while ($filas=mysql_fetch_assoc($resultado)) {
				?>
				<ul <?php
				if ($filas["estado"]==0){
				 ?> id="inactivo" <?php } ?>class="estado-item">
					<li><?php print $contador; ?></li>
					<li class="producto"><?php print $filas["producto"];?></li>
					<li><?php print $filas["stock"];?></li>
					<li><?php print $filas["prefijo"];?></li>
					<li><?php print $estado[$filas["estado"]];?></li>
					<li class="img-link"><a href="#" class="editar"><img src="img/editar.png"/></a><a href="#"><?php if ($filas["estado"]==0) {?><img class="editar" src="img/eliminar.png"/><?php } ?></a></li>
				</ul>
				<?php
				$contador+=1;
				}
				?>
			</div>
			
		</div>
		<div class="pie">
			<div class="contenido-pie">
				<ul>
					<li>FAQ</li>
					<li>Contactanos y/o Ubicanos</li>
					<li>Derechos Reservados del Autor</li>
				</ul>
			</div>
		</div>
	</div>
</body>

</html>
