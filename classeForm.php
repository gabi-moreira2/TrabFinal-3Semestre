<?php
		
	include("classeInputOpcoes.php");
	include("classeSelect.php");
	include("classeButton.php");

	class Form implements Exibicao{
		
		private $action;
		private $method;		
		public $entradas;
		private $reset;
		private $nome_submit;
		
		public function __construct($parametros){
			
			$this->action = $parametros["action"];
			$this->method = $parametros["method"];
			if(isset($parametros["reset"])){
				$this->reset=$parametros["reset"];
			}
			if(isset($parametros["nome_submit"])){
				$this->nome_submit=$parametros["nome_submit"];
			}
			else{
				$this->nome_submit = "Enviar";
			}
			
		}

		public function add_button($parametros){
			$this->entradas[] = new Button($parametros);
		}
		
		public function add_input($parametros){
			$this->entradas[] = new Input($parametros);
		}
		
		public function add_TextArea($parametros){
			$this->entradas[] = new TextArea($parametros);
		}
		
		public function add_inputOpcoes($parametros){
			$this->entradas[] = new InputOpcoes($parametros);
		}		
		
		public function add_select($name,$options,$valor){
			$this->entradas[] = new Select($name,$options,$valor);
		}
		
		
		public function exibe(){
			
			echo "
			<div class='form-group'>
			<form method='$this->method' action='$this->action'>";
						
			
			if($this->entradas!=null)
			foreach($this->entradas as $i=>$e){				
				echo '<div class="row">
                        <div class="form-group col-sm-8 col-xs-12">';
				$e->exibe();
				echo "</div></div>";
			}
				
			echo "
			
				<div class='modal-footer'>

						<div>";
						if($this->reset!=null){
							echo "<button type='reset' class='btn btn-secondary'>Limpar</button>";
						}	
						
						echo "<input id='enviar' type='button' class='btn btn-primary' value='$this->nome_submit'>
						</div>
				
				</form>
			
				</div>
			</div>";
		}
		
		
	}


?>