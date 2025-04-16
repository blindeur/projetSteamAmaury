<div class="form-container">
    <h2>Connexion</h2>
    <form action="connexion" method="post">
        <label for="username">Nom :</label>
        <input type="text" id="Nom_utilisateur" name="Nom_utilisateur" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>

        <div>
            <button name="btnEnvoi" class="btn btn-primary">connexion</button>
        </div>
        <div>
            <h4 class="text-danger">Pas encore inscrit ?</h4>
            <a href="inscriptionOrEditProfil.php" class="btn btn-secondary">Cliquez ici !</a>
        </div>
    </form>
</div>
<!-- en cas d'erreur : message -->
<?php if (isset($erreur)) : ?>
    <?php if ($erreur) : ?>
        <div class=alert>
            <p>Tapez des identifiants corrects ! </p>
        </div>
    <?php endif ?>
<?php endif ?>