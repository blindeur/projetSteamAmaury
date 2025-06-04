<?php
function selectAllJeux($pdo)
{
    try {
        //définition de la requête
        $query = 'select * from jeux';
        //préparation de l'execution de a requête
        $selectJeux = $pdo->prepare($query);
        //execution
        $selectJeux->execute();
        //récupération des données dans l'objet fetch
        $jeux = $selectJeux->fetchAll();
        //renvoi des données
        return $jeux;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}


/*
Fonction deleteOptionsSchoolsUser
---------------------------------
BUT : supprimer les options des écoles de l'utilisateur dans la table options
IN : $pdo reprenant toutes les informations de connexion
*/


function deleteOptionsJeuxFromUser($dbh)
{
    try {
        $query = 'delete from option_ecole where schoolId in (select schoolId from school where utilisateurId = :utilisateurId)';
        $deleteAllJeuxFromId = $dbh->prepare($query);
        $deleteAllJeuxFromId->execute([
            'utilisateurId' => $_SESSION["user"]->id    //utilsateur actif
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/*
Fonction deleteAllSchoolsFromUsers
-----------------------------------
BUT : supprimer toutes les écoles liées a l'uitlisateur connecté dans la table school
IN : $pdo reprenant toutes les informations de connexion
*/
function deleteAllJeuxFromUser($pdo)
{
    try {
        //requête avec critère et paramètre ! 
        $query = 'delete from jeux where utilisateurID = :utilisateurID';
        $deleteAllJeuxFromId = $pdo->prepare($query);
        $deleteAllJeuxFromId->execute([
            'utilisateurID' => $_SESSION["user"]->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function selectJeux($pdo)
{
    try {
        //requete avec critère et paramètre !
        $query = "select * from jeux wherr utilisateurID = :utilisateurID";
        $selectJeux = $pdo->prepare($query);
        $selectJeux->execute([
            //le parametre est l'id de l'utilisateur connecté
            'utilisateurID' => $_SESSION['user']->id
            ]);
            $jeux = $selectJeux->fetchAll();
            return $jeux;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function selectAllType($pdo)
{
    try {
        $query = 'select * from type';
        $selectOptions = $pdo->prepare($query);
        $selectOptions->execute();
        $option = $selectOptions->fetchAll();
        return $option;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}


function createJeux($pdo)
{
    try {
        $query = 'insert into jeux (jeuxPrix, jeuxDescriptif, jeuxPegi, jeuxType, jeuxPicture, jeuxTitre)
        values (:jeuxprix, :jeuxDescriptif, :jeuxPegi, :jeuxType, :jeuxPicture, :jeuxTitre)';
        $addJeux = $pdo->prepare($query);
        $addJeux->execute([
            'jeuxTitre' => $_POST["titre"],
            'jeuxPicture'=> $_POST['image'],
            'jeuxDescriptif' => $_POST['descriptif'],
            'jeuxType'=> $_POST['type'],
            'jeuxPegi'=> $_POST['pegi'],
            'jeuxPrix'=> $_POST['prix']
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
            
    
}

class JeuModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllJeux() {
        $query = $this->db->query("SELECT id, nom, description FROM jeux");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}