<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Administracion de Ingredientes</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />
	<link rel="stylesheet" type="css/text" media="screen" src="css/style.css"/>	
</head>

<body>
	<div class="error message"><?php if ($_COOKIE) { print $_COOKIE["error"];	}?></div>
	<div class="success message"><?php if ($_COOKIE) { print $_COOKIE["success"];	}?></div>
	<div class="info message"><?php if ($_COOKIE) { print $_COOKIE["info"];	}?></div>
	<div class="cabecera-logo"><img src="img/logo.png" alt="Limoncito Borracho" title="limoncitoborracho.pe"></div>
	<div class="contenedor">
		<div class="ingrediente-parametro">
			<label>Ingrediente</label> <input type="text" name="ingrediente"><br>
		</div>
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
		<div class="consultas">
			<fieldset>
			<input class="buscado" type="text" name="buscar">
			<hr>
			<ul class="consulta-cabecera">
				<li>Nombre</li>
				<li>Estado</li>
				<li>Cantidad en Almacen</li>
			</ul>
			<ul class="consulta-item">
				<li>Jurel</li>
				<li>Optimo</li>
				<li>14 kg</li>
			</ul>
			<ul class="consulta-item">
				<li>Bonito</li>
				<li>Vencido</li>
				<li>3 kg</li>
			</ul>
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
