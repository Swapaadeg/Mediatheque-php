<?php ob_start(); 
$bdd = new PDO('mysql:host=mysql;dbname=mediatheque;charset=utf8', 'root', 'root');
//Create
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['prenom'])) {
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']); 
$mdp = htmlspecialchars($_POST['mdp']);
$create = $bdd->prepare('INSERT INTO user(prenom,nom, mdp) VALUES(?, ?, ?)');
$data = $create->execute(array($prenom, $nom, $mdp));
}

$passwordCrypted = sha1(sha1($mdp));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post" >
        <input type="text" name="nom" placeholder="Votre nom">
        <input type="text" name="prenom" placeholder="Votre prénom">
        <input type="text" name="mdp" placeholder="Mot de passe">
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>