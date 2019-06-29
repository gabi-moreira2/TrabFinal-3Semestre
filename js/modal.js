$(document).ready(function(){	
	$(".btn-cadastrar").click(function(){
		$("#novoCadastro").modal();
		$(".modal-title").html("Novo Cadastro");
		$("#enviar").val("Enviar");	//Id
	});
});
