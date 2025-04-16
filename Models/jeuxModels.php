<?php
function selectAllSchools($pdo)
{
    try {
        //définition de la requête
        $query = 'select * from school';
        //préparation de l'execution de a requête
        $selectSchool = $pdo->prepare($query);
        //execution
        $selectSchool->execute();
        //récupération des données dans l'objet fetch
        $schools = $selectSchool->fetchAll();
        //renvoi des données
        return $schools;
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
function deleteOptionsSchoolFromUser($dbh)
{
    try {
        $query = 'delete from option_ecole where schoolId in (select schoolId from school where utilisateurId = :utilisateurId)';
        $deleteAllSchoolsFromId = $dbh->prepare($query);
        $deleteAllSchoolsFromId->execute([
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
function deleteAllSchoolsFromUser($pdo)
{
    try {
        //requête avec critère et paramètre ! 
        $query = 'delete from scholl where utilisateurId = :utilisateurId';
        $deleteAllSchoolsFromId = $pdo->prepare($query);
        $deleteAllSchoolsFromId->execute([
            'utilisateurId' => $_SESSION["user"]->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}