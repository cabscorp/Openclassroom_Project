<?php
	//Start session
 	session_start();

	//Check if pseudo and message exist
	if(isset($_POST['pseudo'], $_POST['message']) && $_POST['pseudo'] && $_POST['message']) {
		
		// Db connexion
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', 
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}

		//Insert pseudo and message in db
		$req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(?, ?)');
		$req->execute(array($_POST['pseudo'], $_POST['message']));

		$req->closeCursor();
		
		//Define session pseudo
		$_SESSION['i'] = $_POST['pseudo'];
		
		//Redirect to chat
		header('Location: index.php');
	} else {
		//Else print error message
		echo 'Veuillez rentrer un message ainsi qu\'un pseudo !';
	}

?>