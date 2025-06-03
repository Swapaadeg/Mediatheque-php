<?php include('environnement.php') ?>
<?php 
    //Select film
    $request = $bdd->query("SELECT titre, realisateur, genre, duree, id FROM fiche_film");
    while($data = $request->fetch()) {
        echo $data['titre'] . " - " . $data['realisateur'] . " - " . $data['genre'] . " - " . $data['duree'] . "min " . '<a target="_blank" class="btn" href="synopsis.php?id=' .$data['id'] . '">Voir plus</a>' . "<br>" . "<br>";
    }
?>
<body>
</body>
</html>