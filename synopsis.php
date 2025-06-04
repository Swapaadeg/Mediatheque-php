<?php include('environnement.php') ?>

<body>
    <h2>FICHE FILM</h2>
    <?php
        $idFilm = htmlspecialchars($_GET['id']);
        $request = $bdd->prepare("SELECT fiche_film.*, user.nom, user.prenom 
                                  FROM fiche_film 
                                  JOIN user ON fiche_film.user_id = user.id
                                  WHERE fiche_film.id = :id");
        $request->execute(['id' => $idFilm]);
        $data = $request->fetch();
        echo $data['titre'] . " <br> " . $data['realisateur'] . " <br>  " . $data['genre'] . " <br>  " . $data['duree'] . "min " . "<br>" .$data['synopsis'] . "<br>" . "<br>";
        echo 'créé par ' . htmlspecialchars($data['prenom']) . "<br>";
    ?>

<a class="btn" href="modifier.php?id=<?php echo $data['id']; ?>">Modifier</a><br>
<a class="btn" href="delete.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce film ?')">Supprimer</a><br>

</body>




