<?php
    
    include("classeCabecalho.php");
    $c->exibe_menu();
    include("classeUsuario.php");
    include("classeValidacaoUsuario.php");
    
    print_r($_SESSION['cliente']);
    die();
    $titulo = $_POST["titulo_duvida"];
    $texto = $_POST["duvida"];
    $senha = $_POST["senha_duvida"];
    $usuario = $_SESSION["nome"];
    $email = $_SESSION["email"];
        
    require_once('phpmailer/class.phpmailer.php');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "$email";
    $mail->Password = "$senha";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->From = "$usuario";
    $mail->FromName = "Cliente";
    $mail->AddAddress("gabiiluisamoreira@gmail.com", "Administrador");
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = "$titulo";
    $mail->Body =  "<html>
                        <head>
                            <meta charset='utf-8'/>
                        </head>
                        <body>
                            <h1>$titulo</h1>
                            <p style='color:red'>$texto<p>
                        </body>
                    </html>";
    $mail->AltBody = "$titulo: $texto";
    if(!$mail->Send()){
        echo 'Mensagem não pode ser enviada: ';
        echo $mail->ErrorInfo;
        exit;
    } else{
        echo "<h2 align='center'>Mensagem enviada com sucesso!<h2>";
        echo "Por favor, aguarde enquanto tentamos solucionar sua dúvida... <br/>Entraremos em contato em breve :)";
    }
?>