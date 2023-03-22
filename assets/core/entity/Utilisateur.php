<?php

class Utilisateur
{
    // propriété
    private int $id_ut;
    private string $email;
    private string $hash_mdp;
    private string $role;
    private string $pseudo;
    private string $ville;
    private string $pays;
    private bool $activation;
    private datetime $date_creation;

    public function __construct($id_ut = 0, $email = "", $hash_mdp = "", $role = "", $pseudo = "", $ville = "", $pays = "", $activation = 1, $date_creation = "")
    {
        $this->id = $id_ut;
        $this->email = $email;
        $this->hash_mdp = $hash_mdp;
        $this->role = $role;
        $this->pseudo = $pseudo;
        $this->ville = $ville;
        $this->pays = $pays;
        $this->activation = $activation;
        $this->date_creation = $date_creation;
    }

    /** Accesseurs */

    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    // getters magiques
    public function __get($property)
    {
        return $this->$property;
    }


    // public function modifier(): bool
    // {
        
    // }

    // public function activer(): bool
    // {

    // }

    // public function listerLesUtilisateurs(): array
    // {

    // }
}