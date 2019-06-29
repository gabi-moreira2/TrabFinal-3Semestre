<?php/*
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

   
    if(isset($_GET['linhasPorPagina']) && is_numeric($_GET['linhasPorPagina'])){
        $linhasPorPagina = (int)$_GET['linhasPorPagina'];
    } 
    else{
        $linhasPorPagina = 10;  // numero de linhas default
    }

    if(isset($_GET['paginaAtual'])){
        $paginaAtual = (int)$_GET['paginaAtual'];
    } 
    else{
        $paginaAtual = 1;  // numero da página default
    }

    $id_cliente = $_GET["id_cliente"];

    $offset = ($paginaAtual-1) * $linhasPorPagina;

    // definições de host, database, usuário e senha
    $host = "localhost";
    $db   = "agencia_turismo";
    $user = "root";
    $pass = "";
    // conecta ao banco de dados
    $conn = new mysqli($host, $user, $pass, $db); 
    $conn->set_charset("utf8");

    if($conn->connect_error){
        die("Falha na conexão: ".$conn->connect_error);
    } 

    // cria a instrução SQL que vai selecionar os dados
    $sql = "SELECT * FROM tarefas WHERE id_usuario=$id_usuario ORDER BY id ASC LIMIT $offset, $linhasPorPagina";
    // executa a query
    $result = $conn->query($sql);
    
   

    $outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($outp);
    
    $conn->close();
  */  
?>