<?php
	include("autenticacao.php");
	include("classeForm.php");
	include("classeModal.php");	
	
	$parametros = null;
	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="TRECHO_GUIA";
		$coluna[]= "ID_TRECHO_GUIA";
		$coluna[]= "COD_GUIA";
		$coluna[]= "COD_COMPANHIA_ORIGEM_DESTINO";
		$condicao[] = " ID_TRECHO_GUIA=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=TRECHO_GUIA&ID_TRECHO_GUIA=".$_GET["id"];
	}
	else{
		$resultado[0]["ID_TRECHO_GUIA"] = "";
		$resultado[0]["COD_GUIA"] = "";
		$resultado[0]["COD_COMPANHIA_ORIGEM_DESTINO"] = "";
		$parametros["action"] = "insere.php?tabela=TRECHO_GUIA";
	}
    $parametros["method"] = "post";
    $f = new Form($parametros);
    
    //Select Guia
    $consulta = "SELECT ID_GUIA_TURISMO as value, NOME as label FROM GUIA_TURISMO";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$guias[] = $linha;
	}	
	$f->add_select("COD_GUIA", $guias, $resultado[0]["COD_GUIA"]);

    //Select Guia
    $consulta = "SELECT COD.ID_COMPANHIA_ORIGEM_DESTINO as value, CONCAT(ORIGEM, '/', DESTINO) as label FROM COMPANHIA_ORIGEM_DESTINO COD INNER JOIN INFO_COMPANHIA_ORIGEM_DESTINO ICOD ON COD.ID_COMPANHIA_ORIGEM_DESTINO = ICOD.ID_COMPANHIA_ORIGEM_DESTINO;";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$cod_cod[] = $linha;
	}	
	$f->add_select("COD_COMPANHIA_ORIGEM_DESTINO", $cod_cod, $resultado[0]["COD_COMPANHIA_ORIGEM_DESTINO"]);
	
	$m = new Modal($f);
	$m->exibe();
	
?>