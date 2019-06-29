<?php

	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	include("form_pagamento.php");

	$tabela[]="INFO_PAGAMENTO";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_PAGAMENTO";
	$coluna[]= "COD_RESERVA";
	$coluna[]= "CLIENTE";
	$coluna[]= "ID_CARTAO AS 'CARTAO'";

	$condicao = null;
	$ordenacao = "CLIENTE";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$tabela["nome"] = "PAGAMENTO";
	$tabela["exibe_id"]=false;

	$t = new Tabela($m,$tabela,true,true);
	
	$t->exibe();
?>
	<script src="js/pagamento.js"></script>
</body>
</html>