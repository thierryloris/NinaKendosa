<?php
header("Content-type: application/json");
error_reporting(E_ALL);
session_start();

    try
            {
	     $db = new PDO ('mysql:host=localhost;dbname=NinaKendosa', 'root', 'root');
	     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	     $db->exec("SET CHARACTER SET utf8");
            }

    catch (EXception $e)
            {
	      die('Erreur : ' . $e->getMessage());
            }
	    
$nom = $_POST['Nom'];
$prenom = $_POST['Prenom'];
$email = $_POST['Email'];
$commune = $_POST['Commune'];
$telephone1 = $_POST['Telephone1'];
$telephone2 = $_POST['Telephone2'];
$cacher = $_POST['Cacher'];

	$query=$db->prepare("UPDATE Clients SET Nom = '$nom', Prenom = '$prenom', Email ='$email', Commune='$commune', Telephone1 = '$telephone1', Telephone2='$telephone2' WHERE Email = '$cacher'");
	$query->bindParam(':Cacher', $cacher);
	$query->bindValue(':Nom', $nom, PDO::PARAM_STR);
	$query->bindValue(':Prenom', $prenom, PDO::PARAM_STR);
	$query->bindValue(':Email', $email, PDO::PARAM_STR);
	$query->bindValue(':Commune', $commune, PDO::PARAM_STR);
	$query->bindValue(':Telephone1', $telephone1, PDO::PARAM_INT);
	$query->bindValue(':Telephone2', $telephone2, PDO::PARAM_INT);
	$query->execute();
?>