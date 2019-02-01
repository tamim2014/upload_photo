<?php
$nom=$_POST['nom'];
$email=$_POST['email'];
//1.On specifie le nom du fichier
$nomPhoto=$_FILES['photo']['name'];//$_FILES['name de l'input']['name du fichier à importer']
//2.On spécifie le chemin du fichier
$fichierTempo=$_FILES['photo']['tmp_name'];// $_FILES['name de l'input']['path du ficher ']
//3.On importe le fichier
move_uploaded_file($fichierTempo,'./images/'.$nomPhoto);

require_once ("conn.php");
//Insertion
$ps=$conn->prepare("INSERT INTO etudiants(NOM,EMAIL,PHOTO) VALUES(?,?,?)");
$params=array($nom,$email,$nomPhoto);
$ps->execute($params);
//Redirection vers l affichage
header("location:etudiants.php");

?>
