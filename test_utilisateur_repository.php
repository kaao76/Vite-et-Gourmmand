<?php

// Charger le fichier qui établit la connexion PDO à MySQL
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/Entity/Utilisateur.php';
require_once __DIR__ . '/Repository/UtilisateurRepository.php';



$repository = new UtilisateurRepository($pdo);
$idTest = 4; // À remplacer par le vrai ID du compte fictif

$resultat = $repository->delete($idTest);

if ($resultat) {
    echo "Requête de suppression réussie.";
} else {
    echo "Échec de la suppression.";
}















/* $donnees = $repository->findById(1);
if ($donnees !== false) {

    $utilisateur = new Utilisateur(
        $donnees['nom'],
        $donnees['prenom'],
        $donnees['telephone'],
        $donnees['email'],
        $donnees['adresse'],
        $donnees['ville'],
        $donnees['pays'],
        $donnees['mot_de_passe'],
        $donnees['role_id']
    );

    $utilisateur->setPrenom('Sabrina'); // « Sur mon objet $utilisateur, j'appelle la méthode setPrenom() pour remplacer son prénom actuel par Sabrina. »
    $utilisateur->setVille('Lille');
    $utilisateur->setadresse('12 rue des Fleurs');

    $resultat = $repository->update(1, $utilisateur);

    if ($resultat) {
        echo "Modification effectuée avec succès !";
    } else {
        echo "La modification a échoué.";
    }

} else {
    echo "Utilisateur introuvable.";
} */






/*
$utilisateur = new Utilisateur(
    $donnees['nom'],
    $donnees['prenom'],
    $donnees['telephone'],
    $donnees['email'],
    $donnees['adresse'],
    $donnees['ville'],
    $donnees['pays'],
    $donnees['mot_de_passe'],
    $donnees['role_id']
);

$utilisateur->setVille('Amiens');
$resultat = $repository->update(1, $utilisateur); */ 














/*Rechercher un utilisateur grâce à son adresse email
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
echo "</pre>"; */