<?php
	include("classeCabecalho.php");
	$c->exibe_menu();

	include("classeBancoDeDados.php");
	include("classeForm.php");
	
	$op = new BancoDeDados($conexao);
	
	if(!empty($_POST)){
		$email=$_POST["email"];
		$codigo_alteracao=$_POST["codigo_alteracao"];
	}
	else{
		$email = $_GET["email"];
		$codigo_alteracao=$_GET["codigo_alteracao"];
	}
	
	$tabela[]="cliente";
	$coluna[]="id_cliente as id";
	$condicao[] = "email='$email'";
	$condicao[] = "codigo_alteracao='$codigo_alteracao'";
	$ordenacao="";
	$m = $op->select($tabela,$coluna,$condicao,$ordenacao);
	
	if($m!=null){
		
		
		if(!empty($_POST)){
			
			$id=$m[0]["id"];
			$valores = array("senha"=>$_POST["senha"],"codigo_alteracao"=>"");
			$op->alterar($valores,"cliente",$id);
			echo "Senha alterada com sucesso. <br />";
			echo "<a href='form_login.php'>Clique aqui</a> para logar no sistema.";
		}
		else{
			$parametros["action"]="resetar_senha.php";
			$parametros["method"]="post";		
			$f = new Form($parametros);
			
			$parametros=null;
			$parametros["type"]="password";
			$parametros["name"]="SENHA";
			$parametros["required"]="required";	
			$parametros["data_cript"]="sha1, md5";				
			$parametros["placeholder"]="digite a nova senha...";
			$f->add_input($parametros);
			
			$parametros=null;
			$parametros["type"]="hidden";
			$parametros["name"]="EMAIL";
			$parametros["value"]=$_GET["email"];
			$f->add_input($parametros);

			$parametros=null;
			$parametros["type"]="hidden";
			$parametros["name"]="codigo_alteracao";
			$parametros["value"]=$_GET["codigo_alteracao"];
			$f->add_input($parametros);			
			
			$f->exibe();

		}
		
		
	}
	
?>	
   <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validaform.min.js"></script>
</body>
</html>	