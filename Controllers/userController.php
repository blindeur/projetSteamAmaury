<?php   // code php qui décide de ce qu'il faut donner comme valeur à la variable $template

// on ajoutera par la suite les require aux modèles
require_once("Models/userModel.php");
// récupération du chemin désiré
$uri = $_SERVER["REQUEST_URI"];
var_dump($uri);
if ($uri === "/connexion") {
    //vérifier si l'utilisateur a cliqueé sur le bouton du formulaire
    if(isset($_POST['btnEnvoi'])){
        // pour récuperer l'erreur si l'utilisateur fait une faute de frappe ou se trompe dans ses identifiants
        $erreur=false;
        // tentative de connexion et récuperation des données de l'utilisateur et ouverture d'une session
        if(connectUser($pdo)){
            // redirection vers la page d'accueil
            header("location:/");
        }
        else{
            // cas d'erreur
            $erreur=true;
        }
    }
    $title = "Connexion";                  //titre à afficher dans l'onglet de la page du navigateur
    $template = "Views/Users/connexion.php";        //chemin vers la vue demandée
    require_once("Views/base.php");             //appel de la page de base qui sera remplie avec la vue demandée

}
elseif ($uri ==="/inscription") {
    if(isset($_POST['btnEnvoi'])){
        // vérifiaction des données encodées
        $messageError = verifEmptyData();
        // s'il n'y a pas d'erreur
        if(!$messageError){
            // ajout de l'utilisateur à la base de données
            createUser($pdo);
            //redirection vers la page de connexion
            header('location:/connexion');
        }

    }
    $title = "Inscription";       //titre à afficher dans l'onglet de la page du navigateur
    $template = "Views/Users/inscriptionOrEditProfile.php";        //chemin vers la vue demandée
    require_once("Views/base.php");             //appel de la page de base qui sera remplie avec la vue demandée
                
}
elseif ($uri ==="/profil") {
    if(isset($_POST['btnEnvoi'])){
        //vérification des données encodées
        $messageError = verifEmptyData();
        //s'il n'y a pas d'erreur
        if(!$messageError){
            //modification des données de l'utilisateur dans la base de données 
            updateUser($pdo);
            //Mise à jour de la variable session
            updateSession($pdo);
            // redirection vers la page de profil
            header('location:/profil');
        }
    }
    elseif ($_POST['btnSupp'] ) {
                                //supprimer toutes les informations de la table école liées à l'utilisateur connecté
        deleteUser($pdo);                   //supprimer l'utilisateur de la tavle des utilisateurs
        header("location:/deconnexion");    // le déconnecter
    
    }
    $title = "Mise à jour du profil";               //titre à afficher dans l'onglet de la page du navigateur
    $template = "Views/Users/inscriptionOrEditProfile.php";                 //chemin vers la vue demandée
    require_once("Views/base.php");                 // appel de la page de base qui sera remplie avec la vue demandée
}
elseif ($uri ==="/deconnexion") {
    // nettoyage de la session et retour à l'accueil
    session_destroy();
    // redirection vers la page d'accueil
    header("location:/");

}
elseif ($uri === "/deleteProfil") {

        deleteOptionsSchoolFromUser($pdo);
        deleteAllSchoolsFromUser($pdo);      //supprimer toutes les informations de la table école liées à l'utilisateur connecté
        deleteUser($pdo);                   //supprimer l'utilisateur de la tavle des utilisateurs
        header("location:/deconnexion");    // le déconnecter
    
   
}

elseif ($uri === "/updateProfil") { 
    if(isset($_POST['btnEnvoi'])){
        //vérification des données encodées
        $messageError = verifEmptyData();
        // s'il n'y a pas d'erreur
        if(!$messageError){
            // Modification des données de l'utilisateur dans la base de données
            updateUser($pdo);
            //Mise à jour de la variable session
            updateSession($pdo);
            header('location:/profil');
        }
    }
    $title = "Mise à jour du profil";                //titre à afficher dans l'onglet de la page du navigateur
    $template = "Views/Users/inscriptionOrEditProfile.php";  //chemin vers la vue demandée
    require_once("Views/base.php");              // appel de la page de base qui sera remplie avec la vue demandée
}



/*
FONCTION verifEmptyData
BUT : remplir et renvoyer un tableau associatif $messageError dont les clés sont les noms des champs avec message rappelant que le champ concerné est vide,
      ou renvoyer false si on n'a pas rencontré d'erreur.
*/
function verifEmptyData()
{
    // Parcours du tableau $_POST en recherchant les éléments ou munis d'espaces 
    foreach ($_POST as $key => $value) {
        //str-replace remplace une chaine par une autre dans une chaien de caractères donnée, ici un espace par le vide dans $value.
        if (empty(str_replace(' ','',$value))){
            // on rempli un tableau assosiatif $messageError dont les clés sont les champs avec un message rapplant que le champ concerné est vide .
            $messageError[$key] = "votre " . $key . " est vide.";
        }
    }
    // si le tableau $messageError est vide, on renverra false, sinon, on renvoie le tableau
    if (isset($messageError)){
        return $messageError;
    } else {
        return false;
    }
}
