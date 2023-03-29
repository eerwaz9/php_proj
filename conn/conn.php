<?php

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=salma_pro;",$username,$password);
if(!$database){
  
echo 'connection to DB error :")';
}
?>