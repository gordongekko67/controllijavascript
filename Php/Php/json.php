<?php


$jsonUser = '{"firstName":"Simone","lastName":"D\'Amico"}';
$user = json_decode($jsonUser, true);
print_r($user);


$user = [
    'firstName' => 'Simone',
    'lastName' => 'D\'Amico',
    'age' => 30
];
echo json_encode($user);






















?>