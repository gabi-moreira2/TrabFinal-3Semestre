<?php


	include("classeCabecalho.php");
	$c->exibe_menu();	
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	if(isset($_SESSION["cliente"])){// && ($_SESSION["cliente"]->get_permissao() == '1'){
		if($_SESSION["cliente"]->get_permissao() == "ADMINISTRADOR"){
			include("form_companhia_origem_destino.php");
		}
	}
	
    $tabela[]="INFO_COMPANHIA_ORIGEM_DESTINO";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_COMPANHIA_ORIGEM_DESTINO";
	$coluna[]= "COMPANHIA";
    $coluna[]= "ORIGEM";
    $coluna[]= "DESTINO";
    $coluna[]= "VALOR_PASSAGEM";
	
	$condicao = null;
	$ordenacao = null;
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);
	
	$tabela["nome"]="COMPANHIA_ORIGEM_DESTINO";
	$tabela["exibe_id"]=false;

	$t = new Tabela($m, $tabela, true, true);
	
	$t->exibe();
?>
    <script src="js/origem_destino.js"></script>
</body>
</html>