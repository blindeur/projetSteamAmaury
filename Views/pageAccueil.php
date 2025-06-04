<!---corps de la page d'accueil qui prendra place dans le main de base.php----->
<!----Selon la page (acceuil ou bibliotheque) on affiche le titre qui convient------>


<!---dans le cas ou on est connecté on affuche un lien permettant l'ajout d'un jeu--->
<?php if (isset($_SESSION["utilisateurSatut"])&& $_SESSION["utilisateurSatut"] == "admin") :  ?>
    <a href="createjeu">ajouter un jeu</a>
<?php endif ?>

   
   <!-- Vidéo en bannière -->
  <div class="banner">
    <video autoplay muted loop>
      <source src="/Assets/video/vid.mp4" type="video/mp4" />
    </video>
    <div class="overlay-text">Subnautica 2 - Précommande</div>
  </div>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="section-title">Populaires et Recommandés</div>
    <div class="carousel">
    <?php foreach ($jeux as $jeu) : ?>
      <div class="game-card">
      <img src="<?= $jeu->jeuxPicture ?>" alt="image du jeu">
        <h3><?= $jeu->jeuxTitre ?></h3>
        <div class="price"><?= $jeu->jeuxPrix ?></div>
        <p><?= $jeu->jeuxDescriptif ?></p>
        <a href="bibliotheque" class="btn btn-page">bibliothéque</a>
                <?php if ($uri === "/bibliotheque") : ?>
                    <p><a href="deletejeu?jeuxID=<?= $jeu->jeuxID ?>">Supprimer le jeu</a></p>
                    <p><a href="updatejeu?JeuxId=<?= $jeu->jeuxID ?>">Modifier le jeu</a></p>
                    <?php endif ?>
    </div>
    
    <?php endforeach ?>

      <!-- Ajoute d'autres jeux ici -->
    </div>
  </div>
<!--<?php if ($uri ==="/bibliotheque") : ?>
    <h1>Bibliotheque</h1>
<?php else :?>
  <h1>liste des jeux réportoriées</h1>
<?php endif ?>---->
