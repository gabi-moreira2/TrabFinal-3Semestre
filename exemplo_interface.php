<?php

	interface Locomocao{
	
		public function locomover();
		public function alimentar();
		public function respirar();
		public function dormir();
	
	}
	
	abstract class Animal implements Locomocao{
		
	}
	
	class Cachorro extends Animal{
		public function locomover(){
			echo "cachorro andando...";
		}
	}
	
	class Gato extends Animal{
		
	}
	
	$c = new Cachorro();
	
?>