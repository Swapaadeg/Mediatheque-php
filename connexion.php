<?php include('environnement.php') ?>
<?php
    if(!empty($_POST['name']) && !empty($_POST['prenom'] && !empty($_POST['mdp']))) {
        $entryName = htmlspecialchars($_POST['name']);
        $entryPrenom = htmlspecialchars($_POST['prenom']);
        $entryPassword = htmlspecialchars($_POST['mdp']);

        $request = $bdd->prepare("SELECT id, nom, prenom, mdp 
                                FROM user 
                                WHERE nom = :nom
                                AND prenom = :prenom"); //Pas besoin de mettre 2 champs (email ou pseudo en général)
        $request->execute(array(
            'nom'=>$entryName, 
            'prenom' => $entryPrenom
        ));
        $data = $request->fetch();

        if(password_verify($entryPassword,$data['mdp'])){
            $_SESSION['user'] = [$data['prenom'], $data['nom']];
            $_SESSION['userid'] = $data['id'];
            header('location:index.php');
        }else{
            echo '<p class="error">Entrées incorrectes<p>';
        }
    }
?>

<body>
    <h2>Connexion</h2>
    <form id="auth" action="connexion.php" method='POST'>
        <label id="name">Votre nom</label>
        <input type="text" name="name" id="name">
        <label id="prenom">Votre nom</label>
        <input type="text" name="prenom" id="prenom">
        <label id="mdp">Votre mot de passe</label>
        <input type="password" name="mdp" id="mdp">
        <button>Valider</button>
    </form>
</body>
</html>