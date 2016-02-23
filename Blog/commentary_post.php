<?php
include('database_connect.php');

if (!empty($_POST['auteur'] AND $_POST['commentary_new'])) {
	
	$req = $bdd->prepare('INSERT INTO commentary(id_billet, autor, content, date_commentary) VALUES (:id_billet, :autor, :content, NOW())');
	$req->execute(array('id_billet' => $_POST['billet_id'], 'autor' => $_POST['auteur'], 'content' => $_POST['commentary_new']));
	$req->closeCursor();

	header('Location: commentary.php?billet=' . $_POST['billet_id']);

} else {

	echo '<p>Veuillez saisir un commentaire</p>';
}

?>