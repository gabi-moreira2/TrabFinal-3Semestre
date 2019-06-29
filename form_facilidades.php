<?php
	
	include("autenticacao.php");
	include("classeForm.php");
	include("conexao.php");
	include("classeModal.php");
	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=facilidade";
	$parametros["method"] = "post";
	
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "ID_FACILIDADE";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "ID da facilidade";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "NOME_FACILIDADE";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Nome da facilidade";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "DESCRICAO";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Descrição da facilidade";	
	$f->add_input($parametros);	

	$m = new Modal($f);
	$m->exibe();
	
?>
