<h3><?php echo htmlspecialchars($donnees['title']) . ' ' . $donnees['date']; ?></h3>
<div class="news">
	<p>	
		<?php echo nl2br(htmlspecialchars($donnees['content'])); ?>
		<br />
	</p>
</div>