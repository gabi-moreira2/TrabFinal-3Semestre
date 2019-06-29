<?php

	include("classeCabecalho.php");
	include("classeModal.php");	
	$c->exibe_menu();
	
	include("autenticacao.php");
	include("classeForm.php");	
	
	$parametros = null;
	$parametros["action"] = "envia_mensagem.php";
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["type"]="text";
	$parametros["name"]="assunto";
	$parametros["placeholder"]="digite o assunto...";
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"]="mensagem";
	$parametros["placeholder"]="digite a mensagem...";
	$f->add_TextArea($parametros);
	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	$m = new Modal($f);
	$m->exibe();
?>	
	