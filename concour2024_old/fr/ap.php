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