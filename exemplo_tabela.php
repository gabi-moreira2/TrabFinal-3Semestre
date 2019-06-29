<?php

	include("classeTabela.php");

	$matriz[0]["id"] = "1";
	$matriz[0]["nome"] = "São Paulo";
	$matriz[0]["sigla"] = "SP";



	$matriz[1]["id"] = "2";
	$matriz[1]["nome"] = "Paraná";
	$matriz[1]["sigla"] = "PR";
	
	
	$matriz[2]["id"] = "3";
	$matriz[2]["nome"] = "Paraíba";
	$matriz[2]["sigla"] = "PB";	

	$t = new Tabela($matriz);
	$t->exibe();


?>