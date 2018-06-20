<section>
    <form method="post" enctype="multipart/form-data" id="telecharger">
        <div>
            <p>Sélectionner un fichier image et cliquer ensuite sur Télécharger.</p>
            <input type="file" id="file" name="file" accept="image/*">
            <label for="file" class="label">
                <img src="img/add.png" alt="upload.png">
            </label>

            <div id="conteneur_fichier"></div>

        </div>
        <div>
            <input type="image" src="img/telecharger.png" name="upload" alt="upload" id="submit-btn"><br>
        </div>
    </form>
    <button data-type="retour" class="back"></button>
</section>