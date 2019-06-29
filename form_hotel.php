<?php
	
	include("autenticacao.php");
	include("classeForm.php");
	include("conexao.php");
	include("classeModal.php");
	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=hotel";
	$parametros["method"] = "post";
	
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "ID_HOTEL";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "ID do hotel";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "NOME";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Nome do hotel";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "TELEFONE";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Telefone do hotel";	
	$f->add_input($parametros);	

	$parametros = null;
	$parametros["name"] = "EMAIL";
	$parametros["type"] = "email";
	$parametros["placeholder"] = "E-mail do hotel";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "TIPO_QUARTO";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Tipo de quarto disponível";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "QNT_QUARTO";
	$parametros["type"] = "number";
	$parametros["placeholder"] = "Quantidade de quartos";	
    $f->add_input($parametros);
    
    $parametros = null;
	$parametros["name"] = "PRECO_DIARIA";
	$parametros["type"] = "number";
	$parametros["placeholder"] = "Preço da diária";	
	$f->add_input($parametros);

	$consulta = "SELECT id_cidade as value, 
				 nome as label 
				 FROM cidade 
				 ORDER BY id_cidade";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$cidades[] = $linha;
	}	
	$f->add_select("COD_CIDADE", $cidades,null);	
	
	$m = new Modal($f);
	$m->exibe();
	
?>
