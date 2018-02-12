<?php $title = 'Jean Forteroche | Portail de connexion'; ?>

<?php ob_start(); ?>

<?php require('./src/view/header.php'); ?>
<div class="container">
	<section>
		<div class="col-lg-offset-3 col-lg-6">
			<h1>Portail de connexion</h1>
			<form action="index.php?action=verifyLogin" method="post" class="add_comment">
				<div class="form">
					<div class="form-group">
		      			<label for="texte">Pseudo: </label>
		     			<input id="pseudo" type="text" name="pseudo" class="form-control" width="200px";>
		   			</div>
		   			<div class="form-group">
		      			<label for="texte">Mot de passe: </label>
		     			<input id="text" type="password" name="password" class="form-control">
		   			</div>
		   			<button  class="btn btn-default" type="submit">Valider</button>
					</div>
				</div>
			</form>
	</section>
</div>

<?php require('./src/view/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('./src/view/template.php'); ?>