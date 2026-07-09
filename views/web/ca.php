<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <title>Chiffre d'affaires</title>
    <link rel="stylesheet" href="views/web/style.css">

</head>


<body>


<header>

    <div class="logo">
        HOTEL<span>BOOK</span>
    </div>

</header>



<nav>

<a href="index.php">
Accueil
</a>


<a href="create.php">
Nouvelle réservation
</a>

</nav>




<main>


<div class="ca-container">


<h1>
Chiffre d'affaires prévisionnel
</h1>



<div class="ca-card">


<div class="icon">
💰
</div>


<h2>

<?= number_format($ca, 0, ',', ' ') ?>

FCFA

</h2>



<p>
Montant total estimé des réservations validées.
</p>



</div>



</div>



</main>



</body>

</html>
