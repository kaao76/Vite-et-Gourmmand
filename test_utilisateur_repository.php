<?php

// Charger le fichier qui établit la connexion PDO à MySQL
require_once __DIR__ . '/config/database.php';

// Charger la classe UtilisateurRepository
require_once __DIR__ . '/Repository/UtilisateurRepository.php';

// Créer un repository en lui transmettant la connexion PDO
$repository = new UtilisateurRepository($pdo);

// Rechercher un utilisateur grâce à son adresse email
$utilisateur = $repository->findByEmail('sarah.test@example.com');

// Vérifier si un utilisateur a été trouvé
if ($utilisateur !== false) {

    // Afficher uniquement son nom et son email
    echo "Utilisateur trouvé : "
        . htmlspecialchars($utilisateur['nom'])
        . " - "
        . htmlspecialchars($utilisateur['email']);

} else {

    // Aucun utilisateur ne correspond à cet email
    echo "Aucun utilisateur trouvé.";
}

$id = 99; // À remplacer par le véritable identifiant de Sarah

$utilisateur = $repository->findById($id);

if ($utilisateur !== false) {
    echo "Utilisateur trouvé : " . $utilisateur['prenom']
        . " " . $utilisateur['nom'];
} else {
    echo "Aucun utilisateur trouvé.";
}


// Récupérer tous les utilisateurs
$utilisateurs = $repository->findAll();
echo "<pre>";
print_r($utilisateurs);
echo "</pre>";