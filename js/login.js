$(function()
{
	function onBtnCadastrarClick()	{
		$('#NovoUsuario').modal();
	}

	$("#enviar").click(function(){
		$("form[action='validacao.php']").submit();
	});

	$(".btn-cadastrar").click(function(){
        $("input[name=ID_CLIENTE]").val('');
		$("input[name=NOME]").val('');
		$("input[name=SOBRENOME]").val('');
		$("input[name=DATA_NASCIMENTO]").val('');
		$("input[type=radio][name='SEXO']:checked").attr("checked",false);
		$("input[name=TELEFONE]").val('');
		$("input[name=ENDERECO]").val('');
		$("input[name=EMAIL_LOGIN]").val('');
		$("input[name=SENHA_LOGIN]").val('');		
		$("input[type=radio][name='PERMISSAO']:checked").attr("checked",false);
    });
})