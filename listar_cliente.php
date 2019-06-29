<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	include("form_cliente.php");

	$tabela[]="CLIENTE";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_CLIENTE";
	$coluna[]= "NOME";
	$coluna[]= "SOBRENOME";
	$coluna[]= "DATA_NASCIMENTO";
	$coluna[]= "SEXO";
	$coluna[]= "TELEFONE";
	$coluna[]= "ENDERECO";
	$coluna[]= "EMAIL";
	$coluna[]= "PERMISSAO";
	


	$condicao = null;
	$ordenacao = "NOME";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$tabela["nome"]="CLIENTE";
	$tabela["exibe_id"]=true;
	
	$t = new Tabela($m,$tabela,true,true);
	
	$t->exibe();
?>
	<script src="js/cliente.js"></script>
</body>
</html>