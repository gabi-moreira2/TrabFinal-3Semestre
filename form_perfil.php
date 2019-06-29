<?php
	include("autenticacao.php");
	include("classeForm.php");
	include("classeModal.php");	
	
	$parametros = null;
	$parametros["action"] = "altera.php?tabela=CLIENTE&ID_CLIENTE=".$_GET["id"];
	$parametros["method"] = "post";
    $f = new Form($parametros);
    
    $parametros = null;
	$parametros["name"] = "ID_CLIENTE";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["id_cliente"];
	$parametros["placeholder"] = "Digite o CPF do cliente...";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "NOME";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["nome"];
	$parametros["placeholder"] = "Digite o nome do cliente...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "SOBRENOME";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["sobrenome"];
	$parametros["placeholder"] = "Digite o sobrenome do cliente...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "DATA_NASCIMENTO";
	$parametros["type"] = "date";
	$parametros["value"] = $resultado[0]["data_nascimento"];	
	$parametros["label"] = "Data de Nascimento";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "SEXO";
	$parametros["type"] = "radio";
	$parametros["opcoes"] = array("1"=> "Feminino", "2"=>"Masculino");
	$parametros["label"] = "Sexo";
	$parametros["value"] = $resultado[0]["sexo"];	
	$f->add_inputOpcoes($parametros);

	$parametros = null;
	$parametros["name"] = "TELEFONE";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["telefone"];	
	$parametros["placeholder"] = "Digite o telefone do cliente...";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "ENDERECO";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["endereco"];	
	$parametros["placeholder"] = "Digite o endereco do cliente...";	
	$f->add_input($parametros);
	
	$m = new Modal($f);
	$m->exibe();
	
?>