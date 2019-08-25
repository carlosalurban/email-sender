<?php
$err = "";
$sended = false;
if (isset($_POST['enviar'])) {
    $send = $_POST['enviar'];
    $name = $_POST['nombre'];
    $mail = $_POST['correo'];
    $message = $_POST['mensaje'];
    //NOMBRE
    if (!empty($name)) {
        $name = trim($name);
        $name = filter_var($name, FILTER_SANITIZE_STRING);
    } else {
        $err .= "Por favor, introduzca su nombre<br>";
    }
    //CORREO
    if (!empty($mail)) {
        $mail = trim($mail);
        $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $err .= "Por favor introduce un correo valido";
        }
    } else {
        $err .= "Por favor, introduzca su correo<br>";
    }
    //MENSAJE
    if (!empty($message)) {
        $message = htmlspecialchars($message);
        $message = trim($message);
        $message = stripslashes($message);
    } else {
        $err .= "Por favor, introduzca su mensaje<br>";
    }
    if (!$err) {
        //  Change de string $destiny for your own email address
        $destiny = "youremail@address.com";
        $affair = "Email Contact";
        $messageToSend = "De: $name \n";
        $messageToSend .= "Correo: $mail \n";
        $messageToSend .= "Mensajes: " . $message;
        $okSend = mail($destiny, $affair, $messageToSend);
        if ($okSend) {
            $sended = true;
        } else {
            $sended = false;
        }
    }
}
require 'index.view.php';
