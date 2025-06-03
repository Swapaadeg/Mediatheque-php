<?php include('environnement.php') ?>
<?php

//Create
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mdp'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']); 
    $password = htmlspecialchars($_POST['mdp']);
    $passwordArgon = password_hash($password,PASSWORD_ARGON2I);
    $create = $bdd->prepare('INSERT INTO user(prenom,nom,mdp) VALUES(?, ?, ?)');
    $data = $create->execute(array($prenom, $nom, $passwordArgon));
    }
?>
<body>
    <form action="inscription.php" method="post" >
        <input type="text" name="nom" placeholder="Votre nom">
        <input type="text" name="prenom" placeholder="Votre prénom">
        <input type="password" name="mdp" placeholder="Mot de passe">
        <button type="submit" href="index.php">S'inscrire</button>
    </form>
</body>
</html>