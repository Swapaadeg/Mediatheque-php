<?php include('environnement.php') ?>
<?php
    //Create fiche film
    if(!empty($_POST['titre']) && !empty($_POST['realisateur']) && !empty($_POST['genre']) && !empty($_POST['duree']) && !empty($_POST['synopsis']) && !empty($_POST['img'])) {
        $titre = htmlspecialchars($_POST['titre']);
        $realisateur = htmlspecialchars($_POST['realisateur']); 
        $genre = htmlspecialchars($_POST['genre']); 
        $duree = htmlspecialchars($_POST['duree']); 
        $synopsis=htmlspecialchars($_POST['synopsis']);
        $create = $bdd-> prepare('INSERT INTO fiche_film(titre,realisateur,genre,duree,synopsis,img) VALUES(?, ?, ?, ?,?,?)');
        $data = $create->execute(array($titre, $realisateur, $genre, $duree, $synopsis, $img));
        echo "<h3>Votre film a été ajouté</h3>";
    }
?>
    <?php
        if(isset($_FILES['upload'])){
            $imageName = $_FILES['upload']['name'];
            $imageInfo = pathinfo($imageName);
            $imageExt = $imageInfo['extension'];
            // Tableau qui va permettre de spécifier les extensions autorisées
            $autorizedExt = ['png','jpeg','jpg','webp','bmp','svg'];

            // Verification de l'extention du fichier
            
            if(in_array($imageExt,$autorizedExt)){
                $uniqueName = time() . rand(1,1000) . "." . $imageExt;
                move_uploaded_file($_FILES['upload']['tmp_name'],"assets/img/".$uniqueName);
            
            }else{
                echo "<p>Veuillez choisir un format de fichier valide(png,jpg,webp,bmp,svg)</p>";
            }
        }

        // Affichage de l'image après l'upload
        if(isset($uniqueName)){
            echo "<img src=img/" . $uniqueName . "' alt=''>";
        }
    ?>

<body>
    <form action="film.php" method="post" enctype="multipart/form-data">
        <label for="titre">Titre</label><br>
        <input type="text" name="titre"><br>
        <label for="realisateur">Realisateur</label><br>
        <input type="text" name="realisateur"><br>
        <label for="genre">Genre</label><br>
        <input type="text" name="genre"><br>
        <label for="duree">Durée</label><br>
        <input type="text" name="duree"><br>
        <label for="message">Synopsis</label><br>
        <textarea type="message" name="synopsis"></textarea>
        <br><br>
        <label for="upload">Image du film</label><br>
        <input type="file" name="upload">
        <button>Upload</button><br>
        <br>
        <button type="submit">Ajouter un film</button>
    </form>
</body>
</html>