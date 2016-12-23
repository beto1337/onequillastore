<?php
$db= new conexion();

$pass   =Encrypt($_POST['pass']);
$user   =$_POST['user'];
$email  =$_POST['email'];
$cod1   = generarCodigo(6);
$sql3   =  $db -> query("SELECT user FROM users WHERE codigo_user='$cod1' LIMIT 1;");
$cod2   = $db-> recorrer($sql3)[0];
  $db-> liberar($sql3);
$sql    = $db -> query("SELECT user FROM users WHERE user='$user' or email='$email' LIMIT 1;");
  if ($db->rows($sql) == 0) {
      while ($cod1 == $cod2) {
        $cod1 = generarCodigo(6);
        $sql3 =  $db -> query("SELECT user FROM users WHERE codigo_user='$cod1' LIMIT 1;");
        $cod2 = $db-> recorrer($sql3)[0];
        $db-> liberar($sql3);
      }
      $keyreg = md5(time());
      $link= APP_URL.'?view=activar&key='. $keyreg;

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

$mail->Subject = 'Activacion de tu cuenta ';
$mail->Body    =  EmailTemplate($user,$link);
$mail->AltBody = 'Hola '.$user.' para activar tu cuenta accede al siguiente enlace '. $link;

if(!$mail->send()) {
    $HTML = '<div class="alert alert-danger alert-dismissable fade in">
<a href="#" target="_self" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>ERROR:</strong>'.$mail->ErrorInfo.'</div>';
} else {
  $db->query("INSERT INTO users (user,pass,email,codigo_user,keyreg) VALUES ('$user','$pass','$email','$cod1','$keyreg');");
  $sql_2 = $db -> query("SELECT MAX(id) as id FROM users;");
  $_SESSION['app_id'] = $db-> recorrer($sql_2)[0];
  $db-> liberar($sql_2);
$HTML= 1;
}

}else {
  $usuario = $db->recorrer($sql)[0];
  if (strtolower($user) == strtolower($usuario)) {
    $HTML = '<div class="alert alert-danger alert-dismissable fade in">
<a href="#" target="_self" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>ERROR:</strong> El usuario ingresado ya existe.
  </div>';
  }else {
    $HTML = '<div class="alert alert-danger alert-dismissable fade in">
<a href="#" target="_self" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>ERROR:</strong> El email ingresado ya se encuentra registrado.
    </div>';
  }

}

$db-> liberar($sql);
$db-> close();
echo $HTML;
?>
