<?php

	include("classeCabecalho.php");
	include("conexao.php");
	
	$parametros["charset"]="utf-8";
	$parametros["title"]="cadastro de cidade";
	$parametros["links"][] = "estiloForm.css";

	
	$c = new Cabecalho($parametros);
	$c->exibe();
	
	$insert = "INSERT INTO cidade (nome,cod_estado)
				VALUES (:nome,:cod_estado)";
				
	$stmt = $conexao->prepare($insert);
	
	$stmt->bindValue(":nome",$_POST["nome"]);
	$stmt->bindValue(":cod_estado",$_POST["cod_estado"]);
	
	$stmt->execute();
	
	echo "Cidade Cadastrada com sucesso.";


?>