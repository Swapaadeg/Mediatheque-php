<?php ob_start(); 
$bdd = new PDO('mysql:host=mysql;dbname=mediatheque;charset=utf8', 'root', 'root');

//Create fiche film
if(!empty($_POST['titre']) && !empty($_POST['realisateur']) && !empty($_POST['genre']) && !empty($_POST['duree'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $realisateur = htmlspecialchars($_POST['realisateur']); 
    $genre = htmlspecialchars($_POST['genre']); 
    $duree = htmlspecialchars($_POST['duree']); 
    $create = $bdd-> prepare('INSERT INTO fiche_film(titre,realisateur,genre,duree) VALUES(?, ?, ?, ?)');
    $data = $create->execute(array($titre, $realisateur, $genre, $duree));
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
    <form action="film.php" method="post">
        <label for="titre">Titre</label>
        <input type="text" name="titre">
        <label for="realisateur">Realisateur</label>
        <input type="text" name="realisateur">
        <label for="genre">Genre</label>
        <input type="text" name="genre">
        <label for="duree">Durée</label>
        <input type="text" name="duree">
        <button type="submit">Ajouter un film</button>
    </form>
</body>
</html>