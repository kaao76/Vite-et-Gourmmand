<?php

class Role
{
    private ?int $id_role = null;
    private string $libelle;

    public function __construct(string $libelle)
    {
        $this->libelle = $libelle;
    }

    public function getIdRole(): ?int
    {
        return $this->id_role;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }
}