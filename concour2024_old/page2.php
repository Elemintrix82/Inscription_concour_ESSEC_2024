<?php 
	require '../connexion.php';
	$db = new DB();
	$conn = $db->getConnection(); 
	$records = $conn->prepare('SELECT id FROM config');
	
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$date_limit = NULL;

	if( count($results) > 0){
		$date_limit = $results;
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concours - ESSEC</title>
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet" type="text/css"/> 
	<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

    <link rel="icon" href="favicon.ico" />
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="assets/css/user.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.debug.js"></script> 
 
	<!-- EDIT: For now, add this line between the libraries --> 
	 
	<!-- The reason being that jspdf includes a version of requirejs which --> 
	 
	<!-- jspdf-autotable currently is not expecting. You can also use version < 2.0.21 --> 
 
	<script>if (window.define) delete window.define.amd;</script> 
  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.0.28/jspdf.plugin.autotable.js"></script> 
	
	<link href="src/bootstrap-wizard.css" rel="stylesheet" />


	<link href="assets/css/style.css" rel="stylesheet" />
	<style type="text/css">
	.toUploadFile label{

	}
	.toUploadFile > .iup{
		width: 100%;
		border-top:1px solid #2a5954;
		border-left:1px solid #2a5954;
		border-right:1px solid #2a5954;
		height: 100px; overflow: hidden;
	}
	.toUploadFile > .iup > span{
		position: absolute; top: 25px; display: none; background: red; right: 7px; border-radius: 50% !important;
		padding: .155rem .455rem .155rem .30rem; width: 20px; height: 20px;
		transition: all .5s; cursor: pointer;

	}
	.toUploadFile > .iup > img{
		width: 100%; display: none;
	}
	.toUploadFile > .iup > span i{
		display: inline-block;
	}
	.toUploadFile .full > img{
		display: block;
	}
	.toUploadFile .full:hover span{
		display: block;
		transition: all .5s;

	}

	
	/********************************************************/
	.inputFile {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;
	}
	.inputFile + label {
		font-size: 1.3rem;		 
		color: white;
		width: 100%;
		padding: .6rem 1rem;
		background-color: #3b706b;
		display: inline-block;
	}
	.toUploadFile >label {
		border-bottom:1px solid #2a5954;
		border-left:1px solid #2a5954;
		border-right:1px solid #2a5954;
		cursor: pointer !important; /* "hand" cursor */
	}
	.toUploadFile {
		text-align: center; font-size: 1.15rem
	}
	.detail-filiere {
		display: none; text-align: justify;
	}
	</style>
</head>

<body>
	<div class="wizard" id="satellite-wizard" data-title="Nouvelle inscription">
		<!-- Step 1 Name & FQDN -->
		<div class="wizard-card" data-cardname="1- Centre d'examen" >
			<?php include 'inc/tab0.php' ?>
		</div>
		<div class="wizard-card" data-cardname="2- Choix de la filière" data-validate="checkTab1" >
			<?php include 'inc/tab1.php' ?>
		</div>
		<div class="wizard-card" data-cardname="3- Etab. de formation" data-validate="checkTab1_1" >
			<?php include 'inc/tab1_1.php' ?>
		</div>		
		<div class="wizard-card" data-cardname="4- Identification" data-validate="checkTab2">			
			<?php include 'inc/tab2.php' ?>
		</div>
		<div class="wizard-card" data-cardname="5- Infos. candidat" data-validate="checkTab3">			
			<?php include 'inc/tab3.php' ?>
		</div>
		<div class="wizard-card " data-cardname="6- Diplôme d'admission" data-validate="checkTab4">		
			<?php include 'inc/tab4.php' ?>
		</div>
		<div class="wizard-card" data-cardname="7- Documents" data-validate="checkTab5">
			<?php include 'inc/tab5.php' ?>
		</div>	
		<div class="wizard-card" data-cardname="8- Parents \ tuteurs" data-validate="checkTab6">
			<?php include 'inc/tab6.php' ?>
		</div>			
		<div class="wizard-card" data-cardname="9- Validation" data-validate="checkFinal">			
			<?php include 'inc/tabFinal.php' ?>
		</div>
	</div>
    <header>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand" href="#"><i class="fa fa-user-edit"></i><span class="text-title">&nbsp;&nbsp;ESSEC CONCOURS <?php echo date("Y"); ?>&nbsp; | &nbsp;&nbsp;<i class="fa fa-phone"></i> (+237) 699 90 46 17</span></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li role="presentation"><a href="../admin/">ADMINISTRATION</a></li>
                        <li role="presentation"><a href="#">CONTACT</a></li>
                    </ul>
                    <div style="width: 100%; text-align: center; margin: 7% auto;">
                    <img src="assets/img/logo.png" style="border-radius: 50% !important" height="115" width="115">
                    <h1 style=" color: #fff; text-shadow: 2px 5px 1px #000
                    font-weight: bold;">RECRUTEMENT  <span class="annee"><?php echo date("Y"); ?></span></h1>
								    <!--h4><a target="_blank" href="assets/doc/calendrier.docx"><img width="35" src="assets/img/downPDF.png"><br/><span>Calendrier des concours</span> </a></h4-->
</div>
		    
            </div>
            </div>
        </nav>
    </header>
    <ul class="nav nav-pills categories">
        <li class="active" id="id-1"><a >ESC</a></li>
        <li id="id-2"><a >EPA</a></li>
        <li id="id-3"><a >LPOM</a></li>
        <li id="id-4"><a >MBA</a></li>
        <li id="id-5"><a >Master 2 Recherche</a></li>
    </ul>
    <div class="container post">
        <div class="row">
            <div class="col-md-6 post-title" style="text-align: center; background: #eee; padding-bottom: 15px ">
                <?php

                    $newDate = date("Y-m-d", strtotime(str_replace('/', '-',$date_limit['id'])));				
                    if((strtotime(date("d-m-Y")) <= strtotime($newDate))) { 
                    	echo "<button id='open-wizard' class='btn btn-success' style='margin: 30px auto;'><h1 style='margin: .9rem'>JE M'INSCRIS</h1> </button>";
					}else{
						echo "<button class='btn btn-danger disabled' style='margin: 30px auto;'><h1 style='margin: .9rem; text-transform:uppercase'>Inscription FERMée</h1> </button>";
					}?> 

                
                <p class="author"><strong>DATE limite</strong> <span class="text-muted"><?php echo $date_limit['id'] ?></span></p>
                <div class="row">
                	<div class="col-sm-12">
                		<br/><br/>
                		<h4><strong>ENTRER A L'ESSEC EN 4 ETAPES</strong></h4>

                	</div>
                	<div class="col-sm-3 ">
                		<p class="img-thumbnail text-round" style="padding-top:22px">Télécharger <br/>la fiche d'inscription</p>
                	</div>
                	<div class="col-sm-3 ">
                		<p class="img-thumbnail text-round" style="padding-top:29px">Payer les frais de concours</p>
                	</div>
                	<div class="col-sm-3 ">
                		<p class="img-thumbnail text-round" style="padding-top:20px">Scanner les documents démandés</p>
                	</div>
                	<div class="col-sm-3 ">
                		<p class="img-thumbnail text-round" style="padding-top:32px">S'incrire en ligne</p>
                	</div>
			<!--div class="col-sm-4">
                		<a target="_blank" href="assets/doc/FicheDeCandidature.pdf"><img width="35" src="assets/img/downPDF.png"><br/><span style="font-size: 11px">Fiche de candidature</span> </a>
                	</div-->
			<div class="col-sm-6">
				<!--a target="_blank" href="assets/doc/EtudesSuperieuresdeCommerce2018_fr.pdf"><img width="35" src="assets/img/downPDF.png"><br/><span style="font-size: 11px">Etudes Supérieures de Commerce<br/> (ESC)</span> </a-->
                	</div>
			<div class="col-sm-6">
                		<!--a target="_blank" href="assets/doc/EtudesProfessionnellesApprofondies_fr.pdf"><img width="35" src="assets/img/downPDF.png"><br/><span style="font-size: 11px">Etudes Professionnelles Approfondies (EPA)</span> </a-->
                	</div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-0 post-body" style="margin-top: 0" >
            	<div style="display: block;" class="detail-filiere detail-filiere-id-1">	                
	                <?php include 'inc/details_filiere1.php' ?>
                 </div>
                 <div class="detail-filiere detail-filiere-id-2">
	                <?php include 'inc/details_filiere2.php' ?>
                 </div>
                 <div  class="detail-filiere detail-filiere-id-3">
	                <?php include 'inc/details_filiere3.php' ?>
                 </div>
                 <div class="detail-filiere detail-filiere-id-4">
	                <?php include 'inc/details_filiere4.php' ?>
                 </div>
                 <div class="detail-filiere detail-filiere-id-5">
	                <?php include 'inc/details_filiere5.php' ?>
                 </div>
            </div>
        </div>
    </div>
    <footer><h6><span>ESSEC <?php echo date("Y"); ?></span><br/><br/><a target="_blank" href="http://arincode.com" style="color: #000; text-decoration: none;">Powered by arincode</a></h6></footer>
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script-->
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
	
	<!--script src="js/bootstrap.min.js" type="text/javascript"></script-->
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="js/datable.js"></script>
	<script src="js/prettify.js" type="text/javascript"></script>
	

	<script src="src/bootstrap-wizard.js" type="text/javascript"></script>
	<script src="js/myJs.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.categories li').on('click',function(e){
				$(this).parent().find('li.active').removeClass('active');
				$(this).addClass('active');
				$('.detail-filiere').hide();
				$('.detail-filiere-'+$(this).prop('id')).show();
			});
			/*var url = $(location).attr('href'),
		    parts = url.split("/"),
		    last_part = parts[parts.length-2];
			 alert(last_part);*/
			 var globalNumero = '';
			 function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            reader.onload = function (e) {
		            	var ext = input.files[0].name.split('.').pop().toLowerCase();
		            	if ($.inArray(ext, ['jpg','jpeg']) == -1){
		            		alert('Veuillez scanner vos documents au format image (.jpg,.jpeg)');
		            		return;
		            	}
		            	if(input.files[0].size>=700000){
		            		alert('Veuillez diminuer la taille de votre image < 7Ko');
		            		return;
		            	}			   
		            	$(input).parent().find('div.iup').addClass('full');			            	
		                $(input).parent().find('div.iup > img').attr('src', e.target.result);
		            }
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
		    $('.toUploadFile > .iup > span').on('click',function(){
		    	$(this).parent().removeClass('full');
		    	$(this).parent().parent().find('input[type="file"]').val("");
		    });
		    $(".inputFile").change(function () {
		        readURL(this);
		    });
			$.fn.wizard.logging = true;
			var wizard = $('#satellite-wizard').wizard({
				keyboard : false,
				contentHeight : 550,
				contentWidth : 720,
				backdrop: 'static',
				buttons:{
					cancelText: "Annuler",
					nextText: "Suivant",
					backText: "Précédent",
					submitText: "Enregistrer",
					submittingText: "Enregistrement en cours..."
				}
			});
			$(".dropdown-menu").mCustomScrollbar({
                theme: "minimal"
            });
			
			$('.selectpicker').selectpicker({
				dropupAuto: false
			});
			
			$.datable();

			wizard.on('closed', function() {
				wizard.reset();
			});

			wizard.on("reset", function() {
				$('input[name="filiere"]').prop('checked', false);
				$('.groupEPA, .groupESC').hide();
				
		    	$('.toUploadFile > .iup > span').parent().removeClass('full');
		    	//$('input[type="file"]').val();
		   		
				wizard.modal.find(':input[type="file"]').val('');
				wizard.modal.find(':input[type="text"]').val('');
				wizard.modal.find('.form-group').removeClass('has-error').removeClass('has-succes');
				//wizard.modal.find('#fqdn').data('is-valid', 0).data('lookup', 0);
			});

			wizard.on("submit", function(wizard) {
				//$('.etab').text($("#etablissement").val());
				$('.etab').text($('input:radio[name="etablissement"]:checked').val());
				//wizard.preventDefault();    
				
			    var fd = new FormData();
			   
			    //fd.append('name', $('#name').val());
			    //alert($('input[name="centre_exam"]:checked').parent().find('label h5').text());
			    fd.append('annee',$('.annee').text());

			    // fd.append('centre_exam',  $('input[name="centre_exam"]:checked').parent().find('label h5').text());

				//------------------------------------------------------------------------------------------------------------
				let selectedCentreExam = $('input[name="centre_exam"]:checked').parent().find('label h5').text();
				if (!selectedCentreExam) {
					selectedCentreExam = $('input[name="centre_exam"][type="text"]').val();
				}
				fd.append('centre_exam', selectedCentreExam);

			    //fd.append('centre_exam_souhaite', $('#centre_exam_souhaite').val());
			    var filiere =$('input[name="filiere"]:checked').parent().find('span').text();
			    fd.append('filiere', filiere);
			    var choix1 ='';
			    var choix2 ='';
		
			    if(filiere.substr(filiere.length - 5)==="(ESC)"){
			    	choix1 = $('#esc_choix1').val();
			    	choix2 = $('#esc_choix2').val();
			    }
			    if(filiere.substr(filiere.length - 5)==="(EPA)"){
			    	choix1 = $('#epa_choix1').val();
			    	choix2 = $('#epa_choix2').val();
			    }

				fd.append('etablissement', $('input:radio[name="etablissement"]:checked').val());
				fd.append('etablissement2', $('input:radio[name="etablissement2"]:checked').val());
				fd.append('etablissement3', $('input:radio[name="etablissement3"]:checked').val());
			    fd.append('choix1', choix1);
			    fd.append('choix2', choix2);

			    fd.append('name', $("#name").val());
			    fd.append('date_n', $("#date_n").val());
			    fd.append('lieu_n', $("#lieu_n").val());
			    fd.append('civilite', $("#civilite").val());
			    fd.append('pays', $("#pays").val());

			    fd.append('region', $("#region option:selected").text());
			    fd.append('departement',$("#departement").val());
				fd.append('residence', $("#residence").val());

			    fd.append('adresse',$("#adresse").val());
			    fd.append('telephone',$("#telephone").val());
			    fd.append('email',$("#email").val());

			    fd.append('langue', $('input[name="langue"]:checked').parent().find('span').text());
			    fd.append('handicap', $('input[name="handicap"]:checked').parent().find('span').text());
			    fd.append('worker', $('input[name="worker"]:checked').parent().find('span').text());
			    fd.append('matrimonial', $('#matrimonial').val());
			    fd.append('profession', $('#profession').val());

			    fd.append('diplome', $('#diplome').val());
			    fd.append('etat_diplom', $('#etat_diplom').val());
			    fd.append('serie', $('#serie').val());
			    fd.append('moyenne', $('#moyenne').val());
			    fd.append('mention', $('#mention').val());
			    fd.append('diplom_lieu_obt', $('#diplom_lieu_obt').val());
			    fd.append('diplom_an_obt', $('#diplom_an_obt').val());

			    fd.append('father', $('#father').val());
			    fd.append('father_work', $('#father_work').val());
			    fd.append('father_contact', $('#father_contact').val());
			    fd.append('mother', $('#mother').val());
			    fd.append('mother_work', $('#mother_work').val());
			    fd.append('mother_contact', $('#mother_contact').val());

					

			    fd.append('doc_diplom', $('#doc_diplom').prop('files')[0]);
			    fd.append('doc_photo', $('#doc_photo').prop('files')[0]);
			    fd.append('doc_acte_naiss', $('#doc_acte_naiss').prop('files')[0]);
			    fd.append('doc_paiement', $('#doc_paiement').prop('files')[0]);

			    fd.append('transID', $('#transID').val());

				console.log([...fd]); // Log toutes les données du formulaire
			   
			    $.ajax({
			        url: '../server.php',
			        type: 'POST',
			        data: fd,
			        success: function (data) {
			        	console.log(data);
			        	if(data.status == 'success'){
			        		$('.create-server-name strong').text(data.numero);
							globalNumero = data.numero;
			        		setTimeout(function() {
								wizard.trigger("success");
								$('.essecOnly').css("display","block");
								wizard.hideButtons();
								wizard._submitting = false;
								wizard.showSubmitCard("success");
								wizard.updateProgressBar(0);
							}, 500);						        
					    }else if(data.status == 'error'){
					        alert("Un erreur grave est survenue, Veuillez actualiser la page ALALAL !!!");
							alert("Erreur: " + data.details);
					    }
			            
			        },
				    error:function(d){
				  		alert("Un erreur grave est survenue, Veuillez actualiser la page OLOLOL !!!");
						console.log("OLOLOL ERREUR")
						console.log(d); // Log l'erreur pour plus d'info
				    },
			        cache: false,
			        contentType: false,
			        processData: false
			    });
				
				/*$.ajax({
				  url: 'server.php',
				  data: fd,
				  processData: false,
				  contentType: false,
				  type: 'POST',
				  success: function(data){
				    alert(data);
				  },
				  error:function(d){
				  	console.log(d);
				  }
				});
				/*this.log('seralize()');
				this.log(this.serialize());
				this.log('serializeArray()');
				this.log(this.serializeArray());*/
		
				/*setTimeout(function() {
					wizard.trigger("success");
					wizard.hideButtons();
					wizard._submitting = false;
					wizard.showSubmitCard("success");
					wizard.updateProgressBar(0);
				}, 2000);*/
			});
			
			wizard.el.find(".wizard-success .im-done").click(function() {
				wizard.hide();
				setTimeout(function() {
					wizard.reset();	
				}, 250);
				
			});
		
			wizard.el.find(".wizard-success .create-another-server").click(function() {
				wizard.reset();
			});

			wizard.el.find(".wizard-success .im-print").click(function() {
				var doc = new jsPDF();

				// Set general styles
				doc.setFont("helvetica");

				doc.setFontSize(13);
				doc.setTextColor(10,1,10);
				doc.setFontType("bold");
				doc.text('CONCOURS D’ENTREE A L’ESSEC / COMPETITIVE ENTRANCE EXAM INTO ASEB', 15, 20);
				// Title
				doc.setFontSize(11);
				doc.setTextColor(10,1,10);
				doc.setFontType("bold");
				// doc.text('ATTESTATION D\'ENREGISTREMENT EN LIGNE / ONLINE REGISTRATION ATTESTATION', 10, 10);


				var text = 'ATTESTATION D\'ENREGISTREMENT EN LIGNE / ONLINE REGISTRATION ATTESTATIONS';
				doc.text(text, 23, 29);

				var textWidth = doc.getTextWidth(text);

				var startX = 23;
				var startY = 30; // Adjust Y coordinate to place the line correctly
				doc.line(startX, startY, startX + textWidth+3, startY);

				// Load image file and add to PDF
				var reader = new FileReader();
				reader.onload = function(event) {

					var img1 = new Image();
					img1.src = 'logoess.jpg';
					img1.onload = function() {
						doc.addImage(img1, 'JPEG', 10, 40, 34, 28);

						// Load the second image (univ.jpeg)
						var img2 = new Image();
						img2.src = 'logoudo.jpg';
						img2.onload = function() {
							doc.addImage(img2, 'JPEG', 168, 40, 28, 28);
					
							var imageData = event.target.result;
							doc.addImage(imageData, 'JPEG', 88, 40, 35, 35); // Adjust position and size as needed

							// doc.addImage(univData, 'JPEG', 135, 40, 40, 40);

							// Draw table
							doc.setLineWidth(0.1);
							doc.rect(10, 83, 190, 275); // Outer border

							// Continue adding other text or elements if needed
							doc.setFontSize(11);
							// Candidate Information
							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text('Mme / Monsieur : ', 10, 85);
							doc.setTextColor(10,1,10);
							doc.setFontType("normal");
							doc.text($("#name").val(), 60, 85);

							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text('Votre candidature au concours d\'entrée à l\'ESSEC a été enregistrée ', 10, 95);
							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text('sous le numéro de dossier : ', 10, 102);
							doc.setTextColor(255,0,0);
							doc.setFontType("bold");
							doc.text(globalNumero, 70, 102);
							console.log(globalNumero)
							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text('Pour le concours d\'entrée de l\'année académique : ', 10, 112);
							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text($('.annee').text()+'/2025', 120, 112);

							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text('Filière Choisie : ', 10, 122);
							doc.setTextColor(10,1,10);
							doc.setFontType("normal");
							doc.text($('input[name="filiere"]:checked').parent().find('span').text(), 50, 122);

							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text('Option choisie/envisagée : ', 10, 132);
							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							// doc.text($('input[name="filiere"]:checked').parent().find('span').text(), 35, 132);
							
							doc.setTextColor(10,1,10);
							var filiere =$('input[name="filiere"]:checked').parent().find('span').text();
							var choix1 ='';
							var choix2 ='';
							if(filiere.substr(filiere.length - 5)==="(ESC)"){
								choix1 = $('#esc_choix1').val();
								choix2 = $('#esc_choix2').val();
							}
							if(filiere.substr(filiere.length - 5)==="(EPA)"){
								choix1 = $('#epa_choix1').val();
								choix2 = $('#epa_choix2').val();
							}
							doc.setFontType("bold");
							doc.text('Choix 1 : ', 30, 137);
							doc.setTextColor(10,1,10);
							doc.setFontType("normal");
							doc.text(choix1, 50, 137);
							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text('Choix 2 : ', 30, 142);
							doc.setTextColor(10,1,10);
							doc.setFontType("normal");
							doc.text(choix2, 50, 142);
							
							var dateConcours ='';
							if(filiere.substr(filiere.length - 5)==="(ESC)"){
								dateConcours = '27/08/2024';
							}
							if(filiere.substr(filiere.length - 5)==="(EPA)"){
								dateConcours = '28/08/2024';
							}
							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text('Date du concours : ', 10, 152);
							doc.setTextColor(10,1,10);
							doc.setFontType("normal");
							doc.text(dateConcours, 55, 152);

							let selectedCentreExam = $('input[name="centre_exam"]:checked').parent().find('label h5').text();
							if (!selectedCentreExam) {
								selectedCentreExam = $('input[name="centre_exam"][type="text"]').val();
							}
							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text('Centre d\'examen choisi : ', 10, 162);
							doc.setTextColor(10,1,10);
							doc.setFontType("normal");
							doc.text(selectedCentreExam, 60, 162);

							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text('Numéro du reçu de versement des frais de concours : ', 10, 172);
							doc.setTextColor(10,1,10);
							doc.setFontType("normal");
							doc.text($('#transID').val(), 120, 172);

							// School Choices
							doc.setTextColor(10,1,10);
							doc.setFontSize(13);
							doc.setFontType("bold");
							doc.text('Etablissement de formation choisi : ', 10, 182);
							doc.setTextColor(10,1,10);
							doc.setFontSize(11);
							doc.setFontType("normal");
							doc.setFontType("bold");
							doc.text('Premier Choix : ', 26, 190);
							doc.setTextColor(10,1,10);
							doc.setFontType("normal");
							doc.text($('input:radio[name="etablissement"]:checked').val(), 65, 190);

							doc.setTextColor(10,1,10);
							doc.setFontSize(11);
							doc.setFontType("bold");
							doc.text('Deuxième Choix : ', 26, 197);
							doc.setTextColor(10,1,10);
							doc.setFontType("normal");
							doc.text($('input:radio[name="etablissement2"]:checked').val(), 65, 197);

							doc.setTextColor(10,1,10);
							doc.setFontSize(11);
							doc.setFontType("bold");
							doc.text('Troisième Choix : ', 26, 204);
							doc.setTextColor(10,1,10);
							doc.setFontType("normal");
							doc.text($('input:radio[name="etablissement3"]:checked').val(), 65, 204);

							// Notes
							doc.setFontSize(10);
							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text('NB 1 : ', 10, 212);
							doc.setTextColor(10,1,10);
							doc.setFontType("normal");
							doc.text('Etant donné que vous l\'avez fait délibérément, en choisissant un établissement autre que l\'ESSEC, ', 21, 212, {maxWidth: 190});
							doc.setTextColor(10,1,10);
							doc.text('vous prenez par ce fait même l\'engagement de payer les frais formation qui y sont appliqués,', 10, 218, {maxWidth: 190});
							doc.setTextColor(10,1,10);
							doc.text('dans l\'éventualité où vous y serez admis.', 10, 224, {maxWidth: 190});

							doc.setTextColor(10,1,10);
							doc.setFontType("bold");
							doc.text('NB 2 : ', 10, 234);
							doc.setTextColor(10,1,10);
							doc.setFontType("normal");
							doc.text('Le jour du concours, vous devez impérativement vous présenter avec', 21, 234, {maxWidth: 190});
							doc.setTextColor(10,1,10);
							doc.text('- Une pièce d\'identité en cours de validité', 35, 242);
							doc.setTextColor(10,1,10);
							doc.text('- L\'original + 01 photocopie de votre reçu de versement des frais de concours', 35, 247);
							doc.setTextColor(10,1,10);
							doc.text('- La présente fiche d\'enregistrement en ligne', 35, 252);

							doc.setTextColor(10,1,10);
							doc.setFontSize(10);
							doc.text('Bonne Chance', 160, 272);
							doc.save('inscriptionConcours.pdf');
						};

					};
				};

						// Ensure a file is selected
						var file = $('#doc_photo').prop('files')[0];
						if (file) {
							reader.readAsDataURL(file);
						} else {
							alert('Veuillez sélectionner une image pour l\'ajouter au PDF.');
						}

			});

			// wizard.el.find(".wizard-success .im-print").click(function() {
			// 	var doc = new jsPDF();

			// 	// Set general styles
			// 	doc.setFont("helvetica");

			// 	// Title
			// 	doc.setFontSize(13);
			// 	doc.setTextColor(10,1,10);
			// 	doc.setFontType("bold");
			// 	// doc.text('ATTESTATION D\'ENREGISTREMENT EN LIGNE / ONLINE REGISTRATION ATTESTATION', 10, 10);


			// 	var text = 'ATTESTATION D\'ENREGISTREMENT EN LIGNE / ONLINE REGISTRATION ATTESTATION';
			// 	doc.text(text, 10, 10);

			// 	var textWidth = doc.getTextWidth(text);

			// 	var startX = 10;
			// 	var startY = 12; // Adjust Y coordinate to place the line correctly
			// 	doc.line(startX, startY, startX + textWidth, startY);


			// 	doc.setFontSize(11);
			// 	// Candidate Information
			// 	doc.setTextColor(10,1,10);
			// 	doc.setFontType("normal");
			// 	doc.text('Mme / Monsieur : ', 10, 20);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text($("#name").val(), 50, 20);

			// 	doc.setTextColor(10,1,10);
			// 	doc.text('Votre candidature au concours d\'entrée à l\'ESSEC a été enregistrée', 10, 30);
				
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('Session de : ', 10, 40);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('........', 40, 40);

			// 	doc.setTextColor(10,1,10);
			// 	doc.text('Filière Choisie : ', 10, 50);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text("........", 40, 50);

			// 	doc.setTextColor(10,1,10);
			// 	doc.text('Spécialités : ', 10, 60);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text("........", 35, 60);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('Choix 1 : ', 55, 60);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text("........", 80, 60);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('/// Choix 2 : ', 105, 60);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text("........", 130, 60);

			// 	doc.setTextColor(10,1,10);
			// 	doc.text('Date du concours : ', 10, 70);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('.........', 55, 70);

			// 	doc.setTextColor(10,1,10);
			// 	doc.text('Centre d\'examen choisi : ', 10, 80);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('.........', 70, 80);

			// 	doc.setTextColor(10,1,10);
			// 	doc.text('Numéro du reçu de versement des frais de concours : ', 10, 90);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('..........', 120, 90);

			// 	// School Choices
			// 	doc.setTextColor(10,1,10);
			// 	doc.setFontSize(13);
			// 	doc.setFontType("bold");
			// 	doc.text('Etablissement de formation choisi : ', 10, 100);
			// 	doc.setTextColor(10,1,10);
			// 	doc.setFontSize(11);
			// 	doc.setFontType("normal");
			// 	doc.setFontType("bold");
			// 	doc.text('Premier Choix : ', 26, 108);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('...............', 65, 108);

			// 	doc.setTextColor(10,1,10);
			// 	doc.setFontSize(11);
			// 	doc.setFontType("bold");
			// 	doc.text('Deuxième Choix : ', 26, 115);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('.............', 65, 115);

			// 	doc.setTextColor(10,1,10);
			// 	doc.setFontSize(11);
			// 	doc.setFontType("bold");
			// 	doc.text('Troisième Choix : ', 26, 122);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('..............', 65, 122);

			// 	// Notes
			// 	doc.setFontSize(10);
			// 	doc.setTextColor(10,1,10);
			// 	doc.setFontType("bold");
			// 	doc.text('NB 1 : ', 10, 130);
			// 	doc.setTextColor(10,1,10);
			// 	doc.setFontType("normal");
			// 	doc.text('Etant donné que vous l\'avez fait délibérément, en choisissant un établissement autre que l\'ESSEC, ', 21, 130, {maxWidth: 190});
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('vous prenez par ce fait même l\'engagement de payer les frais formation qui y sont appliqués,', 10, 136, {maxWidth: 190});
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('dans l\'éventualité où vous y serez admis.', 10, 142, {maxWidth: 190});

			// 	doc.setTextColor(10,1,10);
			// 	doc.setFontType("bold");
			// 	doc.text('NB 2 : ', 10, 152);
			// 	doc.setTextColor(10,1,10);
			// 	doc.setFontType("normal");
			// 	doc.text('Le jour du concours, vous devez impérativement vous présenter avec', 21, 152, {maxWidth: 190});
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('- Une pièce d\'identité en cours de validité', 35, 160);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('- L\'original + 01 photocopie de votre reçu de versement des frais de concours', 35, 165);
			// 	doc.setTextColor(10,1,10);
			// 	doc.text('- La présente fiche d\'enregistrement en ligne', 35, 170);

			// 	doc.setTextColor(10,1,10);
			// 	doc.setFontSize(10);
			// 	doc.text('Bonne Chance', 160, 180);

			// 	var reader = new FileReader();
			// 	reader.onload = function(event) {
			// 		var imageData = event.target.result;
			// 		doc.addImage(imageData, 'JPEG', 70, 190, 50, 50); // Adjust position and size as needed
			// 		doc.save('inscriptionConcours.pdf');
			// 	};
				
			// 	// Ensure a file is selected
			// 	var file = $('#doc_photo').prop('files')[0];
			// 	if (file) {
			// 		reader.readAsDataURL(file);
			// 	} else {
			// 		alert('Veuillez sélectionner une image pour l\'ajouter au PDF.');
			// 	}

			// });
		
			/*$(".wizard-group-list").click(function() {
				alert("Disabled for demo.");
			});*/

			$('#open-wizard').click(function(e) {
				e.preventDefault();
				wizard.show();

			});
		});


		function checkTab1(el){
			if(!$('input[name="filiere"]').is(':checked')){
				alert('Veuillez choisir une filière');
				return false;
			}
			var elem=$('input[name="filiere"]:checked').parent().find('span');

			if(elem.text().substr(elem.text().length - 5)==="(ESC)"){
				$(".show_choice_1").html("<b>Choix 1 </b>: "+$('#esc_choix1').val());
				$(".show_choice_2").html("<b>Choix 2 </b>: "+$('#esc_choix2').val());
				//console.log("ESC   -> "+$('#esc_choix1').val());
				$('.valid_filiere').html('<span style="font-weight:bold; font-size:1.8rem">'+elem.text()+'</span>'
					+'<br/>Option<br/>'+$('#esc_choix1').val()+
					'<br/> ou <br/>'+$('#esc_choix2').val());
				return true;
			}
			if(elem.text().substr(elem.text().length - 5)==="(EPA)"){
				$(".show_choice_1").html("<b>Choix 1 </b>: "+$('#epa_choix1').val());
				$(".show_choice_2").html("<b>Choix 2 </b>: "+$('#epa_choix2').val());
				
				$('.valid_filiere').html('<span style="font-weight:bold; font-size:1.8rem">'+elem.text()+'</span>'
					+'<br/>Option<br/>'+$('#epa_choix1').val()+
					'<br/> ou <br/>'+$('#epa_choix2').val());
				return true;
			
			}
			$('.valid_filiere').html('<span style="font-weight:bold; font-size:1.8rem">'+elem.text()+'</span>');
			return true;
			//alert($("input[name='filiere']:checked").parent().find('span').text());
			//$('#valid_filiere').text($('#name').val());
		
		}
		
		function checkTab1_1(el){
			if(!$('input[name="etablissement"]').is(':checked')){
				alert('Veuillez choisir un etablissement pour le choix 1');
				return false;
			}
			// if(!$('input[name="etablissement2"]').is(':checked')){
			// 	alert('Veuillez choisir un etablissement pour le choix 2');
			// 	return false;
			// }
		}
		function checkTab2(el){				
			if($('#name').val()===''){
				$('#name').parent().addClass('has-error');
				return false;
			}
			$('#name').parent().removeClass('has-error');

			if(!isValidDate($('#date_n').val())) {
				$('#date_n').parent().addClass('has-error');
				return false;
			};
			if($('#lieu_n').val()===''){
				$('#lieu_n').parent().addClass('has-error');
				return false;
			}	
			$('#date_l').parent().removeClass('has-error');
			//check = $('#date_n').parent().hasClass('has-error');
			$('.valid_name').text($('#name').val());


			return true;

			
		}
		function checkTab3(el){				
			if($('#adresse').val()===''){
				$('#adresse').parent().addClass('has-error');
				return false;
			}
			$('#adresse').parent().removeClass('has-error');
			if($('#telephone').val()===''){
				$('#telephone').parent().addClass('has-error');
				return false;
			}
			$('#telephone').parent().removeClass('has-error');	

			if($('#email').val()!=''){
				if(!validateEmail($('#email').val())){
					$('#email').parent().addClass('has-error');
					return false;
				}
			}
			$('#email').parent().removeClass('has-error');				
			return true;
		}
		function checkTab4(el){				
			if($('#diplome').val()===''){
				$('#diplome').parent().addClass('has-error');
				return false;
			}							
			return true;
		}
		function checkTab5(el){
			var state =true;
			$('.toUploadFile .require').each(function(){					
				state =$(this).hasClass('full');
				if(!state){return false; }
			});
			if(!state){
				alert('Veuillez entrer tous les documents obligatoires (*)');
			}
			return state;
		}
		function checkFinal(el){
			if($('#transID').val()===''){
				$('#transID').parent().addClass('has-error');
				return false;
			}
			return true
		}
		function validateEmail(Email) {
		    var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		    return $.trim(Email).match(pattern) ? true : false;
		}
		function isValidDate(s) {
		  var bits = s.split('/');
		  var d = new Date(bits[2] + '/' + bits[1] + '/' + bits[0]);
		  return !!(d && (d.getMonth() + 1) == bits[1] && d.getDate() == Number(bits[0]));
		}

	</script>
</body>

</html>