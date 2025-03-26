
<div class="form-container">
    <h2>Inscription</h2>
    <form action="register.php" method="post">
        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname" required>
                
        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="lastname" required>
                
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
                
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
                
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
                
        <button type="submit">S'inscrire</button>
        <a href="connexion.php"> Se connecter</a>
    </form>
</div>
