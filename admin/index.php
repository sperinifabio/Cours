<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice - Fabio</title>
</head>
<body>
    <h1>Liste des mails</h1>

    <?php
    $id=$_GET["id"];
    $db = new PDO('mysql:host=exmachinefmci.mysql.db; dbname=exmachinefmci; charset=utf8', 'exmachinefmci', 'carp310M');
    $select=$db->query("SELECT * FROM mdsSPERINI");
    $suppression=$db->query("DELETE FROM mdsSPERINI WHERE id='$id'");

    if(!empty($_GET)){
        header("location:index.php");
    }
    
    ?>

    <ul>
        <?php 
        while($i=$select->fetch()){
        ?>

        <li><?=$i["mail"];?> <a href="#" name="change">Modifier</a> <a href="index.php?id=<?=$i['id'];?>" name="delete">Supprimer</a></li><?php }?></li>
        
        
    </ul>
</body>
</html>