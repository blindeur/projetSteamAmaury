<?php
require_once("Models/jeuxModels.php");

// Récupération du chemin demandé
$uri = $_SERVER["REQUEST_URI"];

// Si l'utilisateur demande la bibliothèque
if ($uri === "/bibliotheque") {
    // Récupérer tous les jeux pour la bibliothèque
    $jeux = selectAllJeux($pdo); // Fonction à créer dans jeuxModels.php si besoin
    $title = "Ma bibliothèque";
    $template = "Views/bibliotheque/bibliotheque.php";
    require_once("Views/base.php");
}