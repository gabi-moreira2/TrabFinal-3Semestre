<?php


	include("classeCabecalho.php");
	$c->exibe_menu();	
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	include("form_tipo_viagem.php");

	$tabela[]="TIPO_VIAGEM";
	$tabela[]="COMPANHIA";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_TIPO_VIAGEM";
	$coluna[]= "COMPANHIA.NOME_COMPANHIA";
	$coluna[]= "TIPO_VIAGEM";
	$condicao = null;
	$ordenacao = null;

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		
	$tabela["nome"]="TIPO_VIAGEM";
	$tabela["exibe_id"]=false;
	
	$t = new Tabela($m,$tabela,true,true);
	
	$t->exibe();

?>


    <script src="js/tipo_viagem.js"></script>
</body>
</html>