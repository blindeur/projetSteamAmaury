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