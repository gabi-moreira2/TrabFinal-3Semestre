<?php

	include("classeCabecalho.php");
	$c->exibe_menu();	
	include("classeBancoDeDados.php");
	
	$operacao = new BancoDeDados($conexao);
	
	$operacao->remocao($_GET["tabela"],$_GET["id"]);
	
	echo $_GET["tabela"]." removido(a) com sucesso.";


?>