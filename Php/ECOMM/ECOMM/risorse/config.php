<?php
ob_start();
session_start();
//session_destroy();

defined(DS) ? null : define('DS' , DIRECTORY_SEPARATOR);

defined('FRONT_END') ? null : define('FRONT_END' , __DIR__ . DS .  'templates/front');
defined('BACK_END') ? null : define('BACK_END' , __DIR__ .  DS .  'templates/back');
defined('IMG_UPLOADS') ? null : define('IMG_UPLOADS' , __DIR__ .  DS .  'immagini');
//echo IMG_UPLOADS;

//configurare database

define('DB_HOST' , 'localhost');
define('DB_UTENTE' , 'root');
define('DB_PASSWORD' , 'root');
define('DB_NOME' , 'negozio');

$connessione = mysqli_connect(DB_HOST , DB_UTENTE , DB_PASSWORD , DB_NOME);


// if(!$connessione){
//     echo 'non sei connesso';
// }else {
//     echo 'sei connesso';
// }

require_once('funzioni.php');

