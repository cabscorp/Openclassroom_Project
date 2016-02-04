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

		<p>La chaîne de caractère crypté est :</p>
			<?php
				if (isset($_POST['crypt'])) {
					
					echo '<p>' . sha1($_POST['crypt']) . '</p>';
				}
			?>
	</body>
</html>