<?php
include('../database_connect.php');

$req = $bdd->query('SELECT id, title, content FROM billets ORDER BY date_creation DESC');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Administration</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	</head>
	<body>
		<section id="content">
			<!-- Add billet -->
			<h2>Ajouter un nouveau billet</h2><br/>
			<form action="add.php" method="post">
				<label for="title_billet">Titre du billet : </label>
				<input type="text" name="title_billet" id="title_billet"/>
				<br/><br/>
				<label for="content_billet">Contenu : </label>
				<br/><br/>
				<textarea name="content_billet" id="content_billet" rows="10" cols="70"></textarea>
				<br/>
				<input type="submit" value="Poster"/>
			</form>

			<br/>
			<hr/>

			<!-- Update billet -->
			<h2>Modifier un billet</h2><br/>
			<form method="post" action="update.php">
				<label for="actual_title">Titre actuel : </label>
				<SELECT name="selected_title" id="actual_title">
					<?php
					while($donnees = $req->fetch()) {
						
						echo '<option>' . $donnees['title'] . '</option>';
					}
					?>
				</SELECT>
				<label for="new_title">Nouveau titre : </label><input type="text" name="new_title" id="new_title" value="<?php echo $donnees['title'];?>"></input>
				<br/>
				<br/>
				<textarea rows="10" cols="70" name="new_content"></textarea>
				<br/>
				<input type="submit" value="Envoyer"/>
			</form>
		</section>
	</body>
</html>