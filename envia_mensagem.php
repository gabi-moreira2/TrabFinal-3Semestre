<?php
	include("classeCabecalho.php");
	$c->exibe_menu();
	
	include("autenticacao.php");
	
	$from = $_SESSION["cliente"]->get_email();
	$fromName = $_SESSION["cliente"]->get_nome();
	
	$subject = $_POST["assunto"];
	$mensagem = $_POST["mensagem"];
	
	$email_destinatario = "gabiiluisamoreira@gmail.com";
	$nome_destinario = "Administrador";
	
	include("email.php");

?>	
	