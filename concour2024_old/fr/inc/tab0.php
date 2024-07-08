<div class="wizard-input-section">
	<h3 style="text-align: center; font-weight: bold; margin-top: 1rem">Veuillez choisir un centre d'examen</h3>
	<section class="myRadio row">
		<?php
			$stmt = $conn->prepare('SELECT * FROM centres WHERE active = true');
	      	$stmt->execute();
	      	$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
	      	foreach ($results as $row) { ?>
	        	<div class="col-sm-3" style ="margin-bottom:15px">
				  <input type="radio" id="centre_exam_0<?php echo $row['id'] ?>" name="centre_exam" value="<?php echo $row['id'] ?>" >
				  <label for="centre_exam_0<?php echo $row['id'] ?>">
				    <h5><?php echo $row['nom'] ?></h5>		    
				  </label>
				</div>
		    <?php
	      	}
		?>

	</section>
	<div class="input-group">
		<h4 style="text-align: center; font-weight: bold; margin-top: 1rem">Centre d'examen préféré</h4>    
		<input type="text" autocomplete="off" name="centre_exam"  placeholder="Autres" class="form-control" >
    </div>
	
</div>