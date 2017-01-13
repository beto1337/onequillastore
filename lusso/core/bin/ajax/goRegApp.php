<?php
$db= new conexion();


$nombre   =$_POST['nombrer'];
$apellido =$_POST['apellidor'];
$pass   =Encrypt($_POST['passr']);
$telefono  =$_POST['telefonor'];
$email  =$_POST['correor'];

$cod1   = generarCodigo(6);
//$sql3   =  $db -> query("SELECT codigo_user FROM users WHERE codigo_user='$cod1' LIMIT 1;");
//$cod2   = $db-> recorrer($sql3)[0];
//  $db-> liberar($sql3);
//$sql    = $db -> query("SELECT telefono FROM users WHERE (telefono='$telefono' OR email='$email')  LIMIT 1;");
$response=array();
$response['success']=false;
/*  if ($db->rows($sql) == 0) {
      while ($cod1 == $cod2) {
        $cod1 = generarCodigo(6);
        $sql3 =  $db -> query("SELECT codigo_user FROM users WHERE codigo_user='$cod1' LIMIT 1;");
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

$mail->addAddress($email, $nombre);     // quien recibe

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Activacion de tu cuenta ';
$mail->Body    =  EmailTemplate($nombre,$link);
$mail->AltBody = 'Hola '.$nombre.' para activar tu cuenta accede al siguiente enlace '. $link;

if(!$mail->send()) {
    $response['message']= $mail->ErrorInfo;
} else {
*/
  $sql_2=$db->query("INSERT INTO users (nombre,apellido,pass,email,telefono,codigo_user) VALUES ('$nombre','$apellido','$pass','$email','$telefono','$cod1');");
  $db-> liberar($sql_2);
$response['success']=true;
/*$response['message']='ha sido registrado satisfactoriamente, ahora solo queda revisar su correo y activar su cuenta';
}

}else {
  $telefonoc = $db->recorrer($sql)[0];
  $emailc = $db->recorrer($sql)[1];
  if ((strtolower($email) == strtolower($emailc)) ) {
    $response['message']="El email ingresado se encuentra registrado";
  }else {
    $response['message']="El telefono encontrado se encuentra registrado" ;
  }

}
*/
//$db-> liberar($sql);
$db-> close();
echo json_encode($response);
?>
