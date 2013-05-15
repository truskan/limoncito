<?php 
require_once("php/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Administracion de Mesas</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css"/>	
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
				$descripcion=spliti("/",$filas["contenido"]);
				print "----------------------";
				print_r($descripcion);
				/*
				$producto=split("*",$descripcion[0][0]);
				print_r($producto);
				* mostrar detalle de la mesa... producto por producto con la cantidad señalada
				*/
				foreach (array_keys($descripcion) as $llave) {
					$producto=spliti("*",$descripcion[$llave]);
				}
			?>
			<div class="mesa">
				<div class="activo">
				<div class="etiqueta">
				<span>Mesa <br><span class="mesa-numero"><?php print $filas["mesa"]; ?></span></span><br>
				</div>
				<ul>
					<li>Ceviche Especial</li>
					<li>Leche de Tigre</li>
					<li><a href="detalle-mesa.php?<?php print $i;?>">Ver</a></li>
				</ul>
				<div class="blanco"><br></div>
				</div>
			</div>
			<?php } ?>
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