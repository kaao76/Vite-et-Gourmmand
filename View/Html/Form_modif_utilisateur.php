<?php
if (!isset($utilisateur_UPD)) {
    http_response_code(403);
    exit('Accès interdit');
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur - Vite & Gourmand</title>
</head>

<body>

    <main>
        <h1>Modifier un utilisateur</h1>

        <form action="modifier_utilisateur.php" method="POST">

            <!-- Identifier l'utilisateur à modifier -->
            <input
                type="hidden"
                name="id_utilisateur"
                value="<?= (int) $utilisateur_UPD['id_utilisateur'] ?>"
            >

            <label for="nom">Nom</label>
            <input
                type="text"
                id="nom"
                name="nom"
                value="<?= htmlspecialchars($utilisateur_UPD['nom'], ENT_QUOTES, 'UTF-8') ?>"
                required
            >

            <label for="prenom">Prénom</label>
            <input
                type="text"
                id="prenom"
                name="prenom"
                value="<?= htmlspecialchars($utilisateur_UPD['prenom'], ENT_QUOTES, 'UTF-8') ?>"
                required
            >

            <label for="telephone">Téléphone</label>
            <input
                type="tel"
                id="telephone"
                name="telephone"
                value="<?= htmlspecialchars($utilisateur_UPD['telephone'], ENT_QUOTES, 'UTF-8') ?>"
                required
            >

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= htmlspecialchars($utilisateur_UPD['email'], ENT_QUOTES, 'UTF-8') ?>"
                required
            >

            <label for="adresse">Adresse</label>
            <input
                type="text"
                id="adresse"
                name="adresse"
                value="<?= htmlspecialchars($utilisateur_UPD['adresse'], ENT_QUOTES, 'UTF-8') ?>"
                required
            >

            <label for="ville">Ville</label>
            <input
                type="text"
                id="ville"
                name="ville"
                value="<?= htmlspecialchars($utilisateur_UPD['ville'], ENT_QUOTES, 'UTF-8') ?>"
                required
            >

            <label for="pays">Pays</label>
            <input
                type="text"
                id="pays"
                name="pays"
                value="<?= htmlspecialchars($utilisateur_UPD['pays'], ENT_QUOTES, 'UTF-8') ?>"
                required
            >

            <label for="role_id">Rôle</label>
            <select id="role_id" name="role_id" required>

                <option value="1"
                    <?= (int) $utilisateur_UPD['role_id'] === 1 ? 'selected' : '' ?>>
                    Utilisateur
                </option>

                <option value="2"
                    <?= (int) $utilisateur_UPD['role_id'] === 2 ? 'selected' : '' ?>>
                    Employé
                </option>

                <option value="3"
                    <?= (int) $utilisateur_UPD['role_id'] === 3 ? 'selected' : '' ?>>
                    Administrateur
                </option>

            </select>

            <button type="submit">
                Enregistrer les modifications
            </button>

        </form>

        <a href="gestion_utilisateurs.php">
            Retour au tableau
        </a>

    </main>

</body>
</html>
