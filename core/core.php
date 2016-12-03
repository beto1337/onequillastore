<?php

session_start();
#Constantes de conexión
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','beto1337');
define('DB_NAME','onequilla');

#Constantes de la APP
define('HTML_DIR','html/');
define('APP_TITTLE','One Quilla Store');
define('APP_URL','http://ec2-54-211-50-222.compute-1.amazonaws.com/onequillastore/');

#Estructura
require('vendor/autoload.php');
require('core/models/class.Conexion.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/generadorcodigo.php');
require('core/bin/functions/Users.php');
require('core/bin/functions/EmailTemplate.php');

$users = Users();


#Constantes de PHPMailer
define('PHPMAILER_HOST','smtp.gmail.com');
define('PHPMAILER_USER','onequillastore@gmail.com');
define('PHPMAILER_PASS','13374274');
define('PHPMAILER_PORT',465);
/*
#Constantes básicas de personalización
define('MIN_TITULOS_TEMAS_LONGITUD',9);
define('MIN_CONTENT_TEMAS_LONGITUD',270);

#Estructura

require('core/bin/functions/Users.php');
require('core/bin/functions/Categorias.php');
require('core/bin/functions/Foros.php');
require('core/bin/functions/LostpassTemplate.php');
require('core/bin/functions/UrlAmigable.php');
require('core/bin/functions/BBcode.php');
require('core/bin/functions/OnlineUsers.php');
require('core/bin/functions/GetUserStatus.php');
require('core/bin/functions/IncreaseVisita.php');
require('vendor/autoload.php');


/*/

 ?>
