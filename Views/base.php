<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/base.css">     <!-- ne pas oublier de changer le chemin vers les styles ! -->
    <link rel="stylesheet" href="../Assets/CSS/animation.css">
    <link rel="stylesheet" href="../Assets/CSS/flex.css">
    <link rel="stylesheet" href="../Assets/CSS/form.css">
    <link rel="stylesheet" href="../Assets/CSS/styles.css">
    <link rel="icon" type="image/jpg" href="../Assets/Images/logoProjet.jpg">
    <!-- on personalisera le titre de la page en fonction de la page sur laquelle on va => variable php $title -->
    <title><?= $title ?></title>
</head>
<body>
    <header> <!-- contenu prévu composant de référence => insertion Php -->
        <?php require_once("Views/Components/navBar.php"); ?>
    </header>
    <main class="justify-content-center align-item-center">  <!-- contenu variable => insertion Php avec variable $template qui sera définie lors du routage -->
        <?php require_once ($template) ; ?>
    </main>
    <footer>
        <?php require_once("Views/Components/footer.php"); ?>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
