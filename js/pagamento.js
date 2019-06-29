$(function(){

    id_pagamento = "";
    cod_reserva = "";
    cod_cartao="";
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
        id_pagamento = $(this).attr("valor");
        cod_reserva = $(this).closest("tr").children("td:nth-child(1)").html();
        cod_cartao = $(this).closest("tr").children("td:nth-child(2)").html();
        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_PAGAMENTO]").val(id_pagamento);
        $("select[name=COD_RESERVA] option").each(function(){
            this.selected = $(this).html() == cod_reserva;
        });
        $("select[name=COD_CARTAO] option").each(function(){
            this.selected = $(this).html() == cod_cartao;
        });        
    });


    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=pagamento&id="+id_pagamento;
        }
        else{
            u="insere.php?tabela=pagamento";
        }

        parametros = {id_pagamento: $("input[name='ID_PAGAMENTO']").val(), cod_reserva: $("select[name='COD_RESERVA'] option:selected").val(), cod_cartao: $("select[name='COD_CARTAO'] option:selected").val()};
       
        $.post(u,parametros).done(function(data){
            $("#status").html(data);
            linha.children("td:nth-child(1)").html($("input[name='COD_RESERVA'] option").val());
            linha.children("td:nth-child(2)").html($("select[name='COD_CARTAO'] option").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide(); //Fecha o modal
            window.location.reload(); // ??????????????????
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
        $("input[name=ID_PAGAMENTO]").val('');
        $("select[name=COD_RESERVA] option").each(function(){
            this.selected = $(this).html()== "";
        });
        $("select[name=COD_CARTAO] option").each(function(){
            this.selected = $(this).html()== "";
        });
    });

});
