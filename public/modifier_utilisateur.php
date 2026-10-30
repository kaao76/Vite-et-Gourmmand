<?php

// Charger la connexion à la base de données
require_once __DIR__ . '/../config/database.php';

// Charger notre contrôleur des utilisateurs
require_once __DIR__ . '/../Controller/UtilisateurController.php';

// Créer un objet contrôleur avec la connexion PDO
$controller = new UtilisateurController($pdo);

// Vérifier la méthode HTTP utilisée
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Afficher le formulaire de modification
    $controller->afficherFormulaireModification();

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Traiter les modifications envoyées
    $controller->traiterModificationUtilisateur(); 

}