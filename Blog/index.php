<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
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

				$reponse = $bdd->query('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y %H:%i\') AS date FROM billets ORDER BY date DESC LIMIT 0, 5');

				//Display billet content
				while ($donnees = $reponse->fetch())
				{
					include('billet.php');
				}	
				//End of billet loop
				$reponse->closeCursor();

				?>
			</section>
		</div>
	</body>
</html>
