<?php
require_once 'JeuModel.php';
require_once 'JeuController.php';

$db = new PDO('mysql:host=10.10.51.98;dbname=amaury', 'Amaury', 'root');
$jeuModel = new JeuModel($db);
$jeuController = new JeuController($jeuModel);

$jeuController->deleteJeu();
