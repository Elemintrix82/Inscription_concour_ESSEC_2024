<?php
	$stmt = $conn->prepare('SELECT * FROM cursus ');
  	$stmt->execute();
  	$results = $stmt->fetchALL(PDO::FETCH_OBJ);
?>

<div class="wizard-input-section">

	<h4 style="text-align: center; font-weight: bold;">Veuillez choisir l'établissement de formation</h4>
	<h5 style="text-align: center; color:red" class="show_option_1">-</h5>

	<div class="form-group">
		<div class="myRadio row justify-content-md-center" style="margin:0; padding-top: 0px">
			<div class="row" style="margin:0; margin-bottom:15px">
				<div class="col-sm-12" style="border-top:1px solid #cccddd">
					<!--h6 style="text-align: center;" class="show_choice_1">-</h6-->
					<span style="margin-bottom:1px; font-size:12px; font-weight:bold">Premier choix : établissement-site de formation préféré</span>
				</div>
			</div>
			
			<div class="col-sm-3 text-center etablissement_1">
			  <input type="radio" id="etablissement_1" name="etablissement" value="ESSEC">
			  <label for="etablissement_1">
			    <h5 class="mb-0" style="margin-top: 12px; margin-bottom:0">ESSEC</h5>	
			    <span style="margin-bottom:1px; font-size:10px">Douala</span>			
			  </label>
			</div>
			
			<div class="col-sm-3 text-center etablissement_11">
				<input type="radio" id="etablissement_11" name="etablissement" value="IFTICSUP" >
				<label for="etablissement_11">
				<h5 class="mb-0" style="margin-top: 12px; margin-bottom:0">IFTICSUP</h5>	
				<span style="margin-bottom:1px; font-size:10px">Yaoundé</span>	    
				</label>
			</div>

			<div class="col-sm-3 text-center etablissement_111">
				<input type="radio" id="etablissement_111" name="etablissement" value="YSEM" >
				<label for="etablissement_111">
				<h5 class="mb-0" style="margin-top: 12px; margin-bottom:0">YSEM</h5>	
				<span style="margin-bottom:1px; font-size:10px">Yaoundé</span>	    
				</label>
			</div>
			
		</div>
		<!-- -------------------------------------------------------------------------- --->
		<div class="myRadio row " style="margin:0; padding-top: 5px; margin-top:5px">
			<div class="row" style="margin:0; margin-bottom:5px">
				<div class="col-sm-12" style="border-top:1px solid #cccddd">
					<!--h6 style="text-align: center;" class="show_choice_2">-</h6-->
					<span style="margin-bottom:1px; font-size:12px; font-weight:bold; ">Second choix: établissement-site de formation de substitution éventuellement <strong style="color:red">(Non obligatoire)</strong></span><br/>	
					<!-- <span style="margin-bottom:1px; font-size:12px; font-style: italic; color:red">Nb: par ce choix, vous autorisez le jury à vous inscrire éventuellement sur la liste d'admission de ce deuxième choix si toutes les places ouvertes sur votre premier site de premier choix sont prises. Le cas échéant, l'inscription se fera toujours suivant l'ordre de mérite -->
					</span>	
				</div>
			</div>

			<div class="col-sm-3 ml-sm-auto text-center etablissement_1_">
			  <input type="radio" id="etablissement_1_x" name="etablissement2" value="AUCUN">
			  <label for="etablissement_1_x">
			    <h5 class="mb-0" style="margin-top: 12px; margin-bottom:0">AUCUN</h5>	
				<!-- <span style="margin-bottom:12px; font-size:14px">Douala</span>				 -->
			  </label>
			</div>

			<div class="col-sm-3 ml-sm-auto text-center etablissement_11">
			  <input type="radio" id="etablissement_11_x" name="etablissement2" value="ESSEC">
			  <label for="etablissement_11_x">
			    <h5 class="mb-0" style="margin-top: 12px; margin-bottom:0">ESSEC</h5>	
				<span style="margin-bottom:12px; font-size:14px">Douala</span>				
			  </label>
			</div>
			
			<div class="col-sm-3 text-center etablissement_111">
				<input type="radio" id="etablissement_111_x" name="etablissement2" value="IFTICSUP" >
				<label for="etablissement_111_x">
				<h5 class="mb-0" style="margin-top: 12px; margin-bottom:0">IFTICSUP</h5>
				<span style="margin-bottom:12px; font-size:14px">Yaoundé</span>		    
				</label>
			</div>
			
			<div class="col-sm-3 text-center etablissement_1111">
			  <input type="radio" id="etablissement_1_1111_x" name="etablissement2" value="YSEM">
			  <label for="etablissement_1_1111_x">
			    <h5 class="mb-0" style="margin-top: 12px; margin-bottom:0">YSEM</h5>	
				<span style="margin-bottom:12px; font-size:14px">Yaoundé</span>	    
			  </label>
			</div>

		</div>
		<!-- ----------------------------------------------------------------------------------------------------------------------------------------- -->
		<div class="myRadio row " style="margin:0; padding-top: 5px; margin-top:5px">
			<div class="row" style="margin:0; margin-bottom:5px">
				<div class="col-sm-12" style="border-top:1px solid #cccddd">
					<span style="margin-bottom:1px; font-size:12px; font-weight:bold; ">Troisième choix: établissement-site de formation de substitution éventuellement <strong style="color:red">(Non obligatoire)</strong></span><br/>	
					</span>	
				</div>
			</div>

			<div class="col-sm-3 ml-sm-auto text-center etablissement_3_">
			  <input type="radio" id="etablissement_3_x" name="etablissement3" value="AUCUN">
			  <label for="etablissement_3_x">
			    <h5 class="mb-0" style="margin-top: 12px; margin-bottom:0">AUCUN</h5>	
			  </label>
			</div>

			<div class="col-sm-3 ml-sm-auto text-center etablissement_33">
			  <input type="radio" id="etablissement_33_x" name="etablissement3" value="ESSEC">
			  <label for="etablissement_33_x">
			    <h5 class="mb-0" style="margin-top: 12px; margin-bottom:0">ESSEC</h5>	
				<span style="margin-bottom:12px; font-size:14px">Douala</span>				
			  </label>
			</div>
			
			<div class="col-sm-3 text-center etablissement_333">
				<input type="radio" id="etablissement_333_x" name="etablissement3" value="IFTICSUP" >
				<label for="etablissement_333_x">
				<h5 class="mb-0" style="margin-top: 12px; margin-bottom:0">IFTICSUP</h5>
				<span style="margin-bottom:12px; font-size:14px">Yaoundé</span>		    
				</label>
			</div>
			
			<div class="col-sm-3 text-center etablissement_3333">
			  <input type="radio" id="etablissement_3_3333_x" name="etablissement3" value="YSEM">
			  <label for="etablissement_3_3333_x">
			    <h5 class="mb-0" style="margin-top: 12px; margin-bottom:0">YSEM</h5>	
				<span style="margin-bottom:12px; font-size:14px">Yaoundé</span>	    
			  </label>
			</div>

		</div>
		
    </div>
	<!-- <div class="col-sm-12 col-sm-offset-0 groupESC" style="padding-left: 5px; margin-bottom: 8px;">  
		<span style="color:#08C; display:none; font-size:11px" class="notaBene">
			NB : Etant de donné que vous l’avez fait délibérément, en choisissant un établissement autre que 
			l’ESSEC, vous prenez par ce fait même l’engagement de payer les frais formation qui y sont appliqués, 
			dans l’éventualité où vous y seriez admis.

			NB: A IFTICSUP (Ydé), le montant annuel de la pension est fixé à <strong style="color:red">500 000 Fcfa</strong> pour les classes du cycle de licence et 
			<strong style="color:red">700 000 Fcfa</strong> pour les classes du cycle de Master 
			avec <strong style="color:red">possibilité de bourses</strong> pour les meilleurs. Renseignements au numéro 6 97 39 40 17
		</span>
	</div> -->
</div>

