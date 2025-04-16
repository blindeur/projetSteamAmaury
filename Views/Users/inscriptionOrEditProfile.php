
<div class="form-container" >
    <h2>Inscription</h2>
    <form action="" method="post">
        <label for="firstname">Nom :</label>
        <input type="text" id="Nom_utilisateur" name="Nom_utilisateur" required>
                
        <label for="lastname">prenom:</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="date">date de naissance :</label>
        <input type="date"id="date_de_naissance" name="date_de_naissance" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
                       
        <label for="password">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
                
        <button name="btnEnvoi" class="btn btn-primary" value="inscription">S'inscrire</button>
        <a href="connexion"> Se connecter</a>
    </form>
</div>
