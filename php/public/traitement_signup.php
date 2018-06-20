<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=twyf;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$nom = $prenom = $email = $identifiant = $password = $service = "";

$pseudo = test_input($_POST["pseudo"]);
$nom = test_input($_POST["nom"]);
$prenom = test_input($_POST["prenom"]);
$email = test_input($_POST["mail"]);
$password = $_POST["Mot_de_passe"];

$req_creat = $bdd->prepare('INSERT INTO user(pseudo, nom, prenom, email, password) VALUES(:pseudo, :nom, :prenom, :email, :password)');

$req_creat->execute(array(
'pseudo' => $pseudo,
'nom' => $nom,
'prenom' => $prenom,
'email' => $email,
'password' => password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]),
));

echo "Compte créé";

function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>