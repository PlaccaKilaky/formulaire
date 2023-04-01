<?php 
include("connexion.php");
if(isset($_POST["nom"])){

    extract($_POST);//extrait les donnees en variables
    
    $sqlQuery='INSERT INTO kilaky(
    Nom,
    prenom,
    email,
    mot_de_passe) VALUES (?,?,?,?)';
    
    $insert_placca=$pdo->prepare($sqlQuery);
    
    $insert_placca->execute([$nom,$prenom,$email,$mot_de_passe]);
    
    //header("Location: ajouter.php");
    
    }
    $recuperation = $pdo->query("SELECT * FROM kilaky");
    $donnees = $recuperation->fetchAll(PDO::FETCH_OBJ);

    if(isset($_GET['id_kilaky'])){
        $reponse = $pdo->query("DELETE FROM kilaky WHERE id='".$_GET['id_kilaky']."'");
        header("Location: index.php");
    }
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
    <form  action="index.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenom">prenom :</label>
        <input type="text" id="prenom" name="prenom" requiered><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" requiered><br>
         <label for="mot_de_passe">Mot de passe</label>
        <input type="mot_de_passe" id="mot_de_passe" name="mot_de_passe" requiered><br>
        <input type="submit" value="S'inscrire">

        <table borde=1>
        <tr>
            <th>Nom</th>
            <th>prenom</th>
            <th>email</th>
            <th>mot_de_passe<th>
        </tr>
        <?php foreach($donnees as $value){?>
        <tr>
            <td> <?php echo $value->Nom;?></td>
            <td> <?php echo $value->prenom;?></td>
            <td> <?php echo $value->email;?></td>
            <td> <?php echo $value->mot_de_passe;?></td>
            <td> <a href="index.php?id_kilaky=<?php echo $value->id; ?>">Supprimer</a></td>
            <td> <a href="modifier.php?id_kilaky=<?php echo $value->id; ?>">modifier</a></td>
        </tr>
     <?php }?>
        </table>
</form>
</body>
</html>