<?php


	include("classeCabecalho.php");
	$c->exibe_menu();	
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	include("form_reservas.php");
	
	$tabela[]="INFO_RESERVA";

	$bd = new BancoDeDados($conexao);
		
	$coluna[]= "ID_RESERVA";
	$coluna[]= "COD_CLIENTE";
	$coluna[]= "COD_COMPANHIA_ORIGEM_DESTINO ";
	$coluna[]= "CLIENTE";
    $coluna[]= "NOME_COMPANHIA";
	$coluna[]= "CIDADE_ORIGEM";
	$coluna[]= "CIDADE_DESTINO";
    $coluna[]= "CHECK_IN";
    $coluna[]= "CHECK_OUT";
	$coluna[]= "QNT_VIAJANTES";
	$coluna[]= "COD_GUIA";
	$coluna[]= "COD_HOTEL";
	$coluna[]= "HOTEL";
	$coluna[]= "QNT_QUARTO";
    $coluna[]= "DATA_DA_COMPRA";
    $coluna[]= "STATUS_DO_PAGAMENTO";
    $coluna[]= "STATUS_DA_RESERVA";
    $coluna[]= "VALOR_TOTAL";
	
	$condicao = null;
	$ordenacao = "ID_RESERVA";

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		
	$tabela["nome"]="RESERVA";
	$tabela["exibe_id"]=true;
	
	$t = new Tabela($m,$tabela,true,true);
	
	$t->exibe();

?>
	<script src="js/reserva.js"></script>
</body>
</html>