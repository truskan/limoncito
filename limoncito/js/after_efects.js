$("document").ready(function() {

	$(".message").hide();
	if ($(".error").text().length>0) {
		$(".error").slideDown("slow",function() {
			$(".error").css("height","10px");
			$(".error").css("padding-top","30px");
			$(".error").show();
		}).delay(8000).slideUp("slow");
	} else {
		if ($(".success").text().length>0) {
			$(".success").slideDown("slow",function() {
				$(".success").css("height","10px");
				$(".success").css("padding-top","30px");
				$(".success").show();
			}).delay(8000).slideUp("slow");
		} 
	}
	$(".estado-item:last-child").css("border-bottom-right-radius","5px");
	$(".estado-item:last-child").css("border-bottom-left-radius","5px");
	$(".estado-item:even").css("background-color","#E5EDF0");
	$(".platos-pedidos:even").css("background-color","#E5EDF0");
	//$("#inactivo").css("background-color","#FE5353");
	$(".estado-cabecera").css("background-color","#0F2A31");
	$(".estado-cabecera").css("color","#FFFFFF");
	$(".estado-cabecera").css("font-weight","bold");
	$("#nuevo-plato").hide();
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
			url: "agregar_plato.php",
			data: "patron="+patron,
			success: function(data) {
				valor=data;
			}
		});
		location.reload();
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

