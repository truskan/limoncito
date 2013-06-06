$(document).ready(function() {
	$("#nuevo-plato").hide();
	$(".agregar-plato").css("color","#1E90FF");
	$(".agregar-plato").click(function() {
		//var cont=($(".pedido-actual").attr("contador")).val();
		$(".platos-pedidos input[name='nuevo_plato']").focus();
		var cont=$(".pedido-actual > .platos-pedidos").size();
		//alert(cont);
		$(".platos-pedidos:even").css("background-color","#E5EDF0");
		$(".platos-pedidos input[name='nuevo_plato']").css("width","100px");
		$(".platos-pedidos input[name='nuevo_plato']").css("font-size","10px");
		$(".platos-pedidos input[name='nuevo_plato_cantidad']").css("width","40px");
		$(".platos-pedidos input[name='nuevo_plato_cantidad']").css("font-size","10px");
		$(".platos-pedidos input[name='nuevo_plato_cantidad']").css("position","relative");
		$(".platos-pedidos .precio_plato").css("margin-left","40px");
		$("#nuevo-plato").show();
	});
	
	var comida="";
	$(".platos-pedidos input[name='nuevo_plato']").keyup(function() {
		patron=$(".platos-pedidos input[name='nuevo_plato']").val();
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
			$(".platos-pedidos input[name='nuevo_plato']").autocomplete({
				source: ubi
			});
		}
	});	
	var cantidad="";
	$(".platos-pedidos input[name='nuevo_plato']").focusout(function() {
		patron=$(".platos-pedidos input[name='nuevo_plato']").val();
		$.ajax({
			type: "POST",
			url: "buscar_precio.php",
			data: "patron="+patron,
			success: function(data) {
				cantidad=data;
			}
		});
		$(".precio-plato").text(cantidad);
	});
	$("input[name='nuevo_plato_cantidad']").keyup(function() {
		importe=$(".precio-plato").text()*$(".platos-pedidos input[name='nuevo_plato_cantidad']").val();
		$(".importe").text(importe);
	});
	valor="";
	$(".add-plato").click(function(){
		plato=$(".platos-pedidos input[name='nuevo_plato']").val();
		cantidad=$(".platos-pedidos input[name='nuevo_plato_cantidad']").val();
		patron=cantidad+"*"+plato;
		$.ajax({
			type: "POST",
			url: "verificar_stock.php",
			data: "patron="+patron,
			success: function(data) {
				sw=data;
			} 
		});
		sw=0;
		if(sw=="1") {
			$.ajax({
				type: "POST",
				url: "agregar_plato.php",
				data: "patron="+patron,
				success: function(data) {
					valor=data;
				}
			});
			$(".fancy").reload();
		}
		else {
			alert("No hay stock para "+cantidad+" de "+plato);
			$("input[name='nuevo_plato']").focus();	
		}
	});
		
		
	
	
	if ($("input[type='radio']").val()=="boleta") {
		$(".no-boleta").hide();
	}
	$("input[type='radio']").click(function(){
		if ($(this).val()=="boleta") {
			$(".no-boleta").hide();
		}
		else {
			$(".no-boleta").show();
			}
	});
});
