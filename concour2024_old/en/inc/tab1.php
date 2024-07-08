<?php
	$stmt = $conn->prepare('SELECT * FROM cursus ');
  	$stmt->execute();
  	$results = $stmt->fetchALL(PDO::FETCH_OBJ);
?>

<div class="wizard-input-section">

	<h4 style="text-align: center; font-weight: bold; " class="mb-3">Please select an industry</h4>
	<h4>&nbsp;</h4>
	<div class="form-group">
		<!--div class="myRadio row" style="margin:0; padding-top: 15px">
			<div class="col-sm-3">
			 
			</div>
			<div class="col-sm-3 text-center">
			  <input type="radio" id="etablissement_1" name="etablissement" value="ESSEC (Dla)">
			  <label for="etablissement_1">
			    <h5 class="mb-0" style="margin-top: 15px;">ESSEC</h5>	
			    <span style="margin-bottom:12px">Douala</span>	    
			  </label>
			</div>
			<?php if($results[0]->active) { ?>
				<div class="col-sm-3 text-center">
				  <input type="radio" id="etablissement_2" name="etablissement" value="IFTICSUP (Ydé)" >
				  <label for="etablissement_2">
				    <h5 class="mb-0" style="margin-top: 15px;">IFTICSUP</h5>	
				    <span style="margin-bottom:12px">Yaoundé</span>		    
				  </label>
				</div>
			<?php } ?>
			<div class="col-sm-3">
			 
			</div>
		</div-->
		<div class="col-sm-12">
    		<?php if($results[0]->active) { ?>
    		<div class="control-group">	    							   

			    <label class="control control--radio">

			      <span>Higher Commercial Studies (ESC)</span>

			      <input id="filiereESC" type="radio" name="filiere"/>

			      <div class="control__indicator"></div>

			    </label>               

			</div>
			<?php } ?>
		</div>
		<div class="col-sm-11 col-sm-offset-1 groupESC" style="padding-left: 5px; margin-bottom: 8px; ">                

	        <div class="input-group">

	            <span class="input-group-addon">1<sup>er</sup> choix</span>                   

	            <select id="esc_choix1" class="form-control selectpicker" data-container="body" data-size="7">

	            <option>Financial and Accounting Management (FICO)</option>

	            <option>Audit and Management Control (ACoG)</option>

	            <option>Human Resources Management (GRH)</option>

	            <option>Marketing (MKT)</option>

	            <option>Commerce International and Supply Chain (CITL)</option>

	            <option>Economic and Financial Engineering (IEF)</option>

	            <!--option>Systèmes d'Information et d'Aide à la Décision (SIAD)</option-->

	          </select>

	        </div>

	    </div>

	    <div class="col-sm-11 col-sm-offset-1 groupESC" style="padding-left: 5px; margin-bottom: 8px;">                

	        <div class="input-group">

	            <span class="input-group-addon">2<sup>e&nbsp;</sup> choix</span>                   

	            <select id="esc_choix2" class="form-control selectpicker" data-container="body" data-size="7">

	            <option>Marketing (MKT)</option>

	            <option>Financial and Accounting Management (FICO)</option>

	            <option>Audit and Management Control (ACoG)</option>

	            <option>Human Resources Management (GRH)</option>

	            <option>Commerce International and Supply Chain (CITL)</option>

	            <option>Economic and Financial Engineering (IEF)</option>

	            <!--option>Systèmes d'Information et d'Aide à la Décision (SIAD)</option-->

	          </select>

	        </div>

	    </div>
	    <!--div class="col-sm-11 col-sm-offset-1 groupESC" style="padding-left: 5px; margin-bottom: 8px;">  
	    	<span style="color:#08C; display:none" class="notaBene">
	    		NB: A IFTICSUP (Ydé), le montant annuel de la pension est fixé à <strong style="color:red">500 000 Fcfa</strong> pour les classes du cycle de licence et 
	    		<strong style="color:red">700 000 Fcfa</strong> pour les classes du cycle de Master 
	    		avec <strong style="color:red">possibilité de bourses</strong> pour les meilleurs. <br/><br/> Renseignements au numéro 6 97 39 40 17
	    	</span>
	    </div-->
		<div class="col-sm-12 essecOnly">
			<?php if($results[1]->active) { ?>
    		<div class="control-group">	    							   

			    <label class="control control--radio">

			      <span>Advanced Professional Studies (EPA)</span>

			      <input type="radio" name="filiere"/>

			      <div class="control__indicator"></div>

			    </label>               

			</div>
			<?php } ?>
		</div>

		<div class="col-sm-11 col-sm-offset-1 groupEPA" style="padding-left: 5px; margin-bottom: 8px; ">                

	        <div class="input-group">

	           <span class="input-group-addon">1<sup>er</sup> choix</span>                   

	           <select id="epa_choix1" class="form-control selectpicker" data-container="body" data-size="7">

	            <option>Entrepreneurial Management (ENT)</option>

	            <option>Sales Management and Negotiation (VNC)</option>

	            <option>Financial and Accounting Management (FICO)</option>

	            <option>Corporate social policy Management (POSE)</option>

	            <option>Quality - Health - Safety - Environment Management (QHSE)</option>

	            <option>Project Management, Analysis and Evaluation (AEP)</option>

	            <option> Communication Management(COM)</option>

	          </select>

	        </div>

	    </div>

	    <div class="col-sm-11 col-sm-offset-1 groupEPA " style="padding-left: 5px; margin-bottom: 8px; ">                

	        <div class="input-group">

	           <span class="input-group-addon">2<sup>e&nbsp;</sup> choix</span>                   

	           <select id="epa_choix2" class="form-control selectpicker" data-container="body" data-size="7">

				<option>Financial and Accounting Management (FICO)</option>

			    <option>Entrepreneurial Management (ENT)</option>

				<option>Sales Management and Negotiation (VNC)</option>

				<option>Corporate social policy Management (POSE)</option>

				<option>Quality - Health - Safety - Environment Management (QHSE)</option>

				<option>Project Management, Analysis and Evaluation (AEP)</option>

				<option> Communication Management(COM)</option>

	          </select>

	        </div>

	    </div>

		<div class="col-sm-12 essecOnly">
			<?php if($results[2]->active) { ?>
    		<div class="control-group">	    							   

			    <label class="control control--radio">

			      <span>Licence Professionnelles en Organisation et Management (LPOM)</span>

			      <input type="radio" name="filiere"/>

			      <div class="control__indicator"></div>

			    </label>               

			</div>
			<?php } ?>
		</div>

		<div class="col-sm-12 essecOnly">
			<?php if($results[3]->active) { ?>
    		<div class="control-group">	    							   

			    <label class="control control--radio">

			      <span>Master of Business Adminstration (MBA)</span>

			      <input type="radio" name="filiere"/>

			      <div class="control__indicator"></div>

			    </label>               

			</div>
			<?php } ?>
		</div>
		<div class="col-sm-12 essecOnly">
			<?php if($results[4]->active) { ?>
    		<div class="control-group">	    							   

			    <label class="control control--radio">

			      <span>Master of Business Adminstration (e-MBA)  : à distance</span>

			      <input type="radio" name="filiere"/>

			      <div class="control__indicator"></div>

			    </label>               

			</div>
			<?php } ?>
		</div>
		<div class="col-sm-12 essecOnly">
			<?php if($results[5]->active) { ?>
    		<div class="control-group">	    							   

			    <label class="control control--radio">

			      <span>Master 2 Recherche</span>

			      <input type="radio" name="filiere"/>

			      <div class="control__indicator"></div>

			    </label>               

			</div>
			<?php } ?>
		</div>

    </div>

</div>

