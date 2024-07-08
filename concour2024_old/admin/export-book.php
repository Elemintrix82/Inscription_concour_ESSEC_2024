<?php



session_start();



require '../connexion.php';



if( isset($_SESSION['user_id']) ){

	$db = new DB();

	$conn = $db->getConnection(); 

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');

	$records->bindParam(':id', $_SESSION['user_id']);

	$records->execute();

	$results = $records->fetch(PDO::FETCH_ASSOC);



	$user = NULL;



	if( count($results) > 0){

		$user = $results;

	}
	if(isset($_SESSION["annee"])){
		$stmt=$conn->prepare('select id,annee,centre_exam,
	    	filiere,etablissement,etablissement2,etablissement3,choix1,choix2,
	    	name,date_n,lieu_n,civilite,pays,region,departement,residence,
	    	adresse,telephone,email,langue,handicap,worker,matrimonial,profession,
	    	diplome,etat_diplom,serie,moyenne,mention,diplom_lieu_obt,diplom_an_obt,
	    	father,father_work,father_contact,mother,mother_work,mother_contact,
	    	transID, creation from inscriptions WHERE annee = '.$_SESSION['annee'].' and filiere LIKE "%'.$_SESSION['filiere'].'%" order by filiere, name');
	}else {
		$stmt=$conn->prepare('select id,annee,centre_exam,
	    	filiere,etablissement,etablissement2,etablissement3,choix1,choix2,
	    	name,date_n,lieu_n,civilite,pays,region,departement,residence,
	    	adresse,telephone,email,langue,handicap,worker,matrimonial,profession,
	    	diplome,etat_diplom,serie,moyenne,mention,diplom_lieu_obt,diplom_an_obt,
	    	father,father_work,father_contact,mother,mother_work,mother_contact,
	    	transID, creation from inscriptions');
	}
	
	$stmt->execute();

}else{

  header('Location: http://www.essec-douala.cm/');

  exit();

}



$columnHeader ='';





$columnHeader = "id;"."\t".



"année;"."\t".


"Centre d'Examen;"."\t".


"filière;"."\t".

"etablissement;"."\t".


"etablissement 2;"."\t".


"etablisesment 3;"."\t".

"choix 1;"."\t".

"choix 2;"."\t".


"Nom et prénom;"."\t".



"date_n;"."\t".



"lieu_n;"."\t".



"civilite;"."\t".



"pays;"."\t".



"région;"."\t".



"département;"."\t".

"residence;"."\t".

"adresse;"."\t".



"téléphone;"."\t".



"email;"."\t".



"langue;"."\t".



"handicap;"."\t".



"worker;"."\t".

"matrimonial;"."\t".


"profession;"."\t".



"diplôme;"."\t".



"état_diplôme;"."\t".



"série;"."\t".



"moyenne;"."\t".



"mention;"."\t".



"diplom_lieu_obt;"."\t".



"diplom_an_obt;"."\t".



"father;"."\t".



"father_work;"."\t".



"father_contact;"."\t".



"mother;"."\t".



"mother_work;"."\t".



"mother_contact;"."\t".



"transID;"."\t".



"création;"."\t";











$setData='';







while($rec =$stmt->FETCH(PDO::FETCH_ASSOC))



{



  $rowData = '';



  foreach($rec as $value)



  {



    $value = '"' . $value . '"' . "\t";


    //error_log($value);
    $rowData .= $value.";";
    //$rowData .= iconv("UTF-8", "latin1", $value);



  }



  $setData .= trim($rowData)."\n";



}





header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');

echo "\xEF\xBB\xBF"; 
if(isset($_SESSION["annee"])){
	header("Content-Disposition: attachment; filename=ListeConcoursESSEC_".$_SESSION["annee"].'-'.$_SESSION["filiere"].".csv");
	flush();
}else {
	header("Content-Disposition: attachment; filename=ListeConcoursESSEC.xls");
	flush();
}
// UTF-8 BOM
echo ucwords($columnHeader)."\n".$setData."\n";









?>



