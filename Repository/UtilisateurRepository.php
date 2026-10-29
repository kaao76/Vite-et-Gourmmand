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

    public function create(Utilisateur $utilisateur): bool
    {
        // Preparer la requete pour ajouter un utilisateur
        $requete = $this->pdo->prepare(
            "INSERT INTO Utilisateur
    (nom, prenom, telephone, email, adresse, ville, pays, mot_de_passe, role_id)
    VALUES
    (:nom, :prenom, :telephone, :email, :adresse, :ville, :pays, :mot_de_passe, :role_id)"
        );

        // Exécuter la requête et retourner son résultat
        return $requete->execute([
            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
            'telephone' => $utilisateur->getTelephone(),
            'email' => $utilisateur->getEmail(),
            'adresse' => $utilisateur->getAdresse(),
            'ville' => $utilisateur->getVille(),
            'pays' => $utilisateur->getPays(),
            'mot_de_passe' => $utilisateur->getMotDePasse(),
            'role_id' => $utilisateur->getRoleId()
        ]);
    }

    //// Rechercher un utilisateur grâce à son identifiant
    public function findById(int $id): array|false
    {
        $requete = $this->pdo->prepare(
            "SELECT * FROM Utilisateur WHERE id_utilisateur = :id"
        );
        $requete->execute(['id' => $id]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    // Récupérer tous les utilisateurs
    public function findAll(): array
    {
        $requete = $this->pdo->prepare(
            "SELECT * FROM Utilisateur"
        );

        $requete->execute(); // les paramètres sont vides car nous ne transmettons rien 

        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }


    // Modifier les informations d'un utilisateur
    public function update(int $id, Utilisateur $utilisateur): bool
    {
        $requete = $this->pdo->prepare(
            "UPDATE Utilisateur
         SET nom = :nom,
             prenom = :prenom,
             telephone = :telephone,
             email = :email,
             adresse = :adresse,
             ville = :ville,
             pays = :pays
         WHERE id_utilisateur = :id"
        );

        return $requete->execute([
            'nom' => $utilisateur->getNom(), // Pour le paramètre :nom, je récupère le nom de mon objet Utilisateur grâce à getNom().
            'prenom' => $utilisateur->getPrenom(),
            'telephone' => $utilisateur->getTelephone(),
            'email' => $utilisateur->getEmail(),
            'adresse' => $utilisateur->getAdresse(),
            'ville' => $utilisateur->getVille(),
            'pays' => $utilisateur->getPays(),
            'id' => $id
        ]);
    }

    public function setActif(int $id, bool $actif): bool
    {
        $requete = $this->pdo->prepare(
            "UPDATE Utilisateur
     SET actif = :actif /* « Je veux donner une nouvelle valeur à la colonne actif. Le paramètre :actif recevra cette valeur plus tard. » */
     WHERE id_utilisateur = :id" /* « Je veux modifier uniquement l'utilisateur dont l'identifiant correspond à :id. » */
        );

        return $requete->execute([
            'actif' => (int) $actif, /* la methode utilise 1 ou 0 */
            'id' => $id
        ]);
    }


        // Suprimer définitivement un utilisateur

    public function delete(int $id): bool
    {
        $requete = $this->pdo->prepare(
            "DELETE FROM Utilisateur
     WHERE id_utilisateur = :id"
        );
         return $requete->execute([ /* « Je donne au paramètre :id la valeur de $id, j'exécute ma requête SQL et je retourne le résultat. » */
        'id' => $id
    ]);
    }
}
