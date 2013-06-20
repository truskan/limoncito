<?php
require_once("php/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Home</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.21" />
	<link rel="stylesheet" media="screen" href="css/wipe.css" type="text/css"/>
	<link rel="stylesheet" media="screen" href="css/forms.css" type="text/css"/>
	<link rel="stylesheet" media="screen" href="css/basic.css" type=" text/css"/>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/after_efects_1.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<?php if ($_SESSION["user"]) {?>
	<link rel="stylesheet" media="screen" href="css/bubble.css" type="text/css"/>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<?php } else { ?><link rel="stylesheet" media="screen" href="css/navigation.css" type="text/css"/>
	
	<?php }?>
	
</head>
<body>
	<?php if ($_SESSION["user"]) {?>
	
	<div id="container-bar">
		
	</div>
	<?php } else { ?>
	<div class="welcome">
		Bienvenido a <a href="index.php" class="name-project">limoncito.pe</a> aqui podras <a class="click-register" href="#"><del>(si te logeas)</del></a> administrar y visualizar todos tus platos tipicos...
	</div>
	<form class="sign-up" method="post" action="registrar-cuenta.php">
		<div class="caption">
			<span class="title">Registrate</span><br>
			<span class="description">Completa todos los campos para tu registro</span>
		</div>
		<div class="labels">
			<ul>
			<li><label>Nombre</label><br><span>Agrega tu nombre</span></li>
			<li><label>Email</label><br><span>Agrega tu email</span></li>
			<li><label>Contraseña</label><br><span>Tamaño min 6 caract.</span></li>
			</ul>
		</div>
		<div class="inputs">
			<ul>
				<li><input id="fullname" type="text" name="nombre"></li>
				<li><input id="comida" type="text" name="usuario"></li>
				<li><input type="password" name="clave"></li>
			</ul>
		</div>
		<div class="submits">
			<input type="submit" value="Listo!"/>
		</div>
	</form>
	<?php } ?>
</body>

</html>
