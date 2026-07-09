<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <title>Créer une réservation</title>
    <link rel="stylesheet" href="style.css">

</head>


<body>


<header>

    <div class="logo">
        HOTEL<span>BOOK</span>
    </div>

</header>



<main class="form-container">


<h1>Réserver une chambre</h1>



<form method="POST" action="../../index.php?action=create">


<label>
Nom du client
</label>

<input 
type="text" 
name="nom"
placeholder="Votre nom"
required>



<label>
Numéro de chambre
</label>

<input 
type="number" 
name="chambre"
placeholder="Ex: 12"
required>



<label>
Nombre de nuits
</label>

<input 
type="number" 
name="nuits"
placeholder="Ex: 3"
required>



<label>
Type de chambre
</label>


<select name="type">


<option value="STANDARD">
STANDARD - 25000 FCFA/nuit
</option>


<option value="CONFORT">
CONFORT - 50000 FCFA/nuit
</option>


<option value="SUITE">
SUITE - 100000 FCFA/nuit
</option>


</select>



<button type="submit">
Réserver
</button>



</form>



</main>


</body>

</html>