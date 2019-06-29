<?php
	include("autenticacao.php");
	include("classeForm.php");
	include("classeModal.php");	
	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=PAGAMENTO";
	$parametros["method"] = "post";
	
	$f = new Form($parametros);

	$parametros = null;
	$parametros["name"] = "ID_PAGAMENTO";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "ID do pagamento";	
	$f->add_input($parametros);

    //Select clientes
    $consulta = "SELECT ID_RESERVA as value, ID_RESERVA as label FROM RESERVA ORDER BY ID_RESERVA";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$reservas[] = $linha;
	}	
	$f->add_select("COD_RESERVA", $reservas,null);
    
    //Select cartao
    $consulta = "SELECT ID_CARTAO as value, CONCAT(NOME_TITULAR, ' (', EMPRESA, '/', TIPO_CARTAO, ')') as label FROM CARTAO ORDER BY ID_CARTAO";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$cartaos[] = $linha;
	}	
	$f->add_select("COD_CARTAO", $cartaos,null);
	
	
	$m = new Modal($f);
	$m->exibe();
	
?>
 
	
	