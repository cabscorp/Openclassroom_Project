<?php
try 
{
    
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

catch(Exception $e) {
    
    die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO commentary(id_billet, autor, content, date_commentary) VALUES (:id_billet, :autor, :content, NOW())');
$req->execute(array('id_billet' => $_POST['billet_id'], 'autor' => $_POST['auteur'], 'content' => $_POST['commentary_new']));
$req->closeCursor();
$i = $_POST['billet_id'];

header('Location: commentary.php?billet=' . $_POST['billet_id']);
?>