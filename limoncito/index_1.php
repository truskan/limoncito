<?php 
require_once("php/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Limoncito Borracho</title>
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
			<div class="form-login">
				<form method="post" action="verificar-cuenta.php">
					<fieldset>
						<legend><strong>Autenticacion de Usuario</strong></legend>
					<label>Usuario:</label><br>
					<input type="text" name="usuario"><br>
					<label>Contraseña:</label><br>
					<input type="password" name="clave"><br>
					<input type="submit" value="login!">
					</fieldset>
				</form>
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

