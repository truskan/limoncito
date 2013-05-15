<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Detalle de Mesa</title>
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
			<div class="detalle-mesa-plato">
			<input type="text" name="q" class="buscador-plato" value="Busqueda de platos y otros"><br>
			<div class="encontrado">
				<hr>
			</div>
			<div class="opcional">
				<label>Cantidad</label><input type="text" name="cantidad-pedido"><button class="agregar-plato">Añadir a Pedido</button>
			</div>
			<hr>
			<div class="pedido-actual">
				<ul class="cabecera-pedidos">
					<li>Numero</li>
					<li>Codigo</li>
					<li>Producto</li>
					<li>Precio</li>
					<li>Cantidad</li>
					<li>importe</li>
				</ul>
				<ul class="platos-pedidos">
					<li>2</li>
					<li>005</li>
					<li>Ceviche Mixto</li>
					<li>20.00</li>
					<li>2</li>
					<li>40.00</li>
				</ul>
				<ul class="platos-pedidos">
					<li>1</li>
					<li>003</li>
					<li>Ceviche Especial</li>
					<li>25.00</li>
					<li>2</li>
					<li>50.00</li>
				</ul>
			</div>
		</div>
		<div class="detalle-mesa-cliente">
			<div class="detalle-mesa-basico">
				<label>Cliente:</label>
				<input type="text" name="cliente">
				<label>Tipo de Venta</label>
				<span>Boleta</span><input type="radio" name="venta" value="boleta"><span>Factura</span><input type="radio" name="venta" value="factura"><br>
				<label>Numero</label><span>00034-01</span><br>
				<label>RUC</label><input type="text" name="ruc">
			</div>
			<div class="detalle-mesa-fecha">
				<label>Fecha </label><span>24/04/2013</span><br>
				<label>Mesa</label><br>
				<span class="detalle-mesa-numero">4</span><br>
			</div>
			<div class="detalle-importe">
				<ul class="cabecera-importe">
					<li>Sub Total</li>
					<li>90.00</li>
					<li>I.G.V.</li>
					<li>00.00</li>
					<li>Neto</li>
					<li>00.00</li>
				</ul>
			</div>
			<div class="detalle-pedido-admin">
				<button class="terminar">Terminar</button>
				<button class="guardar">Guardar</button>
				<button class="imprimir">Imprimir</button>
				<button class="cancelar">Imprimir</button>
			</div>
		</div>
		</div>
	</div>
</body>

</html>
