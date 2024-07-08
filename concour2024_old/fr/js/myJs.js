$(document).ready(function() {
	$('input:radio[name="etablissement"]').change(function () {
		if($(this).val()==='IFTICSUP'){
			var ifticsupRadio = document.getElementById("etablissement_11");
			var defaultRadio = document.getElementById("etablissement_1_x");
			alert("NB  : Etant de donné que vous l’avez fait délibérément, en choisissant un établissement autre que l’ESSEC, vous prenez par ce fait même l’engagement de payer les frais formation qui y sont appliqués, dans l’éventualité où vous y seriez admis.");
			// $('.notaBene').show(100);
			$("#filiereESC").attr('checked', true).trigger('click');
			$('.essecOnly').hide();
		}else {
			$('.notaBene').hide(100);
			$('.essecOnly').show();
		}
		if($(this).val()==='YSEM'){
			alert("NB  : Etant de donné que vous l’avez fait délibérément, en choisissant un établissement autre que l’ESSEC, vous prenez par ce fait même l’engagement de payer les frais formation qui y sont appliqués, dans l’éventualité où vous y seriez admis.");
			// $('.notaBene').show(100);
			$("#filiereESC").attr('checked', true).trigger('click');
			$('.essecOnly').hide();
		}else {
			$('.notaBene').hide(100);
			$('.essecOnly').show();
		}
	});
	$('input:radio[name="etablissement2"]').change(function () {
		if($(this).val()==='IFTICSUP'){
			var ifticsupRadio = document.getElementById("etablissement_111_x");
			var defaultRadio = document.getElementById("etablissement_1_x");
			if (confirm("NB : Etant de donné que vous l’avez fait délibérément, en choisissant un établissement autre que l’ESSEC, vous prenez par ce fait même l’engagement de payer les frais formation qui y sont appliqués, dans l’éventualité où vous y seriez admis.")) {
				console.log("You pressed OK!");
				ifticsupRadio.checked = true;
			} else {
				console.log("You pressed Cancel!");
				defaultRadio.checked = true;
			}
			// $('.notaBene').show(100);
			$("#filiereESC").attr('checked', true).trigger('click');
			$('.essecOnly').hide();
		}else {
			$('.notaBene').hide(100);
			$('.essecOnly').show();
		}
		if($(this).val()==='YSEM'){
			var ysemsupRadio = document.getElementById("etablissement_1_1111_x");
			var defaultRadio = document.getElementById("etablissement_1_x");
			if (confirm("NB : Etant de donné que vous l’avez fait délibérément, en choisissant un établissement autre que l’ESSEC, vous prenez par ce fait même l’engagement de payer les frais formation qui y sont appliqués, dans l’éventualité où vous y seriez admis.")) {
				console.log("You pressed OK!");
				ysemsupRadio.checked = true;
			} else {
				console.log("You pressed Cancel!");
				defaultRadio.checked = true;
			}
			// $('.notaBene').show(100);
			$("#filiereESC").attr('checked', true).trigger('click');
			$('.essecOnly').hide();
		}else {
			$('.notaBene').hide(100);
			$('.essecOnly').show();
		}
	});
	$('input:radio[name="etablissement3"]').change(function () {
		if($(this).val()==='IFTICSUP'){
			var ifticsupRadio = document.getElementById("etablissement_333_x");
			var defaultRadio = document.getElementById("etablissement_3_x");
			if (confirm("NB : Etant de donné que vous l’avez fait délibérément, en choisissant un établissement autre que l’ESSEC, vous prenez par ce fait même l’engagement de payer les frais formation qui y sont appliqués, dans l’éventualité où vous y seriez admis.")) {
				console.log("You pressed OK!");
				ifticsupRadio.checked = true;
			} else {
				console.log("You pressed Cancel!");
				defaultRadio.checked = true;
			}
			// $('.notaBene').show(100);
			$("#filiereESC").attr('checked', true).trigger('click');
			$('.essecOnly').hide();
		}else {
			$('.notaBene').hide(100);
			$('.essecOnly').show();
		}
		if($(this).val()==='YSEM'){
			var ysemsupRadio = document.getElementById("etablissement_3_3333_x");
			var defaultRadio = document.getElementById("etablissement_3_x");
			if (confirm("NB : Etant de donné que vous l’avez fait délibérément, en choisissant un établissement autre que l’ESSEC, vous prenez par ce fait même l’engagement de payer les frais formation qui y sont appliqués, dans l’éventualité où vous y seriez admis.")) {
				console.log("You pressed OK!");
				ysemsupRadio.checked = true;
			} else {
				console.log("You pressed Cancel!");
				defaultRadio.checked = true;
			}
			// $('.notaBene').show(100);
			$("#filiereESC").attr('checked', true).trigger('click');
			$('.essecOnly').hide();
		}else {
			$('.notaBene').hide(100);
			$('.essecOnly').show();
		}
	});

	var etrangerOption = {display: "Etranger"};

	var litt = [{display: "Nkam"},{display: "Wouri"},{display: "Sanaga-Maritime"},{display: "Moungo"}];
	var cent = [{display: "Haute-Sanaga"},{display: "Lekié"},{display: "Mbam-et-Inoubou"},
		{display: "Mbam-et-Kim"},{display: "Méfou-et-Afamba"},{display: "Méfou-et-Akono"},
		{display: "Mfoundi"},{display: "Nyong-et-Kellé"},{display: "Nyong-et-Mfoumou"},{display: "Nyong-et-So'o"}];
	var oues = [{display: "Bamboutos"},{display: "Haut-Nkam"},{ display: "Hauts-Plateaux"},{display: "Koung-Khi"},
		{display: "Menoua"},{display: "Mifi"},{display: "Ndé"},{display: "Noun"}];
	var n_ou = [{display: "Boyo"},{display: "Bui"},{ display: "Donga-Mantung"},{display: "Menchum"},{display: "Mezam"},{display: "Momo"},{display: "Ngo-Ketunjia"}];
	var sud = [{display: "Dja-et-Lobo"},{display: "Mvila"},{ display: "Océan"},{display: "Vallée-du-Ntem"}];
	var est = [{display: "Boumba-et-Ngoko"},{display: "Haut-Nyong"},{ display: "Kadey"},{display: "Lom-et-Djérem"}];
	var s_ou = [{display: "Fako"},{display: "Koupé-Manengouba"},{ display: "Manyu"},{display: "Meme"},{display: "Ndian"}];
	var adam = [{display: "Djérem"},{display: "Faro-et-Déo"},{ display: "Mayo-Banyo"},{display: "Mbéré"},{display: "Vina"}];
	var e_nor = [{display: "Diamaré"},{display: "Logone-et-Chari"},{ display: "Mayo-Danay"},{display: "Mayo-Kani"},{display: "Mayo-Sava"},{display: "Mayo-Tsanaga"}];
	var nord = [{display: "Bénoué"},{display: "Faro"},{ display: "Mayo-Louti"},{display: "Mayo-Rey"}];


	//departement(litt);
	litt.push(etrangerOption);
    cent.push(etrangerOption);
    oues.push(etrangerOption);
    n_ou.push(etrangerOption);
    sud.push(etrangerOption);
    est.push(etrangerOption);
    s_ou.push(etrangerOption);
    adam.push(etrangerOption);
    e_nor.push(etrangerOption);
    nord.push(etrangerOption);
	
	$( "#region" ).on('change',function() {
		var select = $(this).val();
		//alert(select);
		switch (select) {
		case "litt":
		departement(litt);
		break;
		case "cent":
		departement(cent);
		break;
		case "oues":
		departement(oues);
		break;
		case "n_ou":
		departement(n_ou);
		break;
		case "sud":
		departement(sud);
		break;
		case "est":
		departement(est);
		break;
		case "s_ou":
		departement(s_ou);
		break;
		case "adam":
		departement(adam);
		break;
		case "e_nor":
		departement(e_nor);
		break;
		case "nord":
		departement(nord);
		break;
		default:
		$("#departement").empty();
		//$("#city").append("<option>--Select--</option>");
		break;
		}
	});

	$( "#pays" ).on('change',function() {
		if($(this).val()!=='Cameroun'){
			console.log("AUTRE PAYS")
			$( "#regionDepart" ).hide()
			$( "#region" ).hide()
			$( "#region" ).val('Etranger');
			$( "#region").parent().find('button.btn').prop('disabled',true);
			// $( "#departement" ).prop('disabled',true)
			$( "#departement" ).hide()
			$( "#departement" ).val('Etranger');
			$( "#departement").parent().find('button.btn').prop('disabled',true)
		}else{
			$( "#regionDepart" ).show()
			$( "#region" ).prop('disabled',false)
			$( "#region").parent().find('button.btn').prop('disabled',false);
			$( "#departement" ).prop('disabled',false)
			$( "#departement").parent().find('button.btn').prop('disabled',false)
		}
		
	})


	$( "#region" ).ready(function() {
		departement(litt);
	});
	
	
    $('.datecheck').focusout(function() {
    	if(!isValidDate($(this).val())){
    		$(this).parent().addClass('has-error');
    	}else{
    		$(this).parent().removeClass('has-error');
    	}
    });
    $('.check, .form-control').focusin(function() {
    	$(this).parent().removeClass('has-error');
    });

    // Vérifi si la date est valide
    function isValidDate(s) {
	  var bits = s.split('/');
	  var d = new Date(bits[2] + '/' + bits[1] + '/' + bits[0]);
	  return !!(d && (d.getMonth() + 1) == bits[1] && d.getDate() == Number(bits[0]));
	}
	$('input[name="worker"]').click(function() {
		if($(this).parent().find('span').text()=='Yes'){
			$('.form-profession').css("visibility", "visible");
		}else{
			$('.form-profession').css("visibility", "hidden");
		}
	   //if($('#radio_button').is(':checked')) { alert("it's checked"); }
	   
	});

	$('input[name="filiere"]').click(function() {
		//$("#etablissement_1_x").attr('checked', true).trigger('click');
		
		if($('input:radio[name="etablissement"]:checked').val() === undefined) {
			//$("#etablissement_1").attr('checked', true).trigger('click');
			
		}
		if($(this).parent().find('span').text().substr($(this).parent().find('span').text().length - 5)!=="(ESC)"){
			//$("#etablissement_1").attr('checked', true).trigger('click');
			$('.notaBene').hide();
		}

		if($(this).parent().find('span').text().substr($(this).parent().find('span').text().length - 5)==="(ESC)"){
			$('.groupESC').slideDown();
			$('.groupEPA').slideUp();
			$(".etablissement_2").css("display", "block");
			$(".show_option_1").text($(this).parent().find('span').text());
			return;
		}
		$('.groupESC').slideUp();
		if($(this).parent().find('span').text().substr($(this).parent().find('span').text().length - 5)==="(EPA)"){			
			$('.groupEPA').slideDown();
			$(".etablissement_2").css("display", "none");
			$(".show_option_1").text($(this).parent().find('span').text());
			$("#etablissement_1").attr('checked', true).trigger('click');
			$("#etablissement_1_x").attr('checked', true).trigger('click');
			return;

		}
		$('.groupEPA, .groupESC').slideUp();
	   //if($('#radio_button').is(':checked')) { alert("it's checked"); }
	   
	});

	function departement(arr) {
		$("#departement").empty(); //To reset departements
		$(arr).each(function(i) { //to list departements
			$("#departement").append('<option>'+arr[i].display+'</option>').selectpicker('refresh');
		});
		$("#departement").selectpicker('refresh');
	}

});