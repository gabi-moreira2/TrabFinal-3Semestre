<?php

	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	include("form_pais.php");

	$tabela[]="PAIS";
	
	$coluna[]= "id_pais as ID";
	$coluna[]= "nome as Nome";
	
	$condicao = null;
	$ordenacao = "nome";

	$bd = new BancoDeDados($conexao);
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$tabela["nome"] = "PAIS";
	$tabela["exibe_id"]=false;
	$t = new Tabela($m,$tabela,true,true);
	
	$t->exibe();

?>
	
	<script src="js/pais.js"></script>
</body>
</html>