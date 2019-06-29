$(function(){

    id_pais="";
    linha = "";
    nome = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
        id_pais = $(this).attr("valor");
        nome = $(this).closest("tr").children("td:nth-child(1)").html();
        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_PAIS]").val(id_pais);
        $("input[name=NOME]").val(nome);        
    });

    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=pais&id="+id_pais;
        }
        else{
            u="insere.php?tabela=pais";
        }

        parametros = {id_pais: $("input[name='ID_PAIS']").val(), nome:$("input[name='NOME']").val()};
       
        $.post(u,parametros).done(function(data){
            $("#status").html(data);
            linha.children("td:nth-child(1)").html($("input[name='NOME']").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide(); //Fecha o modal
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
        $("input[name=ID_PAIS]").val('');
        $("input[name=NOME]").val('');
    });
});