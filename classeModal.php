<?php

	class Modal implements Exibicao{
		
		private $form;	
		
		public function __construct(Form $f){			
			$this->form = $f;
		}

		
		public function exibe(){
			
			echo "
			<div class='float-left'>
			<button class='btn btn-default btn-cadastrar' data-toggle='modal' data-target='#novoCadastro'>Cadastrar</button>
			</div>".'
		  <div class="modal" tabindex="-1" role="dialog" id="novoCadastro">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Novo Cadastro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

                  <div class="modal-body" >';
						
			$this->form->exibe();
		
			echo '</div>
            </div>
          </div>
        </div>';
		}
		
		
		
	}


?>