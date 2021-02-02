<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/index.css">

    <title>Ajouter un coiffeur - Fabio</title>
</head>

<body>

    <h1>Ajout de coiffeur</h1>

    <?php

$coiffeurAjouter= $_POST["coiffeur"];
$id=$_GET["id"];
$db = new PDO('mysql:host=exmachinefmci.mysql.db; dbname=exmachinefmci; charset=utf8', 'exmachinefmci', 'carp310M');
$suppression=$db->query("DELETE FROM coiffeurSPERINI WHERE id='$id'");

if(isset($_POST["envoi"])){
    $result=$db->prepare("INSERT INTO coiffeurSPERINI (coiffeur) VALUES (:coiffeurAjouter)");
    $result->execute(array("coiffeurAjouter" => $coiffeurAjouter));
}

    $coiffeurs=$db->query("SELECT * FROM coiffeurSPERINI");
    
if(!empty($_GET)){
    header("location:ajout.php");
}

?>

    <form action="ajout.php" method="post">

        <input type="text" name="coiffeur">
        <input type="submit" value="envoi" name="envoi">


    </form>

    <h2>Liste des coiffeurs</h2>

    <ul class="vw10 no-padding">
        <?php
        while($i=$coiffeurs->fetch()){
        ?>        
            <li class="flex space-around no-margin no-decoration"><?=$i["coiffeur"];?> <a href="#" name="change">Modifier</a> <a href="ajout.php?id=<?=$i['id'];?>" name="delete">Supprimer</a></li><?php }?>
        
        
        
    </ul>


</body>

</html>