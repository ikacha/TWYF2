<?php
if (!isset($_SESSION))
{
   session_name("TWYF");
    // On démarre la session AVANT d'écrire du code HTML
    session_start(); 
}

// On récupère nos variables de session
if (!isset($_SESSION['pseudo']) && !isset($_SESSION['password'])) 
{
?>
    <section>
        <form method="post" action="login.php" id="login">
            <div class="div_connexion">
                <label class="formulaire">Pseudo :</label>
                <input class="formcss" type="text" name="pseudo"  placeholder="Votre Pseudo" autocomplete="off">
            </div>
            <div class="div_connexion">
                <label class="formulaire">Mot de Passe :</label>
                <input class="formcss" type="password" name="Mot_de_passe" placeholder="Votre Mot de Passe" autocomplete="off">
            </div>
            <input type="Submit" src="img/connexion.png" alt="Submit" id="cnx-btn" value="">
        </form>

        <button alt="Submit" id="sign-btn"></button>
    </section>
<?php
}
else 
{
?>
    <section>
        <div id="imgmenu"></div>
        <div class="conteneur_menu">
            <div class="div_menu">
                <input type="image" src="img/scanner.png" alt="Submit" id="scan-btn">
            </div>

            <div class="div_menu">
                <input type="image" src="img/ecrire.png" name="sign" alt="Submit" id="dict-btn">
            </div>

            <div class="div_menu">
                <button alt="Submit" id="dl-btn"></button>
            </div>

            <form method="post" action="logout.php" id="logout">
                <div class="div_menu">
                    <input type="Submit" src="img/deconexion.png" alt="Submit" id="deco-btn" value="">
                </div>
            </form>
        </div>
    </section>
<?php
}
?>