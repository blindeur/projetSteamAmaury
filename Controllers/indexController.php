<?php   // code php qui décide de ce qu'il faut donner comme valeur à la variable $template

// on ajoutera par la suite les require aux modèles
require_once('Models/jeuxModels.php');

// récupération du chemin désiré
$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    $jeux = selectAllJeux($pdo);

    $title = "Page d'accueil";                  //titre à afficher dans l'onglet de la page du navigateur
    $template = "Views/pageAccueil.php";        //chemin vers la vue demandée
    require_once("Views/base.php");             //appel de la page de base qui sera remplie avec la vue demandée
}
















//<?php

//$uri = $_SERVER["REQUEST_URI"];

//if ($uri === "/index.php" || $uri === "/") {
  //  $title = "Page d'accuueil";
 //   $template = "Views/pageAccueil.php";
//    require_once("Views/base.php");
//}