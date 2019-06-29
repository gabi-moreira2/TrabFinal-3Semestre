<?php
	include("autenticacao.php");
	include("classeForm.php");
	include("classeModal.php");	
	
	$parametros = null;
	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="TIPO_VIAGEM";
		$coluna[]= "ID_TIPO_VIAGEM";
		$coluna[]= "COD_COMPANHIA";
        $coluna[]= "TIPO_VIAGEM";
		$condicao[] = "ID_TIPO_VIAGEM=".$_GET["id_tipo_viagem"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=TIPO_VIAGEM&ID_TIPO_VIAGEM=".$_GET["id_tipo_viagem"];
	}
	else{
		$resultado[0]["id_tipo_viagem"] = "";
		$resultado[0]["cod_companhia"] = "";
		$resultado[0]["tipo_viagem"] = "";

		$parametros["action"] = "insere.php?tabela=TIPO_VIAGEM";
	}
	$parametros["method"] = "POST";
	
	$f = new Form($parametros);

	$parametros = null;
	$parametros["name"] = "ID__TIPO_VIAGEM";
	$parametros["type"] = "text";
    $parametros["value"] = $resultado[0]["id_tipo_viagem"];
	$parametros["placeholder"] = "ID de tipo_viagem";	
    $f->add_input($parametros);

    //Select clientes
    $consulta = "SELECT ID_COMPANHIA as value, NOME_COMPANHIA as label FROM COMPANHIA ORDER BY ID_COMPANHIA";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$companhias[] = $linha;
	}	
	$f->add_select("COD_COMPANHIA", $companhias, $resultado[0]["cod_companhia"]);

	$parametros = null;
	$parametros["name"] = "TIPO_VIAGEM";
	$parametros["type"] = "text";
    $parametros["value"] = $resultado[0]["tipo_viagem"];
	$parametros["placeholder"] = "Tipo de viagem";	
    $f->add_input($parametros);
	
	$m = new Modal($f);
	$m->exibe();
	
?>
 
	
	