$(function(){

	id_cliente = "";
	nome = "";
	sobrenome = "";
	data_nascimento = "";
	sexo = "";
	telefone = "";
	endereco = "";
	email = "";
	senha = "";
	permissao = "";
	linha = "";

       $("#enviar").click(function(){
        	u="insere.php?tabela=CLIENTE";
			parametros = {id_cliente: $("input[name='ID_CLIENTE']").val(), nome: $("input[name='NOME']").val(), sobrenome: $("input[name='SOBRENOME']").val(), data_nascimento: $("input[name='DATA_NASCIMENTO']").val(), sexo: $("input[type=radio][name='SEXO']:checked").val(), telefone: $("input[name='TELEFONE']").val(), endereco: $("input[name='ENDERECO']").val(), email: $("input[name='EMAIL_LOGIN']").val(), senha: $("input[name='SENHA_LOGIN']").val(), permissao: $("input[type=radio][name='PERMISSAO']:checked").val()};
       
        	$.post(u,parametros).done(function(data){
			
				$("#status").html(data);
				linha.children("td:nth-child(1)").html($("input[name='ID_CLIENTE']").val());
				linha.children("td:nth-child(2)").html($("input[name='NOME']").val());
				linha.children("td:nth-child(3)").html($("input[name='SOBRENOME']").val());
				linha.children("td:nth-child(4)").html($("input[name='DATA_NASCIMENTO']").val());
				linha.children("td:nth-child(5)").html($("input[type=radio][name='SEXO']:checked").val());
				linha.children("td:nth-child(6)").html($("input[name='TELEFONE']").val());
				linha.children("td:nth-child(7)").html($("input[name='ENDERECO']").val());
				linha.children("td:nth-child(8)").html($("input[name='EMAIL']").val());
				linha.children("td:nth-child(9)").html($("input[name='SENHA']").val());
				linha.children("td:nth-child(10)").html($("input[type=radio][name='PERMISSAO']:checked").val());
				$("#novoCadastro").fadeOut();
				$(".modal-backdrop").hide(); //Fecha o modal
				
			});
		
    	});



    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
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
});