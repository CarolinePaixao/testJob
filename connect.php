<?php
/**
 * Created by PhpStorm.
 * User: Caroline Paixão
 * Date: 10/03/2018
 * Time: 16:21
 */
try {
    $conn = new PDO('mysql:host=localhost;dbname=testJob', 'root', ''); //Estabelecendo uma conexão com o bd
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Estabelecendo atributos para caso de algum erro
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage(); //Mostrando erro.
}