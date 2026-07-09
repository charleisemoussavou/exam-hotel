<?php

class Database
{
    private $host = "localhost";
    private $dbname = "hotel";
    private $username = "postgres";
    private $password = "1234";

    private $connexion = null;

    public function getConnexion()
    {
        if ($this->connexion == null)
        {
            try
            {
                $this->connexion = new PDO(
                    "pgsql:host=localhost;port=5432;dbname=hotel",
                    $this->username,
                    $this->password
                );

                $this->connexion->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            }
            catch(PDOException $e)
            {
                die("Erreur de connexion : ".$e->getMessage());
            }
        }

        return $this->connexion;
    }
}
