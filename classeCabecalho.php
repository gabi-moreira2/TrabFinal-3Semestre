<?php
	include("classeUsuario.php");
	include("interfaceExibicao.php");

	class Cabecalho implements Exibicao{
	
		private $charset;
		private $title;
		private $links;
		private $scripts;
		
		public function __construct($parametros){
			$this->charset = $parametros["charset"];
			$this->title = $parametros["title"];
			if(isset($parametros["links"])){
				$this->links = $parametros["links"];
			}
			if(isset($parametros["scripts"])){
				$this->scripts = $parametros["scripts"];
			}
		}
		
		public function exibe(){
			session_start();
			echo '<!DOCTYPE html>
					<html lang="pt-BR">
					<head>
					<title>'.$this->title.'</title>
					<meta name="viewport" content="width=device-width, initial-scale=1"/>
					<meta charset="utf-8"/>';
			if($this->links!=null){
				foreach($this->links as $i=>$l){
					echo "<link rel='stylesheet' href='$l'/>";
				}
			}
			
			if($this->scripts!=null){
				foreach($this->scripts as $i=>$s){
					echo "<script type='text/javascript' src='$s'></script>";
				}
			}
			echo '</head>
				<body>';
		}
		
		public function exibe_menu(){

			echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand" href="index.php">
						<img src="img/2new.png" alt="Logotipo" width="50" height="50"/>
						Fly High Turismo
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
						<ul class="navbar-nav mr-auto ml-auto mt-2 mt-lg-0">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="listar_companhia.php">Companhias</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="listar_hotel_facilidade.php">Hotéis</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="listar_companhia_origem_destino.php">Destinos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="listar_trecho_guia.php">Guias Turísticos</a>
							</li>';
					
			if(isset($_SESSION["cliente"])){
				if($_SESSION["cliente"]->get_permissao() == "ADMINISTRADOR"){
					echo '
					<li class="nav-item">
                        <a class="nav-link" href="listar_pais.php">Paises</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link" href="listar_cidade.php">Cidades</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link" href="listar_cliente.php">Clientes</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link" href="listar_cartao.php">Cartão</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link" href="listar_tipo_viagem.php">Tipo de viagem</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link" href="listar_reservas.php">Reservas</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link" href="listar_pagamento.php">Pagamento</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link" href="listar_hotel.php">Hotel</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link" href="listar_facilidades.php">Facilidade</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link" href="listar_guia_turismo.php">Guias</a>
					</li>';
				}
			}
			echo '<li class="nav-item">
					<a class="nav-link" href="form_contato.php">
						Contato
					</a>
				</li>';				
			echo '</ul>';
			if(isset($_SESSION["cliente"])){
				echo' <div class="btn-group">
						<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$_SESSION["cliente"]->get_nome().'</button>
						<div class="dropdown-menu dropdown-menu-right">
							<button class="dropdown-item" type="button"><a href="dados_conta.php">Minha conta</a></button>';
				if($_SESSION["cliente"]->get_permissao() == "CLIENTE"){
					echo '<button class="dropdown-item" type="button"><a href="listar_reservas.php">Minha reservas</a></button>
						  <button class="dropdown-item" type="button"><a href="listar_cartao.php">Meus cartões</a></button>';
				}
				echo '<button class="dropdown-item" type="button" id="btnLogout"><a href="logout.php">Sair</a></button>
						</div>
					</div>
				  </div>
				</nav>
			  </nav>';
			}
			else{
				echo '<div class="dropdown">
						  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Login
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
							<button class="dropdown-item" type="button"><a href="form_login.php">Login</a></button>
							<button class="dropdown-item" type="button"><a href="form_login.php">Nova conta</a></button>
						</div>
					
				</div> </nav></nav>';
			}		
		}
	
	}	
	
	$parametros["charset"]="utf-8";
	$parametros["title"]="Agencia de Turismo";
	$parametros["links"][] = "css/bootstrap.min.css";
	//$parametros["links"][] = "css/bootstrap-datepicker.min.css";
	$parametros["links"][] = "css/estiloForm.css";
	$parametros["links"][] = "estiloTable.css";
	$parametros["links"][] = "css/login.css";
	$parametros["links"][] = "css/todo.css";
	$parametros["links"][] = "https://fonts.googleapis.com/icon?family=Material+Icons";
	$parametros["links"][] = "https://fonts.googleapis.com/css?family=Lato:400,300,700";
	//$parametros["links"][] = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		
	//$parametros["scripts"][] = "js/bootstrap-datepicker.min.js";
	//$parametros["scripts"][] = "js/bootstrap-datepicker.pt-BR.min.js";
	//$parametros["scripts"][] = "js/jquery.cookie.js";
	$parametros["scripts"][] = "js/jquery-3.3.1.min.js";
	$parametros["scripts"][] = "js/bootstrap.bundle.min.js";
	$parametros["scripts"][] = "js/bootstrap.min.js";	
	$parametros["scripts"][] = "js/login.js";
	$parametros["scripts"][] = "js/modal.js";
	$parametros["scripts"][] = "js/popper.min.js";	
	$parametros["scripts"][] = "js/validaform.min.js";
	//$parametros["scripts"][] = "https://code.jquery.com/jquery-3.3.1.slim.min.js";
	//$parametros["scripts"][] = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js";
	//$parametros["scripts"][] = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js";

	$c = new Cabecalho($parametros);
	$c->exibe();	
	
?>


	