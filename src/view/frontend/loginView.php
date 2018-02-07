<?php $title = 'Jean Forteroche | Portail de connexion'; ?>

<?php ob_start(); ?>

<?php require('header.php'); ?>
<div class="container">
	<section>
		<div class="col-lg-offset-3 col-lg-6">
			<h1>portail de connexion</h1>
			<div class="form">
				<div class="form-group">
	      			<label for="texte">pseudo: </label>
	     			<input id="text" type="text" class="form-control" width="200px";>
	   			</div>
	   			<div class="form-group">
	      			<label for="texte">Mot de passe: </label>
	     			<input id="text" type="password" class="form-control">
	   			</div>
	   			<a href="index.php?action=listPostsAdmin"><button class="btn" btn-default" type="button">Valider</button><a/>
				</div>
			</div>
	</section>
</div>

<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>