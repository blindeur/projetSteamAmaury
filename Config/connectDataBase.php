<?php 
// En cas d'eerreur, on affiche le message de l'erreur attrapée
try {
    $strConnexion = "mysql:host=localhost;dbname=school"; // a remplacer
    $pdo=new PDO($strConnexion,"Amaury","root",[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (PDOException $e) {
    $message = $e->getMessage();
    die($message);
}