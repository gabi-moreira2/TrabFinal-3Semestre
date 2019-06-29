<?php

	class Tabela implements Exibicao{
		
		private $matriz;
		private $alterar;
		private $remover;
		private $tabela;
		private $exibe_id;
		
		public function __construct($matriz,$tabela,$alterar,$remover){			
				$this->matriz = $matriz;
				$this->alterar = $alterar;
				$this->remover = $remover;
				if(is_array($tabela)){
					$this->tabela = $tabela["nome"];
					$this->exibe_id = $tabela["exibe_id"];
				}
				else{
					$this->tabela=$tabela;
				}
		}		
		
		public function exibe(){
			
			echo " <div class='container'>
						<div class='table-responsive'>
						<div id='status'></div>
						<table class='dados-list table table-bordered table-striped table-hover'>";				
					if(isset($this->matriz)){						
						foreach($this->matriz as $i=>$linha){								
							if($i==0){								
								echo "<thead>
										<tr>";
								$cont=0;
								foreach($linha as $j=>$valor){					
									if(!is_numeric($j)){
										if($this->exibe_id && $cont==0){
											echo "<th>$j</th>";
										}
										else if($cont>0){
											echo "<th>$j</th>";
										}
										$cont++;
									}
								}		
								if(isset($_SESSION["cliente"])){
									if($_SESSION["cliente"]->get_permissao() == "ADMINISTRADOR"){
										if($this->remover!=null || $this->alterar!=null){
											echo "<th>Ação</th>";
										}
									}
								}														
								echo "</tr>
										</thead>
										<tbody id='tabela-list'>";
							}							
							echo "<tr>";
							$cont=0;
							foreach($linha as $j=>$valor){					
								if(!is_numeric($j)){
									if(!is_numeric($j)){
										if($this->exibe_id && $cont==0){
											echo "<td class='$j'>$valor</td>";
										}
										else if($cont>0){
											echo "<td class='$j'>$valor</td>";
										}
										$cont++;
									}
									
								}
							}
							if(isset($_SESSION["cliente"])){
								if($_SESSION["cliente"]->get_permissao() == "ADMINISTRADOR"){
									if($this->remover!=null || $this->alterar!=null){
										echo "<td>";
										if($this->alterar!=null){
											echo "<div class='tarefa-edit input-group'>
												<i  valor='$linha[0]' class='material-icons text-warning alterar' data-toggle='tooltip' title='Editar' data-original-title='Editar'>create</i>
												</div>";										
										}
										if($this->remover!=null){
											echo "<div class='tarefa-delete'>
													<a href='remover.php?tabela=$this->tabela&id=$linha[0]'>
														<i class='material-icons text-danger' data-toggle='tooltip' title='' data-original-title='Excluir'>delete</i>
													  </a>
												  </div>";
										}
									}
								}
							}
						
								echo "</td>";							
							}
							echo "</tr>";					
						}
					
					else{
						echo "Não há dados cadastrados";
					}
			
			
			echo "</tbody></table>
				<footer class='row'>
					<div class='col-sm-6 paginacao text-right'>
						<ul class='pagination'>
						</ul>
					</div>
				</footer>
        		</div>
    			</div>";
		}
		
		
	}


?>