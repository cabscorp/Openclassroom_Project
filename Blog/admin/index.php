<?php
include('../database_connect.php');

$req = $bdd->query('SELECT id, title, content FROM billets ORDER BY date_creation DESC');
$req2 = $bdd->query('SELECT id, title FROM billets ORDER BY date_creation DESC');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Administration</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	</head>
	<body>
		<header>
			<?php include('../navbar.php') ?>
		</header>
		
		<section class="content">
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
						
						echo '<option data-id=' . $donnees['id'] . '>' . $donnees['title'] . '</option>';
					}
					?>
				</SELECT>
				<br/><br/>
				<label for="new_title">Nouveau titre : </label><input type="text" name="new_title" id="new_title" value=""></input>
				<br/>
				<br/>
				<label for="new_content">Contenu :</label>
				<br/>
				<br/>
				<textarea rows="10" cols="70" name="new_content" id="new_content"></textarea>
				<br/>
				<input type="submit" value="Envoyer"/>
			</form>

			<!--  ZOne a supprimer apres les test -->
			<div id='log'>
			</div>

			<br/>
			<hr/>

			<!-- Delete billet -->
			<h2>Supprimer un billet</h2>
			<form method="post" action="delete.php">
				<label for="billettodelete">Billet à supprimer :<span style="color:red;">*</span></label>
				<SELECT name="billettodelete" id="billettodelete">
					<?php
					while($donnees2 = $req2->fetch()) {
						
						echo '<option>' . $donnees2['title'] . '</option>';
					}
					?>
				</SELECT>
				<input type="submit" value="Supprimer"/>
				<p style="color:red;">*Attention, cette action est irréversible !</p>	
			</form>
		</section>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="../js/main.js"></script>
	</body>
</html>