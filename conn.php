<?php
/**
    mysql_connect("localhost","root","")or die(mysql_error());
    mysql_select_db("scolarite") or die(mysql_error());
 */
try{
    $strConnection='mysql:host=localhost;dbname=scolarite';
    $conn=new PDO($strConnection,'root','');
}
catch (PDOException $e){
    $msg='ERREUR DE CONNECTION DANS '.$e->getMessage();
    die($msg);
}
?>