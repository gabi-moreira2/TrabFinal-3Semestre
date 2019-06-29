<?php

	include("classeUsuario.php");

	class ValidacaoUsuario{
		
		private $conexao;
		private $email;
		private $senha;
		
		public function __construct($conexao,$valores){
			$this->conexao=$conexao;
			$this->email=$valores["EMAIL"];
			$this->senha=$valores["SENHA"];			
		}
		
		public function validar(){

			$consulta = "SELECT * FROM CLIENTE WHERE EMAIL=:email AND SENHA=:senha";

			$stmt = $this->conexao->prepare($consulta);
			$stmt->bindValue(":email", $this->email);
			$stmt->bindValue(":senha", md5(sha1($this->senha)));
			$stmt->execute();
			
			if($stmt->rowCount()==1){
				session_start();
				$linha = $stmt->fetch();
				
				$_SESSION["cliente"] = new Usuario($linha);
				header("location: index.php");
			}
			else{
				header("location: form_login.php?erro=1");
			}
			
		}
		
	}


?>