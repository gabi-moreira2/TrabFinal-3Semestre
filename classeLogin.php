<?php

	class Login implements Exibicao{
		
		private $logo;
		private $form;		
		
		public function __construct($parametros, Form $f){			
			$this->logo = $parametros["logo"];
			$this->form = $f;
		}

		
		public function exibe(){

			
			echo "<div class='text-center login-form col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4'>
					<header>
						<h1><img class='mb-4 img-fluid' src='$this->logo' height='100' width='100'/>Fly High Turismo</h1>
						<h1 class='h3 mb-3 font-weight-normal'>Entre com seu e-mail e senha</h1>
					</header>";
						
			$this->form->exibe();
		
			echo "<div class='float-left'>";
					// <button class='btn btn-default btn-cadastrar' data-toggle='modal' data-target='#novoCadastro'>
						//Cadastrar
					//</button>
			echo "	<a href='form_resetar_senha.php'>Esqueci minha Senha</a>
				</div>
				</div>";
		}		
	}
?>