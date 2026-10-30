
<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../entity/Utilisateur.php';
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
        $messageSucces = ($_GET['creation'] ?? '') === 'succes';
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

    // traiter la demande d ajout utilis
    public function traiterAjoutUtilisateur(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['role_id']) || (int) $_SESSION['role_id'] !== 3) {
            http_response_code(403);
            exit('Accès interdit');
        }
        $nom = trim($_POST['nom'] ?? '');
        $prenom = trim($_POST['prenom'] ?? '');

        $telephone = trim($_POST['telephone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $adresse = trim($_POST['adresse'] ?? '');
        $ville = trim($_POST['ville'] ?? '');
        $pays = trim($_POST['pays'] ?? '');
        $motDePasse = $_POST['mot_de_passe'] ?? '';
        $roleId = $_POST['role_id'] ?? '';

        if ($nom === '' || $prenom === '') {
            exit('Le nom et le prénom sont obligatoires.');
        }

        if (
            $telephone === '' ||
            $email === '' ||
            $adresse === '' ||
            $ville === '' ||
            $pays === '' ||
            $motDePasse === '' ||
            $roleId === ''
        ) {
            exit('Tous les champs sont obligatoires.');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            exit('Adresse email invalide.');
        }


        // Vérifier le rôle de l'utilisateur
        if (!in_array($roleId, ['1', '2', '3'], true)) {
            exit('Rôle invalide.');
        }

        // Vérifier la longueur du mot de passe
        if (mb_strlen($motDePasse, 'UTF-8') < 12) {
            $erreur = 'Le mot de passe doit contenir au moins 12 caractères.';

            require __DIR__ . '/../View/Html/ajouter_utilisateur.php';
            return;
        }


        $repository = new UtilisateurRepository($this->pdo);

        $utilisateurExistant = $repository->findByEmail($email);

        // Si l'email existe déjà, arrêter la création
        if ($utilisateurExistant !== false) { /*modifié avant y avait null mais erreur sur le message car methode retourne false */
            exit('Cette adresse email est déjà utilisée.');
        }

        $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);
        $utilisateur = new Utilisateur(
            $nom,
            $prenom,
            $telephone,
            $email,
            $adresse,
            $ville,
            $pays,
            $motDePasseHash,
            (int) $roleId
        );
        $enregistrementReussi = $repository->create($utilisateur);
        if ($enregistrementReussi) {
            header('Location: gestion_utilisateurs.php?creation=succes');
            exit;
        } else {
            echo "Erreur lors de la création de l'utilisateur.";
        }
    }

    
public function afficherFormulaireModification(): void
{
    // Démarrer la session si nécessaire
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Vérifier que l'utilisateur connecté est administrateur
    if (!isset($_SESSION['role_id']) || (int) $_SESSION['role_id'] !== 3) {
        http_response_code(403);
        exit('Accès interdit');
    }

    // Récupérer et vérifier l'identifiant transmis dans l'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); // verifie sue la valeur recu est un nombre entier

    if ($id === false || $id === null || $id <= 0) {
        http_response_code(400);
        exit('Identifiant invalide.');
    }

    // Créer le repository
    $repository = new UtilisateurRepository($this->pdo);

    // Rechercher l'utilisateur dans MySQL
    $utilisateur = $repository->findById($id);

    // Vérifier que l'utilisateur existe
    if ($utilisateur === false) {
        http_response_code(404);
        exit('Utilisateur introuvable.');
    }

    // Afficher le formulaire de modification
    require __DIR__ . '/../View/Html/modifier_utilisateur.php';
}

}
