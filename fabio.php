<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylefabio.css">
    <script src="assets/js/script.js"></script>
    <title>Base de données reliée : MDS SPERINI</title>
</head>
<body>

<?php

echo '<h1 style="text-align:center;"> Hello World </h1>';

if(isset($_POST["envoie"])){
    if(isset($_POST["rights"])){
        if($_POST["mail"]!="" || $_POST["message"]!="" || $_POST["phone"]!="" || $_POST["lastName"]!=""){
            echo "<em style='color: green;'>Infos Envoyées ! </em>";

            if(isset($_POST['rights'])){
                if(!isset($_POST['mail'])){
                    $_POST['mail']='';
                }   
                $addresseMail = $_POST["mail"];
                $message = $_POST["message"];
                $phone = $_POST["phone"];
                $nom = $_POST["lastName"];
                $bdd = new PDO('mysql:host=exmachinefmci.mysql.db; dbname=exmachinefmci; charset=utf8', 'exmachinefmci', 'carp310M');
            
                $result = $bdd->prepare('INSERT INTO mdsSPERINI (mail, message, phone, nom) VALUES (:addresseMail, :message, :phone, :nom)');
                $result->execute(array('addresseMail' => $addresseMail, "message" => $message, "phone" =>$phone, "nom" =>$nom));
            }
            

        }
            echo "<em style='color: red;'>Aucunes infos entrées! </em>";

    }
}

/*
if(isset($_POST['rights'])){
    if(!isset($_POST['mail'])){
        $_POST['mail']='';
    }   
    $addresseMail = $_POST["mail"];
    $message = $_POST["message"];
    $phone = $_POST["phone"];
    $nom = $_POST["lastName"];
    $bdd = new PDO('mysql:host=exmachinefmci.mysql.db; dbname=exmachinefmci; charset=utf8', 'exmachinefmci', 'carp310M');

    $result = $bdd->prepare('INSERT INTO mdsSPERINI (mail, message, phone, nom) VALUES (:addresseMail, :message, :phone, :nom)');
    $result->execute(array('addresseMail' => $addresseMail, "message" => $message, "phone" =>$phone, "nom" =>$nom));
}
*/

?>


    <form class="shadow" action="#" method="post" name="contact">
    <!-- onsubmit="return isMessageSet()"-->

    <input type="text" maxlength="12" placeholder="Votre Nom" name="lastName" autofocus autocapitalize="on" placeholder="Votre Nom">
    <input type="email" name="mail" placeholder="Votre Email">
    <input type="tel" name="phone" placeholder="Votre N°" minlength="10" maxlength="10">

    <textarea name="message" cols="30" rows="10" placeholder="Votre message"></textarea>

    <div>
        <input type="checkbox" name="rights"><label for="rights">En cochant cette case je consens à donner mes informations</label>
    </div>
        <input type="submit" value="Envoyer" name="envoie">
    </form>

    <a href="index.html"><img src="assets/img/1f519.png" alt="Retour" width="50px" height="50px"></a>

</body>
</html>