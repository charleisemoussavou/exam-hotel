<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <title>HotelBook - Dakar</title>
    <link rel="stylesheet" href="views/web/style.css">
  

</head>


<body>


<header>


    <div class="logo">
        HOTEL<span>BOOK</span>
    </div>



    <div class="search-bar">


        <div>
            <small>Destination</small>
            <p>Dakar</p>
        </div>


        <div>
            <small>Arrivée</small>
            <p>Ajouter une date</p>
        </div>


        <div>
            <small>Départ</small>
            <p>Ajouter une date</p>
        </div>


        <div>
            <small>Voyageurs</small>
            <p>1 chambre</p>
        </div>


        <button>
            🔍
        </button>


    </div>


</header>





<nav>


<a href="index.php?action=create">
+ Nouvelle réservation
</a>


<a href="index.php?action=ca">
Voir le chiffre d'affaires
</a>


</nav>






<main>


<h1>
Découvrez nos chambres disponibles
</h1>




<div class="cards">



<?php if(empty($reservations)): ?>


<p>
Aucune réservation active.
</p>



<?php else: ?>



<?php foreach($reservations as $reservation): ?>



<div class="card">



<div class="image">

🏨

</div>




<div class="content">


<h2>
<?= $reservation["type_chambre"] ?>
</h2>



<p>
👤 Client :
<?= $reservation["nom_client"] ?>
</p>



<p>
🚪 Chambre :
<?= $reservation["numero_chambre"] ?>
</p>



<p>
🌙 
<?= $reservation["nombre_nuits"] ?> nuits
</p>



<p class="status">
<?= $reservation["statut"] ?>
</p>



<form method="POST" action="index.php?action=cancel">

<input type="hidden" 
name="id" 
value="<?= $reservation['id'] ?>">


<button class="cancel-btn">
Annuler
</button>


</form>




</div>



</div>



<?php endforeach; ?>



<?php endif; ?>



</div>



</main>



</body>

</html>