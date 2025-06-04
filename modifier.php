<?php include('environnement.php') ?>
<?php
if (!isset($_SESSION['userid'])) {
    echo("Accès refusé. Veuillez vous connecter.");
}

$id = $_GET['id'];
$userId = $_SESSION['userid'];

$req = $bdd->prepare("SELECT * 
                    FROM fiche_film
                    WHERE id = :id 
                    AND user_id = :user_id");
$req->execute(['id' => $id, 'user_id' => $userId]);
$data = $req->fetch();

if (!$data) {
    echo("Vous n'avez pas le droit de modifier cette fiche.");
}

// Mise à jour de la base de donnée
if (isset($_POST['submit'])) {
    $update = $bdd->prepare("UPDATE fiche_film SET
                            titre = :titre,
                            realisateur = :realisateur,
                            duree = :duree,
                            genre = :genre,
                            synopsis = :synopsis
                            WHERE id = :id");
 
    $update->execute(array(
        'id' => $id,
        'titre' => $_POST['titre'],
        'realisateur' => $_POST['realisateur'],
        'duree' => $_POST['duree'],
        'genre' => $_POST['genre'],
        'synopsis' => $_POST['synopsis']
        ));
        
    // Redirection
    header("Location: synopsis.php?id=" . $data['id']);
}
?>
<body> 
    <form method="POST" action="modifier.php?id=<?php echo $data['id']; ?>">
        <label for="titre">Titre</label>
        <input type="text" name="titre" value="<?php echo htmlspecialchars($data['titre']); ?>" />

        <label for="realisateur">Réalisateur</label>
        <input type="text" name="realisateur" value="<?php echo htmlspecialchars($data['realisateur']); ?>" />

        <label for="duree">Durée</label>
        <input type="text" name="duree" value="<?php echo htmlspecialchars($data['duree']); ?>" />

        <label for="genre">Genre</label>
        <input type="text" name="genre" value="<?php echo htmlspecialchars($data['genre']); ?>" />

        <label for="synopsis">Synopsis</label>
        <input type="text" name="synopsis" value="<?php echo $data['synopsis']; ?>" />

        <input type="submit" name="submit" value="Envoyer" />
    </form>
</body>