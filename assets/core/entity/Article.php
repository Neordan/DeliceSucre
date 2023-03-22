<?php

class Article
{
    // propriété
    private int $id_art;
    private string $titre;
    private string $contenu;
    private  $img;
    private datetime $date_creation;

    public function __construct($id_art = 0, $titre = "", $contenu = "", $img = "", $date_creation = "")
    {
        $this->id = $id_art;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->img = $img;
        $this->date_creation = $date_creation;
    }


    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    //fonction pour lire
    public function __get($property)
    {
        return $this->$property;
    }

    /** Méthodes */
    // Méthodes CRUD
    // C stands for CREATE
    public function ajouter(): bool
    {
        $sql = "INSERT INTO article(titre, contenu, img) VALUES (:titre, :contenu, :img)";


            $dsn = "mysql:host=localhost;port=3306;dbname=delicesucre;charset=utf8";

            try {
                $pdo = new PDO($dsn, "root", "");
                $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = $pdo-> prepare($sql);
                $query-> bindParam(":titre", $this->titre , PDO::PARAM_STR);
                $query-> bindParam(":contenu", $this->contenu , PDO::PARAM_STR);
                $query-> bindParam(":img", $this->img , PDO::PARAM_STR);

                $query-> execute();

                return true;
            } catch(PDOException|Exception|Error $e) {
                echo $e-> getMessage();

                return false;
            }
        }

    public function modifier(): bool
    {
        $sql = "DELETE FROM article WHERE id_art=:id";

        $dsn = "mysql:host=localhost;port=3306;dbname=delicesucre;charset=utf8";

            try {
                $pdo = new PDO($dsn, "root", "");
                $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = $pdo-> prepare($sql);
                $query-> bindParam(":id", $this->id , PDO::PARAM_STR);

                $query-> execute();

                return true;
            } catch(PDOException|Exception|Error $e) {
                echo $e-> getMessage();

                return false;
            }
        }
    }

    // private function activer(): bool
    // {
    // }

    // public function listerLesArticles(): array
    // {

    // }

