<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../Controller/UtilisateurController.php';

$controller = new UtilisateurController($pdo);
$controller->afficherFormulaireAjout();