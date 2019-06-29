<?php
    $bd = "mysql:host=localhost;dbname=agencia_turismo;charset=utf8";
    $user = "root";
    $senha = "";

	try{
		$conexao = new PDO($bd,$user,$senha);
	}
	catch(Exception $e){
		echo "Erro ao conectar no banco de dados";
	}

?>