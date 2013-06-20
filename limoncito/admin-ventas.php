<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Administracion de Ventas</title>
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
			<span class="titulo-actividad">Resumen de Ventas</span><br>
		</div>
		<div class="parametro">
			<label>Mostrar ventas de: </label>
			<select name="fecha">
				<option>Hoy</option>
				<option>Esta semana</option>
				<option>Semana Pasada</option>
				<option>Mes</option>
				<option>Periodo en particual</option>
			</select>
		</div>
		<div class="opciones">
			<button>Exportar</button>
			<button>Imprimir</button>
		</div>
		<div class="detalle fecha">
			<ul class="ventas-cabecera">
				<li>Producto</li>
				<li>Cantidad</li>
				<li>Precio</li>
				<li>Total</li>
			</ul>
			<ul class="ventas-item">
				<li>Ceviche Mixto</li>
				<li>3</li>
				<li>15.00</li>
				<li>45</li>
			</ul>
			<ul class="ventas-item">
				<li>Ceviche Especial</li>
				<li>5</li>
				<li>35.00</li>
				<li>175.00</li>
			</ul>
			<ul class="ventas-item">
				<li>Leche de Tigre</li>
				<li>10</li>
				<li>5.00</li>
				<li>50.00</li>
			</ul>
			<ul class="ventas-item">
				<li>Ceviche Mixto</li>
				<li>3</li>
				<li>15.00</li>
				<li>45.00</li>
			</ul>
		</div>
		
		<div class="cuadre">
			<ul class="cuadre-cabecera">
				<li>Total Ingresos</li>
				<li>Total Egresos</li>
				<li>Total Ganancia</li>
				<li>Perdida</li>
			</ul>
			<ul class="cuadre-cabecera">
				<li>1200.00</li>
				<li>750.00</li>
				<li>450.00</li>
				<li>100.00</li>
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
