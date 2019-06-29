<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	if(isset($_SESSION["cliente"])){// && ($_SESSION["cliente"]->get_permissao() == '1'){
		if($_SESSION["cliente"]->get_permissao() == "ADMINISTRADOR"){
			include("form_hotel_facilidade.php");
		}
	}


	$tabela[]="INFO_HOTEL_FACILIDADES";

	$bd = new BancoDeDados($conexao);	
	
	$coluna[]= "Id_hotel_facilidade";
	$coluna[]= "Hotel";
	$coluna[]= "Facilidade";
	$coluna[]= "Descricao";
	
	$condicao = null;
	$ordenacao = null;
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);
	

	$tabela["nome"]="hotel_facilidade";
	$tabela["exibe_id"]=false;

	$t = new Tabela($m,$tabela,true,true);	
	$t->exibe();

?>
	<script src="js/hotel_facilidade.js"></script>
</body>
</html>