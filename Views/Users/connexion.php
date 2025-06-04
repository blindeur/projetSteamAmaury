<div class="form-container">
    <h2>Connexion</h2>
    <form action="connexion" method="post">
        <label for="username">Nom :</label>
        <input type="text" id="Nom_utilisateur" name="Nom_utilisateur" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
        <div>
            <h4 class="text-danger">Pas encore inscrit ?</h4>
            <a href="inscriptionOrEditProfil" class="btn btn-secondary">Cliquez ici !</a>
            <p> </p>
            <?php if (isset($_SESSION['user'])) : ?>
                <div>
                       <button name="btnEnvoi" class="btn btn-primary" value="inscription"><?php if (isset($_SESSION['user'])) : ?>Modifier <?php else :?>Envoyer<?php endif ?></button> 
                       <button name="btnSupp" class="btn btn-primary" value="deleteProfil"><?php if (isset($_SESSION['user'])) : ?>Supprimer <?php endif ?></button>
                </div>
            <?php else : ?>
                <div>
                      <button name="btnEnvoi" class="btn btn-primary" value="inscription"><?php if (isset($_SESSION['user'])) : ?>Modifier <?php else :?> Envoyer<?php endif ?></button>
                </div>
            <?php endif ?>
         
            
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