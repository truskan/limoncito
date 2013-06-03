<?php 
require_once("php/function.php");
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/after_efects_1.js"></script>
<script type="text/javascript" src="js/after_efects.js"></script>
<script type="text/javascript">
	$("input[name='photo']").hide();
	$("#done-edit").toggle(function() {
		$(this).html("<img src='img/unlock.png'>");
		$("#edit-inputs input, #edit-inputs textarea").css({
			"border":"1px solid #7E2115",
			"background-color":"#FFFFFF",
			"-webkit-border-radius":"5px",
			"-moz-border-radius":"5px",
			"border-radius":"5px"
		});
		$("#edit-button-submit").show("slow");
		$("#edit-photo input[type='file']").show("slow");
		$("#edit-photo").css("text-align","center");
	}, function() {
		$("#done-edit").html("<img src='img/lock.png'>");
		$("#edit-inputs input, #edit-inputs textarea").css({	
			"background-color":"transparent",
			"border":"none"
		});	
		$("#edit-button-submit").hide("slow");
		$("#edit-photo input[type='file']").hide("slow");
	});
</script>
<div id="profile">
	<span class="text-general">Editar Perfil</span><br>
	<form method="post" action="edit-profile.php" enctype="multipart/form-data">
		<a href="#" id="done-edit"><img src="img/lock.png"/></a>
		<div id="edit-photo">
			<img src="<?php print $_SESSION["empleado"]["foto"];?>" alt="<?php print $_SESSION["empleado"]["usuario"]?>"/><br>
			<input type="file" name="photo">
		</div>
		<div id="edit-labels">
			<label class="text-paragraph">Usuario</label><br><span class="text-reference">Usuario con el que iniciara sesion</span><br>
			<label class="text-paragraph">Nombre</label><br><span class="text-reference">Nombre completo</span><br>
			<label class="text-paragraph">Description</label><br><span class="text-reference">Una breve descripcion</span><br>
		</div>
		<div id="edit-inputs">
			<input type="text" disabled name="username" value="<?php print $_SESSION["empleado"]["usuario"];?>"><br>
			<input type="text" name="full_name" value="<?php print $_SESSION["empleado"]["nombre"];?>"><br>
			<textarea name="description">Trabajador por Horas</textarea><br>
		</div>
		<div id="edit-button-submit">
			<input type="submit" value="Done!">
		</div>
	</form>
</div>
