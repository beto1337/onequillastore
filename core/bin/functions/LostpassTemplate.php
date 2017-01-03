<?php

function LostpassTemplate($user,$link) {
  $HTML = '
  <html>
  <body style="background: #FFFFFF;font-family: Verdana; font-size: 14px;color:#1c1b1b;">
  <div style="">
      <h2>Hola '.$user.'</h2>
      <p style="font-size:17px;">Hemos recivido una solicitud de cambio de condtraseña.</p>
      <p>El dia '.date('d/m/Y', time()).' se ha generado una solicitud de recuperación de contraseña.</br> si no has solicitado Estamos
      has caso omiso a este mensaje, en cambio si deseas modificar tu contraseña debes hacer clic en el link de abajo</p>
  	<p style="padding:15px;background-color:#ECF8FF;">
  			Para modificar tu contraseña has <a style="font-weight:bold;color: #2BA6CB;" href="'.$link.'" target="_blank">clic aquí &raquo;</a>
  	</p>
      <p style="font-size: 9px;">&copy; '.APP_TITTLE.'. Todos los derechos reservados.</p>
  </div>
  </body>
  </html>
  ';

      return $HTML;
}

?>
