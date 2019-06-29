<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	include("form_facilidades.php");

    $tabela[]="facilidade";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "id_facilidade as ID";
    $coluna[]= "nome_facilidade as Facilidade";
    $coluna[]= "descricao as Descricao";


	$condicao = null;
	$ordenacao = "id_facilidade";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$tabela["nome"] = "facilidade";
	$tabela["exibe_id"]=false;

	$t = new Tabela($m,$tabela,true,true);
	
	$t->exibe();

?>
<script src="js/facilidade.js"></script>
</body>
</html>