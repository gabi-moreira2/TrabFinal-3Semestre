<?php
	include("autenticacao.php");
	include("classeForm.php");
	include("classeModal.php");	
	
	$parametros = null;
	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="guia_turismo";
		$coluna[]= "id_guia";
		$coluna[]= "nome";
		$coluna[]= "telefone";
		$coluna[]= "email";
		$coluna[]= "preco";
		$condicao[] = " id_guia=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=guia_turismo&id=".$_GET["id"];
	}
	else{
		$resultado[0]["id_guia"] = "";
		$resultado[0]["nome"] = "";
		$resultado[0]["telefone"] = "";
		$resultado[0]["email"] = "";
		$resultado[0]["preco"] = "";
		$parametros["action"] = "insere.php?tabela=guia_turismo";
	}
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "ID_GUIA_TURISMO";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["id_guia"];
	$parametros["placeholder"] = "Digite o CPF do guia...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "NOME";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["nome"];
	$parametros["placeholder"] = "Digite o nome do guia...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "TELEFONE";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["telefone"];
	$parametros["placeholder"] = "Digite o telefone do guia...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "EMAIL";
	$parametros["type"] = "email";
	$parametros["value"] = $resultado[0]["email"];
	$parametros["placeholder"] = "Digite o e-mail do guia...";	
	$f->add_input($parametros);	

	$parametros = null;
	$parametros["name"] = "PRECO";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["preco"];
	$parametros["placeholder"] = "Digite o preco do guia...";	
	$f->add_input($parametros);
	
	$m = new Modal($f);
	$m->exibe();
	
?>

 
	
	