<?php 
    ob_start();
    session_start();
    $bdd = new PDO('mysql:host=mysql;dbname=mediatheque;charset=utf8', 'root', 'root');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médiathèque</title>
</head>
<body>
    <a href="index.php">Accueil</a>
    <a href="inscription.php">Inscription</a>
    <a href="fiche_film.php">Les fiches de film</a>
    <a href="connexion.php">Connexion</a>
    <a href="film.php">Ajouter un film</a>
<?php
    var_dump($_SESSION);
?>

</body>
</html>