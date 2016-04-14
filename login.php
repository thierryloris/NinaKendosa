<?php
header("Content-type: application/json");
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

$email = $_POST['pseudo'];
$password = $_POST['mdp'];

$req = $db->prepare("SELECT * FROM Clients WHERE Email = :pseudo AND Password = :mdp");
$req->bindParam(":pseudo", $email);
$req->bindParam(":mdp", $password);
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);

$_SESSION['Nom'] = $result['Nom'];
$_SESSION['Prenom'] = $result['Prenom'];
$_SESSION['Password'] = $result['Password'];
$_SESSION['Email'] = $result['Email'];
$_SESSION['Commune'] = $result['Commune'];
$_SESSION['Telephone1'] = $result['Telephone1'];
$_SESSION['Telephone2'] = $result['Telephone2'];

if(!$result)
{
 $erreur = 0;
}
else
{
 $erreur = 1;
}

$result['erreur'] = $erreur;
echo json_encode($result);
?>