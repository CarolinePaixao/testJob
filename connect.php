<?php
/**
 * Created by PhpStorm.
 * User: Caroline Paixão
 * Date: 10/03/2018
 * Time: 16:21
 */
try {
    $host = 'localhost';
    $user = 'id5034808_carolpaixao';
    $pass = '123456';
    $db = 'id5034808_testjob';

    //$host = 'localhost';
    //$user = 'root';
    //$pass = '';
    //$db = 'testjob';
    $dns = 'mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8';
    
    $conn = new PDO($dns, $user, $pass); //Estabelecendo uma conexão com o bd  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Estabelecendo atributos para caso de algum erro
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage(); //Mostrando erro.
}
