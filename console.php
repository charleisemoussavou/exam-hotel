<?php

require_once "controllers/ReservationController.php";
require_once "views/console/ReservationView.php";

$controller = new ReservationController();
$view = new ReservationView();

do {

    $choix =intval($view->afficherMenu()) ;

    switch ($choix)
    {

       
        case 1:

            $reservation = $view->saisirReservation();

            $message = $controller->creerReservation(
                $reservation["nom"],
                $reservation["chambre"],
                $reservation["nuits"],
                $reservation["type"]
            );

            $view->afficherMessage($message);

        break;

           

        case 2:

            $reservations = $controller->afficherReservations();

            $view->afficherReservations($reservations);

        break;

        case 3:

            $id = $view->saisirId();

            $message = $controller->annulerReservation($id);

            $view->afficherMessage($message);

        break;

        case 4:

            $ca = $controller->afficherCA();

            $view->afficherCA($ca);

        break;

        case 5:

            $reservation = $controller->afficherPlusLongSejour();

            $view->afficherPlusLongSejour($reservation);

        break;

        case 0:

            echo "\nAu revoir !\n";

        break;

        default:

            echo "\nChoix invalide.\n";

    }

} while ($choix != 0);