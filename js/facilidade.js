$(function(){

    id_facilidade = "";
    nome_facilidade = "";
    descricao = "";
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
        id_facilidade = $(this).attr("valor");
        nome_facilidade = $(this).closest("tr").children("td:nth-child(1)").html();
        descricao = $(this).closest("tr").children("td:nth-child(2)").html();
        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_FACILIDADE]").val(id_facilidade);
        $("input[name=NOME_FACILIDADE]").val(nome_facilidade);
        $("input[name=DESCRICAO]").val(descricao);
    });

    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=facilidade&id="+id_facilidade;
        }
        else{
            u="insere.php?tabela=facilidade";
        }

        parametros = {id_facilidade: $("input[name='ID_FACILIDADE']").val(), nome_facilidade: $("input[name='NOME_FACILIDADE']").val(), descricao: $("input[name='DESCRICAO']").val()};
       
        $.post(u,parametros).done(function(data){
            $("#status").html(data);
            linha.children("td:nth-child(1)").html($("input[name='NOME_FACILIDADE']").val());
            linha.children("td:nth-child(2)").html($("input[name='DESCRICAO']").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide(); //Fecha o modal
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
        $("input[name=ID_FACILIDADE]").val('');
        $("input[name=NOME_FACILIDADE]").val('');
        $("input[name=DESCRICAO]").val('');
    });
});