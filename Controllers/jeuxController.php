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

class JeuController {
    private $jeuModel;

    public function __construct($jeuModel) {
        $this->jeuModel = $jeuModel;
    }

    public function deleteJeu() {
        if (isset($_GET['jeuID'])) {
            $jeuID = intval($_GET['jeuID']);
            $this->jeuModel->deleteJeu($jeuID);
            header("Location: bibliotheque.php");
        }
    }

    public function updateJeu() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jeuID'])) {
            $jeuID = intval($_POST['jeuID']);
            $data = [
                'nom' => $_POST['nom'],
                'description' => $_POST['description']
            ];
            $this->jeuModel->updateJeu($jeuID, $data);
            header("Location: bibliotheque.php");
        }
    }
}

