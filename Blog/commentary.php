<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
        
    <body>
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        $req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y %H:%i\') AS date FROM billets WHERE id = ?');
        $req->execute(array($_GET['billet']));

        $donnees = $req->fetch();

        //Display billet
        include('billet_commentary.php');

        $req->closeCursor();
        ?>
        <p><a href="index.php">Retour à la liste des billets</a></p>
    </body>
</html>