<?php ob_start(); 
$bdd = new PDO('mysql:host=mysql;dbname=mediatheque;charset=utf8', 'root', 'root');
?>
<?php
//Select film
$request = $bdd->query('SELECT titre, realisateur, genre, duree FROM fiche_film ORDER BY id DESC LIMIT 3');
while($data = $request->fetch()) {
    echo $data['titre'] . " - " . $data['realisateur'] . " - " . $data['genre'] . " - " . $data['duree'] . "min" . "<br>". "<br>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>

    <form action="film.php" method="post">
        <button type="submit">Ajouter un film</button>
    </form>

    <form action="fiche_film.php">
        <button type="submit">Voir tous les films</button>
    </form>
</body>
</html>