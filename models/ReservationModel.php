<?php

require_once "Database.php";

class ReservationModel
{
    private $connexion;

    public function __construct()
    {
        $database = new Database();
        $this->connexion = $database->getConnexion();
    }

    
    public function ajouterReservation($nomClient, $numeroChambre, $nombreNuits, $typeChambre)
    {
        $sql = "INSERT INTO reservations
                (nom_client, numero_chambre, nombre_nuits, type_chambre)
                VALUES (?, ?, ?, ?)";

        $requete = $this->connexion->prepare($sql);

        return $requete->execute([
            $nomClient,
            $numeroChambre,
            $nombreNuits,
            $typeChambre
        ]);
    }

  
    public function getReservationsValidees()
    {
        $sql = "SELECT *
                FROM reservations
                WHERE statut = 'VALIDEE'";

        $requete = $this->connexion->query($sql);

        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

   
    public function reservationExiste($id)
    {
        $sql = "SELECT *
                FROM reservations
                WHERE id = ?";

        $requete = $this->connexion->prepare($sql);
        $requete->execute([$id]);

        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    
    public function annulerReservation($id)
    {
        $sql = "UPDATE reservations
                SET statut = 'ANNULEE'
                WHERE id = ?";

        $requete = $this->connexion->prepare($sql);

        return $requete->execute([$id]);
    }

    
    public function calculerCA()
    {
        $sql = "SELECT SUM(
                    CASE
                        WHEN type_chambre = 'STANDARD' THEN nombre_nuits * 25000
                        WHEN type_chambre = 'CONFORT' THEN nombre_nuits * 50000
                        WHEN type_chambre = 'SUITE' THEN nombre_nuits * 100000
                    END
                ) AS chiffre_affaires
                FROM reservations
                WHERE statut = 'VALIDEE'";

        $requete = $this->connexion->query($sql);

        return $requete->fetch(PDO::FETCH_ASSOC);
    }


    public function getPlusLongSejour()
    {
        $sql = "SELECT *
                FROM reservations
                WHERE statut = 'VALIDEE'
                ORDER BY nombre_nuits DESC
                LIMIT 1";

        $requete = $this->connexion->query($sql);

        return $requete->fetch(PDO::FETCH_ASSOC);
    }
}
