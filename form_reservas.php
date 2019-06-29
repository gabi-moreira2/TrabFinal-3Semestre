<?php
	include("autenticacao.php");
	include("classeForm.php");
	include("classeModal.php");	
	
	$parametros = null;
	if(isset($_GET["id"])){
		include("classeBancoDeDados.php");
		$bd = new BancoDeDados($conexao);
		$tabela[]="RESERVA";
		$coluna[]= "ID_RESERVA";
		$coluna[]= "COD_CLIENTE";
		$coluna[]= "COD_COMPANHIA_ORIGEM_DESTINO";
		$coluna[]= "CHECK_IN";
		$coluna[]= "CHECK_OUT";		
		$coluna[]= "QNT_VIAJANTES";
		$coluna[]= "COD_GUIA";
		$coluna[]= "COD_HOTEL";
		$coluna[]= "QNT_QUARTO";
        $coluna[]= "DATA_COMPRA";
        $coluna[]= "STATUS_PAGAMENTO";
        $coluna[]= "STATUS_RESERVA";
        $coluna[]= "VALOR_TOTAL";
		$condicao[] = " ID_RESERVA=".$_GET["id"];
		$ordenacao = null;
		$resultado = $bd->select($tabela,$coluna,$condicao,$ordenacao);
		$parametros["action"] = "altera.php?tabela=RESERVA&id=".$_GET["id"];
	}
	else{
		$resultado[0]["ID_RESERVA"] = "";
		$resultado[0]["COD_CLIENTE"] = "";		
		$resultado[0]["COD_COMPANHIA_ORIGEM_DESTINO"] = "";
        $resultado[0]["CHECK_IN"] = "";
		$resultado[0]["CHECK_OUT"] = "";
		$resultado[0]["QNT_VIAJANTES"] = "";
		$resultado[0]["COD_GUIA"] = "";
		$resultado[0]["COD_HOTEL"] = "";
		$resultado[0]["QNT_QUARTO"] = "";
        $resultado[0]["DATA_COMPRA"] = "";
        $resultado[0]["STATUS_PAGAMENTO"] = "";
        $resultado[0]["STATUS_RESERVA"] = "";
        $resultado[0]["VALOR_TOTAL"] = "";

		$parametros["action"] = "insere.php?tabela=reserva";
	}
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "ID_RESERVA";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["ID_RESERVA"];
	$parametros["placeholder"] = "Digite o ID da reserva...";	
    $f->add_input($parametros);

    //Select clientes
    $consulta = "SELECT id_cliente as value, nome as label FROM cliente ORDER BY id_cliente";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$clientes[] = $linha;
	}	
	$f->add_select("COD_CLIENTE", $clientes, $resultado[0]["COD_CLIENTE"]);
	
	//Select origem
	$consulta = "SELECT COD.ID_COMPANHIA_ORIGEM_DESTINO as value, CONCAT(CO.NOME,' - ',CD.NOME,' (',C.NOME_COMPANHIA,')') as label FROM COMPANHIA C INNER JOIN COMPANHIA_ORIGEM_DESTINO COD ON C.ID_COMPANHIA = COD.COD_COMPANHIA INNER JOIN CIDADE CO 	ON COD.COD_ORIGEM = CO.ID_CIDADE INNER JOIN CIDADE CD ON COD.COD_DESTINO = CD.ID_CIDADE";
    $stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$cods[] = $linha;
	}	
	$f->add_select("COD_COMPANHIA_ORIGEM_DESTINO", $cods, $resultado[0]["COD_COMPANHIA_ORIGEM_DESTINO"]);
    
	$parametros = null;
	$parametros["name"] = "CHECK_IN";
	$parametros["type"] = "date";
    $parametros["value"] = $resultado[0]["CHECK_IN"];
    $parametros["label"] = "Check-in";
	$parametros["placeholder"] = "Digite o check-in da reserva...";	
    $f->add_input($parametros);
    
    $parametros = null;
	$parametros["name"] = "CHECK_OUT";
	$parametros["type"] = "date";
    $parametros["value"] = $resultado[0]["CHECK_OUT"];
    $parametros["label"] = "Check-out";
	$parametros["placeholder"] = "Digite o check-in da reserva...";	
	$f->add_input($parametros);
	
	$parametros = null;
	$parametros["name"] = "QNT_VIAJANTES";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["QNT_VIAJANTES"];
	$parametros["placeholder"] = "Digite a qnt de pessoas...";	
	$f->add_input($parametros);

	//Select GUIA
    $consulta = "SELECT DISTINCT G.ID_GUIA_TURISMO as value, G.NOME as label FROM GUIA_TURISMO G";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$guias[] = $linha;
	}	
	$f->add_select("COD_GUIA", $guias, $resultado[0]["COD_GUIA"]);
    
	
    //Select hotéis
    $consulta = "SELECT id_hotel as value, nome as label FROM hotel ORDER BY id_hotel";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$hoteis[] = $linha;
	}	
	$f->add_select("COD_HOTEL", $hoteis, $resultado[0]["COD_HOTEL"]);


	$parametros = null;
	$parametros["name"] = "QNT_QUARTO";
	$parametros["type"] = "number";
    $parametros["value"] = $resultado[0]["QNT_QUARTO"];
	$parametros["placeholder"] = "Quantidade de quartos...";	
    $f->add_input($parametros);
    
    $parametros = null;
	$parametros["name"] = "DATA_COMPRA";
	$parametros["type"] = "date";
    $parametros["value"] = $resultado[0]["DATA_COMPRA"];
    $parametros["label"] = "Data da compra";
	$parametros["placeholder"] = "Digite data da compra da reserva...";	
    $f->add_input($parametros);
    
    $parametros = null;
	$parametros["name"] = "STATUS_PAGAMENTO";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["STATUS_PAGAMENTO"];
	$parametros["placeholder"] = "status_pagamento...";	
    $f->add_input($parametros);

    $parametros = null;
	$parametros["name"] = "STATUS_RESERVA";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["STATUS_RESERVA"];
	$parametros["placeholder"] = "status_reserva...";	
    $f->add_input($parametros);

    $parametros = null;
	$parametros["name"] = "VALOR_TOTAL";
	$parametros["type"] = "text";
	$parametros["value"] = $resultado[0]["VALOR_TOTAL"];
	$parametros["placeholder"] = "valor_total...";	
	$f->add_input($parametros);

	
	$m = new Modal($f);
	$m->exibe();
	
?>
 
	
	