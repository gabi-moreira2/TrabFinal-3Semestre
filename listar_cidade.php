<?php
	include("classeCabecalho.php");
	$c->exibe_menu();
	
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	include("form_cidade.php");


	$tabela[]="cidade";
	$tabela[]="pais";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "id_cidade as ID";
	$coluna[]= "cidade.nome as Cidade";
	$coluna[]= "pais.nome as País";
	
	$condicao = null;
	$ordenacao = "cidade.nome";

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);
	
	$tabela["nome"] = "CIDADE";
	$tabela["exibe_id"]=false;
		
	$t = new Tabela($m,$tabela, true, true);
	
	$t->exibe();	
?>

    <script src="js/cidade.js"></script>
</body>
</html>