<?php
	include("autenticacao.php");
	include("classeForm.php");
	include("conexao.php");
	include("classeModal.php");
	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=hotel_facilidade";
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$consulta = "SELECT id_hotel as value, nome as label FROM hotel ORDER BY nome";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$hoteis[] = $linha;
	}	
	$f->add_select("COD_HOTEL", $hoteis,null);


	$consulta = "SELECT id_facilidade as value, nome_facilidade as label FROM facilidade ORDER BY nome_facilidade";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$facilidades[] = $linha;
	}	
	$f->add_select("COD_FACILIDADE", $facilidades, null);
	
	$m = new Modal($f);
	$m->exibe();
?>
