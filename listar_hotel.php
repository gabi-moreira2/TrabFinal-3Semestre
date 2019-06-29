<?php


	include("classeCabecalho.php");
	$c->exibe_menu();
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	include("form_hotel.php");

    $tabela[]="hotel";
    $tabela[]="cidade";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "id_hotel as ID";
    $coluna[]= "hotel.nome as Hotel";
    $coluna[]= "telefone as Telefone";
	$coluna[]= "email as 'E-mail'";
    $coluna[]= "tipo_quarto as 'Tipo de quarto'";	
    $coluna[]= "qnt_quarto as 'Quantidade de quarto'";
    $coluna[]= "preco_diaria as Diária";
    $coluna[]= "cidade.nome as Localização";


	$condicao = null;
	$ordenacao = "hotel.nome";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$tabela["nome"]="hotel";
	$tabela["exibe_id"]=false;
	
	$t = new Tabela($m,$tabela,true,true);
	
	$t->exibe();

?>
	<script src="js/hotel.js"></script>
</body>
</html>