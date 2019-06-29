<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	include("form_perfil.php");

	$tabela[]="PERFIL";

	$bd = new BancoDeDados($conexao);
	
    $coluna[]= "ID_CLIENTE";
    $coluna[]= "NOME";
    $coluna[]= "SOBRENOME";
	$coluna[]= "DATA_NASCIMENTO";
    $coluna[]= "SEXO";
    $coluna[]= "TELEFONE";
    $coluna[]= "ENDERECO";
	


	$condicao[] = 'id_cliente='.$_SESSION["cliente"]->get_id();
	$ordenacao = "ID_CLIENTE";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$tabela["nome"] = "PERFIL";
	$tabela["exibe_id"]=false;

	$t = new Tabela($m,$tabela,true,false);
	
	$t->exibe();
?>
	<script src="js/cliente.js"></script>
</body>
</html>