<?php

// Charger la connexion à la base de données
require_once __DIR__ . '/config/database.php';

// Charger notre entité Utilisateur
require_once __DIR__ . '/Entity/Utilisateur.php';

// Charger notre repository
require_once __DIR__ . '/Repository/UtilisateurRepository.php';

// Hacher le mot de passe avant de créer l'utilisateur
$motDePasseHache = password_hash('Test1234!', PASSWORD_DEFAULT);

// Créer un utilisateur fictif pour le test
$utilisateur = new Utilisateur(  // Notre objet $utilisateur contient les informations de Sarah.
    'Benkassou',              // Nom
    'Kaouthar',               // Prénom
    '0612345678',          // Téléphone
    'kaouthar@example.com', // Email
    '12 rue des Fleurs',   // Adresse
    'Beauvais',            // Ville
    'France',              // Pays
    $motDePasseHache,      // Mot de passe haché
    1                     // Rôle Utilisateur
);

// Créer le repository en lui transmettant la connexion PDO
$repository = new UtilisateurRepository($pdo); // Notre objet $repository reçoit la connexion PDO pour pouvoir communiquer avec MySQL.

// Enregistrer l'utilisateur dans MySQL
$resultat = $repository->create($utilisateur); // Ici, nous demandons au repository d'enregistrer les informations contenues dans $utilisateur.

// Afficher le résultat du test
if ($resultat) {
    echo "Utilisateur enregistré avec succès !";
} else {
    echo "L'enregistrement a échoué.";
}