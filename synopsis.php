<?php include('environnement.php') ?>

<?php
    $idFilm = htmlspecialchars($_GET['id']);
    $request = $bdd->prepare("SELECT titre, realisateur, genre, duree, synopsis, id 
                            FROM fiche_film 
                            WHERE id = :id ");
    $request->execute(['id' => $idFilm]);
    $data = $request->fetch();
    echo $data['titre'] . " - " . $data['realisateur'] . " - " . $data['genre'] . " - " . $data['duree'] . "min " . $data['synopsis'] . "<br>" . "<br>";
?>

<?php

?>
<body>
    <h2>Synopsis</h2>
    <a target="_blank" class="btn" href="modifier.php?id=<?php echo $data['id']; ?>">Modifier</a>

    <a href=""type="supprimer">Supprimer</a>
</body>




