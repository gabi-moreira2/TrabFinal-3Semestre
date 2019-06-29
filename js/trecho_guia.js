$(function(){

    id_trecho_guia = "";
    cod_guia = "";
    cod_companhia_origem_destino = "";
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
       // id_trecho_guia = $(this).attr("valor");
        id_trecho_guia = $(this).closest("tr").children("td:nth-child(1)").html();
        cod_guia = $(this).closest("tr").children("td:nth-child(2)").html();
        cod_companhia_origem_destino = $(this).closest("tr").children("td:nth-child(3)").html();
        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_TRECHO_GUIA]").val(id_trecho_guia);
        $("select[name=COD_GUIA] option").each(function(){
            this.selected = $(this).html() == cod_guia;
        });
        $("select[name=COD_COMPANHIA_ORIGEM_DESTINO] option").each(function(){
            this.selected = $(this).html() == cod_companhia_origem_destino;
        });        
    });

    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=trecho_guia&id="+id_trecho_guia;
        }
        else{
            u="insere.php?tabela=trecho_guia";
        }

        parametros = {id_trecho_guia: $("input[name='ID_TRECHO_GUIA']").val(), cod_guia:$("select[name='COD_GUIA'] option:selected").val(), cod_companhia_origem_destino:$("select[name='COD_COMPANHIA_ORIGEM_DESTINO'] option:selected").val()};
       
        $.post(u,parametros).done(function(data){
            $("#status").html(data);
            linha.children("td:nth-child(1)").html($("select[name='ID_TRECHO_GUIA'] option").val());
            linha.children("td:nth-child(2)").html($("select[name='COD_GUIA'] option").val());
            linha.children("td:nth-child(3)").html($("select[name='COD_COMPANHIA_ORIGEM_DESTINO'] option").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide();
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
        $("input[name=ID_TRECHO_GUIA]").val('');
        $("select[name=COD_GUIA] option").each(function(){
            this.selected = $(this).html()== "";
        });
        $("select[name=COD_COMPANHIA_ORIGEM_DESTINO] option").each(function(){
            this.selected = $(this).html()== "";
        });
    });

});
