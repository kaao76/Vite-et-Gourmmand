CREATE TABLE Role (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE Utilisateur (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    telephone VARCHAR(20),
    email VARCHAR(100) NOT NULL UNIQUE,
    adresse VARCHAR(255),
    ville VARCHAR(100),
    pays VARCHAR(100),
    mot_de_passe VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    actif BOOLEAN NOT NULL DEFAULT TRUE,

    FOREIGN KEY (role_id)
    REFERENCES Role(id_role)
);

CREATE TABLE Regime (
    id_regime INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE Theme (
    id_theme INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE Menu (
    id_menu INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    description TEXT,
    nombre_personnes_min INT NOT NULL,
    prix_par_personne DECIMAL(10,2) NOT NULL,
    conditions TEXT,
    stock_disponible INT NOT NULL DEFAULT 0,
    id_regime INT NOT NULL,
    id_theme INT NOT NULL,

    FOREIGN KEY (id_regime) REFERENCES Regime(id_regime),
    FOREIGN KEY (id_theme) REFERENCES Theme(id_theme)
);

CREATE TABLE Plat (
    id_plat INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    description TEXT,
    type_plat VARCHAR(20) NOT NULL
);

CREATE TABLE Allergene (
    id_allergene INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE MenuPlat (
    id_menu INT NOT NULL,
    id_plat INT NOT NULL,

    PRIMARY KEY (id_menu, id_plat),

    FOREIGN KEY (id_menu) REFERENCES Menu(id_menu),
    FOREIGN KEY (id_plat) REFERENCES Plat(id_plat)
);

CREATE TABLE PlatAllergene (
    id_plat INT NOT NULL,
    id_allergene INT NOT NULL,

    PRIMARY KEY (id_plat, id_allergene),

    FOREIGN KEY (id_plat) REFERENCES Plat(id_plat),
    FOREIGN KEY (id_allergene) REFERENCES Allergene(id_allergene)
);

CREATE TABLE Commande (
    id_commande INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT NOT NULL,
    date_commande DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    date_prestation DATE NOT NULL,
    heure_livraison TIME NOT NULL,
    lieu_livraison VARCHAR(255),
    adresse_livraison VARCHAR(255) NOT NULL,
    nombre_personnes INT NOT NULL,
    prix_menu DECIMAL(10,2) NOT NULL,
    prix_livraison DECIMAL(10,2) NOT NULL DEFAULT 0,
    prix_total DECIMAL(10,2) NOT NULL,
    statut VARCHAR(30) NOT NULL DEFAULT 'en attente',
    pret_materiel BOOLEAN NOT NULL DEFAULT FALSE,
    restitution_materiel BOOLEAN NOT NULL DEFAULT FALSE,

    FOREIGN KEY (id_utilisateur)
    REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE LigneCommande (
    id_ligne_commande INT AUTO_INCREMENT PRIMARY KEY,
    id_commande INT NOT NULL,
    id_menu INT NOT NULL,
    quantite INT NOT NULL CHECK (quantite > 0),
    prix_unitaire DECIMAL(10,2) NOT NULL,

    FOREIGN KEY (id_commande)
    REFERENCES Commande(id_commande),

    FOREIGN KEY (id_menu)
    REFERENCES Menu(id_menu)
);

CREATE TABLE Avis (
    id_avis INT AUTO_INCREMENT PRIMARY KEY,
    note INT NOT NULL CHECK (note BETWEEN 1 AND 5),
    commentaire TEXT,
    statut VARCHAR(30) NOT NULL DEFAULT 'en attente',
    id_utilisateur INT NOT NULL,

    FOREIGN KEY (id_utilisateur)
    REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE Horaire (
    id_horaire INT AUTO_INCREMENT PRIMARY KEY,
    jour VARCHAR(20) NOT NULL,
    heure_ouverture TIME NOT NULL,
    heure_fermeture TIME NOT NULL
);

CREATE TABLE DemandeContact (
    id_demande INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    email VARCHAR(100) NOT NULL,
    date_demande DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    statut VARCHAR(30) NOT NULL DEFAULT 'nouvelle'
);

CREATE TABLE Image (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100),
    url_image VARCHAR(255) NOT NULL,
    type VARCHAR(50),
    texte_alternatif VARCHAR(255),
    actif BOOLEAN NOT NULL DEFAULT TRUE,
    id_plat INT,
    id_menu INT,

    FOREIGN KEY (id_plat) REFERENCES Plat(id_plat),
    FOREIGN KEY (id_menu) REFERENCES Menu(id_menu)
);

CREATE TABLE MembreEquipe (
    id_membre_equipe INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    poste VARCHAR(100) NOT NULL,
    description TEXT,
    id_image INT,
    actif BOOLEAN NOT NULL DEFAULT TRUE,

    FOREIGN KEY (id_image) REFERENCES Image(id_image)
);


ALTER TABLE Utilisateur
MODIFY telephone VARCHAR(20) NOT NULL,
MODIFY adresse VARCHAR(255) NOT NULL,
MODIFY ville VARCHAR(100) NOT NULL,
MODIFY pays VARCHAR(100) NOT NULL;