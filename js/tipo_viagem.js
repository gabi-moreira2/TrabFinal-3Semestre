$(function(){

    id_tipo_viagem = "";
    cod_companhia = "";
    tipo_viagem = "";
    linha = "";

    $('.alterar').click(function funcao_alterar(){
        linha = $(this).closest("tr");
        $("#novoCadastro").modal();
        id_tipo_viagem = $(this).attr("valor");
        cod_companhia = $(this).closest("tr").children("td:nth-child(1)").html();
        tipo_viagem = $(this).closest("tr").children("td:nth-child(2)").html();
        $(".modal-title").html("Alterar Cadastro");
        $("#enviar").val("Alterar");
        $("input[name=ID_TIPO_VIAGEM]").val(id_tipo_viagem);
        $("select[name=COD_COMPANHIA] option").each(function(){
            this.selected = $(this).html() == cod_companhia;
        });        
        $("input[name=TIPO_VIAGEM]").val(tipo_viagem);
    });

    $("#enviar").click(function(){
        if($(this).val()=="Alterar"){
            u="altera.php?tabela=tipo_viagem&id="+id_tipo_viagem;
        }
        else{
            u="insere.php?tabela=tipo_viagem";
        }

        parametros = {id_tipo_viagem: $("input[name='ID_TIPO_VIAGEM']").val(), cod_companhia:$("select[name='COD_COMPANHIA'] option:selected").val(), tipo_viagem: $("input[name='TIPO_VIAGEM']").val()};
       
        $.post(u,parametros).done(function(data){
            $("#status").html(data);
            linha.children("td:nth-child(1)").html($("select[name='COD_COMPANHIA'] option").val());
            linha.children("td:nth-child(2)").html($("input[name='TIPO_VIAGEM']").val());
            $("#novoCadastro").fadeOut();
            $(".modal-backdrop").hide(); //Fecha o modal
        });
    });

    //Limpa os dados do modal
    $('#novoCadastro').on('hidden.bs.modal', function(){
        $("input[name=ID_TIPO_VIAGEM]").val('');
        $("select[name=COD_COMPANHIA] option").each(function(){
            this.selected = $(this).html()== "";
        });
        $("input[name=TIPO_VIAGEM]").val('');
    });
});
