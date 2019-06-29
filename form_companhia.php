<?php
	include("autenticacao.php");
	include("classeForm.php");	
	include("classeModal.php");
	
	$parametros = null;
	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="companhia";
		$coluna[]= "id_companhia";
        $coluna[]= "nome_companhia";
        $coluna[]= "email";
        $coluna[]= "tipo_viagem";
		$condicao[] = " id_companhia=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=companhia&id=".$_GET["id"];
	}
	else{
		$resultado[0]["id_companhia"] = "";
        $resultado[0]["nome_companhia"] = "";
        $resultado[0]["email"] = "";
        $resultado[0]["tipo_viagem"] = "";
		$parametros["action"] = "insere.php?tabela=companhia";
	}
	$parametros["method"] = "post";
	
    $f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "ID_COMPANHIA";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["id_companhia"];
	$parametros["placeholder"] = "ID da companhia";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "NOME_COMPANHIA";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["nome_companhia"];
	$parametros["placeholder"] = "Nome da companhia";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "EMAIL";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["email"];
	$parametros["placeholder"] = "E-mail da companhia";	
	$f->add_input($parametros);
	
	$m = new Modal($f);
	
	$m->exibe();
?>

 
	
	