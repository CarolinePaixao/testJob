<?php
/**
 * Created by PhpStorm.
 * User: Caroline Paixão
 * Date: 10/03/2018
 * Time: 16:21
 */
echo 'Inicio página';
$host = getenv('OPENSHIFT_MYSQL_DB_HOST') . ':' .getenv('OPENSHIFT_MYSQL_DB_PORT');
$user = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$pass = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$db = getenv('OPENSHIFT_GEAR_NAME');
echo ' após váriaveis';
//$host = '172.30.229.248:3306';
//$db   = "sampledb";
//$user = "userT3R";
//$pass = "0ijXrhfwFmdjU3B6";
$dns = 'mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8';
echo $dns;
echo ' após dns';
try {

    
    $conn = new PDO($dns, $user, $pass); //Estabelecendo uma conexão com o bd  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Estabelecendo atributos para caso de algum erro
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage(); //Mostrando erro.
}
echo ' após tentavia de conexão';