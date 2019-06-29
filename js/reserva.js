$(function(){
    
    id_reserva = "";
    cod_cliente = "";
    cod_companhia_origem_destino = "";    
    check_in = "";
    check_out = "";
    qnt_viajantes = "";
    cod_guia = "";
    cod_hotel = "";
    qnt_quarto = "";
    data_compra = "";
    status_pagamento = "";
    status_reserva = "";
    valor_total = "";
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
        id_reserva = $(this).closest("tr").children("td:nth-child(1)").html();
        cod_cliente = $(this).closest("tr").children("td:nth-child(2)").html();
        cod_companhia_origem_destino = $(this).closest("tr").children("td:nth-child(3)").html();
        check_in = $(this).closest("tr").children("td:nth-child(8)").html();
        check_out = $(this).closest("tr").children("td:nth-child(9)").html();        
        qnt_viajantes = $(this).closest("tr").children("td:nth-child(10)").html();
        cod_guia = $(this).closest("tr").children("td:nth-child(11)").html();
        cod_hotel = $(this).closest("tr").children("td:nth-child(12)").html();
        qnt_quarto = $(this).closest("tr").children("td:nth-child(14)").html();
        data_compra = $(this).closest("tr").children("td:nth-child(15)").html();
        status_pagamento = $(this).closest("tr").children("td:nth-child(16)").html();
        status_reserva = $(this).closest("tr").children("td:nth-child(17)").html();
        valor_total = $(this).closest("tr").children("td:nth-child(18)").html();
        
        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_RESERVA]").val(id_reserva);
        $("select[name=COD_CLIENTE] option").each(function(){
            this.selected = $(this).html()== cod_cliente;
        });
        $("select[name=COD_COMPANHIA_ORIGEM_DESTINO] option").each(function(){
            this.selected = $(this).html()== cod_companhia_origem_destino;
        });  
        $("input[name=CHECK_IN]").val(check_in);   
        $("input[name=CHECK_OUT]").val(check_out);
        $("input[name=QNT_VIAJANTES]").val(qnt_viajantes); 
        $("select[name=COD_GUIA] option").each(function(){
            this.selected = $(this).html()== cod_guia;
        });  
        $("select[name=COD_HOTEL] option").each(function(){
            this.selected = $(this).html()== cod_hotel;
        });
        $("input[name=QNT_QUARTO]").val(qnt_quarto);
        $("input[name=DATA_COMPRA]").val(data_compra);   
        $("input[name=STATUS_PAGAMENTO]").val(status_pagamento);   
        $("input[name=STATUS_RESERVA]").val(status_reserva);   
        $("input[name=VALOR_TOTAL]").val(valor_total);        
    });

    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=reserva&id="+id_reserva;
        }
        else{
            u="insere.php?tabela=reserva";
        }

        parametros = {id_reserva:$("input[name='ID_RESERVA']").val(), cod_cliente: $("select[name='COD_CLIENTE'] option:selected").val(), cod_companhia_origem_destino: $("select[name='COD_COMPANHIA_ORIGEM_DESTINO'] option:selected").val(), check_in: $("input[name='CHECK_IN']").val(), check_out: $("input[name='CHECK_OUT']").val(), qnt_viajantes: $("input[name='QNT_VIAJANTES']").val(), cod_guia:$("select[name='COD_GUIA'] option:selected").val(), cod_hotel:$("select[name='COD_HOTEL'] option:selected").val(), qnt_quarto: $("input[name='QNT_QUARTO']").val(), data_compra: $("input[name='DATA_COMPRA']").val(), status_pagamento: $("input[name='STATUS_PAGAMENTO']").val(), status_reserva: $("input[name='STATUS_RESERVA']").val(), valor_total: $("input[name='VALOR_TOTAL']").val()};
       
        $.post(u,parametros).done(function(data){
            $("#status").html(data);
            linha.children("td:nth-child(1)").html($("input[name='ID_RESERVA']").val());
            linha.children("td:nth-child(2)").html($("select[name='COD_CLIENTE'] option").val());
            linha.children("td:nth-child(3)").html($("select[name='COD_COMPANHIA_ORIGEM_DESTINO'] option").val());
            linha.children("td:nth-child(8)").html($("input[name='CHECK_IN']").val());
            linha.children("td:nth-child(9)").html($("input[name='CHECK_OUT']").val());
            linha.children("td:nth-child(10)").html($("input[name='QNT_VIAJANTES']").val());
            linha.children("td:nth-child(11)").html($("select[name='COD_GUIA'] option").val());
            linha.children("td:nth-child(12)").html($("select[name='COD_HOTEL'] option").val());
            linha.children("td:nth-child(14)").html($("input[name='QNT_QUARTO']").val());
            linha.children("td:nth-child(15)").html($("input[name='DATA_COMPRA']").val());
            linha.children("td:nth-child(16)").html($("input[name='STATUS_PAGAMENTO']").val());
            linha.children("td:nth-child(17)").html($("input[name='STATUS_RESERVA']").val());
            linha.children("td:nth-child(18)").html($("input[name='VALOR_TOTAL']").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide(); //Fecha o modal
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
        $("input[name=ID_RESERVA]").val('');
        $("select[name=COD_CLIENTE] option").each(function(){
            this.selected = $(this).html()== "";
        });
        $("select[name=COD_COMPANHIA_ORIGEM_DESTINO] option").each(function(){
            this.selected = $(this).html()== "";
        });
        $("input[name=CHECK_IN]").val('');
        $("input[name=CHECK_OUT]").val('');
        $("input[name=QNT_VIAJANTES]").val('');
        $("select[name=COD_GUIA] option").each(function(){
            this.selected = $(this).html()== "";
        });
        $("select[name=COD_HOTEL] option").each(function(){
            this.selected = $(this).html()== "";
        });
        $("input[name=QNT_QUARTO]").val('');
        $("input[name=DATA_COMPRA]").val('');
        $("input[name=STATUS_PAGAMENTO]").val('');
        $("input[name=STATUS_RESERVA]").val('');
        $("input[name=VALOR_TOTAL]").val('');
    });

});
