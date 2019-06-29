$(function(){

    id_guia_turismo="";
    nome="";
    telefone="";
    email="";
    preco="";
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
        id_guia_turismo = $(this).attr("valor");
        nome = $(this).closest("tr").children("td:nth-child(2)").html();
        telefone = $(this).closest("tr").children("td:nth-child(3)").html();
        email = $(this).closest("tr").children("td:nth-child(4)").html();
        preco = $(this).closest("tr").children("td:nth-child(5)").html();
        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_GUIA_TURISMO]").val(id_guia_turismo);
        $("input[name=NOME]").val(nome);
        $("input[name=TELEFONE]").val(telefone);
        $("input[name=EMAIL]").val(email);
        $("input[name=PRECO]").val(preco);
        
    });


    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=guia_turismo&id="+id_guia_turismo;
        }
        else{
            u="insere.php?tabela=guia_turismo";
        }

        parametros = {id_guia_turismo: $("input[name='ID_GUIA_TURISMO']").val(), nome: $("input[name='NOME']").val(), telefone: $("input[name='TELEFONE']").val(), email: $("input[name='EMAIL']").val(), preco: $("input[name='PRECO']").val()};
       
        $.post(u,parametros).done(function(data){
            $("#status").html(data);
            linha.children("td:nth-child(2)").html($("input[name='NOME']").val());
            linha.children("td:nth-child(3)").html($("input[name='TELEFONE']").val());
            linha.children("td:nth-child(4)").html($("input[name='EMAIL']").val());
            linha.children("td:nth-child(5)").html($("input[name='PRECO']").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide(); //Fecha o modal
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
        $("input[name=ID_GUIA_TURISMO]").val('');
        $("input[name=NOME]").val('');
        $("input[name=TELEFONE]").val('');
        $("input[name=EMAIL]").val('');
        $("input[name=PRECO]").val('');
    });

});