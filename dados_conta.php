<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");

	$tabela[]="PERFIL";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_CLIENTE";
	$coluna[]="NOME";
	$coluna[]="SOBRENOME";
	$coluna[]="DATA_NASCIMENTO";
	$coluna[]="SEXO";
	$coluna[]="TELEFONE"; 
	$coluna[]="ENDERECO";
	$coluna[]= "EMAIL";
	$coluna[]= "PERMISSAO";
	


	$condicao[] = 'id_cliente='.$_SESSION["cliente"]->get_id();
	$ordenacao = "ID_CLIENTE";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$t = new Tabela($m,"PERFIL",true,true);
	
	$t->exibe();
?>
	<script src="js/conta.js"></script>
</body>
</html>