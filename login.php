<?php
header("Content-type: application/json");


function connecter()
{
    $connect=@mysql_connect("localhost", "root", "root");
    if(!$connect)
    {
    echo "Erreur de connexion a la base de donnees";
    exit;
    }
    $select=@mysql_select_db('NinaKendosa');   
    if(!$select)
    {
    echo "Erreur de connexion a la base de donnees";
    exit;
    }
}
connecter();

$email=$_POST['Email'];
$email= strtolower($email);
$mdp=$_POST['Password'];
$nom=$_POST['Nom'];
$prenom=$_POT['Prenom'];
$ville=$_POST['Commun'];
$telehpone=$_POST['Telephone1'];
$telephone2=$_POST['Telephone2'];

$query="SELECT * FROM `NinaKendosa.Clients` WHERE `Email` LIKE '$email' AND `mdp` LIKE '$mdp'";
 $result=mysql_query($query);
 $num=mysql_num_rows($result);
 $row=mysql_fetch_row($result);
 $id=$row[0];
 $nom=$row[1];

if($num !=1){
    $erreur=0;
}else{
    $erreur=1;
}

echo '{  "erreur":'.$erreur.', "Nom":"'.$nom.'", "Prenom":"'.$prenom.'", "Email":"'.$email.'", "Commune":"'.$ville.'", "Telephone1":"'.$telephone.'", "Telephone2":"'.$telephone2.'", "Mdp":"'.$mdp.'"  }';