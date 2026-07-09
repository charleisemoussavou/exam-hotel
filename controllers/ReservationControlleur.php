<?php

require_once "models/ReservationModel.php";

class ReservationController
{
    private $model;

    public function __construct()
    {
        $this->model = new ReservationModel();
    }


    // ==========================
    // Feat 1 : Créer réservation
    // ==========================
    public function creerReservation($nomClient, $numeroChambre, $nombreNuits, $typeChambre)
    {
        // RG : vérifier le nom
        if (empty($nomClient)) {
            return "Le nom du client est obligatoire.";
        }

        // RG : numéro chambre > 0
        if ($numeroChambre <= 0) {
            return "Le numéro de chambre doit être supérieur à 0.";
        }

        // RG : nombre nuits > 0
        if ($nombreNuits <= 0) {
            return "Le nombre de nuits doit être supérieur à 0.";
        }

        // RG : type de chambre valide
        if (!in_array($typeChambre, ["STANDARD", "CONFORT", "SUITE"])) {
            return "Type de chambre invalide.";
        }


        $resultat = $this->model->ajouterReservation(
            $nomClient,
            $numeroChambre,
            $nombreNuits,
            $typeChambre
        );


        if ($resultat === true) {
            return "Réservation enregistrée avec succès.";
        }

        return "Erreur lors de l'enregistrement.";
    }



    // ===============================
    // Feat 2 : Afficher réservations
    // ===============================
    public function afficherReservations()
    {
        return $this->model->getReservationsValidees();
    }



    // ==========================
    // Feat 3 : Annuler réservation
    // ==========================
    public function annulerReservation($id)
    {
        // Vérifier existence de l'ID
        $reservation = $this->model->reservationExiste($id);


        if (!$reservation) {
            return "Cette réservation n'existe pas.";
        }


        $resultat = $this->model->annulerReservation($id);


        if ($resultat === true) {
            return "Réservation annulée avec succès.";
        }


        return "Erreur lors de l'annulation.";
    }



    // ===============================
    // Feat 4 : Chiffre d'affaires
    // ===============================
    public function afficherCA()
    {
        $ca = $this->model->calculerCA();


        if ($ca["chiffre_affaires"] == null) {
            return 0;
        }


        return $ca["chiffre_affaires"];
    }



    // ===============================
    // Feat 5 : Plus long séjour
    // ===============================
    public function afficherPlusLongSejour()
    {
        return $this->model->getPlusLongSejour();
    }

}
