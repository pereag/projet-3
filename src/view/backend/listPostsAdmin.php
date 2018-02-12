<?php $title = 'Jean Forteroche | Administration: Tableau de bord'; ?>

<?php ob_start(); ?>

<?php require('./src/view/header.php'); ?>

<div class="container">
	<section>
		<h1>Tableau de bord</h1>
		<div class="navigation">
			<div class="row">
				<div class="col-lg-3 "><h2><a href="index.php?action=listPostsAdmin" class="active">Articles</a> | <a href="index.php?action=listCommentsAdmin">Commentaires<a/></h2></div>
			</div>
		</div>
		<div class="articles_admin">
			<div class="row">
					<div class="col-lg-12">
						<h2>Liste des articles</h2>
						<hr>
					</div>
				</div>
			<?php while ($data = $posts->fetch())
			{?>
				<div class="article_admin">
					<div class="row">
						<h3 class="col-lg-3"><a href="index.php?action=modifPostAdmin&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a></h3>
						<div class="description_article_admin">
							<p class="col-lg-5 col-sm-10"><?= htmlspecialchars($data['extract_content']) ?>...</p>
						</div>
						<div class="date_post_admin">
							<div class="col-lg-1">
								<p><?= htmlspecialchars($data['datePost_fr'])?></p>
							</div>
						</div>
						<div class="col-lg-3 col-sm-5 col-xs-8">
							<div class="col-lg-6 col-sm-5 col-xs-5">
								<a href="index.php?action=modifPostAdmin&amp;id=<?= $data['id'] ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-pencil"></span><span class="text_button_admin"> modifier</span></a>
							</div>
							<div class="button_delete_list-post_admin">
								<a href="index.php?action=removePostAdmin&amp;id=<?= $data['id'] ?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span><span class="text_button_admin">Suprimer</span></a>
							</div>
						</div>
					</div>
				</div>
			<?php }
			$posts->closeCursor(); ?>
			<div class="row" id="add_article"> 
			<a href="index.php?action=newPostAdmin" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span><span class="text_button_admin">Ajouter un article</span></a>
			</div>
		</div>
	</section>
</div>

<?php require('./src/view/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('./src/view/template.php'); ?>