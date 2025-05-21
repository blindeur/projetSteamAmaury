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
        $deleteAllSchoolsFromId = $pdo->prepare($query);
        $deleteAllSchoolsFromId->execute([
            'utilisateurID' => $_SESSION["user"]->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}