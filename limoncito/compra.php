<?php
require_once("php/function.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Nueva Compra</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<style>
		.compra_cabecera li , .compra_item li {
			display:inline;
		}
		.compra_item li {
			float:left;
		}
		.c_detalle {
			width: 300px;
		}
		.c_detalle, .c_total, .c_numero {
			text-align: center;
		}
		.c_total {
			width: 100px;
		}
		.c_proveedor {
			width: 200px;
			text-align: center;
		}
		
		.cp_img_add {
			width: 40px;
		}
	</style>
	<script type="text/javascript">
		$("document").ready(function() {
			$(".t_compra tr:first").css("background-color","#2B2B5E");
			$(".t_compra tr:first").css("color","#FFF");
			$(".t_compra").css("font-size","11px");
			$(".t_compra").css("margin-left","60px");
			$(".t_compra th").css("color","#FFF");
			$(".t_compra tr:even").css("background-color","#AAB5BF");
			$(".t_compra tr:even").css("color","#2B2B5E");
			$(".t_detalle tr:even").css("background-color","transparent");
			
			
			var cont=$(".cp_table .cp_add_items").size();
			$(".cp_item_numero").append(cont);
			$(".p_add_item").click(function() {
				cont++;
				$(".cp_table").append("<tr class='cp_add_items'><td><span class='id_cp'></span></td><td><span class='cp_item_numero'>"+cont+"</span></td><td><input type='text' name='nuevo_producto'/></td><td><input type='text' name='nuevo_costo'/></td><td><input type='text' name='nuevo_cantidad'/></td><td><span class='cp_item_importe'></span></th><td><img class='cp_img_add' src='img/add.png'></th></tr>");
				$(".cp_add_items input[name='numero_producto']").focus();
			});
			$(".p_add_item").hide();
			$(".cp_add_items input[name='nuevo_cantidad']").keyup(function() {
				$(".cp_add_items .cp_item_importe").text($(".cp_add_items input[name='nuevo_costo']").val()*$(this).val());
				if ($(".cp_item_importe").text()=="0") {
					$(".p_add_item").hide();
				} else {
					$(".p_add_item").show();
				}
			});
			var id="";
			$(".cp_add_items .cp_img_add").click(function() {
				patron=$(".cp_add_items input[name='nuevo_cantidad']").val()+"*"+$(".cp_add_items input[name='nuevo_producto']").val()+"*"+$(".cp_add_items input[name='nuevo_costo']").val();
				cantidad=$(".cp_add_items input[name='nuevo_cantidad']").val();
				producto=$(".cp_add_items input[name='nuevo_producto']").val();
				costo=$(".cp_add_items input[name='nuevo_costo']").val();
				producto=$(".cp_add_items input[name='nuevo_producto']").val();
				proveedor=$("input[name='proveedor']").val();
				identificador=$(".cp_item_numero").text();
				ruc=$("input[name='ruc']").val();
				total=$(".cp_item_importe").text();
				if (identificador==1) {
					cid=$("input[name='cid']").val();
				}
				alert(cid);
				patron=identificador+"+"+proveedor+"+"+ruc+"+"+patron+"+"+total+"+"+cid;
				alert(proveedor);
				alert(ruc);
				alert(patron);
				$.ajax({
					type: "POST",
					url: "agregar-producto-compra.php",
					data: "patron="+patron,
					success: function(data) {
						id=data;
					} 
				});
				
				//Cambiar los inputs por spans... xD
				alert($(".cp_item_numero").text());
				identificador=$(".cp_item_numero").text();
				//id=id_compra/id_detalle
				if (id!="") {
					$(".p_added").append("<tr class='"+id+"'><td><span class='id_cp'>"+id+"</span></td><td><span class='cp_item_numero'>"+cont+"</span></td><td>"+$("input [name='nuevo_producto']").val()+"</td><td>"+$("input [name='nuevo_costo']").val()+"</td><td>"+$("input [name='nuevo_cantidad']").val()+"</td><td>"+$("cp_item_importe").text()+"</td><td><img class='cp_img_add' src='img/add.png'></td></tr>");
					
				} else {
					alert("Datos Incorrectos");
					$(".cp_table").html("<tr class='cp_add_items'><td><span class='id_cp'></span></td><td><span class='cp_item_numero'>"+cont+"</span></td><td><input type='text' name='nuevo_producto' value='"+producto+"'/></td><td><input type='text' name='nuevo_costo' value='"+costo+"'/></td><td><input type='text' name='nuevo_cantidad' value='"+cantidad+"'/></td><td><span class='cp_item_importe'>"+(cantidad*costo)+"</span></th><td><img class='cp_img_add' src='img/add.png'></th></tr>");
				}
			});
		});
	</script>
</head>
<body>
	<!-- Lista de Compras realizadas segun proveedor -->
	<h2>Ranking de Compra de Productos</h2>
	<table class="t_compra" border=1>
		<tr class="compra_cabecera">
			<th>Numero</th>
			<th  class="c_detalle">Compra Detalle</th>
			<th>Costo</th>
			<th>Proveedor</th>
		</tr>
	<?php
		$sql="select * from compra c inner join proveedor p on c.id_proveedor=p.id";
		$resultado=mysql_query($sql);
	?>
		
	<?php
	$i=1;
	while ($fila=mysql_fetch_assoc($resultado)) {
		print "<tr title='Compra realizada el ".date('d/m/y',$fila["fecha_compra"])."'>";
		print "<td class='c_numero'>".$i."</td>";
		$compra_items=split('[/]',$fila["ingredientes"]);
		print "<td>";
		print "<table class='t_detalle' border=0.5>";
		foreach($compra_items as $item) {
			$detalle_item=split('[*]',$item);
			$sql2="select ingrediente from ingrediente where id='".$detalle_item[1]."'";
			$resultado2=mysql_query($sql2);
			while($fila2=mysql_fetch_assoc($resultado2)) {
				$ingrediente=$fila2["ingrediente"];
			}
			print "<tr>";
				print "<td>".$detalle_item[0]." Unids. </td>";
				print "<td>".$ingrediente."</td>";
				print "<td>".$detalle_item[2]."</td>";
			print "<tr>";
		}
		print "</table>";
		print "</td>";
		print "<td class='c_total'>S/. ".$fila["total"]."</td>";
		print "<td class='c_proveedor'>".$fila["proveedor"]."</td>";
		$i++;
		print "</tr>";
	}
	?>
	</table>
		<hr>
	<fieldset>
		<legend>Nueva Compra</legend>
		<label class='l_input'>Proveedor</label> <input type="text" name="proveedor"><br>
		<label class='l_input'>RUC Nº</label> <input type="text" name="ruc"><br>
		<label>Tipo de Entrada</label><br>
		<label>Manual</label><input type="radio" checked name="entrada" value="manual"> | <label>Archivo</label><input type="radio" name="entrada" value="archivo">
		<div class="archivo">
			<label>Archivo</label><input type="file" name="compra_archivo"/>
		</div>
		<div class="compra_productos">
			<table class='cp_table'>
				<tr>
					<th><br></th>
					<th>N"</th>
					<th>Producto</th>
					<th>Costo</th>
					<th>Cantidad</th>
					<th>Importe</th>
					<th><br><input type='hidden' name='cid' value='<?php print time(); ?>'</th>
				</tr>
				<div class="p_added"></div>
				<tr class='cp_add_items'>
					<td><span class='id_cp'></span></td>
					<td><span class='cp_item_numero'></span></td>
					<td><input type='text' name='nuevo_producto'/></td>
					<td><input type='text' name='nuevo_costo'/></td>
					<td><input type='text' name='nuevo_cantidad'/></td>
					<td><span class='cp_item_importe'></span></th>
					<td><img class='cp_img_add' src="img/add.png"></th>
				</tr>
			</table>
			<a href="#" class='p_add_item'>añadir producto</a>
		</div>
		<button>Registrar Compra</button>
	</fieldset>
</body>

</html>
