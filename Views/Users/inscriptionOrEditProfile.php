
<div class="form-container" >
<?php if (isset($_SESSION['user'])) : ?>
    <h2>profil</h2>
    <?php else :?> <h2>inscription</h2><?php endif ?>
    <form action="" method="post">
        <label for="firstname">Nom :</label>
        <input type="text" id="Nom_utilisateur" name="Nom_utilisateur" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->utilisateurNom ?>" <?php endif ?>>  

        <label for="lastname">prenom:</label>
        <input type="text" id="prenom" name="prenom" required required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->utilisateurPrenom ?>" <?php endif ?>>

        <label for="date">date de naissance :</label>
        <input type="date"id="date_de_naissance" name="date_de_naissance" required required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->utilisateurDate ?>" <?php endif ?>>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->utilisateurEmail ?>" <?php endif ?>>
                       
        <label for="password">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->utilisateurMotDePasse ?>" <?php endif ?>>
           
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
    </form>
</div>


