<?php 
require_once("php/function.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Administracion de Ingredientes</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css"/>	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type='text/javascript' src='js/jquery.autocomplete.js'></script>
	<script type='text/javascript' src='js/jquery.autocomplete.min.js'></script>
	<script type='text/javascript' src='js/jquery.autocomplete.pack.js'></script>
	<script type='text/javascript' src='js/jquery.ui.min.js'></script>
	<script type='text/javascript' src='js/jquery.ui.core.js'></script>
	<script type='text/javascript' src='js/jquery.ui.widget.js'></script>
	<script type='text/javascript' src='js/jquery.ui.tabs.js'></script>	
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
		<div class="ingrediente-parametro">
			<label>Ingrediente</label> <input type="text" name="ingrediente"><br>
		</div>
		<!--
		<div class="ingrediente-detalle">
			<label>Precio</label>
			<input type="text" name="precio">
			<label>Fecha de Ingreso</label>
			<input type="calendar" name="fecha_ingreso">
			<label>Fecha de Vencimiento</label>
			<input type="calendar" name="fecha_vencimiento">
			<label>Cantidad</label><input class="campo-numero" type="cantidad"><label>Unid. Medida</label><input class="campo-numero" name="unidad_medida"><br>
			
			<button class="registrar">Registrar</button>
			<button class="nuevo">Nuevo</button>
			<button class="editar">Editar</button>
		</div>
		-->
		<div class="consultas">
			<fieldset>
			<input class="buscado" type="text" name="buscar">
			<hr>
			<ul class="consulta-cabecera">
				<li>Nombre</li>
				<li>Estado</li>
				<li>Cantidad en Almacen</li>
				<li>Faltan dias</li>
			</ul>
			<?php
			$sql="select * from detalle_ingrediente d inner join ingrediente i on d.id_ingrediente=i.id inner join unidad u on i.unidad_medida=u.id";
			$resultado=mysql_query($sql);
			while ($filas=mysql_fetch_assoc($resultado)) {
			?>
			<ul class="consulta-item">
				<li><?php print $filas["ingrediente"]; ?></li>
				<li><?php print $estado[$filas["estado"]];?></li>
				<li><?php print $filas["stock"]; ?> <?php print $filas["prefijo"];?></li>
				<li><?php print date("d",($filas["fecha_vencimiento"]-$filas["fecha_ingreso"]));?></li>
			</ul>
			<?php
			}
			?>
			<div class="consulta-vencida">
				<input type="radio" name="vencido"><span>Dar por salida los ingredientes en estado vencido</span><button>Ok!</button>
			</div>
			</fieldset>
		</div>
	</div>
	<div class="pie">
		<ul>
			<li>FAQ</li>
			<li>Contactanos y/o Ubicanos</li>
			<li>Derechos Reservados del Autor</li>
		</ul>
	</div>
</body>

</html>
