<?php

	//include("classeCabecalho.php");
	//$c->exibe_menu();
	include("classeBancoDeDados.php");	
	
	$operacao = new BancoDeDados($conexao);
	$operacao->insercao($_GET["tabela"],$_POST);

?>
<h3 align="center"><?php echo $_GET["tabela"]." cadastrado(a) com sucesso.";?> </h3>