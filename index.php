<?php include('environnement.php') ?>
<?php 
    //Select film
    $request = $bdd->query('SELECT titre, realisateur, genre, duree, id FROM fiche_film ORDER BY id DESC LIMIT 3');
    while($data = $request->fetch()) {
        echo $data['titre'] . " - " . $data['realisateur'] . " - " . $data['genre'] . " - " . $data['duree'] . "min " . '<a target="_blank" class="btn" href="synopsis.php?id=' .$data['id'] . '">Voir plus</a>'."<br>". "<br>";
    }

?>
<body>
    <?php
        echo $_SESSION['user'] ? "Bonjour " . $_SESSION['user'][0]: "";
    ?> 
    <form action="film.php" method="post">
        <button type="submit">Ajouter un film</button>
    </form>

    <form action="fiche_film.php">
        <button type="submit">Voir tous les films</button>
    </form>
</body>
</html>