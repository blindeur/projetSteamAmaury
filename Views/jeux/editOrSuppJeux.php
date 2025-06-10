<?php 
if (isset($_SESSION['user']) && $_SESSION['user']->utilisateurStatut === 'admin') : 
    if (!isset($jeu) || !is_object($jeu)) {
        echo "Erreur : jeu non trouvé ou non défini.";
        return;
    }
?>
<div class="form-container">
    <h2>Modifier ou supprimer un jeu</h2>
 <div class="form-container">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required  <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->jeuxtitre ?>" <?php endif ?>>

        <label for="image">Image (URL ou fichier) :</label>
        <input type="text" id="image" name="image" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->jeuxPicture ?>" <?php endif ?>>

        <label for="descriptif">Descriptif :</label>
        <textarea id="descriptif" name="descriptif" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->jeuxDescriptif ?>" <?php endif ?>></textarea></textarea>

        <label for="type">Type :</label>
        <select name="type[]" id="type" multiple required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->jeuxType ?>" <?php endif ?>>
            <?php foreach ($type as $t) : ?>
                <option value="<?= $t->typeID ?>">
                    <?= htmlspecialchars($t->jeuxType) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="pegi">PEGI :</label>
        <input type="number" id="pegi" name="pegi" min="3" max="18" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->jeuxPegi ?>" <?php endif ?>>>

        <label for="prix">Prix (€) :</label>
        <input type="text" id="prix" name="prix"  required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->jeuxPrix ?>" <?php endif ?>>>

        <div>
            <button name="btnEnvoi" class="btn btn-primary" value="creation">Créer</button>
        </div>
    </form>
</div>


        <div>
            <button name="btnEnvoi" class="btn btn-primary" value="modification">Modifier</button>
            <button name="btnSupp" class="btn btn-danger" value="deleteJeu" onclick="return confirm('Supprimer ce jeu ?');">Supprimer</button>
        </div>
    </form>
</div>
<?php else : ?>
    <p>Accès réservé aux administrateurs.</p>
<?php endif; ?>