
<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../Repository/UtilisateurRepository.php';



class UtilisateurController
{
 private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    // verifier le role administrateur 
public function index(): void
{
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role_id']) || (int) $_SESSION['role_id'] !== 3) {
    http_response_code(403);
    exit('Accès interdit');
}


// $pdo appartient au constructeur, tandis que $this->pdo appartient à l'objet entier.
$repository = new UtilisateurRepository($this->pdo); // $PDO Transmet la connexion à MySQL au constructeur
$utilisateurs = $repository->findAll();
require __DIR__ . '/../View/Html/utilisateurs.php'; // require seul pour afficher la vue chaque fois que l acrion index () est executée0

}


public function afficherFormulaireAjout(): void
{
    // Démarrer la session si elle n'est pas déjà active
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Vérifier que l'utilisateur est administrateur
    if (!isset($_SESSION['role_id']) || (int) $_SESSION['role_id'] !== 3) {
        http_response_code(403);
        exit('Accès interdit');
    }

    // Afficher le formulaire d'ajout
    require __DIR__ . '/../View/Html/ajouter_utilisateur.php';
}

public function traiterAjoutUtilisateur(): void
{
    // Démarrer la session si nécessaire
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Vérifier que l'utilisateur est administrateur
    if (!isset($_SESSION['role_id']) || (int) $_SESSION['role_id'] !== 3) {
        http_response_code(403);
        exit('Accès interdit');
    }

    // Le traitement des données sera ajouté ensuite.
}



}