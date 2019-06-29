<?php
	include("classeTextArea.php");
	class Input extends TextArea implements Exibicao{
		
		private $type;
		private $data_cript;

		public function get_type(){
			return($this->type);
		}
		
		public function __construct($parametros){
			parent::__construct($parametros);

			$this->type = $parametros["type"];

			if(isset($parametros["data_cript"])){
				$this->data_cript = $parametros["data_cript"];
			}
		}
		
		public function exibe(){
			
			if($this->get_label() != null){
				echo "<label>".$this->get_label().": </label>";
			}
			
			echo "<input type='$this->type' id='".$this->get_id()."' name='".$this->get_name()."'";
						
			if($this->get_value() != null){
				echo " value='".$this->get_value()."' ";
			}
			if($this->get_placeholder() != null){
				echo " placeholder='".$this->get_placeholder()."' ";
			}
			if($this->get_class() != null){
				echo " class='".$this->get_class()."' ";
			}
			if($this->get_required() != null){
				echo " required='".$this->get_required()."' ";
			}
			if($this->data_cript!=null){
				echo " data-cript='$this->data_cript' ";
			}
			echo " /><br />";
		}
		
	}

?>