
<?php $title = 'Jean Forteroche | Page d\'acceuil'; ?>

<?php ob_start(); ?>

<?php require('header.php'); ?>
<div class="container">
	<section>
		<div class="row">
			<h1 class="col-lg-12">Blog personnel dédier à mon nouveau livre</h1>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<img src="public/picture/alaska_banner.jpg" class="alaska_banner">
			</div>
		</div>
		<div class="article_list">
			<div class="row">
				<div class="col-lg-12">
					<h2>Billet simple pour l'Alaska</h2>
					<hr>
				</div>
			</div>
			<?php while ($data = $posts->fetch())
			 {?>
				<div class="article">
					<a href="index.php?action=postView&amp;id=<?= $data['id'] ?>">
						<div class="row">
							<h3 class="col-lg-12"><?= htmlspecialchars($data['title']) ?></h3>
						</div>
						<div class="row">
							<p class="col-lg-9"><?= htmlspecialchars($data['extract_content']) ?>...</p>
							<ul class="list-unstyled col-lg-2">
								<li><?= htmlspecialchars($data['datePost_fr']) ?></li>
								<li>Jean Forteroche</li>
							</ul>
						</div>
					</a>
				</div>
			<?php }
			$posts->closeCursor(); ?>
		</div>
	</section>
</div>
<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
