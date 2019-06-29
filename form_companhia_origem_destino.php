<?php
	
	include("autenticacao.php");
	include("classeForm.php");
	include("conexao.php");
	include("classeModal.php");

	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=companhia_origem_destino";
	$parametros["method"] = "post";
	
	
	$f = new Form($parametros);

	$parametros = null;
	$parametros["name"] = "ID_COMPANHIA_ORIGEM_DESTINO";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "ID da COD";	
	$f->add_input($parametros);
	
	$consulta = "SELECT ID_COMPANHIA as value, NOME_COMPANHIA as label FROM COMPANHIA ORDER BY ID_COMPANHIA";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$companhia[] = $linha;
	}	
	$f->add_select("COD_COMPANHIA",$companhia,null);
	

	$consulta = "SELECT ID_CIDADE as value,  NOME as label FROM CIDADE ORDER BY ID_CIDADE";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$origens[] = $linha;
	}	
	$f->add_select("COD_ORIGEM",$origens,null);

	$consulta = "SELECT ID_CIDADE as value,  NOME as label FROM CIDADE ORDER BY ID_CIDADE";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$destinos[] = $linha;
	}	
	$f->add_select("COD_DESTINO",$destinos,null);
	
	$parametros = null;
	$parametros["name"] = "VALOR_PASSAGEM";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Valor das passagens";	
	$f->add_input($parametros);
	
	$m = new Modal($f);	
	$m->exibe();
	
?>
