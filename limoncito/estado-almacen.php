<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Estado de Almacen</title>
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
		<div class="titulo-div">
		<span class="titulo-actividad">Estado de Almacen (Productos)</span><br>
		</div>
		<div class="estado-productos">
			<ul class="productos-cabecera">
				<li>Descripcion</li>
				<li>Stock</li>
				<li>Unid. Medida</li>
				<li>Estado</li>
				<li><br></li>
			</ul>
			<ul class="productos-item">
				<li>Pilsen</li>
				<li>10</li>
				<li>cajas</li>
				<li>Optimo</li>
				<li><a class="editar">lapiz</a></li>
			</ul>
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
