<?php
session_name("TWYF");
// On démarre la session AVANT d'écrire du code HTML
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8"/>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
        <title>TWYF</title>
    </head>
    
    <body>
        <header><img src="img/logo2.png" id="logo"></header>

        <div id="errorlog"><br>Le pseudo ou le mot de passe est incorrect.<br><br></div>

        <div id="alert"></div>

        <div id="conteneur_page">
            <?php include "connexionpage.php" ?>
        </div>

        <section id="scanpage"></section>

        <section id="dictpage"></section>

        <div id="snackbar"></div>
    </body>
</html>

<script src="jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>