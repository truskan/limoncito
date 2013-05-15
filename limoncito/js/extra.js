$(document).ready(function() {
	$("#form-configuracion, #form-temas, #form-red").css("display","none");
	$(".options li:first").css("background-color","#FC7A91");
	$(this).css("background-color","#BFBFBF");
	$(".options li").click(function() {
		if($(this).text()=="Personal") {
			$("#form-configuracion, #form-temas, #form-red").css("display","none");
			$("#form-personal").show();
			$(".options li").css("background-color","#1E90FF");
			$(this).css("background-color","#FC7A91");
		} else if($(this).text()=="Configuracion") {
			$("#form-personal, #form-temas, #form-red").css("display","none");
			$("#form-configuracion").show();
			$(".options li").css("background-color","#1E90FF");
			$(this).css("background-color","#FC7A91");
		} else if ($(this).text()=="Temas") {
			$("#form-personal, #form-configuracion, #form-red").css("display","none");
			$("#form-temas").show();
			$(".options li").css("background-color","#1E90FF");
			$(this).css("background-color","#FC7A91");
		} else if ($(this).text()=="Red") {
			$("#form-personal, #form-configuracion, #form-temas").css("display","none");
			$("#form-red").show();
			$(".options li").css("background-color","#1E90FF");
			$(this).css("background-color","#FC7A91");
		}	
	});
	
	$("input[name='patron']").keyup(function() {
		if ($(this).length==0) {
			patron="todo";
		} else {
			patron=$(this).val();
		}
		$.ajax({
			type: "POST",
			url: "buscar_documento.php",
			data: "patron="+patron,
			success: function(data) {
				$("#documento-resultado").html(data);
			}
		});
	});
});
