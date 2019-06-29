$(function(){

    id_hotel = "";
    nome = "";
    telefone = "";
    email = "";
    tipo_quarto = "";
    qnt_quarto = "";
    preco_diaria = "";
    cod_cidade = "";  
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
        id_hotel = $(this).attr("valor");
        nome = $(this).closest("tr").children("td:nth-child(1)").html();
        telefone = $(this).closest("tr").children("td:nth-child(2)").html();
        email = $(this).closest("tr").children("td:nth-child(3)").html();
        tipo_quarto = $(this).closest("tr").children("td:nth-child(4)").html();
        qnt_quarto = $(this).closest("tr").children("td:nth-child(5)").html();
        preco_diaria = $(this).closest("tr").children("td:nth-child(6)").html();
        cod_cidade = $(this).closest("tr").children("td:nth-child(7)").html();
        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_HOTEL]").val(id_hotel);
        $("input[name=NOME]").val(nome);
        $("input[name=TELEFONE]").val(telefone);
        $("input[name=EMAIL]").val(email);
        $("input[name=TIPO_QUARTO]").val(tipo_quarto);
        $("input[name=QNT_QUARTO]").val(qnt_quarto);
        $("input[name=PRECO_DIARIA]").val(preco_diaria);
        $("select[name=COD_CIDADE] option").each(function(){
            this.selected = $(this).html()== cod_cidade;
        });
    });

    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=hotel&id="+id_hotel;
        }
        else{
            u="insere.php?tabela=hotel";
        }

        parametros = {id_hotel: $("input[name='ID_HOTEL']").val(), nome: $("input[name='NOME']").val(), telefone: $("input[name='TELEFONE']").val(), email: $("input[name='EMAIL']").val(), tipo_quarto: $("input[name='TIPO_QUARTO']").val(), qnt_quarto: $("input[name='QNT_QUARTO']").val(), preco_diaria: $("input[name='PRECO_DIARIA']").val(), cod_cidade: $("select[name='COD_CIDADE'] option:selected").val()};
       
        $.post(u,parametros).done(function(data){
            $("#status").html(data);
            linha.children("td:nth-child(1)").html($("input[name='NOME']").val());
            linha.children("td:nth-child(2)").html($("input[name='TELEFONE']").val());
            linha.children("td:nth-child(3)").html($("input[name='EMAIL']").val());
            linha.children("td:nth-child(4)").html($("input[name='TIPO_QUARTO']").val());
            linha.children("td:nth-child(5)").html($("input[name='QNT_QUARTO']").val());
            linha.children("td:nth-child(6)").html($("input[name='PRECO_DIARIA']").val());
            linha.children("td:nth-child(7)").html($("select[name='COD_CIDADE'] option").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide(); //Fecha o modal
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
        $("input[name=ID_HOTEL]").val('');
        $("input[name=NOME]").val('');
        $("input[name=TELEFONE]").val('');
        $("input[name=EMAIL]").val('');
        $("input[name=TIPO_QUARTO]").val('');
        $("input[name=QNT_QUARTO]").val('');
        $("input[name=PRECO_DIARIA]").val('');
        $("select[name=COD_CIDADE] option").each(function(){
            this.selected = $(this).html()== "";
        });
    });

});