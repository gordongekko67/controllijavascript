<?php


$response = file_get_contents('http://transport.opendata.ch/v1/connections?from=Lausanne&to=Genève');

$responserest = json_decode($response);

echo json_encode($responserest);













?>
