<?php
include('../database_connect.php');

if(!empty($_POST['title_billet'] AND $_POST['content_billet'])) {
	
	$req = $bdd->prepare('INSERT INTO billets(title, content, date_creation) VALUES(?, ?, NOW())');
	$req->execute(array($_POST['title_billet'], $_POST['content_billet']));
	header('Location: index.php');
} else {
	include('error.html');
}
?>