<?php

	class Usuario{
	
		private $id_cliente;
		private $nome;
		private $sobrenome;
		private $sexo;
		private $data_nascimento;
		private $telefone;
		private $endereco;
		private $email;
		private $senha;
		private $permissao;
		
		public function __construct($parametros){
			if(isset($parametros["ID_CLIENTE"])){
				$this->id_cliente = $parametros["ID_CLIENTE"];
			}
			$this->nome = $parametros["NOME"];
			$this->sobrenome = $parametros["SOBRENOME"];
			$this->data_nascimento = $parametros["DATA_NASCIMENTO"];
			$this->sexo = $parametros["SEXO"];
			$this->telefone = $parametros["TELEFONE"];
			$this->endereco = $parametros["ENDERECO"];
			$this->email = $parametros["EMAIL"];
			$this->senha = $parametros["SENHA"];
			$this->permissao = $parametros["PERMISSAO"];			
		}
		
		public function get_id(){
			return($this->id_cliente);
		}

		public function get_nome(){
			return($this->nome);
		}
	
		public function get_email(){
			return($this->email);
		}	
		public function get_permissao(){
			return($this->permissao);
		}

	}



?>