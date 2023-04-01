<?php 
include("connexion.php");
if(isset($_POST["nom"])){

    }
    $recuperation = $pdo->query("SELECT * FROM kilaky");
    $donnees = $recuperation->fetchAll(PDO::FETCH_OBJ);
    extract($_POST);//extrait les donnees en variables

$update=$pdo->query("UPDATE kilaky SET Nom='".$Nom"',
 prenom='"$prenom."',
 email='"$email."',
 WHERE id_kilaky='".$_GET['id']."'")

header("Location: modifier.php");
   

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petit formulaire</title>
</head>
<body>
    <form  action="modifier.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenom">prenom :</label>
        <input type="text" id="prenom" name="prenom" requiered><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" requiered><br>
         <label for="mot_de_passe">Mot de passe</label>
        <input type="mot_de_passe" id="mot_de_passe" name="mot_de_passe" requiered><br>
        <input type="submit" value="Modifier">
</form>
</body>
</html>