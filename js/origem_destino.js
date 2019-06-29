$(function(){

    id_companhia_origem_destino = "";
    cod_companhia = "";
    cod_origem = "";
    cod_destino = "";
    valor_passagem = "";
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
        id_companhia_origem_destino = $(this).attr("valor");
        cod_companhia = $(this).closest("tr").children("td:nth-child(1)").html();
        cod_origem = $(this).closest("tr").children("td:nth-child(2)").html();
        cod_destino = $(this).closest("tr").children("td:nth-child(3)").html();
        valor_passagem = $(this).closest("tr").children("td:nth-child(4)").html();
        
        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_COMPANHIA_ORIGEM_DESTINO]").val(id_companhia_origem_destino);
        $("select[name=COD_COMPANHIA] option").each(function(){
            this.selected = $(this).html()== cod_companhia;
        });
        $("select[name=COD_ORIGEM] option").each(function(){
            this.selected = $(this).html()== cod_origem;
        });
        $("select[name=COD_DESTINO] option").each(function(){
            this.selected = $(this).html()== cod_destino;
        });
        $("input[name=VALOR_PASSAGEM]").val(valor_passagem);        
    });

    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=companhia_origem_destino&id="+id_companhia_origem_destino;
        }
        else{
            u="insere.php?tabela=companhia_origem_destino";
        }

        parametros = {id_companhia_origem_destino:$("input[name='ID_COMPANHIA_ORIGEM_DESTINO']").val(), cod_companhia:$("select[name='COD_COMPANHIA'] option:selected").val(), cod_origem:$("select[name='COD_ORIGEM'] option:selected").val(), cod_destino: $("select[name=COD_DESTINO] option:selected").val(), valor_passagem: $("input[name='VALOR_PASSAGEM']").val()};
       
        $.post(u,parametros).done(function(data){
            $("#status").html(data);
            linha.children("td:nth-child(1)").html($("select[name='COD_COMPANHIA'] option").val());
            linha.children("td:nth-child(2)").html($("select[name='COD_ORIGEM'] option").val());
            linha.children("td:nth-child(3)").html($("select[name='COD_DESTINO'] option").val());
            linha.children("td:nth-child(4)").html($("input[name='VALOR_PASSAGEM']").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide(); //Fecha o modal
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
        $("input[name=ID_COMPANHIA_ORIGEM_DESTINO]").val('');
        $("select[name=COD_COMPANHIA] option").each(function(){
            this.selected = $(this).html()== "";
        });
        $("select[name=COD_ORIGEM] option").each(function(){
            this.selected = $(this).html()== "";
        });
        $("select[name=COD_DESTINO] option").each(function(){
            this.selected = $(this).html()== "";
        });
        $("input[name=VALOR_PASSAGEM]").val('');
    });

});