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
	
});
