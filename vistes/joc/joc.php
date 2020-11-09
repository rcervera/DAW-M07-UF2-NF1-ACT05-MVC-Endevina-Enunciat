<div class="container"> 
	
	<h2>Endevina número entre 1 i <?php echo $maxim; ?></h2>
	
	
	<form method="POST" action="index.php?control=ControlEndevinar&operacio=validar">

		<div class="form-group">
			<div class="progress" style="height: 30px;">
				  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $intents; ?>"
				  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($intents*100/$maxintents); ?>%">
				   <?php echo $intents." intents"; ?>
				  </div>
			</div> 
		</div>

		<div class="form-group">
			 <label>Entra un Número</label>
			 <input type="text" name="numero" class="form-control">
		</div>

		<div class="form-group row">
    		<div class="col-sm-10">
      			<button type="submit" class="btn btn-primary">Endevina!</button>
   			</div>
 		 </div>
		
	</form>

	<?php
	  if ($estat==0) echo '<div class="alert alert-info">';
	  if ($estat==1) echo '<div class="alert alert-success"">';
	  if ($estat==2) echo '<div class="alert alert-danger">';
		 echo $missatge; 
	  echo '</div>';
	?>
</div>