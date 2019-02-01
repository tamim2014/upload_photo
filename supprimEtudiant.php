<?php
$code=$_GET['code'];

require_once("conn.php");
$ps=$conn->prepare("DELETE FROM etudiants WHERE CODE=?");
$params=array($code);
$ps->execute($params);

header("location: etudiants.php");
?>