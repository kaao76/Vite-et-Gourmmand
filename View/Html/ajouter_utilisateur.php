<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur - Vite & Gourmand</title>
</head>

<body>

    <main>
        <h1>Ajouter un utilisateur</h1>

        <p>Créer un nouveau compte utilisateur.</p>

        <form action="../../public/traitement_ajout_utilisateur.php" method="POST">

        
<form action="../../public/traitement_ajout_utilisateur.php" method="POST">

    <!-- Nom -->
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" required>

    <!-- Prénom -->
    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" required>

    <!-- Téléphone -->
    <label for="telephone">Téléphone</label>
    <input type="tel" id="telephone" name="telephone" required>

    <!-- Email -->
    <label for="email">Adresse email</label>
    <input type="email" id="email" name="email" required>

    <!-- Adresse -->
    <label for="adresse">Adresse</label>
    <input type="text" id="adresse" name="adresse" required>

    <!-- Ville -->
    <label for="ville">Ville</label>
    <input type="text" id="ville" name="ville" required>

    <!-- Pays -->
    <label for="pays">Pays</label>
    <input type="text" id="pays" name="pays" required>

    <!-- Mot de passe -->
    <label for="mot_de_passe">Mot de passe</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required>

    <!-- Rôle -->
    <label for="role_id">Rôle</label>
    <select id="role_id" name="role_id" required>
        <option value="">Choisir un rôle</option>
        <option value="1">Utilisateur</option>
        <option value="2">Employé</option>
        <option value="3">Administrateur</option>
    </select>

    <!-- Validation du formulaire -->
    <button type="submit">Créer l'utilisateur</button>

</form>


        </form>
    </main>

</body>

</html>