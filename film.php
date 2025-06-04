<?php include('environnement.php'); ?>
<?php

if (!isset($_SESSION['userid'])) {
    // Redirection ou message d'erreur
    exit('Vous devez être connecté pour ajouter un film.');
}
$userId = $_SESSION['userid'];

// Traitement du formulaire
if (!empty($_POST['titre']) && !empty($_POST['realisateur']) && !empty($_POST['genre']) && !empty($_POST['duree']) && !empty($_POST['synopsis'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $realisateur = htmlspecialchars($_POST['realisateur']); 
    $genre = htmlspecialchars($_POST['genre']); 
    $duree = (int) $_POST['duree']; 
    $synopsis = htmlspecialchars($_POST['synopsis']);

    // Insertion dans la BDD avec user_id
    $req = $bdd->prepare("INSERT INTO fiche_film (titre, realisateur, genre, duree, synopsis, user_id) 
                        VALUES (?, ?, ?, ?, ?, ?)");
    $success = $req->execute([$titre, $realisateur, $genre, $duree, $synopsis, $userId]);

    if ($success) {
        echo "<h3>Votre film a été ajouté.</h3>";
    } else {
        echo "<h3>Erreur lors de l'ajout du film.</h3>";
    }
}
?>
<body>
    <form action="film.php" method="post">
        <label for="titre">Titre</label><br>
        <input type="text" name="titre"><br>

        <label for="realisateur">Réalisateur</label><br>
        <input type="text" name="realisateur"><br>

        <label for="genre">Genre</label><br>
        <input type="text" name="genre"><br>

        <label for="duree">Durée (en minutes)</label><br>
        <input type="number" name="duree"><br>

        <label for="synopsis">Synopsis</label><br>
        <textarea name="synopsis"></textarea><br><br>

        <button type="submit">Ajouter un film</button>
    </form>
</body>
</html>