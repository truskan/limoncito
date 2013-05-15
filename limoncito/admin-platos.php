<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Administracion de Platos</title>
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
			<span class="titulo-actividad">Administracion de Platos</span><br>
		</div>
		<div class="parametro">
			<label>Plato</label> <input type="text" name="ingrediente"> | <button>Nuevo Plato</button>
		</div>
		<div class="detalle plato">
			<ul class="cabecera-plato">
				<li>Ingrediente</li>
				<li>Cantidad</li>
				<li><br></li>
				<li><br></li>
			</ul>
			<ul class="cabecera-plato">
				<li>Pescado Jurel</li>
				<li>800 Gr</li>
				<li><a class="editar">lapiz</a></li>
				<li><br></li>
			</ul>
			<ul class="cabecera-plato">
				<li>Pescado Jurel</li>
				<li>800 Gr</li>
				<li><a class="editar">lapiz</a></li>
				<li><br></li>
			</ul>
			<ul class="cabecera-plato">
				<li>Pescado Jurel</li>
				<li>800 Gr</li>
				<li><a class="editar">lapiz</a></li>
				<li><a class="agregar">Mas Platos</a></li>
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
