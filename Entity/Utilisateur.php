<?php

class Utilisateur
{
    private ?int $id_utilisateur = null;

    private string $nom;
    private string $prenom;
    private string $telephone;
    private string $email;
    private string $adresse;
    private string $ville;
    private string $pays;
    private string $mot_de_passe;
    private int $role_id;
    private bool $actif = true;

    public function __construct(
    string $nom,
    string $prenom,
    string $telephone,
    string $email,
    string $adresse,
    string $ville,
    string $pays,
    string $mot_de_passe,
    int $role_id
) {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->telephone = $telephone;
    $this->email = $email;
    $this->adresse = $adresse;
    $this->ville = $ville;
    $this->pays = $pays;
    $this->mot_de_passe = $mot_de_passe;
    $this->role_id = $role_id;
}

public function getIdUtilisateur(): ?int
{
    return $this->id_utilisateur;
}

public function getNom(): string
{
    return $this->nom;
}

public function getPrenom(): string
{
    return $this->prenom;
}

public function getTelephone(): string
{
    return $this->telephone;
}

public function getEmail(): string
{
    return $this->email;
}


public function getMotDePasse(): string
{
    return $this->mot_de_passe;
}

public function getAdresse(): string
{
    return $this->adresse;
}

public function getVille(): string
{
    return $this->ville;
}

public function getPays(): string
{
    return $this->pays;
}

public function getRoleId(): int
{
    return $this->role_id;
}

public function isActif(): bool
{
    return $this->actif;
}

public function setNom(string $nom): void
{
    $this->nom = $nom;
}

public function setPrenom(string $prenom): void
{
    $this->prenom = $prenom;
}

public function setTelephone(string $telephone): void
{
    $this->telephone = $telephone;
}

public function setEmail(string $email): void
{
    $this->email = $email;
}

public function setAdresse(string $adresse): void
{
    $this->adresse = $adresse;
}

public function setVille(string $ville): void
{
    $this->ville = $ville;
}

public function setPays(string $pays): void
{
    $this->pays = $pays;
}
}