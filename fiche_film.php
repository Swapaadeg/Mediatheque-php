<?php include('environnement.php')?>

<?php 
    //Select film
    $request = $bdd->query("SELECT titre, realisateur, genre, duree, id
                            FROM fiche_film");
    while($data = $request->fetch()) {
        $duree = $data['duree'];
        $heure = floor($duree / 60);
        $resteMinutes = $duree % 60;
        echo $data['titre'] . " - " . $data['realisateur'] . " - " . $data['genre'] . " - " . $heure . "h" . $resteMinutes . "min" . '<a class="btn" href="synopsis.php?id=' .$data['id'] . '">Voir plus</a>' . "<br>" . "<br>";
    }
?>
