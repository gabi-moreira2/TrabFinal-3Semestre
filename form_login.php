<?php
	include("classeCabecalho.php");
	include("classeForm.php");
	include("classeModal.php");
	include("classeLogin.php");
	
	$parametros["action"]="validacao.php";
	$parametros["method"]="post";
	
	$f = new Form($parametros);
	
	$parametros=null;
	$parametros["type"]="email";
	$parametros["name"]="EMAIL";
	$parametros["class"]="form-control";
	$parametros["required"]="required";
	$parametros["placeholder"]="E-mail";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="password";
	$parametros["name"]="SENHA";
	$parametros["class"]="form-control password";
	$parametros["required"]="required";	
	$parametros["data_cript"]="sha1, md5";	
	$parametros["placeholder"]="Digite a senha...";
	$f->add_input($parametros);
	
	if(isset($_GET["erro"])){
		echo "Login e/ou senha inválidos.<hr />";
	}
	
	$parametros=null;
	$parametros["logo"]="img/2new.png";
	$login = new Login($parametros,$f);
	$login->exibe();
	
	$parametros=null;
	$parametros["action"]="insere.php?tabela=cliente";
	$parametros["method"]="post";
	
	$f = new Form($parametros);

	$parametros=null;
	$parametros["type"]="text";
	$parametros["name"]="ID_CLIENTE";
	$parametros["class"]="form-control";
	$parametros["placeholder"]="CPF";
	$f->add_input($parametros);
	
	$parametros=null;
	$parametros["type"]="text";
	$parametros["name"]="NOME";
	$parametros["class"]="form-control";
	$parametros["placeholder"]="Digite o nome...";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="text";
	$parametros["name"]="SOBRENOME";
	$parametros["class"]="form-control";
	$parametros["placeholder"]="Digite o nome...";
	$f->add_input($parametros);
	
	$parametros=null;
	$parametros["type"]="radio";
	$parametros["name"]="SEXO";
	$parametros["label"]="Sexo";
	$parametros["class"]="form-control";
	$parametros["opcoes"]=array("1"=>"MASCULINO","2"=>"FEMININO");
	$f->add_inputOpcoes($parametros);

	$parametros=null;
	$parametros["type"]="date";
	$parametros["name"]="DATA_NASCIMENTO";
	$parametros["class"]="form-control";
	$parametros["label"]="Data Nascimento: ";
	$f->add_input($parametros);	

	$parametros=null;
	$parametros["type"]="text";
	$parametros["name"]="TELEFONE";
	$parametros["class"]="form-control";
	$parametros["placeholder"]="Telefone";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="text";
	$parametros["name"]="ENDERECO";
	$parametros["class"]="form-control";
	$parametros["placeholder"]="Endereço";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="email";
	$parametros["name"]="EMAIL";
	$parametros["id"]="EMAIL_LOGIN";
	$parametros["class"]="form-control";
	$parametros["placeholder"]="Digite o email (login)...";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="password";
	$parametros["name"]="SENHA";
	$parametros["id"]="SENHA_LOGIN";
	$parametros["class"]="form-control password";
	$parametros["required"]="required";	
	$parametros["data_cript"]="sha1, md5";		
	$parametros["placeholder"]="Digite uma senha... ";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="hidden";
	$parametros["name"]="PERMISSAO";	
	$parametros["value"]="0";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="hidden";
	$parametros["name"]="CODIGO_ALTERACAO";	
	$parametros["value"]=null;
	$f->add_input($parametros);
	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	$m = new Modal($f);
	$m->exibe();

?> 
<script scr="js/cadastro.js"></script>
</body>
</html>


