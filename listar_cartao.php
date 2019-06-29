<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	include("form_cartao.php");


	$tabela[]="CARTAO";
	$tabela[]="CLIENTE";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "id_cartao as 'Número do Cartão'";
	$coluna[]= "cliente.nome as Cliente";
	$coluna[]= "data_validade as 'Data de validade'";
	$coluna[]= "codigo_seguranca as 'Código de segurança'";
	$coluna[]= "nome_titular as 'Nome do titular'";
	$coluna[]= "empresa as Empresa";
	$coluna[]= "tipo_cartao as Tipo";
	
	$condicao = null;
	$ordenacao = "cliente.nome";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$tabela["nome"]="CARTAO";
	$tabela["exibe_id"]=false;
	
	$t = new Tabela($m,$tabela,true,true);

	$t->exibe();
	

?>
<script src="js/cartao.js"></script>
</body>
</html>