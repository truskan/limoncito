<?php
require_once("php/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Limoncito</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.21" />
	<link rel="stylesheet" media="screen" href="css/jquery.fancybox.css" type="text/css"/>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/after_efects_1.js" type="text/javascript"></script>
	<script src="js/jquery.fancybox.js" type="text/javascript"></script>
	<script src="js/jquery.effects.drop.js" type="text/javascript"></script>
	<link rel="stylesheet" media="screen" href="css/basic.css" type="text/css"/>
	<?php if ($_SESSION["user"]) {?>
	<?php } else { ?><link rel="stylesheet" media="screen" href="css/navigation.css" type="text/css"/>
	
	<?php }?>
</head>
<body>
	<div class="error message"><?php if ($_COOKIE) { print $_COOKIE["error"];	}?></div>
	<div class="success message"><?php if ($_COOKIE) { print $_COOKIE["success"];	}?></div>
	<div class="info message"><?php if ($_COOKIE) { print $_COOKIE["info"];	}?></div>
	<div id="header">
		<div id="content-header">
			<?php if ($_SESSION["user"]) {?>
			<ul id="user-menu">
				<a href="#" class="link-user"><li class="list-first"><img src="img/pencilstraight.png" title="Configure su usuario."><span><?php print $_SESSION["empleado"]["usuario"]; ?></span></li></a>
				<a href="#" class="link-app"><li><img src="img/lightbulb.png" title="Agregar productos o ventas."><span>registrar</span></li></a>
				<a href="#" class="link-explore"><li><img src="img/magnifyingglass.png" title="Explore Limoncito."><span>explore</span></li></a>
				<a href="logout.php" class="link-logout" id="logout"><li class="list-last"><img src="img/reload.png" title="Cerrar sesion."><span>logout</span></li></a>
			</ul>
			<div class="logo-der">
				<img src="img/logo_der.png" alt="Limoncito!">
			</div>
			<?php } else {?>
			<ul id="nav">
				<a href="#" class="home"><li class="list-first">Incio</li></a>
				<a href="#" class="about"><li>Acerca</li></a>
				<a href="#" class="contact"><li>Contactenos</li></a>
				<a href="#" id="form-login"><li class="list-last">Login</li></a>
			</ul>
			<div class="form-login">
				<form method="post" action="verificar-cuenta.php">
					<label>Usuario</label>
					<input type="text" name="usuario"/><br>
					<label>Contraseña</label>
					<input type="password" name="clave"/><br>
					<a id="fancy-page" class="link-forgot" href="forgot_password.php" title="Solicite una nueva contraseña via E-mail.">Su contraseña?</a><input type="submit" value="Login!">
				</form>
			</div>
			<div class="logo-izq">
				<img src="img/logo_izq.png" alt="Otro Limoncito o.O!">
			</div>
			<?php }?>
		</div>
	</div>
	<div id="container">
	<div id="content">
		<?php if ($_SESSION["user"]) {?>
		<div id="menu-bar-app">
			<ul class="bar-menu-js">
				<a href="#" class="init-home" page="blog"><li class="bar-home">Blog</li></a>
				<a href="#"><li class="bar-user">Usuario</li></a>
					<ul id="bar-user">
						<a href="#" class="profile" page="profile"><li>Perfil</li></a>
						<a href="#" class="config" page="config"><li>Config</li></a>
						<a href="#" class="security" page="security"><li>Seguridad</li></a>
					</ul>
				<a href="#"><li class="bar-photos">Fotos</li></a>
					<ul id="bar-photos">
						<a href="#" class="explore" page="explore"><li>Explorar</li></a>
						<a href="#" class="views" page="views"><li>Vistas</li></a>
					</ul>
				<a href="#"><li class="bar-apps">Registros</li></a>
					<ul id="bar-apps">
						<a href="#" class="repo" page="compra"><li>Nueva Compra</li></a>
						<a href="#" class="table" page="mesas"><li>Mesas</li></a>
					</ul>
			</ul>
		</div>
		<div class="content-home-loged">
				<div id="bubble-content">
					
			
		</div>
		<?php }?>
		<div class="content"></div>
		<div id="push"></div>
	</div>
	</div>
	
	
</body>

</html>
