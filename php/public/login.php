<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=twyf;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

session_name("TWYF");

session_start ();

if (isset($_POST['pseudo']) && isset($_POST['Mot_de_passe'])) 
{
	$requete_verif = $bdd->query('SELECT COUNT(*) FROM `user` WHERE pseudo=\''. $_POST['pseudo'].'\'');
	$donnees_verif = $requete_verif->fetch();
	if ($donnees_verif[0] == 1)
	{
		$reqete_password = $bdd->query('SELECT `password` FROM `user` WHERE `pseudo`=\''. $_POST['pseudo'].'\'');
		$hash = $reqete_password->fetch();
		if (password_verify($_POST['Mot_de_passe'], $hash[0])) 
		{
			$requete_ligne_entiere = $bdd->query('SELECT * FROM `user` WHERE pseudo=\''. $_POST['pseudo'].'\'');
			$donnees_ligne_entiere = $requete_ligne_entiere->fetch();

			$_SESSION['id'] = $donnees_ligne_entiere['id'];
			$_SESSION['pseudo'] = $donnees_ligne_entiere['pseudo'];
			$_SESSION['nom'] = $donnees_ligne_entiere['nom'];
			$_SESSION['prenom'] = $donnees_ligne_entiere['prenom'];
			$_SESSION['email'] = $donnees_ligne_entiere['email'];
			$_SESSION['password'] = $donnees_ligne_entiere['password'];

			header ('location:'. $_SERVER['HTTP_REFERER']);
			$requete_ligne_entiere->closeCursor(); // Termine le traitement de la requête
		} 
		else 
		{
			// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant se fait
			echo '<body onLoad="alert(\'Mot de passe incorrecte...\')">';
			// puis on le redirige vers la page d'accueil
			echo '<meta http-equiv="refresh" content="0;URL='.$_SERVER['HTTP_REFERER'].'">';
		}
	}
	else
	{
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant se fait
		echo '<body onLoad="alert(\'Utilisateur introuvable...\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL='.$_SERVER['HTTP_REFERER'].'">';
	}
	$requete_verif->closeCursor(); // Termine le traitement de la requête
}
else 
{
	echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>