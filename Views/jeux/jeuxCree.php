
<div class="form-container">
    <h2>Créer un jeu</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required>

        <label for="image">Image (URL ou fichier) :</label>
        <input type="text" id="image" name="image" required>

        <label for="descriptif">Descriptif :</label>
        <textarea id="descriptif" name="descriptif" required></textarea>

        <label for="type">Type :</label>
        <select name="type[]" id="type" multiple required>
            <?php foreach ($type as $t) : ?>
                <option value="<?= $t->typeID ?>">
                    <?= htmlspecialchars($t->jeuxType) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="pegi">PEGI :</label>
        <input type="number" id="pegi" name="pegi" min="3" max="18" required>

        <label for="prix">Prix (€) :</label>
        <input type="text" id="prix" name="prix"  required>

        <div>
            <button name="btnEnvoi" class="btn btn-primary" value="creation">Créer</button>
        </div>
    </form>
</div>
