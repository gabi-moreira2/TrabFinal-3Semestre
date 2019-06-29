$(function(){

	id_cartao ="";
	cod_cliente = "";
	data_validade ="";
	codigo_seguranca ="";
	nome_titular ="";
	empresa ="";
	tipo_cartao ="";
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
		id_cartao = $(this).attr("valor");
		cod_cliente = $(this).closest("tr").children("td:nth-child(1)").html();
		data_validade = $(this).closest("tr").children("td:nth-child(2)").html();
		codigo_seguranca = $(this).closest("tr").children("td:nth-child(3)").html();
		nome_titular = $(this).closest("tr").children("td:nth-child(4)").html();
		empresa = $(this).closest("tr").children("td:nth-child(5)").html();
		tipo_cartao = $(this).closest("tr").children("td:nth-child(6)").html();
		if(tipo_cartao=="DEBITO"){
			tipo_cartao=2;
		}
		else{
			tipo_cartao=1;
		}

        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
		$("input[name=ID_CARTAO]").val(id_cartao);
		$("select[name=COD_CLIENTE] option").each(function(){
			this.selected = $(this).html()== cod_cliente;
		});
		$("input[name=DATA_VALIDADE]").val(data_validade);
		$("input[name=CODIGO_SEGURANCA]").val(codigo_seguranca);
		$("input[name=NOME_TITULAR]").val(nome_titular);
		$("input[name=EMPRESA]").val(empresa);
		$("input[name=TIPO_CARTAO][value="+tipo_cartao+"]").attr("checked",true);      
    });

    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=cartao&id="+id_cartao;
        }
        else{
            u="insere.php?tabela=cartao";
        }

		parametros = {id_cartao: $("input[name='ID_CARTAO']").val(), cod_cliente: $("select[name='COD_CLIENTE'] option:selected").val(), data_validade: $("input[name='DATA_VALIDADE']").val(), codigo_seguranca: $("input[name='CODIGO_SEGURANCA']").val(), nome_titular: $("input[name='NOME_TITULAR']").val(), empresa: $("input[name='EMPRESA']").val(), tipo_cartao: $("input[type=radio][name='TIPO_CARTAO']:checked").val()};

        $.post(u,parametros).done(function(data){
			tipo_cartao = $("input[type=radio][name='TIPO_CARTAO']:checked").val();
				if(tipo_cartao==2){
					tipo_cartao = "DEBITO";
				}
				else{
					tipo_cartao="CREDITO";
				}
            $("#status").html(data);
			linha.children("td:nth-child(1)").html($("select[name='COD_CLIENTE'] option").val());
			linha.children("td:nth-child(2)").html($("input[name='DATA_VALIDADE']").val());
			linha.children("td:nth-child(3)").html($("input[name='CODIGO_SEGURANCA']").val());
			linha.children("td:nth-child(4)").html($("input[name='NOME_TITULAR']").val());
			linha.children("td:nth-child(5)").html($("input[name='EMPRESA']").val());
			linha.children("td:nth-child(6)").html($("input[type=radio][name='TIPO_CARTAO']:checked").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide(); //Fecha o modal
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
		$("input[name=ID_CARTAO]").val('');
		$("select[name=COD_CLIENTE] option").each(function(){
            this.selected = $(this).html()== "";
        });
		$("input[name=DATA_VALIDADE]").val('');
		$("input[name=CODIGO_SEGURANCA]").val('');
		$("input[name=NOME_TITULAR]").val('');
		$("input[name=EMPRESA]").val('');
		$("input[type=radio][name=TIPO_CARTAO]:checked").val('');
    });

});