$(function(){

    id_hotel_facilidade="";
    cod_hotel="";
    cod_facilidade="";
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
        id_hotel_facilidade = $(this).attr("valor");
        cod_hotel = $(this).closest("tr").children("td:nth-child(1)").html();
        cod_facilidade = $(this).closest("tr").children("td:nth-child(2)").html();

        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_HOTEL_FACILIDADE]").val(id_hotel_facilidade);
        $("select[name=COD_HOTEL] option").each(function(){
            this.selected = $(this).html()== cod_hotel;
        });
        $("select[name=COD_FACILIDADE] option").each(function(){
            this.selected = $(this).html()== cod_facilidade;
        });        
    });


    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=hotel_facilidade&id="+id_hotel_facilidade;
        }
        else{
            u="insere.php?tabela=hotel_facilidade";
        }

        parametros = {id_hotel_facilidade: $("input[name='ID_HOTEL_FACILIDADE']").val(), cod_hotel:$("select[name='COD_HOTEL'] option:selected").val(), cod_facilidade:$("select[name='COD_FACILIDADE'] option:selected").val(), };
       
        $.post(u,parametros).done(function(data){
            $("#status").html(data);
            linha.children("td:nth-child(1)").html($("select[name='COD_HOTEL'] option:selected").val());
            linha.children("td:nth-child(2)").html($("select[name='COD_FACILIDADE'] option:selected").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide(); //Fecha o modal
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
        $("input[name=ID_HOTEL_FACILIDADE]").val('');
        $("select[name=COD_HOTEL] option").each(function(){
            this.selected = $(this).html()== "";
        });
        $("select[name=COD_FACILIDADE] option").each(function(){
            this.selected = $(this).html()== "";
        });
        
    });

});