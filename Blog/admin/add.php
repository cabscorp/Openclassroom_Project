<?php
try {
	
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', 
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e) {
	
	die('Erreur : '.$e->getMessage());
}

if(!empty($_POST['title_billet'] AND $_POST['content_billet'])) {
	
	$req = $bdd->prepare('INSERT INTO billets(title, content, date_creation) VALUES(?, ?, NOW())');
	$req->execute(array($_POST['title_billet'], $_POST['content_billet']));
	header('Location: index.php');
} else {
	include('error.html');
}
?>