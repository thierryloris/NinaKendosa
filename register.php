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
$password = $_POST['Password'];
$commune = $_POST['Commune'];
$telephone1 = $_POST['Telephone1'];
$telephone2 = $_POST['Telephone2'];

$query=$db->prepare('INSERT INTO Clients (Nom, Prenom, Email, Password, Commune, Telephone1, Telephone2) VALUES (:Nom, :Prenom, :Email, :Password, :Commune, :Telephone1, :Telephone2)');
$query->bindValue(':Nom', $nom, PDO::PARAM_STR);
$query->bindValue(':Prenom', $prenom, PDO::PARAM_STR);
$query->bindValue(':Email', $email, PDO::PARAM_STR);
$query->bindValue(':Password', $password, PDO::PARAM_STR);
$query->bindValue(':Commune', $commune, PDO::PARAM_STR);
$query->bindValue(':Telephone1', $telephone1, PDO::PARAM_INT);
$query->bindValue(':Telephone2', $telephone2, PDO::PARAM_INT);
$query->execute();

?>