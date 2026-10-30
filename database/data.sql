INSERT INTO Role (libelle)
VALUES
('Utilisateur'),
('Employé'),
('Administrateur');

INSERT INTO Regime (libelle)
VALUES
('Classique'),
('Végétarien'),
('Vegan');


INSERT INTO Theme (libelle)
VALUES
('Classique'),
('Événement'),
('Noël'),
('Pâques');



INSERT INTO Menu (
    titre,
    description,
    nombre_personnes_min,
    prix_par_personne,
    conditions,
    stock_disponible,
    id_regime,
    id_theme
)
VALUES
(
    'Menu Classique',
    'Un menu traditionnel pour vos repas.',
    4,
    32.00,
    'Commande pour 4 personnes minimum.',
    20,
    1,
    1
),
(
    'Menu Gourmand',
    'Un menu généreux pour vos événements.',
    6,
    38.00,
    'Commande pour 6 personnes minimum.',
    15,
    1,
    2
),
(
    'Menu Prestige',
    'Un menu raffiné pour les grandes occasions.',
    8,
    45.00,
    'Commande pour 8 personnes minimum.',
    10,
    1,
    2
);

