<?php
$code=$_POST["code"];
$nom=$_POST['nom'];
$email=$_POST['email'];
$nomPhoto=$_FILES['photo']['name'];
require_once("conn.php");
if($nomPhoto==""){
    //Insertion de mise à jour (SANS LA PHOTO)
    $ps=$conn->prepare("UPDATE etudiants SET NOM=?, EMAIL=? WHERE CODE=?");
    $params=array($nom,$email,$code);
    $ps->execute($params);
}else{
    $fichierTempo=$_FILES['photo']['tmp_name'];
    move_uploaded_file($fichierTempo,'./images/'.$nomPhoto);
    //Insertion de mise à jour
    $ps=$conn->prepare("UPDATE etudiants SET NOM=?, EMAIL=?, PHOTO=? WHERE CODE=?");
    $params=array($nom,$email,$nomPhoto,$code);
    $ps->execute($params);
}
//Redirection vers l affichage
header("location:etudiants.php");
?>
