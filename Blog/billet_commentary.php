<h3><?= strip_tags($donnees['title']) . ' ' . $donnees['date'] ?></h3>
<div class="news">
	<p>	
		<?= nl2br(strip_tags($donnees['content'])) ?>
		<br />
	</p>
</div>