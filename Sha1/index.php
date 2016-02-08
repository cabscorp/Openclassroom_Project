<!DOCTYPE html>
<html>
	<head>
		<title>Hashage Sha1</title>
		<meta charset='utf-8'/> 
	</head>
	<body>
		<form action="index.php" method="post">
			<input type="text" name="crypt" />
			<input type="submit" value="Crypter !"/>
		</form>

		<p>Le hash Sha1 est :</p>
			<?php
				if (isset($_POST['crypt']) && $_POST['crypt']) {
					
					echo '<p>' . sha1($_POST['crypt']) . '</p>';
				}
			?>
	</body>
</html>
