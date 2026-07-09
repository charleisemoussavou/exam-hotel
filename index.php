<?php

require_once "controllers/ReservationController.php";


$controller = new ReservationController();



$action = $_GET["action"] ?? "home";



switch ($action) {


    case "create":

        require_once "views/web/create.php";

    break;



    case "save":


        $message = $controller->creerReservation(
            $_POST["nom"],
            $_POST["chambre"],
            $_POST["nuits"],
            $_POST["type"]
        );


        $reservations = $controller->afficherReservations();


        require_once "views/web/index.php";


    break;



    case "cancel":


        $message = $controller->annulerReservation($_POST["id"]);


        $reservations = $controller->afficherReservations();


        require_once "views/web/index.php";


    break;



    case "ca":


        $ca = $controller->afficherCA();


        require_once "views/web/ca.php";


    break;



    default:


        $reservations = $controller->afficherReservations();


        require_once "views/web/index.php";

}