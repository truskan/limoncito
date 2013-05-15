$(document).ready(function() {
	$(".expediente").show();
	$(".informe").hide();
	$("#doc").change(function () {
		valor=$(this).val();
		if (valor=="informe") {
			$(".expediente").hide();
			$(".expediente").attr('disable',true);
			$(".informe").show();
			$(".informe").attr('disable',false);
		} else if (valor=="expediente") {
			$(".informe").hide();
			$(".informe").attr('disable',true);
			$(".expediente").show();
			$(".expediente").attr('disable',false);
		}
	});
});
