<?php
/**
 * Created by PhpStorm.
 * User: Caroline Paixão
 * Date: 10/03/2018
 * Time: 16:21
 */
try {
    $host = '172.30.229.248:3306';
    $db   = "sampledb";
    $user = "userT3R";
    $pass = "0ijXrhfwFmdjU3B6";
    $dns = 'mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8';
    
    $conn = new PDO($dns, $user, $pass); //Estabelecendo uma conexão com o bd  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Estabelecendo atributos para caso de algum erro
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage(); //Mostrando erro.
}
