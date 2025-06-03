<?php include('environnement.php') ?>
<body>     
<!-- AFFICHAGE -->
    <h2>FICHE FILM</h2>
    <?php
        $idFilm = htmlspecialchars($_GET['id']);
        $request = $bdd->prepare("SELECT *
                                FROM fiche_film 
                                WHERE id = :id ");
        $request->execute(['id' => $idFilm]);
        $data = $request->fetch();
        echo $data['titre'] . " <br> " . $data['realisateur'] . " <br>  " . $data['genre'] . " <br>  " . $data['duree'] . "min " . "<br>" .$data['synopsis'] . "<br>" . "<br>";
    ?>

    <!-- Suppression -->
    <?php
    $id = $_GET['id'];

    //DELETE
        $delete = $bdd->prepare("DELETE FROM fiche_film
                                WHERE id = :id");

        $delete->execute(array(
        'id' => $id,
        ));


        header("Location: film.php");
    ?>
</body>