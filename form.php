<?php
	date_default_timezone_set("America/Sao_Paulo");

	require_once('class.phpmailer.php');
        
        $name = $_POST['nome'];
        $imail = $_POST['email'];
        $message = $_POST['mensagem'];

        $html = file_get_contents("http://www.augustoredua.com/wp-content/themes/augustoredua/send.html");

        $html = str_replace(array('{nome}', '{email}', '{mensagem}'),
            array($name, $imail, $message), $html);

        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->Host = "mail.augustoredua.com";
        $mail->SMTPDebug = 2;

        $mail->SMTPAuth = true;
        $mail->CharSet = "utf-8";
        $mail->Username = "contato@augustoredua.com";
        $mail->Password = "425123";

        $mail->SetFrom("contato@augustoredua.com", "Augusto Rédua");

        $mail->AddReplyTo("nao-responda@augustoredua.com", "Não responde");

        $mail->Subject = "Contato - Augusto Rédua [www.augustoredua.com]";

        $mail->MsgHTML($html);

        $mail->AltBody = "Nome: " . $name . "\r\nE-mail: " . $imail . "\r\nMensagem: " . $message;

        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "E-mail enviado!";
        }

?>