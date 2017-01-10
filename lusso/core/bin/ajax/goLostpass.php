<?php
$db= new conexion();
$email=$db->real_escape_string($_POST['email']);

$sql = $db-> query("SELECT id,user FROM users WHERE email='$email' LIMIT 1;");
if($db->rows($sql) > 0 ){
$data =$db->recorrer($sql);
$id=$data[0];
$user=$data[1];
$keypass=md5(time());
$newpass=strtoupper(substr(sha1(time()),0,8));
$link = APP_URL.'?view=lostpass&key='.$keypass;
$mail = new PHPMailer;
$mail->CharSet = "UTF-8";
$mail->Encoding = "quoted-printable";
$mail->isSMTP();                                    // Set mailer to use SMTP
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Host = PHPMAILER_HOST;  // Specify main and backup SMTP servers
$mail->Port = PHPMAILER_PORT;                                    // TCP port to connect to
$mail->Username = PHPMAILER_USER;                 // SMTP username
$mail->Password = PHPMAILER_PASS;                           // SMTP password

$mail->setFrom(PHPMAILER_USER, APP_TITTLE);         //quien manda el correo

$mail->addAddress($email, $user);     // quien recibe

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Recuperar contraseña perdida ';
$mail->Body    =  LostpassTemplate($user,$link);
$mail->AltBody = 'Hola '.$user.' Para recuperar tu contraseña deber ir a este enlace '. $link. ' si no ha solicitado un cambi de contraseña haga caso omiso a este mensaje';

if(!$mail->send()) {
    $HTML = '<div class="alert alert-danger alert-dismissable fade in">
<a href="#" target="_self" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><h4>ERROR:</h4></strong>'.$mail->ErrorInfo.'</div>';
} else {
  $db-> query("UPDATE users SET keypass='$keypass', newpass='$newpass' WHERE id='$id';");
  $HTML=1;

}

}else {
  $HTML='<div class="alert alert-danger alert-dismissable fade in">
<a href="#" target="_self" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><h4>ERROR:</h4></strong><p>El email no existe en sistema</p></div>';
}
$db->liberar($sql);
$db->close();
echo $HTML;

 ?>
