$("document").ready(function(){ 
	$(".origen").keyup(function() {
		patron=$(".origen").val();
		if (patron.length>=1){
			$.ajax({
				type: "POST",
				url: "data_autocomplete.php",
				data: "patron="+patron,
				success: function(data) {
					comida=data;
				}
		});
		
		//alert(patron);
			ubi=comida.split("/");
			//var datos="comida espejo cancion";
			$(".origen").autocomplete({
				source: ubi
			});
			
		}
	});
	//$(".derivado").autocomplete(datos);	
	$(function() {
		$("#tabs").tabs();
	});
	
	//~ $.ajax({
		//~ type: "POST",
		//~ url: "data_report.php",
		//~ data: ""
		//~ 
	//~ });
	$(".app-def").mouseover(function() {
		if ($(this).attr("alt")=="document") {
			$(".app-detail").html("<div class='content-app'><h1>Registro de Documentos</h1><br><span class='txt-medium'>Con esta aplicacion Ud., podra administrar los documentos que recepciona por oficinas</span></div>");
		} else if ($(this).attr("alt")=="register") {
			$(".app-detail").html("<div class='content-app'><h1>Registro de Documentos</h1><br><span class='txt-medium'>Con esta aplicacion Ud., podra administrar los documentos que recepciona por oficinas</span></div>");
		} else {
			$(".app-detail").html("<br>");
		}
	});
	$(".app-def").mouseout(function() {
		$(".content-app").remove();
	});
	
	$(".find").click(function() {
		$("input[name='patron']").focus();
	});
	$("input[name='reporte']").click(function() {
		if ($(this).val()=="oficina") {
			alert("oficina");
		}
	});
	$("input[name='patron']").keyup(function() {
		patron=$(this).val();
		$.ajax({
			
		});
	});
});
