<?php
require_once __DIR__ . '/../Repository/UtilisateurRepository.php';



class ConnexionController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function connecter(): void // void : indique que cette méthode ne renverra aucune valeur avec return
    {

        // creer la session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $repository = new UtilisateurRepository($this->pdo);
        $email = trim($_POST['email'] ?? '');
        $utilisateur = $repository->findByEmail($email);

        if (!$utilisateur) { // signifie « si aucun utilisateur n'a été trouvé ».
            $_SESSION['erreur_connexion'] = 'Adresse email ou mot de passe incorrect.';

            return;
        }

        $motDePasse = $_POST['mot_de_passe'] ?? '';

        if (!password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
            $_SESSION['erreur_connexion'] = 'Adresse email ou mot de passe incorrect.';
            return;
        }

        // verifier si le compte est actif
        if ((int) $utilisateur['actif'] !== 1) {
            $_SESSION['erreur_connexion'] = 'Connexion impossible. Veuillez contacter un administrateur.';
            return;
        }

        session_regenerate_id(true); // renouvelle l'identifiant de session après une connexion réussie, pour renforcer la sécurité.


        // enreg de id et le role dans la sessions PHP
        $_SESSION['id_utilisateur'] = $utilisateur['id_utilisateur']; // Elle enregistre dans la session l'identifiant de l'utilisateur trouvé dans MySQL
        $_SESSION['role_id'] = $utilisateur['role_id']; //Elle enregistre son rôle.


        // redirection de ladmin vers gestion_uti
        if ((int) $utilisateur['role_id'] === 3) {
            header('Location: gestion_utilisateurs.php');
            exit;
        }
    }
}
