<?php

class UtilisateurRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Rechercher un utilisateur dans la base de données grâce à son email
// La méthode retourne un tableau si l'utilisateur existe, sinon false
public function findByEmail(string $email): array|false
{
    // Préparer une requête SQL pour rechercher l'utilisateur par son email
    // $this->pdo représente notre connexion à la base de données
    // :email est un paramètre qui sera remplacé par la valeur recherchée
    $requete = $this->pdo->prepare(
        "SELECT * FROM Utilisateur WHERE email = :email"
    );

    // Exécuter la requête SQL
    // Associer le paramètre :email à la valeur contenue dans $email
    $requete->execute([
        'email' => $email
    ]);

    // Récupérer la première ligne trouvée sous forme de tableau associatif
    // PDO::FETCH_ASSOC utilise les noms des colonnes comme clés du tableau
    // Si aucun utilisateur n'est trouvé, fetch() retourne false
    return $requete->fetch(PDO::FETCH_ASSOC);
}










}