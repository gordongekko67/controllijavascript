
<?php

//$sql = mysql_query('select * from nazioni');

$eta_utenti = array('Simone' => 29,'Josephine' => 30,'Giuseppe' => 23,'Renato' => 26,'Gabriele' => 24);

foreach ($eta_utenti as $nome => &$eta) {
$eta++;

print_r($nome);
}
?>