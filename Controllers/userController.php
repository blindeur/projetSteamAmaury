<?php   // code php qui décide de ce qu'il faut donner comme valeur à la variable $template

$uri = $_SERVER["REQUEST_URI"];
var_dump($uri);
if ($uri === "/connexion") {
    var_dump("coucou");
    $title = "Connexion";
    $template = "Views/Users/connexion.php";
    require_once("Views/base.php");
}
elseif ($uri === "/deconnexion") {

}
elseif ($uri === "/inscription") {
    $title = "Inscription";
    $template = "Views/Users/inscriptionOrEditProfile.php";
    require_once("Views/base.php");
}