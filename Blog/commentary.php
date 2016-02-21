<?php
try {
    
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e) {
    
    die('Erreur : '.$e->getMessage());
}

//Open first request (Display billet)
$req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y %H:%i\') AS date FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
//Close first request
$req->closeCursor();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
        
    <body>
        <div id="content">
            <section>
                <?php
                
                //See if billet exist
                if (!empty($donnees)) {
                    
                    //Display billet
                    include('billet_commentary.php');

                    //Open second request (Display commentary)
                    echo '<hr /><h2>Commentaires</h2>';

                    
                    $req = $bdd->prepare('SELECT autor, content, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %H:%i\') AS date FROM commentary WHERE id_billet = ?');
                    $req->execute(array($_GET['billet']));

                    while($donnees = $req->fetch()) {
                    ?>

                        <h4><?php echo htmlspecialchars($donnees['autor']) . ' ' . $donnees['date']; ?></h4>
                        <p><?php echo htmlspecialchars($donnees['content']); ?></p>

                    <?php
                    } 
                    ?>
                     
                     <br />

                    <form action="commentary_post.php" method="post">
                        <label for="auteur">Nom : </label><input type="text" name="auteur" id="auteur" /><br /><br />
                        <label for="commentary_new" id="labelcommentary">Poster un commentaire :</label><br />
                        <textarea name="commentary_new" id="commentary_new" rows="8" cols="50"></textarea><br />
                        <input type='hidden' name="billet_id" value='<?php echo $_GET['billet'] ?>' >
                        <input type="submit" value="Envoyer" />
                    </form>

                    <?php
                    
                    } else {
                        
                        echo "<h4>Ce billet n'existe pas.</h4>";
                    }
                    
                    $req->closeCursor();

                    ?>
                <p><a href="index.php">Retour à la liste des billets</a></p>
            
            </section>
        </div>
    </body>
</html>