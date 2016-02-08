<!DOCTYPE html>
<html>
	<head>
		<title>Hashage Sha1</title>
		<meta charset='utf-8'/> 
	</head>
	<body>
		<form action="index.php" method="post">
			<input type="text" name="cryptsha1" />
			<input type="submit" value="Crypter !"/>
		</form>

		<p>Le hash Sha1 est :</p>
			<?php
				if (isset($_POST['cryptsha1']) && $_POST['cryptsha1']) {
					
					echo '<p>' . sha1($_POST['cryptsha1']) . '</p>';
				}
			?>

		<form action="index.php" method="post">
			<input type="text" name="cryptmd5" />
			<input type="submit" value="Crypter !"/>
		</form>

		<p>Le hash Md5 est :</p>
			<?php
				if (isset($_POST['cryptmd5']) && $_POST['cryptmd5']) {
					
					echo '<p>' . md5($_POST['cryptmd5']) . '</p>';
				}
			?>
	</body>
</html>
