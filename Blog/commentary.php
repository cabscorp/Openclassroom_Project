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
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }
                catch(Exception $e)
                {
                        die('Erreur : '.$e->getMessage());
                }

                //Open first request (Display billet)
                $req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y %H:%i\') AS date FROM billets WHERE id = ?');
                $req->execute(array($_GET['billet']));

                $donnees = $req->fetch();

                //See if billet exist
                if(!empty($donnees)){
                    
                    //Display billet
                    include('billet_commentary.php');

                //Close first request
                $req->closeCursor();
                
                //Open second request (Display commentary)
                echo '<h2>Commentaires</h2>';

                }else {
                    
                    echo "<p>Ce billet n'existe pas.</p>";
                }
                
                $req = $bdd->prepare('SELECT autor, content, DATE_FORMAT(date_commentary, \'%d/%m/%Y à %H:%i\') AS date FROM commentary WHERE id_billet = ?');
                $req->execute(array($_GET['billet']));
                
                while($donnees = $req->fetch()) {
                ?>

                <h4><?php echo htmlspecialchars($donnees['autor']) . ' ' . $donnees['date']; ?></h4>
                <p><?php echo htmlspecialchars($donnees['content']); ?></p>

                <?php
                
                }

                ?>

                <p><a href="index.php">Retour à la liste des billets</a></p>
            </section>
        </div>
    </body>
</html>