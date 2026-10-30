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
                <!-- Afficher le message d'erreur envoyé par le contrôleur -->

        <?php if (isset($erreur)): ?>
    <p><?= htmlspecialchars($erreur) ?></p>
<?php endif; ?>

<form action="ajout_utilisateur.php" method="POST">
        
    <!-- Nom -->
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom"    value="<?= htmlspecialchars($_POST['nom'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>

    <!-- Prénom -->
    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom"    value="<?= htmlspecialchars($_POST['prenom'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>

    <!-- Téléphone -->
    <label for="telephone">Téléphone</label>
    <input type="tel" id="telephone" name="telephone"   value="<?= htmlspecialchars($_POST['telephone'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>

    <!-- Email -->
    <label for="email">Adresse email</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>

    <!-- Adresse -->
    <label for="adresse">Adresse</label>
    <input type="text" id="adresse" name="adresse" value="<?= htmlspecialchars($_POST['adresse'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>

    <!-- Ville -->
    <label for="ville">Ville</label>
    <input type="text" id="ville" name="ville"  value="<?= htmlspecialchars($_POST['ville'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>

    <!-- Pays -->
    <label for="pays">Pays</label>
    <input type="text" id="pays" name="pays"value="<?= htmlspecialchars($_POST['pays'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>

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

    </main>

</body>

</html>