<?php 
// En cas d'eerreur, on affiche le message de l'erreur attrapée
try {                                                                           //ecole                                            //maison
    $strConnexion = "mysql:host=127.0.0.1;dbname=steam;port=3306"; // a remplacer (mysql:host=10.10.51.98;dbname=amaury) ou (mysql:host=127.0.0.1;dbname=steam;port=3306)
    $pdo=new PDO($strConnexion,"root","Amaury2006@",[ // Amaury                                        root
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (PDOException $e) {
    $message = $e->getMessage();
    die($message);
}