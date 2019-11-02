<?php ob_start(); ?>

<?php
while ($skippers = $allskippers->fetch())
	{ 
?>
	<div class="container-fluid">
			<h3> <?php echo $skippers['Firstname'];?> <?php echo $skippers['Lastname'];?></h3>
			<hr />
	</div>
<?php
	}

$allskippers->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>

<?php $scripts = ob_get_clean(); ?>