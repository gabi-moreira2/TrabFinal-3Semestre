<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	if(isset($_SESSION["cliente"])){// && ($_SESSION["cliente"]->get_permissao() == '1'){
		if($_SESSION["cliente"]->get_permissao() == "ADMINISTRADOR"){
			include("form_companhia.php");
		}
	}

	$tabela[]="companhia";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "id_companhia as ID";
	$coluna[]= "nome_companhia as Companhia";
	$coluna[]= "email as 'E-mail'";	


	$condicao = null;
	$ordenacao = "nome_companhia";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	if(isset($_SESSION["cliente"])){// && ($_SESSION["cliente"]->get_permissao() == '1'){
		if($_SESSION["cliente"]->get_permissao() == "CLIENTE"){
			$t = new Tabela($m,"companhia",false,false);
		}
		else{
			$t = new Tabela($m,"companhia",true,true);
		}
	}
	else{
		$t = new Tabela($m,"companhia",false,false);
	}
	
	
	$t->exibe();

?>
	
	<script src="js/companhia.js"></script>
</body>
</html>