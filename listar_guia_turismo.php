<?php

	include("classeCabecalho.php");
	$c->exibe_menu();
	include("conexao.php");
	include("form_guia_turismo.php");

	include("classeTabela.php");
	include("classeBancoDeDados.php");

    $tabela[]="GUIA_TURISMO";
	
	$coluna[]= "ID_GUIA_TURISMO as CPF";
    $coluna[]= "NOME";
    $coluna[]= "TELEFONE";
    $coluna[]= "EMAIL";
    $coluna[] = "PRECO";
    
	$condicao = null;
	$ordenacao = "NOME";

	$bd = new BancoDeDados($conexao);
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$tabela["nome"] = "GUIA_TURISMO";
	$tabela["exibe_id"]=true;

	$t = new Tabela($m,$tabela,true,true);
	
	$t->exibe();

?>	
	<script src="js/guia_turismo.js"></script>
</body>
</html>