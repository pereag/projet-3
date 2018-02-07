<?php $title = 'Jean Forteroche | Envois du nouveau mot de passe'; ?>

<?php ob_start(); ?>

<?php require('header.php'); ?>
<div class="container">
	<section>
		<div class="col-lg-offset-3 col-lg-6"">
			<h1>Mot de passe oublier</h1>
			<div class="form">
				<div class="form-group">
	      			<label for="texte">Email: </label>
	     			<input id="text" type="text" class="form-control" width="200px";>
	   			</div>
	   			<button class="btn btn-default" type="button">Valider</button>
				</div>
			</div>
	</section>
</div>
<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>