<?php
/**
 * Created by PhpStorm.
 * User: Caroline Paixão
 * Date: 10/03/2018
 * Time: 16:21
 */
try {
    $database_host     = '172.30.229.248';
    $database_username = 'userT3R';
    $database_password = '0ijXrhfwFmdjU3B6';
    $database_name     = 'sampledb';
    $conn = new PDO('mysql:host='.$database_host.';dbname='.$database_name.', '.$database_username.', '.$database_password); //Estabelecendo uma conexão com o bd
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Estabelecendo atributos para caso de algum erro
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage(); //Mostrando erro.
}
