<?php
/**
 * Created by PhpStorm.
 * User: Caroline Paixão
 * Date: 10/03/2018
 * Time: 14:32
 */
include_once ('connect.php');

$tiposPermitidos= array('image/gif', 'image/jpeg', 'image/png'); //Tipos de arquivos permitidos
if(isset($_FILES['photo']) && (array_search($_FILES['photo']['type'], $tiposPermitidos) ) ) //Verificar se tem um arquivo e se é do tipo válido
{
    //Tratando o arquivo
    $dir = 'img/'; //Pasta para salvar imagens
    $ext = strtolower(substr($_FILES['photo']['name'], -4)); //Pegando extensão do arquivo
    date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo

    //Tratando os dados
    $namePhoto = $_POST['namePhoto'];
    $descPhoto = $_POST['descPhoto'];

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $dir . $new_name)){ //Fazer upload do arquivo
        $insert = $conn->prepare
                ("INSERT INTO photo(namePhoto, descPhoto, urlPhoto) VALUES('$namePhoto', '$descPhoto', 'img/$new_name')");
        $insert->execute();

        if($insert) echo "great"; else echo 'problem';
    }else
        echo "stupid thing";
}else
    echo 'No file';

header("Location:index.php");