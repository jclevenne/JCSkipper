<?php ob_start(); ?>

<?php
while ($deliveries = $alldeliveries->fetch())
	{ 
?>
	<div class="container-fluid">
			<h3>Delivery from <?php echo $deliveries['Portdeparture'];?> to <?php echo $deliveries['Portarrival'];?></h3>
			<div class="row">
			    <div class="col-sm-4">
			      <span>Distance :</span> <?php echo $deliveries['Distance'];?>
			    </div>
			    <div class="col-sm-4">
			      <span>Journey time :</span> <?php echo $deliveries['Journeytime'];?>
			    </div>
			    <div class="col-sm-4">
			      <span>Pay :</span> <?php echo $deliveries['Cost'];?>
			    </div>
			</div>
			<div class="row">
		    	<div class="col-sm-4">
		      	<span>Yacht name :</span> <?php echo $deliveries['Yachtname'];?>
		    	</div>
		    	<div class="col-sm-4">
		    	  <span>Yacht type :</span> <?php echo $deliveries['Yachttype'];?>
		    	</div>
		    </div>
		    <div class="row">
			    <div class="col-sm-4">
			      <span>Length :</span> <?php echo $deliveries['Yachtlength'];?>
			    </div>
			    <div class="col-sm-4">
			      <span>Year :</span> <?php echo $deliveries['Yachtyear'];?>
			    </div>
			    <div class="col-sm-4">
			      <span>Country of registration :</span> <?php echo $deliveries['Yachtcountry'];?>
			    </div>
			</div>
			<div class="row">
				<button type="button" class="btn btn-jcskipper pull-right">Apply</button>
			</div>
			<hr />
	</div>
<?php
	}

$alldeliveries->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>

<?php $scripts = ob_get_clean(); ?>