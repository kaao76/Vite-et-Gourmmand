<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../Controller/ConnexionController.php';


$controller = new ConnexionController($pdo);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $controller->connecter();
    header('Location: View/Html/connexion.php');
exit;
}