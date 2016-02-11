<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
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

		$reponse = $bdd->query('SELECT title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y %H:%i\') AS date FROM billets ORDER BY date DESC LIMIT 0, 5');
		

		while ($donnees = $reponse->fetch())
		{
		?>
			<h3><?php echo $donnees['title'] . ' ' . $donnees['date']; ?></h3>
			
			<div class="news">
				<p><?php echo $donnees['content']; ?></p>
			</div>

		<?php	
			
		}	

		$reponse->closeCursor();

		?>
	</body>
</html>
