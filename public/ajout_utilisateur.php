<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../Controller/UtilisateurController.php';

$controller = new UtilisateurController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $controller->afficherFormulaireAjout();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $controller->traiterAjoutUtilisateur();
}
