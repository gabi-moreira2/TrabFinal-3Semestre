<?php

	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");

	if(isset($_SESSION["cliente"])){
		if($_SESSION["cliente"]->get_permissao() == "ADMINISTRADOR"){
			include("form_trecho_guia.php");
		}
	}

    $tabela[]="INFO_TRECHO_GUIA";
	
	$coluna[]= "ID_TRECHO_GUIA";
	$coluna[]= "GUIA";
    $coluna[]= "ORIGEM_DESTINO";
    
	$condicao = null;
	$ordenacao = null;

	$bd = new BancoDeDados($conexao);
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$tabela["nome"]="TRECHO_GUIA";
	$tabela["exibe_id"]=true;
	
	$t = new Tabela($m,$tabela,true,true);
	
	$t->exibe();

?>
	
	<script src="js/trecho_guia.js"></script>-->
</body>
</html>