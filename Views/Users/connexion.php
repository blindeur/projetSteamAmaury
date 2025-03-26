
<div class="form-container">
    <h2>Connexion</h2>
    <form action="login.php" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
            
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
            
        <button type="submit">Se connecter</button>
    </form>
</div>
<!-- en cas d'erreur : message -->
<?php if(isset($erreur)) : ?>
    <?php if($erreur) : ?>
        <div class=alert><p>Tapez des identifiants corrects ! </p></div>
    <?php endif ?>
<?php endif ?>
