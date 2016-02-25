<?php
include('database_connect.php');

$reponse = $bdd->query('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y %H:%i\') AS date FROM billets ORDER BY date DESC LIMIT 0, 5');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<header>
			<?php include('navbar.php'); ?>
		</header>
		
		<div id="content">
			<section>
				<?php
				//Display billet content
				while ($donnees = $reponse->fetch())
				{
					include('billet.php');
					echo '<hr id="hrbillet" />';
				}	
				//End of billet loop
				$reponse->closeCursor();

				?>

                <p id="number_page">Page : </p><a href="index.php?page=1">1</a> <a href="index.php?page=2">2</a>
			</section>
		</div>
	</body>
</html>
