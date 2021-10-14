<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.pxp';
require 'phpmailer/src/PHPMailer.pxp';

$mail = new PHPMailer(true);
$mail ->CharSet = 'UTF-8';
$mail ->setLanguage('ru','phpmailer/language');
$mail ->IsHTML(true);

$mail->setFrom('kirasalvator@gmail.com', 'Фрилансер по жизни');
$mail -> addAddress('kirasalvator@gmail.com');
$mail-> Subject = 'Привет! Это вакансия"';

$body = '<hi>встречайте супер письмо!</h1>'; 
if(trim(!empty($_POST['name']))){
    $body.= '<p><strong>Имя: </strong>'.$_POST['name'].'</р>';
} 
if(trim(!empty($_POST['email']))){
    $body.= '<p><strong>E-mail: </strong>'.$_POST['email'].'</р>';
}
if(trim(!empty($_POST['message']))){
    $body.= '<p><strong>Сообщение: </strong>'.$__POST['message'].'</р>';
}

$mail->Body = $body;

if(!$mail->send()){
    $message = 'Ошибка';
}else {
    $message = 'Данные отправленны';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>