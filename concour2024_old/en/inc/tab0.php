<div class="wizard-input-section">
	<h3 style="text-align: center; font-weight: bold; margin-top: 1rem">Please select a examination center</h3>
	<section class="myRadio row">
		<?php
			$stmt = $conn->prepare('SELECT * FROM centres WHERE active = true');
	      	$stmt->execute();
	      	$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
	      	foreach ($results as $row) { ?>
	        	<div class="col-sm-3" style ="margin-bottom:15px">
				  <input type="radio" id="centre_exam_0<?php echo $row['id'] ?>" name="centre_exam" value="<?php echo $row['id'] ?>" <?php echo (($row['id']==1) ? 'checked' : '') ?>>
				  <label for="centre_exam_0<?php echo $row['id'] ?>">
				    <h5><?php echo $row['nom'] ?></h5>		    
				  </label>
				</div>
		    <?php
	      	}
		?>					
	</section>
	<div class="input-group">
		<h4 style="text-align: center; font-weight: bold; margin-top: 1rem">Preferred examination center</h4>    
		<input type="text" autocomplete="off" name="centre_exam"  placeholder="Others" class="form-control" >
    </div>
</div>