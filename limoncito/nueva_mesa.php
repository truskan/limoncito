<?php
require_once("php/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Nueva Mesa</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			
			var comida="";
			$(".pedido_inicial input[name='producto']").keyup(function() {
				alert("tum");
				patron=$(".pedido_inicial input[name='producto']").val();
				if (patron.length>=1){
					$.ajax({
						type: "POST",
						url: "data_autocomplete.php",
						data: "patron="+patron,
						success: function(data) {
							comida=data;
						}
					});
					ubi=comida.split("/");
					$(".pedido_inicial input[name='producto']").autocomplete({
						source: ubi
					});
				}
			});
						
			$(".registrar_mesa").click(function() {
				alert("tic tic");
			});
		});
	</script>
</head>

<body>
	<h1>Nueva Mesa</h1>
	<label>Cliente:</label> <input type="text" name="cliente"><br>
	<label>Seleccione Mesa </label><select name=mesa>
	<?php 
	$sql="select * from evento_mesa where estado=1";
	$resultado=mysql_query($sql);
	$mesas_ocupadas=array();
	while ($fila=mysql_fetch_assoc($resultado)) {
		$mesas_ocupadas[]=$fila["mesa"];
	}
	for ($i=1;$i<$mesas+1;$i++) {
		if (!(in_array($i,$mesas_ocupadas))) {
		?>
		<option value='<?php print $i; ?>'><?php print "Nº ".$i; ?></option>
		<?php
		}
	}?>
	</select><br>
	<label>Pedido Inicial</label><br>
	<div class="pedido_inicial">
		<input type="text" name="cantidad"/> | <input type="text" name="producto"/>
	</div>
	<a href="#" class="pedido_inicial">+ pedidos</a><br>
	<button class="registrar_mesa">Listo</button>
</body>

</html>
