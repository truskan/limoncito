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
				<span>Limoncito Borracho!!!</span>
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
			<ul>
				<a href="#" class="init-home"><li class="bar-home">Blog</li></a>
				<a href="#"><li class="bar-user">Usuario</li></a>
					<ul id="bar-user">
						<a href="#" class="profile"><li>Perfil</li></a>
						<a href="#" class="config"><li>Config</li></a>
						<a href="#" class="security"><li>Securidad</li></a>
					</ul>
				<a href="#"><li class="bar-photos">Fotos</li></a>
					<ul id="bar-photos">
						<a href="#" class="explore"><li>Explorar</li></a>
						<a href="#" class="galery"><li>Galeria</li></a>
						<a href="#" class="views"><li>Vistas</li></a>
					</ul>
				<a href="#"><li class="bar-apps">Registros</li></a>
					<ul id="bar-apps">
						<a href="#" class="new-bar"><li>Nueva Venta</li></a>
						<a href="#" class="offers"><li>Nueva Compra</li></a>
						<a href="#" class="mesas"><li>Mesas</li></a>
					</ul>
			</ul>
		</div>
		<div class="content-home-loged">
				<div id="bubble-content">
					<div id="home">
						<span class="text-general">Bienvenido!!!</span><br>
						<span class="text-paragraph">Comience editando su Perfil.</span>
					</div>
					<div id="profile">
						<span class="text-general">Editar Perfil</span><br>
						<form method="post" action="edit-profile.php" enctype="multipart/form-data">
							<a href="#" id="done-edit"><img src="img/lock.png"/></a>
							<div id="edit-photo">
								<img src="<?php print $_SESSION["empleado"]["foto"];?>" alt="<?php print $_SESSION["empleado"]["usuario"]?>"/><br>
								<input type="file" name="photo">
							</div>
							<div id="edit-labels">
								<label class="text-paragraph">Usuario</label><br><span class="text-reference">Usuario con el que iniciara sesion</span><br>
								<label class="text-paragraph">Nombre</label><br><span class="text-reference">Nombre completo</span><br>
								<label class="text-paragraph">Description</label><br><span class="text-reference">Una breve descripcion</span><br>
							</div>
							<div id="edit-inputs">
								<input type="text" disabled name="username" value="<?php print $_SESSION["empleado"]["usuario"];?>"><br>
								<input type="text" name="full_name" value="<?php print $_SESSION["empleado"]["nombre"];?>"><br>
								<textarea name="description">Trabajador por Horas</textarea><br>
							</div>
							<div id="edit-button-submit">
								<input type="submit" value="Done!">
							</div>
						</form>
					</div>
					<div id="config">
						<span class="text-paragraph">Themes</span><br>
						<ul class="theme-types">
							<li title="sky" class="sky"><input type="radio" name="paragraph-type" value="sky"><span class="left"></span><span class="center"></span><span class="right"></span></li>
							<li title="forrest" class="forrest"><input type="radio" name="paragraph-type" value="forrest"><span class="left"></span><span class="center"></span><span class="right"></span></li>
							<li title="wind" class="wind"><input type="radio" name="paragraph-type" value="wind"><span class="left"></span><span class="center"></span><span class="right"></span></li>
						</ul>
						<input type="submit" class="button-done" value="Done!"/>
					</div>
					<div id="security">
						<span class="text-general">Security</span><br>
						<span class="text-paragraph">Disable account</span><br>
						<form method="post" action="disable_account.php">
						<span><em>password is required</em></span><br>
						<input type="password" name="password"><br>
						<span><em>Re-type your password</em></span><br>
						<input type="password" name="retype_password">
						<input type="submit" value="Done!"/>
						</form>
					</div>
					<div id="explore">
						<span class="text-general">Search in Limoncito</span><br>
						<div class="input-img-text">
							<img id="explore-img" src="img/magnifyingglass.png">
							<input type="text" name="s" id="parameter"/>
						</div>
						<div id="result-query"></div>
					</div>
					<div id="galery">galery</div>
					<div id="views">views</div>
					<div id="new-bar">new bar</div>
					<div id="offers">offers</div>			
					<div id="mesas">
						
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
			?>
			<div class="mesa">
				<div class="activo">
				<div class="etiqueta">
				<span>Mesa <br><span class="mesa-numero"><?php print $filas["mesa"]; ?></span></span><br>
				</div>
				<ul>
			<?php
				$descripcion=split("/",$filas["contenido"]);
				for ($i=0; $i<count($descripcion); $i++) {
					list($cantidad,$producto)=split('[*]',$descripcion[$i]);
					$sql_aux="select * from producto where id='".$producto."'";
					$resultado_aux=mysql_query($sql_aux);
					while ($filas_aux=mysql_fetch_assoc($resultado_aux)) {
						print "<li>".$cantidad."-".ucwords($filas_aux["producto"])."</li>";
					}
				}
			?>
					<li><a href="detalle-mesa.php?<?php print $filas["id"];?>">Ver</a></li>
				</ul>
				<div class="blanco"><br></div>
				</div>
			</div>
			<?php } ?>
		</div>
						
						
					</div>			
				</div>
			
		</div>
		<?php }?>
		<div class="content"></div>
		<div id="push"></div>
	</div>
	</div>
	
	
</body>

</html>
