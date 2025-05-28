<?php
session_start();
var_dump($_SESSION);
?>
  <div class="steam-library-page">
    <header>
      <h1>Ma Bibliothèque de Jeux</h1>
    </header>
    <div class="library">
      <div class="game">
      <img src="https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/252490/header.jpg?t=1747389753" alt="Rust">
        <h2>Rust</h2>
        <p>Survie multijoueur intense</p>
      </div>
      <div class="game">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1091500/header.jpg" alt="Cyberpunk">
        <h2>Cyberpunk 2077</h2>
        <p>RPG futuriste</p>
      </div>
      <div class="game">
        <img src="https://cdn.akamai.steamstatic.com/steam/apps/264710/header.jpg" alt="Subnautica">
        <h2>Subnautica</h2>
        <p>Exploration sous-marine</p>
      </div>
      <div class="game">
        <img src="https://cdn.akamai.steamstatic.com/steam/apps/1172470/header.jpg" alt="Call of Duty">
        <h2>Call of Duty</h2>
        <p>FPS militaire</p>
      </div>
      <!-- Ajoute ici d'autres jeux comme Schedule I, Bodycam, R.E.P.O avec leurs images -->
    </div>
    <?php

// Check if $jeux is defined and not empty
if (!empty($jeux)) {
    foreach ($jeux as $jeu) : ?>
        <div class="jeu">
            <h3><?= htmlspecialchars($jeu->nom) ?></h3>
            <p><?= htmlspecialchars($jeu->description) ?></p>

            <?php if (isset($_SESSION["utilisateurStatut"]) && $_SESSION["utilisateurStatut"] === "admin") : ?>
                <div class="btn-group">
                    <a class="btn btn-primary" href="modifierJeux.php?jeuID=<?= $jeu->id ?>">Modifier</a>
                    <a class="btn btn-danger" href="deleteJeu.php?jeuID=<?= $jeu->id ?>" 
                       onclick="return confirm('Es-tu sûr de vouloir supprimer ce jeu ?');">Supprimer</a>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach;
} else {
    echo "<p>Aucun jeu disponible.</p>";
}
?>

