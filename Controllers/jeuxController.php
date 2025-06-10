<?php   // code php qui décide de ce qu'il faut donner comme valeur à la variable $template

// on ajoutera par la suite les require aux modèles
require_once("Models/jeuxModels.php");
// récupération du chemin désiré
$uri = $_SERVER["REQUEST_URI"];
var_dump($uri);
if ($uri === "/bibliotheque") {
    //vérifier si l'utilisateur a cliqueé sur le bouton du formulaire
    
    $title = "bibliotheque";                  //titre à afficher dans l'onglet de la page du navigateur
    $template = "Views/bibliotheque/bibliotheque.php";        //chemin vers la vue demandée
    require_once ("Views/base.php");             //appel de la page de base qui sera remplie avec la vue demandée

}
// appel au modele pour la gestion des jeux
require_once "Models/jeuxModels.php";

//récuperation du chemin désiré
$uir=$_SERVER["REQUEST_URI"];
if ($uir == "") {
    //rappel de la page d'acueil adaptée avce vérification de l'etat
}
elseif ($uir === "/jeuxCree") {
    //si on rempli le formulaire et qu'on l'a validé
    if (isset($_POST['btnEnvoi'])){
        createJeux($pdo);
        //récuperation du numéro de la dernière ligne insérée dans la table des écoles
        $jeuID = $pdo->lastInsertId();
        //ajout des types liées au jeu dans la table des type
        // ne pas oublier que $_POST["type"] est un tableau 
        for ($i = 0; $i <count($_POST["type"]); $i++) {
            $typejeuID = $_POST["type"][$i];
            //écriture dans la table des type
            ajouteTypeDeJeux($pdo, $jeuID, $typejeuID);

    }
    header("location:/bibliotheque");
}

$type = selectAllType($pdo);
$title = "ajout d'un jeu";
$template = "Views/jeux/jeuxCree.php";
require_once('Views/base.php');
}



