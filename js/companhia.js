$(function(){

    id_companhia="";
    email="";
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
        id_companhia = $(this).attr("valor");
        nome_companhia = $(this).closest("tr").children("td:nth-child(1)").html();
        email = $(this).closest("tr").children("td:nth-child(2)").html();
        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_COMPANHIA]").val(id_companhia);
        $("input[name=NOME_COMPANHIA]").val(nome_companhia);
        $("input[name=EMAIL]").val(email);
        
    });


    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=companhia&id="+id_companhia;
        }
        else{
            u="insere.php?tabela=companhia";
        }

        parametros = {id_companhia: $("input[name='ID_COMPANHIA']").val(), nome_companhia:$("input[name='NOME_COMPANHIA']").val(), email:$("input[name='EMAIL']").val()};
       
        $.post(u,parametros).done(function(data){
            $("#status").html(data);
            linha.children("td:nth-child(1)").html($("input[name='NOME_COMPANHIA']").val());
            linha.children("td:nth-child(2)").html($("input[name='EMAIL']").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide(); //Fecha o modal
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
        $("input[name=ID_COMPANHIA]").val('');
        $("input[name=NOME_COMPANHIA]").val('');
        $("input[name=EMAIL]").val('');
    });

});