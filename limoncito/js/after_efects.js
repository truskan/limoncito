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
	
	
	
	
});

