<?php
try 
{
    
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

catch(Exception $e) {
    
    die('Erreur : '.$e->getMessage());
}

if (!empty($_POST['auteur'] AND $_POST['commentary_new'])) {
	
	$req = $bdd->prepare('INSERT INTO commentary(id_billet, autor, content, date_commentary) VALUES (:id_billet, :autor, :content, NOW())');
	$req->execute(array('id_billet' => $_POST['billet_id'], 'autor' => $_POST['auteur'], 'content' => $_POST['commentary_new']));
	$req->closeCursor();

	header('Location: commentary.php?billet=' . $_POST['billet_id']);

} else {
?>

<script type="text/javascript">
	alert('Veuillez rentrer un nom et un commentaire !');
</script>

<?php
}

?>