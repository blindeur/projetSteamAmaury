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
    <div class="game-card">
        <img src="/Assets/images/gta6.jpg" alt="Schedule I">
        <h3>Grand Theft Auto VI</h3>
        <p> Précommande</p>
        <div class="price">49,99 €</div>
    </div>
    <?php foreach ($jeux as $jeu) : ?>
    <div>
        <h2 class="center"><?= $jeu->jeuxTitre ?></h2>
        <div>
            <div class="flexible blocImageEcole">
                <img src="<?= $jeu->jeuPicture ?>" alt="image du jeu">
            </div>
            <div class="center">
                <!--<p><span><?= $jeu->schoolAdresse ?></span> - <span><?= $school->schoolCodePostal . " ". $school->schoolVille ?></span></p>
                <h3><?= $jeu->schoolNumero ?></h3>-->
                <a href="blilio" class="btn btn-page">bibliothéque</a>
                 Dans le cas où on est connecté et qu'on a cliqué sur 'mes écoles', on affiche les écoles de l'utilisateur 
                <?php if ($uri === "/biblio") : ?>
                    <p><a href="deletejeu?jeuxID=<?= $jeu->jeuxID ?>">Supprimer le jeu</a></p>
                    <p><a href="updatejeu?schoolId=<?= $jeu->jeuxID ?>">Modifier le jeu</a></p>
                    <?php endif ?>
            </div>
        </div>
    </div>
    <?php endforeach ?>

      <!-- Ajoute d'autres jeux ici -->
    </div>
  </div>

  