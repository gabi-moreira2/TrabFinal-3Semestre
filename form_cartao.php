<?php
	
	include("autenticacao.php");
	include("classeForm.php");
	include("conexao.php");
	include("classeModal.php");

	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=cartao";
	$parametros["method"] = "post";
	
	
	$f = new Form($parametros);

	$parametros = null;
	$parametros["name"] = "ID_CARTAO";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Número do cartão";	
	$f->add_input($parametros);

	$consulta = "SELECT id_cliente as value, 
				 cliente.nome as label 
				 FROM cliente
				 ORDER BY id_cliente";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$clientes[] = $linha;
	}	
	$f->add_select("COD_CLIENTE", $clientes,null);

	$parametros = null;
	$parametros["name"] = "DATA_VALIDADE";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Data de validade (ano-mes)";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "CODIGO_SEGURANCA";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Código de segurança";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "NOME_TITULAR";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Nome do titular";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "EMPRESA";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Empresa";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "TIPO_CARTAO";
	$parametros["type"] = "radio";
	$parametros["opcoes"] = array("1"=>"CREDITO","2"=>"DEBITO");
	$parametros["label"] = "Tipo";	
	$f->add_inputOpcoes($parametros);
	
	$m = new Modal($f);
	
	$m->exibe();
	
?>
