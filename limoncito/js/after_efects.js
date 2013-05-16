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
	
	$(".agregar-plato").click(function() {
		//var cont=($(".pedido-actual").attr("contador")).val();
		var cont=$(".pedido-actual > .platos-pedidos").size();
		$(".pedido-actual").append("<ul class='platos-pedidos'><li>"+(cont+1)+"</li><li><input type='text' name='nuevo_plato'/></li><li><div class='precio-plato'><br></div></li><li><input type='text' name='nuevo_plato_cantidad'/></li><li><br></li></ul>");
		//alert(cont);
		$(".platos-pedidos:even").css("background-color","#E5EDF0");
		$(".platos-pedidos input[name='nuevo_plato']").css("width","100px");
		$(".platos-pedidos input[name='nuevo_plato']").css("font-size","10px");
		$(".platos-pedidos input[name='nuevo_plato_cantidad']").css("width","40px");
		$(".platos-pedidos input[name='nuevo_plato_cantidad']").css("font-size","10px");
	});
	
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
		//var datos="comida espejo cancion";
		$(".platos-pedidos input[name='nuevo_plato']").autocomplete({
			source: ubi
		});
			
		}
	});	
});
