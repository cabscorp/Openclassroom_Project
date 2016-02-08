<?php

session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>ShortChat</title>
		<meta charset='utf-8'/>
		<style type="text/css">
		p, h2{
			text-align: center;
		}
		a{
			display: block;
			text-align: center;
		}
		</style>
	</head>
	<body>
		<form action="action.php" method="post" style="text-align: center;">
			<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo" value="<?php if (!empty($_SESSION['i'])){
				echo $_SESSION['i'];
			} ?>" />
			<br/><br/>
			<label for="message">Message : </label><input type="text" name="message" id="message" /><br/><br/>
			<input type="submit" value="Envoyer"/>
		</form>
		<h2>Dernier message :</h2>
		<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', 
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}

		$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');
		

		while ($donnees = $reponse->fetch())
		{
		?>
			<p>
				<?php echo '<b>' . htmlspecialchars($donnees['pseudo']) . '</b>' . ' : ' . htmlspecialchars($donnees['message']); ?>
			</p>
		<?php	
			
		}	

		$reponse->closeCursor();
		echo '<p>Votre adresse Ip ' . $_SERVER['REMOTE_ADDR'] . ' est enregistré pour des questions de sécurité.</p>';
		?>
		<a href="index.php">Rafraîchir</a>
	</body>
</html>