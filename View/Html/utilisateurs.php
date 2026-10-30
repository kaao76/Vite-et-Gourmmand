<?php

if (!isset($utilisateurs)) {
    http_response_code(403);
    exit('Accès interdit');
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs - Vite & Gourmand</title>
</head>

<body>

    <main class="page-utilisateurs">

        <h1>Gestion des utilisateurs</h1>

        <p>Liste des utilisateurs de Vite & Gourmand</p>
        <a href="ajout_utilisateur.php">Ajouter un utilisateur</a> Ajouter un utilisateur
        </a>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $utilisateur): ?>

                    <tr>

                        <td><?= htmlspecialchars($utilisateur['nom']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['prenom']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['email']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['nom_role']) ?></td>
                        <td>
                            <a href="modifier_utilisateur.php?id=<?= (int) $utilisateur['id_utilisateur'] ?>">
                                Modifier
                            </a>
                            <button type="button">
                                Désactiver
                            </button>
                        </td>
                    </tr>


                <?php endforeach; ?>
            </tbody>
        </table>

    </main>



</body>

</html>