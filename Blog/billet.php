<h3><?php echo strip_tags($donnees['title']) . ' ' . $donnees['date']; ?></h3>
<div class="news">
	<p>	
		<?php echo nl2br(strip_tags($donnees['content'])); ?>
		<br />
		<a href="commentary.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a>
	</p>
</div>