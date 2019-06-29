<?php

    include("classeCabecalho.php");
	$c->exibe_menu();

    include("classeForm.php");
    include("classeModal.php");
	
	$parametros = null;
    $parametros["action"] = "enviar_resetar_senha.php";
	$parametros["method"] = "POST";
	
    $f = new Form($parametros);

    $parametros = null;
	$parametros["name"] = "EMAIL";
    $parametros["type"] = "email";
    $parametros["class"] = "form-control";
    $parametros["required"] = "required";
	$parametros["placeholder"] = "Informe seu email";	
    $f->add_input($parametros);
    $f->exibe;
    //$m = new Modal($f);
	//$m->exibe();
?>
<script src="resetar_senha.js"></script>