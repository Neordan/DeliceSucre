<?php

class Commentaire
{
    // propriété
    private int $id_com;
    private string $message;
    private datetime $date_creation;

    public function __construct($id_com = 0, $message = "", $date_creation = "")
    {
        $this->id = $id_com;
        $this->email = $message;
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

    public function ajouter(): bool
    {

        $sql = "INSERT INTO commentaire(message) VALUES (:message);";

            $dsn = "mysql:host=localhost;port=3306;dbname=delicesucre;charset=utf8";

            try {
                $pdo = new PDO($dsn, "root", "");
                $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = $pdo-> prepare($sql);
                $query-> bindParam(":message", $this->message , PDO::PARAM_STR);

                $query-> execute();

                return true;
            } catch(PDOException|Exception|Error $e) {
                echo $e-> getMessage();

                return false;
            }
        }

    public function listerLesCommentaires(): array
    {
        
    }
}