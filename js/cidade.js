$(function(){

    id_cidade="";
    nome="";
    cod_pais="";
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
        id_cidade = $(this).attr("valor");
        nome = $(this).closest("tr").children("td:nth-child(1)").html();
        cod_pais = $(this).closest("tr").children("td:nth-child(2)").html();
        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_CIDADE]").val(id_cidade);
        $("input[name=NOME]").val(nome);
        $("select[name=COD_PAIS] option").each(function(){
            this.selected = $(this).html()== cod_pais;
        });        
    });


    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=cidade&id="+id_cidade;
        }
        else{
            u="insere.php?tabela=cidade";
        }

        parametros = {id_cidade: $("input[name='ID_CIDADE']").val(), nome:$("input[name='NOME']").val(), cod_pais:$("select[name='COD_PAIS'] option:selected").val()};
       
        $.post(u,parametros).done(function(data){
            $("#status").html(data);
            linha.children("td:nth-child(1)").html($("input[name='NOME']").val());
            linha.children("td:nth-child(2)").html($("select[name=COD_PAIS] option").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide(); //Fecha o modal
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
        $("input[name=ID_CIDADE]").val('');
        $("input[name=NOME]").val('');
        $("select[name=COD_PAIS] option").each(function(){
            this.selected = $(this).html()== "";
        });
    });

});
