<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Registrar Ventas</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />
	<link rel="stylesheet" type="css/text" media="screen" src="css/style.css"/>	
</head>

<body>
	<div class="error message"><?php if ($_COOKIE) { print $_COOKIE["error"];	}?></div>
	<div class="success message"><?php if ($_COOKIE) { print $_COOKIE["success"];	}?></div>
	<div class="info message"><?php if ($_COOKIE) { print $_COOKIE["info"];	}?></div>
	<div class="cabecera-logo"><img src="img/logo.png" alt="Limoncito Borracho" title="limoncitoborracho.pe"></div>
	<form method="post" action="verificar_venta.php">
		<label>Tipo de Venta</label><br>
		<input type="radio" name="tipo" value="boleta"> | <input type="radio" name="tipo" value="factura"><br>
		<label>Numero </label><span class="numero"></span><br>
		<label>Cliente</label><br>
		<input type="text" name="cliente"><br>
		<div class="mini-buscador">
			
		</div>
		<
	</form>
</body>

</html>
