<?php
// Check if $jeux is defined and not empty
if (!empty($jeux)) {
    foreach ($jeux as $jeu) : ?>
        <div class="jeu">
      <div class="game-card">
      <img src="<?= $jeu->jeuxPicture ?>" alt="image du jeu">
        <h3><?= $jeu->jeuxTitre ?></h3>
        <div class="price"><?= $jeu->jeuxPrix ?></div>
        <p><?= $jeu->jeuxDescriptif ?></p>
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

