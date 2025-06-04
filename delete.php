<?php
include('environnement.php');

$id = (int) $_GET['id'];
$userId = $_SESSION['userid'];

// Vérifie si le film appartient à l'utilisateur
$req = $bdd->prepare("SELECT * 
                    FROM fiche_film 
                    WHERE id = :id 
                    AND user_id = :user_id");
$req->execute(['id' => $id, 'user_id' => $userId]);
$data = $req->fetch();

if (!$data) {
    echo("Suppression non autorisée.");
}

// Supprime le film
$delete = $bdd->prepare("DELETE FROM fiche_film 
                        WHERE id = :id 
                        AND user_id = :user_id");
$delete->execute(['id' => $id, 'user_id' => $userId]);

?>