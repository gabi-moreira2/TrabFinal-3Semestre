$(function(){
	
	id_cliente = "";
	nome = "";
	sobrenome = "";
	data_nascimento = "";
	sexo = "";
	telefone = "";
	endereco = "";
	email = "";
	permissao = "";
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
		id_cliente = $(this).closest("tr").children("td:nth-child(1)").html();
		nome = $(this).closest("tr").children("td:nth-child(2)").html();
		sobrenome = $(this).closest("tr").children("td:nth-child(3)").html();
		data_nascimento = $(this).closest("tr").children("td:nth-child(4)").html();
		sexo = $(this).closest("tr").children("td:nth-child(5)").html();
		if(sexo=="MASCULINO"){
			sexo=2;
		}
		else{
			sexo=1;
		}
		telefone = $(this).closest("tr").children("td:nth-child(6)").html();
		endereco = $(this).closest("tr").children("td:nth-child(7)").html();
		email = $(this).closest("tr").children("td:nth-child(8)").html();
		permissao = $(this).closest("tr").children("td:nth-child(9)").html();
		if(permissao=="CLIENTE"){
			permissao=2;
		}
		else{
			permissao=1;
		}
		$(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_CLIENTE]").val(id_cliente);
		$("input[name=NOME]").val(nome);
		$("input[name=SOBRENOME]").val(sobrenome);
		$("input[name=DATA_NASCIMENTO]").val(data_nascimento);
		$("input[name=SEXO][value="+sexo+"]").attr("checked",true);
		$("input[name=TELEFONE]").val(telefone);
		$("input[name=ENDERECO]").val(endereco);
		$("input[name=EMAIL]").val(email);
		$("input[name=PERMISSAO][value="+permissao+"]").attr("checked",true);
        
    });


    $("#enviar").click(function(){
		acao = $(this).val();
		if(acao=="Alterar"){
            u="altera.php?tabela=CLIENTE&id="+id_cliente;
        }

		parametros = {id_cliente: $("input[name='ID_CLIENTE']").val(), nome: $("input[name='NOME']").val(), sobrenome: $("input[name='SOBRENOME']").val(), data_nascimento: $("input[name='DATA_NASCIMENTO']").val(), sexo: $("input[type=radio][name='SEXO']:checked").val(), telefone: $("input[name='TELEFONE']").val(), endereco: $("input[name='ENDERECO']").val(), email: $("input[name='EMAIL']").val(), permissao: $("input[type=radio][name='PERMISSAO']:checked").val()};
       
        $.post(u,parametros).done(function(data){
			if(acao=="Alterar"){
				sexo = $("input[type=radio][name='SEXO']:checked").val();
				if(sexo==2){
					sexo = "MASCULINO";
				}
				else{
					sexo="FEMININO";
				}

				permissao = $("input[type=radio][name='PERMISSAO']:checked").val();
				if(permissao==2){
					permissao = "CLIENTE";
				}
				else{
					permissao="ADMINISTRADOR";
				}

				$("#status").html(data);
				linha.children("td:nth-child(1)").html($("input[name='ID_CLIENTE']").val());
				linha.children("td:nth-child(2)").html($("input[name='NOME']").val());
				linha.children("td:nth-child(3)").html($("input[name='SOBRENOME']").val());
				linha.children("td:nth-child(4)").html($("input[name='DATA_NASCIMENTO']").val());
				linha.children("td:nth-child(5)").html(sexo);
				linha.children("td:nth-child(6)").html($("input[name='TELEFONE']").val());
				linha.children("td:nth-child(7)").html($("input[name='ENDERECO']").val());
				linha.children("td:nth-child(8)").html($("input[name='EMAIL']").val());
				linha.children("td:nth-child(9)").html(permissao);
				$("#novoCadastro").fadeOut();
				$(".modal-backdrop").hide(); //Fecha o modal
			}
			else{
				$("#status").html(data);
				linha.children("td:nth-child(1)").html($("input[name='ID_CLIENTE']").val());
				linha.children("td:nth-child(2)").html($("input[name='NOME']").val());
				linha.children("td:nth-child(3)").html($("input[name='SOBRENOME']").val());
				linha.children("td:nth-child(4)").html($("input[name='DATA_NASCIMENTO']").val());
				linha.children("td:nth-child(5)").html($("input[type=radio][name='SEXO']:checked").val());
				linha.children("td:nth-child(6)").html($("input[name='TELEFONE']").val());
				linha.children("td:nth-child(7)").html($("input[name='ENDERECO']").val());
				linha.children("td:nth-child(8)").html($("input[name='EMAIL']").val());
				linha.children("td:nth-child(9)").html($("input[type=radio][name='PERMISSAO']:checked").val());
				$("#novoCadastro").fadeOut();
				$(".modal-backdrop").hide(); //Fecha o modal
			}
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
		$("input[name=EMAIL]").val('');
		$("input[name=SENHA]").val('');		
		$("input[type=radio][name='PERMISSAO']:checked").attr("checked",false);
    });

});