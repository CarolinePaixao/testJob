<?php
/**
 * Created by PhpStorm.
 * User: Caroline Paixão
 * Date: 10/03/2018
 * Time: 16:21
 */
try {
    
    $database_host     = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $database_username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $database_password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    $database_name     = getenv('OPENSHIFT_APP_NAME');
    $conn = new PDO('mysql:host='.$database_host.';dbname='.$database_name.', '.$database_username.', '.$database_password.'); //Estabelecendo uma conexão com o bd
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Estabelecendo atributos para caso de algum erro
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage(); //Mostrando erro.
}
