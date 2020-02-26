<?php

$servidor ="mysql:host=localhost;port=3307;dbname=prueba";
$usuario="root";
$password="";
$server="localhost";
$db="carrito";
try{
    $pdo= new PDO($servidor,$usuario,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "Conectado...";

}catch(PDOException $e){
    echo "Conexión mala RIP" .$e->getMessage();
}
$con= mysqli_connect("$server","$usuario","$password","$db");
?>