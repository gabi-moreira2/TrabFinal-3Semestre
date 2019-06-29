<?php

	include("classeForm.php");
	include("autenticacao.php");
	include("conexao.php");
	include("classeModal.php");
	
	
	$parametros = null;

	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="cliente";
		$coluna[]= "id_cliente";
		$coluna[]= "nome";
		$coluna[]= "sobrenome";
		$coluna[]= "data_nascimento";
		$coluna[]= "sexo";
		$coluna[]= "telefone";
		$coluna[]= "endereco";
		$coluna[]= "email";
		$coluna[]= "senha";
		$coluna[]= "permissao";
		
		$condicao[] = " id_cliente=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera_cliente.php?tabela=cliente&id=".$_GET["id"];
	}
	else{
		$resultado[0]["id_cliente"] = "";
		$resultado[0]["nome"] = "";
		$resultado[0]["sobrenome"] = "";
		$resultado[0]["data_nascimento"] = "";
		$resultado[0]["sexo"] = "";
		$resultado[0]["telefone"] = "";
		$resultado[0]["endereco"] = "";
		$resultado[0]["email"] = "";
		$resultado[0]["senha"] = "";
		$resultado[0]["permissao"] = "";
		
		$parametros["action"] = "insere.php?tabela=cliente";
	}


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

	$parametros = null;
	$parametros["name"] = "EMAIL";
	$parametros["type"] = "email";
	$parametros["value"] = $resultado[0]["email"];	
	$parametros["placeholder"] = "Digite o email do cliente...";	
	$f->add_input($parametros);	

	//Senha
	$parametros = null;
	$parametros["name"] = "SENHA";
	$parametros["type"] = "password";
	$parametros["value"] = $resultado[0]["senha"];	
	$parametros["placeholder"] = "Senha";
	$parametros["required"] = "required";
	$parametros["data_cript"] = "sha1,md5";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "PERMISSAO";
	$parametros["type"] = "radio";
	$parametros["opcoes"] = array("0"=>"Cliente","1"=>"Administrador");
	$parametros["label"] = "Permissão";
	$parametros["value"] = $resultado[0]["permissao"];	
	$f->add_inputOpcoes($parametros);
	
	$m = new Modal($f);
	
	$m->exibe();
	
?>
